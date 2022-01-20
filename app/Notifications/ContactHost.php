<?php

namespace App\Notifications;

use App\Notifications\Channels\GhasedakChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactHost extends Notification implements ShouldQueue
{
    use Queueable;

    public $sender_name = null;
    public $user = null;
    public $phone = null;
    public $from_phone = null;
    public $message = null;
    public $company_name = null;

    /**
     * ContactHost constructor.
     * @param $message
     * @param $SenderName
     * @param $formPhone
     * @param $user
     * @param $phone
     */
    public function __construct($message,$SenderName,$formPhone,$user,$phone)
    {
        $this->message = $message;
        $this->sender_name = $SenderName;
        $this->from_phone = $formPhone;
        $this->phone = $phone;
        $this->user = $user;
        $this->company_name = env('APP_NAME');
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
        return[
            'text' =>
                "Hi {$this->user} Dear \n you have a message from {$this->company_name} by {$this->sender_name} for your home : {$this->message}\n Customer phone : {$this->from_phone}"
        ];
    }
}
