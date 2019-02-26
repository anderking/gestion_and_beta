<?php

namespace App\Http\Controllers;
use App\Mail\EmailSolicitud;
use Webpatser\Uuid\Uuid;
use Illuminate\Http\Request;
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
    public function index()
    {
        $user_id = Auth::user()->id;
        if(Auth::user()->hasRole('directoradm'))
        {
            $solicitudes = Solicitud::orderBy('updated_at','DESC')->whereIn('status',['R'])->get();
        }

        if(Auth::user()->hasRole('secretario'))
        {
            $solicitudes = Solicitud::orderBy('updated_at','DESC')->get();
        }

        if(Auth::user()->hasRole('estudiante'))
        {
            $solicitudes = Solicitud::orderBy('created_at','DESC')->where('user_id',$user_id)->get();
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
        $solicitud->status = $request['status'];
        $solicitud->pago_img = "";

        $solicitud->save();

        $documentos = $request->get('documentos', []);
        $precio_fact = DB::table('precio_documentos')->select('precio')->where('carrera_id', $solicitud->carrera_id)->whereIn('documento_id', $documentos)->get();

        $last_solicitud = Solicitud::select('id')->orderby('created_at','DESC')->first();

        for($i=0; $i<count($documentos); $i++)
        {
            $solicitud_documentos = new SolicitudDocumento();
            $solicitud_documentos->solicitud_id = $last_solicitud->id;
            $solicitud_documentos->documento_id = $documentos[$i];
            $solicitud_documentos->precio_fact = $precio_fact[$i]->precio;
            $solicitud_documentos->save();
        }
        

        //Mail::to($request->email)->send(new EmailSolicitud($request));
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
    public function update(Request $request, $id)
    {
        $solicitud = Solicitud::findOrFail($id);
        
        if($request['status'])
        {
            $solicitud->status = $request['status'];
            $solicitud->update();
            return redirect()->route('solicitud.index');
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
            return redirect()->route('solicitud.index');
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