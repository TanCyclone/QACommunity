<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAnswerRequest;
use App\Http\Requests\StoreQuestionRequest;
use App\Repositories\AnswerRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnswersController extends Controller
{
    protected $answer;

    /**
     * AnswersController constructor.
     * @param $answer
     */
    public function __construct(AnswerRepository $answer)
    {
        $this->answer = $answer;
    }

    public function store(StoreAnswerRequest $request,$question){
        $answer=$this->answer->create([
            'question_id'=>$question,
            'user_id'=>Auth::id(),
            'body'=>$request->get('body')
        ]);
        $answer->question()->increment('answers_count');
        user()->increment('answers_count');
        return back();
    }

    public function showUserAnswer($userId){
        $answers=$this->answer->byUserId($userId);
        return view('answer.showUsers',compact('answers'));
    }
}
