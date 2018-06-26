<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/28
 * Time: 下午 09:30
 */

namespace App\Mailer;


use App\User;
use Illuminate\Support\Facades\Auth;

class UserMailer extends Mailer
{
    public function followNotifyEmail($email){
        $data=['url'=>'http://localhost:8000','name'=>Auth::guard('api')->user()->name];
        $this->sendTo('zhihu_app_new_user_follow',$email,$data);
    }
    public function passwordReset($email,$token){
        $data=['url'=>url('password/reset',$token)];
        $this->sendTo('zhihu_app_password_reset',$email,$data);
    }
    public function welcome(User $user){
        $data=[
            'url'=>route('email.verify',['token'=>$user->confirmation_token]),
            'name'=>$user->name
        ];

        $this->sendTo('zhihu_app_register',$user->email,$data);
    }
}