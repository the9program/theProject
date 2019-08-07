<?php

namespace App\Notifications\Personal;

use App\Token;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TokenNotification extends Notification
{
    use Queueable;

    private $token;

    public function __construct(Token  $token)
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
            ->subject("Invitation d'inscription")
            ->greeting("Bonjour")
            ->line("vous être invité a s'inscrire")
            ->action("Inscription", route('token.edit',['token' => $this->token->id]))
            ->line("Ce message vous a été envoyer suite a l'indication de votre adresse de l'un de nos modérateurs")
            ->salutation("Cordialement")
            ->salutation(env('APP_NAME'));

    }

}
