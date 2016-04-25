<?php

namespace instablog;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Post extends Model
{
    protected $table = 'posts';

    public function author() {

    	return $this->belongsTo('instablog\User');

    }

    public function ownedByAuth() {

    	if($this->author->id == Auth::id()) {

    		return true;

    	} else {

    		return false;

    	}
    }
}
