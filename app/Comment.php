<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class comment extends Model
{
    protected $fillable = [
        'id', 'post_id', 'body',
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

}
