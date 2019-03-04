<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Mail\EmailSolicitudPrograma;
use Illuminate\Support\Facades\Mail;
use Webpatser\Uuid\Uuid;
use App\SolicitudPrograma;
use App\Carrera;
use App\Pensum;
use DB;
use Cache;
use File;
use Storage;
use Illuminate\Support\Facades\Auth;

class SolicitudProgramaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;

        if(Auth::user()->hasRole('directoradm'))
        {
            if(count($request->query)>0)
            {
                $desde = $request->desde;
                $hasta = $request->hasta;
                $cedula = $request->cedula;

                if($cedula==null)
                {
                    $solicitud_programas = SolicitudPrograma::FiltrarFecha($desde,$hasta)->whereIn('status',['R'])->get();
                }else
                {
                    $solicitud_programas = SolicitudPrograma::FiltrarFechaCedula($desde,$hasta,$cedula)->whereIn('solicitud_programas.status',['R'])->get();
                }
            }else
            {
                $solicitud_programas = SolicitudPrograma::orderBy('created_at','DESC')->whereIn('status',['R'])->get();
            }
        }

        if(Auth::user()->hasRole('directorpro'))
        {
            if(count($request->query)>0)
            {
                $desde = $request->desde;
                $hasta = $request->hasta;
                $cedula = $request->cedula;

                if($cedula==null)
                {
                    $solicitud_programas = SolicitudPrograma::FiltrarFecha($desde,$hasta)->whereIn('status',['E'])->get();
                }else
                {
                    $solicitud_programas = SolicitudPrograma::FiltrarFechaCedula($desde,$hasta,$cedula)->whereIn('solicitud_programas.status',['E'])->get();
                }
            }else
            {
                $solicitud_programas = SolicitudPrograma::orderBy('created_at','DESC')->whereIn('status',['E'])->get();
            }
        }

        if(Auth::user()->hasRole('estudiante') || Auth::user()->hasRole('admin'))
        {
            if(count($request->query)>0)
            {
                $desde = $request->desde;
                $hasta = $request->hasta;
                $solicitud_programas = SolicitudPrograma::FiltrarFecha($desde,$hasta)->where('user_id',$user_id)->get();
            }else
            {
                $solicitud_programas = SolicitudPrograma::orderBy('created_at','DESC')->where('user_id',$user_id)->get();
            }
        }
        
        return view('programa.index')->with('solicitud_programas', $solicitud_programas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $carreras  = Carrera::all();
      $pensum  = Pensum::all();
      
      $carreras->each(function($carreras){
            $carreras->precio_programas;
        });

      $selected = 0;
      return view('programa.create', ['carreras'=> $carreras, 'pensum'=> $pensum, 'selected' => $selected]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $solicitud_programa = new SolicitudPrograma();
        $solicitud_programa->uuid= Uuid::generate()->string;
        $solicitud_programa->user_id = $request->input('user_id');
        $solicitud_programa->carrera_id = $request->input('carrera_id');
        $solicitud_programa->pensum_id = $request->input('pensum_id');
        $solicitud_programa->descripcion = $request->input('descripcion');
        $solicitud_programa->email = $request->input('email');

        $precio_fact = DB::table('precio_programas')->select('precio')->where('carrera_id', $solicitud_programa->carrera_id)->where('pensum_id', $solicitud_programa->pensum_id)->first();
        
        $solicitud_programa->precio_fact = $precio_fact->precio;
        $solicitud_programa->status = "P";
        $solicitud_programa->pago_img = "";        

        $solicitud_programa->save();

        Mail::to($solicitud_programa->email)->send(new EmailSolicitudPrograma($solicitud_programa));

        return redirect()->route('programa.create')->with('status','Se ha enviado la solicitud');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $solicitud_programa = SolicitudPrograma::findOrFail($id);
        
        if($request['status'])
        {
            $solicitud_programa->status = $request['status'];
            $solicitud_programa->update();
            
            if($solicitud_programa->status=="E" || $solicitud_programa->status=="A")
            {
                Mail::to($solicitud_programa->email)->send(new EmailSolicitudPrograma($solicitud_programa));
            }

            return redirect()->route('programa.index')->with('status','Solicitud Actualizada');
        }

        if ($request->file('pago_img'))
        {
            $file = $request->file('pago_img');
            $name = 'dcyt_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\img';
            $file->move($path,$name);

            $solicitud_programa->pago_img = $name;
            $solicitud_programa->status = 'R';
            $solicitud_programa->update();
            return redirect()->route('programa.index')->with('status','Solicitud Actualizada');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
