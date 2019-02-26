<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Webpatser\Uuid\Uuid;
use App\Servicio;
use App\Departamento;
use App\SolicitudServicio;
use App\SolicitudServicioItem;
use DB;
use Cache;
use File;
use Storage;
use Illuminate\Support\Facades\Auth;


class SolicitudServiciosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $solicitud_servicios = SolicitudServicio::orderBy('created_at','DESC')->get();

        $solicitud_servicios->each(function($solicitud_servicios){
            $solicitud_servicios->user;
            $solicitud_servicios->departamento;
            $solicitud_servicios->servicio;
            $solicitud_servicios->solicitud_servicio_items;
        });

        return view('solicitudservicio.index')->with('solicitud_servicios', $solicitud_servicios);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servicios  = Servicio::all();
        $departamentos  = Departamento::all();
        
        $servicios->each(function($servicios){
            $servicios->items;
        });


        $selected = 0;

        return view('solicitudservicio.create', ['servicios'=> $servicios, 'departamentos' => $departamentos, 'selected' => $selected]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $solicitud_servicio = new SolicitudServicio();
        $solicitud_servicio->uuid= Uuid::generate()->string;
        $solicitud_servicio->user_id = $request['user_id'];
        $solicitud_servicio->departamento_id = $request['departamento_id'];
        $solicitud_servicio->servicio_id = $request['servicio_id'];
        $solicitud_servicio->observaciones = $request['observaciones'];
        $solicitud_servicio->status = "P";

        $solicitud_servicio->save();

        $items = $request->get('items', []);

        $last_solicitud_servicio = SolicitudServicio::select('id')->orderby('created_at','DESC')->first();

        for($i=0; $i<count($items); $i++)
        {
            $solicitud_item = new SolicitudServicioItem();
            $solicitud_item->solicitud_servicio_id = $last_solicitud_servicio->id;
            $solicitud_item->item_id = $items[$i];
            $solicitud_item->save();
        }
        

        //Mail::to($request->email)->send(new EmailSolicitud($request));
        return redirect()->route('solicitudservicio.create')->with('status','Se ha enviado la solicitud');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $solicitud_servicio = SolicitudServicio::findOrFail($id);
        $solicitud_servicio->each(function($solicitud_servicio){
            $solicitud_servicio->user;
            $solicitud_servicio->departamento;
            $solicitud_servicio->servicio;
            $solicitud_servicio->solicitud_servicio_items;
        });

        return view('solicitudservicio.show')->with('solicitud_servicio', $solicitud_servicio);
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
        $solicitud_servicio = SolicitudServicio::findOrFail($id);
        
        if($request['status'])
        {
            $solicitud_servicio->status = $request['status'];
            $solicitud_servicio->update();
            return redirect()->route('solicitudservicio.show',$id)->with('status','Se ha actualizado el usuario');
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
