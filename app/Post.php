<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
   protected $fillable = [
     'title', 'slug', 'text', 'user_id'
   ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

   public function comments()
   {
       return $this->hasMany(Comment::class);
   }
}
