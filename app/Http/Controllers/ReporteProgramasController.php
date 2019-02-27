<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudPrograma;
use Barryvdh\DomPDF\Facade as PDF;

class ReporteProgramasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(count($request->query)>0)
        {
            $desde = $request->desde;
            $hasta = $request->hasta;
            $status = $request->status;
            if($status==null)
            {
                $solicitud_programas = SolicitudPrograma::FiltrarFecha($desde,$hasta)->get();
            }else{
                $solicitud_programas = SolicitudPrograma::FiltrarFechaStatus($desde,$hasta,$status)->get();
            }
            return view('reporteprograma.index')->with(['solicitud_programas'=>$solicitud_programas,'request'=>$request]);
        }else
        {
            $solicitud_programas = SolicitudPrograma::orderBy('created_at','DESC')->get();
            return view('reporteprograma.index')->with(['solicitud_programas'=>$solicitud_programas,'request'=>$request]);
        }
    }


    public function pdf(Request $request)
    {
        $desdepdf = $request->desdepdf;
        $hastapdf = $request->hastapdf;

        if($desdepdf!=null && $hastapdf!=null)
        {
            $desdepdf = $request->desdepdf;
            $hastapdf = $request->hastapdf;
            $statuspdf = $request->statuspdf;
            if($statuspdf==null)
            {
                $solicitud_programas = SolicitudPrograma::FiltrarFecha($desdepdf,$hastapdf)->get();
            }else{
                $solicitud_programas = SolicitudPrograma::FiltrarFechaStatus($desdepdf,$hastapdf,$statuspdf)->get();
            }
        }else
        {
            $solicitud_programas = SolicitudPrograma::orderBy('created_at','DESC')->get();
        }
        
        $pdf = PDF::loadView('reporteprograma.pdf', compact('solicitud_programas'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('reporteprograma.pdf');
        //return view('reporteprograma.pdf')->with(['solicitud'=>$solicitud]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
