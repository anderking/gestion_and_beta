<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudServicio;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SolicitudServicioExport;

class ReporteServiciosController extends Controller
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
                $solicitud_servicios = SolicitudServicio::FiltrarFecha($desde,$hasta)->get();
            }else{
                $solicitud_servicios = SolicitudServicio::FiltrarFechaStatus($desde,$hasta,$status)->get();
            }
            return view('reporteservicio.index')->with(['solicitud_servicios'=>$solicitud_servicios,'request'=>$request]);
        }else
        {
            $solicitud_servicios = SolicitudServicio::orderBy('created_at','DESC')->get();
            return view('reporteservicio.index')->with(['solicitud_servicios'=>$solicitud_servicios,'request'=>$request]);
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
                $solicitud_servicios = SolicitudServicio::FiltrarFecha($desdepdf,$hastapdf)->get();
            }else{
                $solicitud_servicios = SolicitudServicio::FiltrarFechaStatus($desdepdf,$hastapdf,$statuspdf)->get();
            }
        }else
        {
            $solicitud_servicios = SolicitudServicio::orderBy('created_at','DESC')->get();
        }
        
        $pdf = PDF::loadView('reporteservicio.pdf', compact('solicitud_servicios'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('reporteservicio.pdf');
        //return view('reporteservicio.pdf')->with(['solicitud'=>$solicitud]);        
    }

    public function excel(Request $request)
    {
        $desdeexcel = $request->desdeexcel;
        $hastaexcel = $request->hastaexcel;
        
        if($desdeexcel!=null && $hastaexcel!=null)
        {
            $desdeexcel = $request->desdeexcel;
            $hastaexcel = $request->hastaexcel;
            $statusexcel = $request->statusexcel;
            if($statusexcel==null)
            {
                $solicitud_servicios = SolicitudServicio::FiltrarFecha($desdeexcel,$hastaexcel)->get();
            }else{
                $solicitud_servicios = SolicitudServicio::FiltrarFechaStatus($desdeexcel,$hastaexcel,$statusexcel)->get();
            }
        }else
        {
            $solicitud_servicios = SolicitudServicio::orderBy('created_at','DESC')->get();
        }

        return Excel::download(new SolicitudServicioExport($solicitud_servicios), 'reporteservicio.xlsx');
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
