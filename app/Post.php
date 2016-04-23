<?php

namespace instablog;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';

    public function author() {

    	return $this->belongsTo('instablog\User');

    }
}
