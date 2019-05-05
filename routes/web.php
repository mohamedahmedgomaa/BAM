<?php

// Route::get('/home', function () {
//     return view('style.home');
// });
use App\Model\Product;

Auth::routes();

	// Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware'=>'user:web'], function() {

	Route::get('/profile/{id}', 'UserController@profile')->name('profile');
	Route::post('/profile/{id}', 'UserController@update_avatar')->name('update_avatar');
	Route::get('/profile/edit/{id}', 'UserController@edit');
	Route::post('/profile/update/{id}', 'UserController@update');

	Route::get('/logout', 'HomeController@destroy');

	Route::get('/homepage', 'PostController@products')->name('homepage');
	Route::post('/homepage/store', 'PostController@store');
	Route::post('/homepage/{product}/store', 'CommentController@store');


	////////// Like & Dislike //////////////////

	Route::post('/like', 'PostController@like')->name('like');
	Route::post('/dislike', 'PostController@dislike')->name('dislike');

	////////// Like& Dislike //////////////////

	Route::get('/checkout', 'PostController@getCheckout')->name('checkout');
	Route::post('/checkout', 'PostController@postCheckout')->name('checkout');

	//////////////////// Roles Admin Shop ////////////////////////

	Route::group(['middleware'=>'roles', 'roles' => ['admin_shop']], function(){
			
				////////// Categories //////////////////
		
			Route::get('/categories', 'CatrgoriesController@index')->name('categories');
			Route::get('/category/create', 'CatrgoriesController@create')->name('category.create');
			Route::post('/category/store', 'CatrgoriesController@store')->name('category.store');
			/*Route::get('/category/edit/{id}', 'CatrgoriesController@edit')->name('category.edit');
			Route::post('/category/update/{id}', 'CatrgoriesController@update')->name('category.update');
			Route::get('/category/delete/{id}', 'CatrgoriesController@destroy')->name('category.delete');
*/
			Route::get('/homepage/delete/{id}', 'PostController@delete');
			Route::get('/homepage/edit/{id}', 'PostController@edit');
			Route::post('/homepage/update/{id}', 'PostController@update');
		});
	//////////////////// Roles Admin Shop ////////////////////////

});

Route::group(['middleware' => 'Maintenance'], function () {

	    Route::get('/', function () {
	        return view('/index');
	    });
});

Route::get('maintenance', function () {

    if (setting()->status == 'open') {
        return redirect('/');
    }
    return view('style.maintenance');
});


Route::get('/statistics', 'PostController@statistics');

Route::get('/', 'siteUIcontroller@index')->name('index');
Route::get('/homepage/{product}', 'PostController@product');


Route::get('/category/{id}', 'siteUIcontroller@showCategory')->name('category.show');




Route::get('/add-to-cart/{id}', 'PostController@getAddToCart')->name('product.addToCart');
Route::get('/shopping-cart', 'PostController@getCart')->name('product.shoppingCart');

Route::get('/likedProduct', 'UserController@likedProduct')->name('product.likedProduct');


Route::get('/reduce/{id}', 'PostController@getReduceByOne')->name('product.reduceByOne');
Route::get('/remove/{id}', 'PostController@getRemoveItem')->name('product.remove');


///////////////////// Search /////////////////////

// Route::get('/results', 'PostController@getRemoveItem')->name('product.remove');
Route::get('/results', function () {
	$product = App\Model\Product::where('title', 'like', '%' . request('search') . '%')->get();
	return view('results')->with('products', $product)
					->with('title', 'Result : ' . request('search'))
					->with('categories', App\Departments::all()->take(5))
					->with('query', request('search'))
        ->with('footerTopProduct', App\Model\Product::withCount(['likes', 'comments'])->orderBy('likes_count', 'desc')->orderBy('comments_count', 'desc')->limit(5)->get());
});

///////////////////// Search /////////////////////























