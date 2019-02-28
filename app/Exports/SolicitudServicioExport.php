<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SolicitudServicioExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $solicitud_servicios;

    public function __construct($solicitud_servicios)
    {
        $this->solicitud_servicios = $solicitud_servicios;
        $solicitud_servicios->each(function($solicitud_servicios){
            $solicitud_servicios->user;
            $solicitud_servicios->departamento;
            $solicitud_servicios->servicio;
            $solicitud_servicios->solicitud_servicio_items;
            
        });
        
    }

	public function view(): View
    {
        return view('reporteservicio.excel', [
            'solicitud_servicios' => $this->solicitud_servicios
        ]);
    }
}
