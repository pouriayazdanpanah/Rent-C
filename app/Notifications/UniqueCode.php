<?php

namespace App\Notifications;

use App\Notifications\Channels\GhasedakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UniqueCode extends Notification implements ShouldQueue
{
    use Queueable;

    public $code;
    public $phone;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($code , $phoen)
    {
        $this->code = $code;
        $this->phone = $phoen;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [GhasedakChannel::class];
    }

    public function configuration($notifiable)
    {
        return [
            'text' => "{$this->code} is your verification code "
        ];

    }
}
