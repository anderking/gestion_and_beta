<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Sugerencia;

class SugerenciaController extends Controller
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
            $cedula = $request->cedula;
            if($cedula==null)
            {
                $sugerencias = Sugerencia::FiltrarFecha($desde,$hasta)->get();
            }else
            {
                $sugerencias = Sugerencia::FiltrarFechaCedula($desde,$hasta,$cedula)->get();
            }
        }else
        {
            $sugerencias = Sugerencia::orderBy('created_at','DESC')->get();
        }

        return view('sugerencia.index')->with(['sugerencias'=>$sugerencias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sugerencia.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sugerencia = new Sugerencia();
        $sugerencia->descripcion = $request->input('descripcion');
        $sugerencia['user_id']=\Auth::user()->id;
        $sugerencia->save();
        return redirect()->route('sugerencia.create')->with('status','Se ha enviado la sugerencia');
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
