<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
    //
    protected $table = 'comments';
    protected $fillable = [
    	'comment',
		'product_id',
		'user_id',
    ];
    public function product_id() {
    	return $this->hasOne('App\Model\Product', 'id', 'product_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
