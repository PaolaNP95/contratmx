<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\User;
class NewUser extends Notification
{
    use Queueable;
    public $fromUser;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->fromUser = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $subject = sprintf('Tienes un nuevo mensaje de CONTRATMX!', config('app.name'), $this->fromUser->name);
        $greeting = sprintf('Bienvenido %s!', $notifiable->name);
 
        return (new MailMessage)
                    ->subject($subject)
                    ->greeting($greeting)
                    ->salutation('Estamos a tus servicios.')
                    ->line('Has sido dado de alta en nuestra plataforma.')
                    ->line('Ingresa con tu correo electrónico. La contraseña por default es: Pass123$.')
                    ->line('Una vez dentro del sistema, te recomendamos cambiarla en la sección de configuración.')
                    ->action('Acceder al sistema', url('/login'));
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
        ];
    }
}
