<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    //
    protected $table = 'departments';
    protected $fillable = [
        'name',
		'parent',
    ];

    public function parents() {
    	return $this->hasMany('App\Departments', 'id', 'parent');
    }

    // public function product() {
    // 	return $this->hasMany('App\Model\Product');
    // }

    public function product() {
        // return $this->hasMany(User::class);
        return $this->hasMany('App\Model\Product', 'category_id', 'id');
    }
}
