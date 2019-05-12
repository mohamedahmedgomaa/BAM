<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static withCount(array $array)
 * @method static where(string $string, string $string1, string $string2)
 */
class Product extends Model
{
    
	protected $table = 'products';
    protected $fillable = [
		'title',
		'photo',
		'content',
		'price',
		'color',
		'size',
		'weight',
        'category_id',
    ];

    public function comments() {
    	return $this->hasMany('App\Model\Comment', 'product_id', 'id')->orderBy('created_at');
    }

    public function user() {
    	return $this->belongsTo(User::class, 'user_id');
    }

    public function likes() {
    	// return $this->hasMany(User::class);
    	return $this->hasMany('App\Like', 'product_id', 'id');
    }
    
    public function category() {
        return $this->belongsTo('App\Departments', 'category_id');
    }
}
