<?php
namespace App\Notifications\Channels;

use Illuminate\Notifications\Notification;

class GhasedakChannel
{
    public function send($notifiable ,Notification $notification)
    {

        $message = $notification->configuration($notifiable)['text'];
        $receptor = $notification->phone;

        $apiKey = config('services.ghasedak.api_key');

        try
        {
            $lineNumber = "10008566";
            $api = new \Ghasedak\GhasedakApi($apiKey);
            $api->SendSimple($receptor,$message,$lineNumber);
        }
        catch(\Ghasedak\Exceptions\ApiException $e){
            Throw $e;
        }
        catch(\Ghasedak\Exceptions\HttpException $e){
            Throw $e;
        }
    }
}
