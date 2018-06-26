<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable=['name','questions_count','bio'];
    protected $table='topics';

    public function questions(){
        return $this->belongsToMany(Question::class)->withTimestamps();
    }
}
