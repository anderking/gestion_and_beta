<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Solicitud;
use Barryvdh\DomPDF\Facade as PDF;

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
            if($status==null)
            {
                $solicitud = Solicitud::FiltrarFecha($desde,$hasta)->get();
            }else{
                $solicitud = Solicitud::FiltrarFechaStatus($desde,$hasta,$status)->get();
            }
            return view('reportedocumento.index')->with(['solicitud'=>$solicitud,'request'=>$request]);
        }else
        {
            $solicitud = Solicitud::orderBy('created_at','DESC')->get();
            return view('reportedocumento.index')->with(['solicitud'=>$solicitud,'request'=>$request]);
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
                $solicitud = Solicitud::FiltrarFecha($desdepdf,$hastapdf)->get();
            }else{
                $solicitud = Solicitud::FiltrarFechaStatus($desdepdf,$hastapdf,$statuspdf)->get();
            }
        }else
        {
            $solicitud = Solicitud::orderBy('created_at','DESC')->get();
        }
        
        $pdf = PDF::loadView('reportedocumento.pdf', compact('solicitud'));
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('reportedocumento.pdf');
        //return view('reportedocumento.pdf')->with(['solicitud'=>$solicitud]);
        
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
