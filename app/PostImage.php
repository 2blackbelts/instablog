<?php

namespace instablog;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = "post_images";

    public function post() {
    	return $this->belongsTo('instablog\Post', 'post_id');
    }
}
