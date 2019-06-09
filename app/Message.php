<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

	protected $table = 'messages';
    protected $fillable = [
    	'from',
		'to',
		'text',
    ];

    public function reciever() {
    	return $this->belongsTo(App\User::class,'to');
    }
    public function sender() {
    	return $this->belongsTo(App\User::class,'from');
    }
}
