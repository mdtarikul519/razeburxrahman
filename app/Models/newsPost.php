<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class newsPost extends Model
{
    public function comment(){
        return $this->hasMany('App\comment','post_id','id');
    }

    public function news_post_count(){
          return $this->hasMany(NewsPostCount::class, 'blog_id');
    }
}
