<?php

namespace App\Http\Controllers;

use App\Repositories\AnswerRepository;
use App\Repositories\CommentRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class CommentsController
 * @package App\Http\Controllers
 */
class CommentsController extends Controller
{
    /**
     * @var AnswerRepository
     */
    /**
     * @var AnswerRepository|QuestionRepository
     */
    /**
     * @var AnswerRepository|CommentRepository|QuestionRepository
     */
    protected $answer,$question,$comment;

    /**
     * CommentsController constructor.
     * @param $answer
     * @param $question
     * @param $comment
     */
    public function __construct(AnswerRepository $answer,QuestionRepository $question,CommentRepository $comment)
    {
        $this->answer = $answer;
        $this->question = $question;
        $this->comment = $comment;
    }


    /**
     * @param $id
     * @return mixed
     */
    public function answer($id){
        return $this->answer->getAnswerCommentsById($id);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function question($id){
        return $this->question->getQuestionCommentsById($id);
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function store(Request $request){
        $model=$this->getModelNameFromType($request->get('type'));
        $comment=$this->comment->create([
            'commentable_id'=>$request->get('model'),
            'commentable_type'=>$model,
            'user_id'=>user('api')->id,
            'body'=>$request->get('body')
        ]);

        return $comment;
    }

    /**
     * @param $type
     * @return string
     */
    private function getModelNameFromType($type){
        return $type==='question'?'App\Question':'App\Answer';
    }
}
