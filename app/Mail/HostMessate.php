<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class HostMessate extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $userName = null;
    public $hostName = null;
    public $email = null;
    public $phone = null;
    public $message = null;

    /**
     * HostMessate constructor.
     * @param $userName
     * @param $hostName
     * @param $email
     * @param $phone
     * @param $message
     */
    public function __construct($userName ,$hostName, $email , $phone , $message)
    {
        $this->userName = $userName;
        $this->hostName = $hostName;
        $this->email = $email;
        $this->phone = $phone;
        $this->message = $message;
    }

    /**
     * @return mixed
     */
    public function build()
    {
        return $this->from($this->email)
            ->markdown('emails.host.message');
    }
}
