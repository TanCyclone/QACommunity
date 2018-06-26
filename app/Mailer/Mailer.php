<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/28
 * Time: 下午 09:26
 */

namespace App\Mailer;


use Naux\Mail\SendCloudTemplate;
use Illuminate\Support\Facades\Mail;

class Mailer
{
        protected function sendTo($template,$email,array $data){
            $content=new SendCloudTemplate($template,$data);

            Mail::raw($content,function ($message) use ($email){
                $message->from('578530951@qq.com','Cyclone_test_1FPcTG');
                $message->to($email);
            });
        }
}