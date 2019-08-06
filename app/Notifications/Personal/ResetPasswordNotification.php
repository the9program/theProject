<?php

namespace App\Notifications\Personal;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ResetPasswordNotification extends Notification
{
    use Queueable;
    /**
     * @var string $token
     */
    private $token;


    public function __construct(string $token)
    {

        $this->token = $token;

    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("Récuperation du Mot de passe")
            ->greeting("Bonjour")
            ->line("Suite a votre demande de reinitialisation du mot de passe de votre compte " . env('APP_NAME'))
            ->action("Modifié mon mot de passe", route('password.reset',['token' => $this->token]))
            ->line("Ce message vous a été envoyer suite a une tentative de Récuperation du Mot de passe!")
            ->salutation("Cordialement")
            ->salutation(env('APP_NAME'));
    }
}
