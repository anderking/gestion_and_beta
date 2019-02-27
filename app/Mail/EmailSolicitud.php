<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Solicitud;

class EmailSolicitud extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $solicitud;
    public $documentos;

    public function __construct($id)
    {
        $solicitud = Solicitud::findOrFail($id);
        $solicitud->solicitudes_documentos;
        $this->documentos = $solicitud->solicitudes_documentos;
        $this->solicitud = $solicitud;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('anderson.inversiones.2017@gmail.com','UCLA')
                    ->to('anderson.inversiones.2017@gmail.com')->subject('Solicitud de documentos UCLA')
                    ->markdown('solicitud.email.email');
    }
}
