<?php

namespace instablog;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts() {

        return $this->hasMany('instablog\Post', 'author_id');
    }

    public function roles() {

        return $this->belongsToMany('instablog\Role');
        
    }

    public function hasRole($key) {
        
        foreach($this->roles as $role)
        {
            if($role->name == $key) {

                return true;

            } else {

                return false;

            }
        }

    }
}
