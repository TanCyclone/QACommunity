<?php
/**
 * Created by PhpStorm.
 * User: 57853
 * Date: 2018/04/29
 * Time: 上午 12:03
 */

namespace App\Repositories;

use App\Message;

/**
 * Class MessageRepository
 * @package App\Repositories
 */
class MessageRepository
{
    /**
     * @param array $attributes
     * @return $this|\Illuminate\Database\Eloquent\Model
     */
    public function create(array $attributes){
            return Message::create($attributes);
        }

    /**
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function getAllMessages(){
            return Message::where('to_user_id',user()->id)
                ->orWhere('from_user_id',user()->id)
                ->with(['fromUser'=>function($query){
                    return $query->select(['id','name','avatar']);
                },'toUser'=>function($query){
                    return $query->select(['id','name','avatar']);
                }])->latest()->get();
        }

    /**
     * @param $dialogId
     * @return \Illuminate\Database\Eloquent\Collection|\Illuminate\Support\Collection|static[]
     */
    public function getDialogMessagesByDialogId($dialogId){
            return Message::where('dialog_id',$dialogId)
                ->with(['fromUser'=>function($query){
                    return $query->select(['id','name','avatar']);
                },'toUser'=>function($query){
                    return $query->select(['id','name','avatar']);
                }])->latest()->get();
        }

    /**
     * @param $dialogId
     * @return \Illuminate\Database\Eloquent\Model|null|static
     */
    public function getSingleMessageByDialogId($dialogId){
            return Message::where('dialog_id',$dialogId)->first();
        }
}