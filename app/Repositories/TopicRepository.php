<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/29
 * Time: 上午 11:11
 */

namespace App\Repositories;

use App\Topic;
use Illuminate\Http\Request;

class TopicRepository
{
        public function getTopicsForTagging(Request $request){
            $topics=Topic::select(['id','name'])
                ->where('name','like','%'.$request->query('q').'%')
                ->get();
            return $topics;
        }

        public function byId($topicId){
            return Topic::find($topicId);
        }
}