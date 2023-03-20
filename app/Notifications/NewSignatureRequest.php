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
            'nombres_usuario'  => $this->user->nombres_usuario,
            'apellidos_usuario' => $this->user->apellidos_usuario,
            'email' => $this->user->email,
            'departamento' => $this->user->departamento->nombre_departamento,
            'descripcion_documento' => $this->document->descripcion_documento,
        ];
    }
}
