<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailSolicitudPrograma extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $solicitud_programa;

    public function __construct($solicitud_programa)
    {
        $this->solicitud_programa = $solicitud_programa;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('anderson.inversiones.2017@gmail.com','UCLA')
                    ->subject('Solicitud de programas UCLA')
                    ->markdown('programa.email.send');
    }
}
