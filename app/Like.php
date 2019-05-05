<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
 
    public function product() {
    	return $this->belongsTo(Product::class); // Model
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
