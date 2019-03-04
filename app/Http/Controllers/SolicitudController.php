<?php

namespace App\Http\Controllers;
use App\Mail\EmailSolicitud;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
use App\Http\Requests\SolicitudUpdateRequest;
use Illuminate\Support\Facades\Mail;
use App\Carrera;
use App\Pensum;
use App\Solicitud;
use App\SolicitudDocumento;
use App\PrecioDocumento;
use DB;
use Cache;
use File;
use Storage;
use Illuminate\Support\Facades\Auth;

class SolicitudController extends Controller
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
                    $solicitudes = Solicitud::FiltrarFecha($desde,$hasta)->whereIn('status',['R'])->get();
                }else
                {
                    $solicitudes = Solicitud::FiltrarFechaCedula($desde,$hasta,$cedula)->whereIn('solicitudes.status',['R'])->get();
                }

            }else
            {
                $solicitudes = Solicitud::orderBy('created_at','DESC')->whereIn('status',['R'])->get();
            }
        }

        if(Auth::user()->hasRole('secretario'))
        {
            if(count($request->query)>0)
            {
                $desde = $request->desde;
                $hasta = $request->hasta;
                $cedula = $request->cedula;

                if($cedula==null)
                {
                    $solicitudes = Solicitud::FiltrarFecha($desde,$hasta)->whereIn('status',['E'])->get();
                }else
                {
                    $solicitudes = Solicitud::FiltrarFechaCedula($desde,$hasta,$cedula)->whereIn('solicitudes.status',['E'])->get();
                }

            }else
            {
                $solicitudes = Solicitud::orderBy('created_at','DESC')->whereIn('status',['E'])->get();
            }
        }

        if(Auth::user()->hasRole('estudiante') || Auth::user()->hasRole('admin'))
        {
            if(count($request->query)>0)
            {
                $desde = $request->desde;
                $hasta = $request->hasta;
                $solicitudes = Solicitud::FiltrarFecha($desde,$hasta)->where('user_id',$user_id)->get();
            }else
            {
                $solicitudes = Solicitud::orderBy('created_at','DESC')->where('user_id',$user_id)->get();
            }
        }

        $solicitudes->each(function($solicitudes){
            $solicitudes->user;
            $solicitudes->carrera;
            $solicitudes->solicitudes_documentos;
        });

        return view('solicitud.index')->with('solicitudes', $solicitudes);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $carreras  = Carrera::all();
        $carreras->each(function($carreras){
            $carreras->precio_documentos;
        });
        $selected = 0;
        return view('solicitud.create', ['carreras'=> $carreras, 'selected' => $selected]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitud = new Solicitud();
        $solicitud->user_id = $request['user_id'];
        $solicitud->carrera_id = $request['carrera_id'];
        $solicitud->uuid= Uuid::generate()->string;
        $solicitud->email = $request['email'];
        $solicitud->status = $request['status'];
        $solicitud->pago_img = "";

        $solicitud->save();

        $documentos = $request->get('documentos', []);
        $precio_fact = DB::table('precio_documentos')->select('precio')->where('carrera_id', $solicitud->carrera_id)->whereIn('documento_id', $documentos)->get();

        $last_solicitud = Solicitud::orderby('created_at','DESC')->first();


        for($i=0; $i<count($documentos); $i++)
        {
            $solicitud_documentos = new SolicitudDocumento();
            $solicitud_documentos->solicitud_id = $last_solicitud->id;
            $solicitud_documentos->documento_id = $documentos[$i];
            $solicitud_documentos->precio_fact = $precio_fact[$i]->precio;
            $solicitud_documentos->save();
        }

        Mail::to($request->email)->send(new EmailSolicitud($last_solicitud));
        return redirect()->route('solicitud.create')->with('status','Se ha enviado la solicitud');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->user;
        return view('solicitud.show')->with('solicitud',$solicitud);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SolicitudUpdateRequest $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        
        if($request['status'])
        {
            $solicitud->status = $request['status'];
            $solicitud->update();
            
            if($solicitud->status=="E" || $solicitud->status=="A")
            {
                Mail::to($solicitud->email)->send(new EmailSolicitud($solicitud));
            }

            return redirect()->route('solicitud.index')->with('status','Solicitud Actualizada');
        }

        if ($request->file('pago_img'))
        {
            $file = $request->file('pago_img');
            $name = 'dcyt_' . time() . '.' . $file->getClientOriginalExtension();
            $path = public_path() . '\img';
            $file->move($path,$name);

            $solicitud->pago_img = $name;
            $solicitud->status = 'R';
            $solicitud->update();
            return redirect()->route('solicitud.index')->with('status','Solicitud Actualizada');
        }
    }

       /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ship(Request $request)
    {
       // $order = Order::findOrFail($orderId);

        // Ship order...


    }
}
