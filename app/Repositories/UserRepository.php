<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/28
 * Time: 下午 07:34
 */

namespace App\Repositories;


use App\User;

class UserRepository
{
    public function byId($id){
        return User::find($id);
    }
}