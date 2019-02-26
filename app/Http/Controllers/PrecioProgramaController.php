<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PrecioPrograma;

class PrecioProgramaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precio_programas = PrecioPrograma::orderBy('carrera_id','ASC')->get();
        $precio_programas->each(function($precio_programas){
            $precio_programas->carrera;
            $precio_programas->pensum;
        });

        return view('precioProgramas.index')->with('precio_programas', $precio_programas);
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
        $precio_programas = PrecioPrograma::findOrFail($id);
        return view('precioProgramas.edit')->with('precio_programas', $precio_programas);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $precio_programas = PrecioPrograma::findOrFail($id);
        return view('precioProgramas.edit')->with('precio_programas', $precio_programas);
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
        $precio_programas = PrecioPrograma::findOrFail($id);
        $precio_programas->precio = $request['precio'];
        $precio_programas->update();
        return redirect()->route('precioProgramas.edit',$id)->with('status','Se ha actualizado el precio');
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
