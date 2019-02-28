<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SolicitudPrograma;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SolicitudProgramaExport;

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
            $cedula = $request->cedula;

            if($status==null && $cedula==null)
            {
                $solicitud_programas = SolicitudPrograma::FiltrarFecha($desde,$hasta)->get();
            }elseif($cedula==null){
                $solicitud_programas = SolicitudPrograma::FiltrarFechaStatus($desde,$hasta,$status)->get();
            }elseif($status==null){
                $solicitud_programas = SolicitudPrograma::FiltrarFechaCedula($desde,$hasta,$cedula)->get();
            }else{
                $solicitud_programas = SolicitudPrograma::FiltrarFechaStatusCedula($desde,$hasta,$status,$cedula)->get();
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
            $cedulapdf = $request->cedulapdf;

            if($statuspdf==null && $cedulapdf==null)
            {
                $solicitud_programas = SolicitudPrograma::FiltrarFecha($desdepdf,$hastapdf)->get();
            }elseif($cedulapdf==null){
                $solicitud_programas = SolicitudPrograma::FiltrarFechaStatus($desdepdf,$hastapdf,$statuspdf)->get();
            }elseif($statuspdf==null){
                $solicitud_programas = SolicitudPrograma::FiltrarFechaCedula($desdepdf,$hastapdf,$cedulapdf)->get();
            }else{
                $solicitud_programas = SolicitudPrograma::FiltrarFechaStatusCedula($desdepdf,$hastapdf,$statuspdf,$cedulapdf)->get();
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

    public function excel(Request $request)
    {
        $desdeexcel = $request->desdeexcel;
        $hastaexcel = $request->hastaexcel;
        
        if($desdeexcel!=null && $hastaexcel!=null)
        {
            $desdeexcel = $request->desdeexcel;
            $hastaexcel = $request->hastaexcel;
            $statusexcel = $request->statusexcel;
            $cedulaexcel = $request->cedulaexcel;

            if($statusexcel==null && $cedulaexcel==null)
            {
                $solicitud_programas = SolicitudPrograma::FiltrarFecha($desdeexcel,$hastaexcel)->get();
            }elseif($cedulaexcel==null){
                $solicitud_programas = SolicitudPrograma::FiltrarFechaStatus($desdeexcel,$hastaexcel,$statusexcel)->get();
            }elseif($statusexcel==null){
                $solicitud_programas = SolicitudPrograma::FiltrarFechaCedula($desdeexcel,$hastaexcel,$cedulaexcel)->get();
            }else{
                $solicitud_programas = SolicitudPrograma::FiltrarFechaStatusCedula($desdeexcel,$hastaexcel,$statusexcel,$cedulaexcel)->get();
            }

        }else
        {
            $solicitud_programas = SolicitudPrograma::orderBy('created_at','DESC')->get();
        }

        return Excel::download(new SolicitudProgramaExport($solicitud_programas), 'reporteprograma.xlsx');
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
