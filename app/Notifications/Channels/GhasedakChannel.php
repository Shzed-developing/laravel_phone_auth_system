<?php

namespace App\Notifications\Channels;

use Ghasedak\Exceptions\ApiException;
use Ghasedak\Exceptions\HttpException;
use Illuminate\Notifications\Notification;

class GhasedakChannel
{
    public function send($notifiable, Notification $notification)
    {
        if (! method_exists($notification, 'toGhasedakSms')) {
            throw new \Exception('toGhasedakSms Not found');
        }

        $data = $notification->toGhasedakSms($notifiable);
        $message = $data['text'];
        $receptor = $data['number'];

        $apikey = config('services.ghasedak.key');
        try
        {
            $lineNumber = "10008566";
            $api = new \Ghasedak\GhasedakApi($apikey);
            $api->SendSimple($receptor,$message,$lineNumber);
        }
        catch(ApiException $e){
            echo $e->errorMessage();
        }
        catch(HttpException $e){
            echo $e->errorMessage();
        }

    }
}
