<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;
use App\Solicitud;

class EmailSolicitud extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $documentos;
    public $user;
    public $solicitudes;
    public $uuid;

    public function __construct(Request $request)
    {
        // Recupera los documentos y el id del usuario
        $this->documentos = $request;
        $this->user = $request->user;
        // Obtiene todas las solicitudes del usuario
        $this->solicitudes = Solicitud::all()->where("users_id",$this->user);
        // obtiene la ultima solicitud del usuario
        $this->uuid = $this->solicitudes->last();
       
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('gestionaducla@gmail.com')
                    ->markdown('solicitud.email.email');
    }
}
