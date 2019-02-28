<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class SolicitudExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $solicitud;

    public function __construct($solicitud)
    {
        $this->solicitud = $solicitud;
        $solicitud->each(function($solicitud){
            $solicitud->user;
            $solicitud->carrera;
            $solicitud->solicitudes_documentos;
        });
        
    }

	public function view(): View
    {
        return view('reportedocumento.excel', [
            'solicitud' => $this->solicitud
        ]);
    }


}
