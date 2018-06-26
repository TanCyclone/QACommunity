<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/02
 * Time: 下午 04:31
 */

namespace App\Repositories;

use App\Question;
use App\Topic;

/**
 * Class QuestionRepository
 * @package App\Repositories
 */
class QuestionRepository
{
    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function byIdWithTopicsAndAnswers($id){
        return Question::where('id',$id)->with(['topics','answers'])->first();
    }

    public function byUserId($userId){
        return Question::where('user_id',$userId)->latest()->get();
    }

    public function create(array $attributes){
        return Question::create($attributes);
    }

    public function normalizeTopic(array $topics){
        return collect($topics)->map(function ($topic){
            if(is_numeric($topic)){
                Topic::find($topic)->increment('questions_count');
                return (int)$topic;
            }
            $newTopic=Topic::create(['name'=>$topic,'questions_count'=>1]);
            return $newTopic->id;
        })->toArray();
    }

    public function byId($id){
        return Question::find($id);
    }

    public function getQuestionsFeed(){
        return Question::published()->latest('updated_at')->with('user')->get();
    }

    public function getQuestionCommentsById($id){
        $question=Question::with('comments','comments.user')->where('id',$id)->first();

        return $question->comments;
    }
}