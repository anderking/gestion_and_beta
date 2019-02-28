<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SolicitudExport;
use DB;
class ReporteDocumentosController extends Controller
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
                $solicitudes = Solicitud::FiltrarFecha($desde,$hasta)->get();
            }elseif($cedula==null){
                $solicitudes = Solicitud::FiltrarFechaStatus($desde,$hasta,$status)->get();
            }elseif($status==null){
                $solicitudes = Solicitud::FiltrarFechaCedula($desde,$hasta,$cedula)->get();
            }else{
                $solicitudes = Solicitud::FiltrarFechaStatusCedula($desde,$hasta,$status,$cedula)->get();
            }

                $solicitudes->each(function($solicitudes){
                    $solicitudes->user;
                    $solicitudes->carrera;
                    $solicitudes->solicitudes_documentos;
                });

            return view('reportedocumento.index')->with(['solicitudes'=>$solicitudes,'request'=>$request]);
        }else
        {
            $solicitudes = Solicitud::orderBy('created_at','DESC')->get();
            return view('reportedocumento.index')->with(['solicitudes'=>$solicitudes,'request'=>$request]);
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
                $solicitudes = Solicitud::FiltrarFecha($desdepdf,$hastapdf)->get();
            }elseif($cedulapdf==null){
                $solicitudes = Solicitud::FiltrarFechaStatus($desdepdf,$hastapdf,$statuspdf)->get();
            }elseif($statuspdf==null){
                $solicitudes = Solicitud::FiltrarFechaCedula($desdepdf,$hastapdf,$cedulapdf)->get();
            }else{
                $solicitudes = Solicitud::FiltrarFechaStatusCedula($desdepdf,$hastapdf,$statuspdf,$cedulapdf)->get();
            }
        }else
        {
            $solicitudes = Solicitud::orderBy('created_at','DESC')->get();
        }
        
        $pdf = PDF::loadView('reportedocumento.pdf', compact('solicitudes'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('reportedocumento.pdf');
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
                $solicitudes = Solicitud::FiltrarFecha($desdeexcel,$hastaexcel)->get();
            }elseif($cedulaexcel==null){
                $solicitudes = Solicitud::FiltrarFechaStatus($desdeexcel,$hastaexcel,$statusexcel)->get();
            }elseif($statusexcel==null){
                $solicitudes = Solicitud::FiltrarFechaCedula($desdeexcel,$hastaexcel,$cedulaexcel)->get();
            }else{
                $solicitudes = Solicitud::FiltrarFechaStatusCedula($desdeexcel,$hastaexcel,$statusexcel,$cedulaexcel)->get();
            }
        }else
        {
            $solicitudes = Solicitud::orderBy('created_at','DESC')->get();
        }

        return Excel::download(new SolicitudExport($solicitudes), 'reportedocumento.xlsx');
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
