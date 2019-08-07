<?php

namespace App\Notifications\Presence;

use App\Doctor;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ActivateNotification extends Notification
{
    use Queueable;

    private $token;

    private $doctor;

    public function __construct(string $token, Doctor $doctor)
    {

        $this->token = $token;

        $this->doctor = $doctor;

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
            ->action("Inscription", route('presence.registerForm',[
                'token'     => $this->token,
                'doctor'    => $this->doctor
            ]))
            ->line("Ce message vous a été envoyer suite a l'indiccation de votre adresse email de l'un de nos modérateurs")
            ->salutation("Cordialement")
            ->salutation(env('APP_NAME'));

    }
}
