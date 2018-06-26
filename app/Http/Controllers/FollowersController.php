<?php

namespace App\Http\Controllers;

use App\Notifications\NewUserFollowNotification;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class FollowersController extends Controller
{
    protected $user;

    /**
     * FollowersController constructor.
     * @param $user
     */
    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    public function index($id){

        $user=$this->user->byId($id);
        $followers=$user->followersUser()->pluck('follower_id')->toArray();
        if(in_array(Auth::guard('api')->user()->id,$followers)){
            return response()->json(['followed'=>true]);
        }
        else{
            return response()->json(['followed'=>false]);
        }
    }
    public function follow(Request $request){
        $userToFollow=$this->user->byId($request->get('user'));
        $followed=user('api')->followThisUser($userToFollow->id);
        if(count($followed['attached'])>0){
            $userToFollow->notify(new NewUserFollowNotification());
            $userToFollow->increment('followers_count');

            return response()->json(['followed'=>true]);
        }
        else{
            $userToFollow->decrement('followers_count');

            return response()->json(['followed'=>false]);
        }
    }
}
