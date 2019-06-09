<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

	protected $table = 'orders';
    protected $fillable = [
    	'name',
		'address',
		'user_id',
		'total',
		'totalqty',
		'items',
    ];

    public function user() {
    	return $this->belongsTo('App\User');
    }
}
