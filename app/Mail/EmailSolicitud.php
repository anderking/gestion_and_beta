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

    public $last_solicitud;

    public function __construct($id)
    {
        $last_solicitud = Solicitud::findOrFail($id);
        $this->last_solicitud = $last_solicitud;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('anderson.inversiones.2017@gmail.com','UCLA')
                    ->subject('Solicitud de documentos UCLA')
                    ->markdown('solicitud.email.send');
    }
}
