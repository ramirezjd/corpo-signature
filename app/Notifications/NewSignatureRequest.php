<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewSignatureRequest extends Notification
{
    use Queueable;
    public $user;
    public $document;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($user, $document)
    {
        $this->user = $user;
        $this->document = $document;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'primer_nombre_usuario' => $this->user->primer_nombre_usuario,
            'segundo_nombre_usuario' => $this->user->segundo_nombre_usuario,
            'primer_apellido_usuario' => $this->user->primer_apellido_usuario,
            'segundo_apellido_usuario' => $this->user->segundo_apellido_usuario,
            'email' => $this->user->email,
            'departamento' => $this->user->departamento->nombre_departamento,
            'descripcion_documento' => $this->document->descripcion_documento,
            'documento_id' => $this->document->id,
        ];
    }
}
