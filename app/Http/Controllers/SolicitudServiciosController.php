<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EmailSolicitudServicio;
use Illuminate\Support\Facades\Mail;
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
                    $solicitud_servicios = SolicitudServicio::FiltrarFecha($desde,$hasta)->whereIn('status',['P'])->get();
                }else
                {
                    $solicitud_servicios = SolicitudServicio::FiltrarFechaCedula($desde,$hasta,$cedula)->whereIn('solicitud_servicios.status',['P'])->get();
                }
            }else
            {
                $solicitud_servicios = SolicitudServicio::orderBy('created_at','DESC')->whereIn('status',['P'])->get();
            }
        }

        if(Auth::user()->hasRole('encargadoserv'))
        {
            if(count($request->query)>0)
            {
                $desde = $request->desde;
                $hasta = $request->hasta;
                $cedula = $request->cedula;

                if($cedula==null)
                {
                    $solicitud_servicios = SolicitudServicio::FiltrarFecha($desde,$hasta)->whereIn('status',['E'])->get();
                }else
                {
                    $solicitud_servicios = SolicitudServicio::FiltrarFechaCedula($desde,$hasta,$cedula)->whereIn('solicitud_servicios.status',['E'])->get();
                }
            }else
            {
                $solicitud_servicios = SolicitudServicio::orderBy('created_at','DESC')->whereIn('status',['E'])->get();
            }
        }

        if(Auth::user()->hasRole('docente') || Auth::user()->hasRole('admin'))
        {
            if(count($request->query)>0)
            {
                $desde = $request->desde;
                $hasta = $request->hasta;
                $solicitud_servicios = SolicitudServicio::FiltrarFecha($desde,$hasta)->where('user_id',$user_id)->get();
            }else
            {
                $solicitud_servicios = SolicitudServicio::orderBy('created_at','DESC')->where('user_id',$user_id)->get();
            }
        }

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
        $solicitud_servicio->email = $request['email'];
        $solicitud_servicio->status = "P";

        $solicitud_servicio->save();

        $items = $request->get('items', []);
        $cantidad = $request->get('cantidad', []);

        $last_solicitud_servicio = SolicitudServicio::select('id')->orderby('created_at','DESC')->first();

        for($i=0; $i<count($items); $i++)
        {
            $solicitud_item = new SolicitudServicioItem();
            $solicitud_item->solicitud_servicio_id = $last_solicitud_servicio->id;
            $solicitud_item->item_id = $items[$i];
            if($solicitud_servicio->servicio_id==4)
            {
                $solicitud_item->cantidad = $cantidad[$i];
            }
            $solicitud_item->save();
        }
        

        Mail::to($request->email)->send(new EmailSolicitudServicio($solicitud_servicio));

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
            
            if($solicitud_servicio->status=="E" || $solicitud_servicio->status=="A")
            {
                Mail::to($solicitud_servicio->email)->send(new EmailSolicitudServicio($solicitud_servicio));
            }

            return redirect()->route('solicitudservicio.index')->with('status','Se ha actualizado el usuario');
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
