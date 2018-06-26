<?php

namespace App;


class Setting
{
    protected $user;
    protected $allowed=['city','bio'];

    /**
     * Setting constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function merge(array $attributes){
            $settings=array_merge($this->user->settings,array_only($attributes,$this->allowed));
            return $this->user->update(['settings'=>$settings]);
        }
}