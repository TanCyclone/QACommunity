<?php

namespace App\Http\Controllers;

use App\Repositories\MessageRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    protected $message;

    /**
     * MessageController constructor.
     * @param $message
     */
    public function __construct(MessageRepository $message)
    {
        $this->message = $message;
    }

    public function store(Request $request){
        $message=$this->message->create([
            'to_user_id'=>$request->get('user'),
            'from_user_id'=>user('api')->id,
            'body'=>$request->get('body'),
            'dialog_id'=>time().Auth::id()
        ]);
        if($message){
            return response()->json(['status'=>true]);
        }
        else{
            return response()->json(['status'=>false]);
        }
    }
}
