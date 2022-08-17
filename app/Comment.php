<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    
    protected $fillable = ['content', 'users_id', 'posts_id'];
 
    public function post()
    {
      return $this->belongsTo('App\Post', 'posts_id');
    }
   
    public function user()
    {
      return $this->belongsTo('App\User', 'users_id');
    }


}
