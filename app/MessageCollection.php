<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/29
 * Time: 下午 04:40
 */

namespace App;


use Illuminate\Database\Eloquent\Collection;

class MessageCollection extends Collection
{
        public function markAsRead(){
            $this->each(function($message){
                if($message->to_user_id==user()->id){
                    $message->markAsRead();
                }
            });
        }
}