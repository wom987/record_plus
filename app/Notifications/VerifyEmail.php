<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Lang;
use Illuminate\Auth\Notifications\VerifyEmail as VerifyEmailBase;

class VerifyEmail extends VerifyEmailBase
{
    //    use Queueable;

    // change as you want
    public function toMail($notifiable)
    {
        if (static::$toMailCallback) {
            return call_user_func(static::$toMailCallback, $notifiable);
        }
        return (new MailMessage)
            //header
            ->greeting(Lang::get('Gracias!'))
            //subject
            ->subject(Lang::get('Record+ Correo de confirmación!'))
            //content
            ->line(Lang::get('Gracias por registrarte en Record+'))
            ->line(Lang::get('Por favor verifique su correo electrónico, puede hacerlo al presionar el siguiente botón:'))
            //press button
            ->action(
                Lang::get('Verificar Correo Electrónico'),
                $this->verificationUrl($notifiable)
            )
            //footer
            ->line(Lang::get('Si usted no ha solicitado crear la cuenta, puede omitir este correo.'));
    }
}
