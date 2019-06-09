<?php

Route::group(['prefix'=>'admin', 'namespace'=>'Admin'], function(){
	Config::set('auth.defines','admin');
	Route::get('login', 'AdminAuth@login');
	Route::post('login', 'AdminAuth@dologin');
	Route::get('forgot/password', 'AdminAuth@forgot_password');
	Route::post('forgot/password', 'AdminAuth@forgot_password_post');
	Route::get('reset/password/{token}', 'AdminAuth@reset_password');
	Route::post('reset/password/{token}', 'AdminAuth@reset_password_final');
	Route::group(['middleware'=>'admin:admin'], function() {

			Route::resource('admin', 'AdminController');
			Route::delete('admin/destroy/all', 'AdminController@multi_delete');

			Route::resource('users', 'UsersController');
			Route::delete('users/destroy/all', 'UsersController@multi_delete');

			Route::resource('comments', 'CommentsController');
			Route::delete('comments/destroy/all', 'CommentsController@multi_delete');

			Route::resource('departments', 'DepartmentsController');

			Route::resource('products', 'ProductsController');
			Route::delete('products/destroy/all', 'ProductsController@multi_delete');

			Route::resource('messages', 'MessagesController');
			Route::delete('messages/destroy/all', 'MessagesController@multi_delete');

			Route::get('/', 'StatisticsController@statistics');
			
			Route::get('/adminss', [
			    'uses' => 'PostController@admin',
			    'as' => 'admin',
			//    'middleware' => 'roles', //CheckRole
			//    'roles' => ['admin']
			]);

			Route::post('/add-role', [
			    'uses' => 'PostController@addRole',
			    'as' => 'role.add',
			    'middleware' => 'roles', //CheckRole
			//    'roles' => ['admin']
			]);

			Route::get('/admin_shop', [
			    'uses' => 'PostController@admin_shop',
			    'as' => 'admin_shop',
			//    'middleware' => 'roles', //CheckRole
			//    'roles' => ['admin', 'admin_shop']
			]);
			// Route::post('upload/image/{pid}', 'ProductsController@upload_file');
			// Route::post('delete/image', 'ProductsController@delete_file');
			// Route::post('update/image/{pid}', 'ProductsController@update_product_image');
			// Route::post('delete/product/image/{pid}', 'ProductsController@delete_main_image');
			// Route::post('load/wight/size', 'ProductsController@prepare_weight_size');

			// Route::get('/', function(){
			// 	return view('admin.home');
			// 		});

			Route::get('settings', 'Settings@setting');
			Route::post('settings', 'Settings@setting_save');

			Route::any('logout', 'AdminAuth@logout');

				});
			Route::get('lang/{lang}', function($lang) {
				session()->has('lang') ? session()->forget('lang') : '';
				$lang == 'ar' ? session()->put('lang', 'ar') : session()->put('lang', 'en');
				return back();
			});

		});		

	