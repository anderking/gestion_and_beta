<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSolicitudServicio extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $solicitud_servicio;

    public function __construct($solicitud_servicio)
    {
        $this->solicitud_servicio = $solicitud_servicio;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('anderson.inversiones.2017@gmail.com','UCLA')
                    ->subject('Solicitud de servicios UCLA')
                    ->markdown('solicitudservicio.email.send');
    }
}
