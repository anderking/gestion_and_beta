<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PrecioDocumentoUpdateRequest;

use App\PrecioDocumento;

class PrecioDocumentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precio_documentos = PrecioDocumento::orderBy('carrera_id','ASC')->get();
        $precio_documentos->each(function($precio_documentos){
            $precio_documentos->carrera;
            $precio_documentos->documento;
        });

        return view('precioDocumentos.index')->with('precio_documentos', $precio_documentos);
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
        $precio_documento = PrecioDocumento::findOrFail($id);
        return view('precioDocumentos.edit')->with('precio_documento', $precio_documento);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $precio_documento = PrecioDocumento::findOrFail($id);
        return view('precioDocumentos.edit')->with('precio_documento', $precio_documento);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PrecioDocumentoUpdateRequest $request, $id)
    {
        $precio_documento = PrecioDocumento::findOrFail($id);
        $precio_documento->precio = $request['precio'];
        $precio_documento->update();
        return redirect()->route('precioDocumentos.edit',$id)->with('status','Se ha actualizado el precio');
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
