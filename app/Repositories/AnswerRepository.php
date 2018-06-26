<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/26
 * Time: 上午 11:43
 */

namespace App\Repositories;

use App\Answer;


class AnswerRepository
{
        public function create(array $attributes){
            return Answer::create($attributes);
        }
        public function byId($id){
            return Answer::find($id);
        }
        public function getAnswerCommentsById($id){
            $answer=Answer::with('comments','comments.user')->where('id',$id)->first();

            return $answer->comments;
        }

        public function byUserId($userId){
            $answers=Answer::where('user_id',$userId)->get();
            return $answers;
        }
}