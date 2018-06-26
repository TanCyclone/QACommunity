<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/28
 * Time: 下午 08:30
 */

namespace App\Channels;


use Illuminate\Notifications\Notification;

class SendcloudChannel
{
    public function send($notifiable,Notification $notification){
        $message=$notification->toSendcloud($notifiable);
    }
}