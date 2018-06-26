<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function avatar(){
        return view('users.avatar');
    }
    public function avatarUpload(Request $request){
        $file=$request->file('img');
        $filename=md5(time().user()->id).'.'.$file->getClientOriginalExtension();
        $file->move(public_path('avatars'),$filename);

        user()->avatar='/avatars/'.$filename;
        user()->save();

        return ['url'=>user()->avatar];
    }
    public function getUserInfo($userid){
        $user=User::find($userid);
        return view('users.UserInfo',compact('user'));
    }
}
