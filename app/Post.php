<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'posts';
    protected $fillable = [
        'title', 'body', 'user_id',
    ];
    
    public function user() {
    	return $this->belongsTo('App\User');
    }

    public function likes() {
    	return $this->belongsTo('App\Like');
    }

}
