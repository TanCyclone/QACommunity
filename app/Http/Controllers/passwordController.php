<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdatePasswordRequest;
use Illuminate\Support\Facades\Hash;


class passwordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('users.password');
    }
    public function update(UpdatePasswordRequest $request){
        if(Hash::check($request->get('old_password'),user()->password)){
            user()->password=bcrypt($request->get('password'));
            user()->save();
            flash('修改密码成功','success');
            return back();
        }
        flash('修改失败','danger');
        return back();
    }
}
