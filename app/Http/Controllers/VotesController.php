<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VotesController extends Controller
{
    protected $answer;

    /**
     * VotesController constructor.
     * @param $answer
     */
    public function __construct(AnswerRepository $answer)
    {
        $this->answer = $answer;
    }

    public function users($id){
        $user=user('api');
        if($user->hadVotedFor($id)){
            return response()->json(['voted'=>true]);
        }
        else{
            return response()->json(['voted'=>false]);
        }
    }
    public function vote(Request $request){
        $answer=$this->answer->byId($request->get('answer'));
        $voted=user('api')->voteFor($request->get('answer'));
        if(count($voted['attached'])>0){
            $answer->increment('votes_count');

            return response()->json(['voted'=>true]);
        }
        else{
            $answer->decrement('votes_count');

            return response()->json(['voted'=>false]);
        }
    }
}
