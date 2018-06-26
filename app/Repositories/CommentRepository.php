<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/29
 * Time: 上午 10:43
 */

namespace App\Repositories;


use App\Comment;

class CommentRepository
{
    public function create($attributes){
        return Comment::create($attributes);
    }
}