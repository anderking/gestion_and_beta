<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SolicitudProgramaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public $solicitud_programas;

    public function __construct($solicitud_programas)
    {
        $this->solicitud_programas = $solicitud_programas;
        $solicitud_programas->each(function($solicitud_programas){
            $solicitud_programas->user;
            $solicitud_programas->carrera;
            $solicitud_programas->pensum;
        });
        
    }

	public function view(): View
    {
        return view('reporteprograma.excel', [
            'solicitud_programas' => $this->solicitud_programas
        ]);
    }
}
