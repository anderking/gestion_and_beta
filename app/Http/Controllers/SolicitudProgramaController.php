<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
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
    public function index()
    {
        $user_id = Auth::user()->id;
        
        if(Auth::user()->hasRole('directoradm'))
        {
            $solicitud_programa = SolicitudPrograma::orderBy('updated_at','DESC')->whereIn('status',['R'])->get();
        }

        if(Auth::user()->hasRole('directorpro'))
        {
            $solicitud_programa = SolicitudPrograma::orderBy('updated_at','DESC')->whereIn('status',['A'])->get();
        }

        if(Auth::user()->hasRole('secretario'))
        {
            $solicitud_programa = SolicitudPrograma::orderBy('updated_at','DESC')->get();
        }

        if(Auth::user()->hasRole('estudiante'))
        {
            $solicitud_programa = SolicitudPrograma::orderBy('created_at','DESC')->where('user_id',$user_id)->get();
        }

        $solicitud_programa->each(function($solicitud_programa){
            $solicitud_programa->user;
            $solicitud_programa->carrera;
            $solicitud_programa->pensum;
        });
        
        return view('programa.index')->with('solicitud_programa', $solicitud_programa);
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
        $solicitud_programa->nrotelefono = $request->input('nrotelefono');
        $solicitud_programa->email = $request->input('email');

        $precio_fact = DB::table('precio_programas')->select('precio')->where('carrera_id', $solicitud_programa->carrera_id)->where('pensum_id', $solicitud_programa->pensum_id)->first();
        
        $solicitud_programa->precio_fact = $precio_fact->precio;
        $solicitud_programa->status = "P";
        $solicitud_programa->pago_img = "";

        $solicitud_programa->save();

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
            return redirect()->route('programa.index');
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
            return redirect()->route('programa.index');
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
