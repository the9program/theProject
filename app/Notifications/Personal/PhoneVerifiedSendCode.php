<?php

namespace App\Notifications\Personal;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PhoneVerifiedSendCode extends Notification
{

    use Queueable;

    private $code;

    public function __construct(string $code)
    {

        $this->code = $code;

    }


    public function via($notifiable)
    {
        return ['nexmo'];
    }


    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
            ->content('Your Code is ' . $this->code)
            ->unicode();
    }
}
