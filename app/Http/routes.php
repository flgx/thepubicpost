<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['prefix' => 'admin','middleware'=>'auth'], function () {

	Route::get('/', 'HomeController@index');
	Route::resource('images', 'ImagesController');
		Route::get('images/{id}/destroy',[
			'uses' => 'ImagesController@destroy',
			'as'   => 'admin.images.destroy',
		]);
	Route::resource('tags', 'TagsController');
		Route::get('tags/{id}/destroy',[
			'uses' => 'TagsController@destroy',
			'as'   => 'admin.tags.destroy',
		]);
	Route::resource('posts', 'PostsController');
		Route::get('posts/{id}/destroy',[
			'uses' => 'PostsController@destroy',
			'as'   => 'admin.posts.destroy',
		]);
	Route::resource('ebooks', 'EbooksController');
		Route::get('ebooks/{id}/destroy',[
			'uses' => 'EbooksController@destroy',
			'as'   => 'admin.ebooks.destroy',
		]);
		Route::get('ebooks/{id}/approve',[
			'uses' => 'EbooksController@approve',
			'as'   => 'admin.ebooks.approve',
		]);
		Route::get('ebooks/{id}/suspend',[
			'uses' => 'EbooksController@suspend',
			'as'   => 'admin.ebooks.suspend',
		]);
	Route::resource('photoposts', 'PhotoPostsController');
		Route::get('photoposts/{id}/destroy',[
			'uses' => 'PhotoPostsController@destroy',
			'as'   => 'admin.photoposts.destroy',
		]);
		Route::get('photoposts/{id}/approve',[
			'uses' => 'PhotoPostsController@approve',
			'as'   => 'admin.photoposts.approve',
		]);
		Route::get('photoposts/{id}/suspend',[
			'uses' => 'PhotoPostsController@suspend',
			'as'   => 'admin.photoposts.suspend',
		]);
	Route::resource('videoposts', 'VideoPostsController');
		Route::get('videoposts/{id}/destroy',[
			'uses' => 'VideoPostsController@destroy',
			'as'   => 'admin.videoposts.destroy',
		]);

		Route::get('videoposts/{id}/approve',[
			'uses' => 'VideoPostsController@approve',
			'as'   => 'admin.videoposts.approve',
		]);
		Route::get('videoposts/{id}/suspend',[
			'uses' => 'VideoPostsController@suspend',
			'as'   => 'admin.videoposts.suspend',
		]);
	Route::resource('users', 'UsersController');
		Route::get('users/{id}/destroy',[
			'uses' => 'UsersController@destroy',
			'as'   => 'admin.users.destroy',
		]);

	Route::resource('categories', 'CategoriesController');
		Route::get('categories/{id}/destroy',[
			'uses' => 'CategoriesController@destroy',
			'as'   => 'admin.categories.destroy',
		]);
	Route::resource('tags', 'TagsController');
		Route::get('tags/{id}/destroy',[
			'uses' => 'TagsController@destroy',
			'as'   => 'admin.tags.destroy',
		]);
});
Route::get('auth/facebook', 'SocialAuth2Controller@redirectToProvider');
Route::get('auth/facebook/callback', 'SocialAuth2Controller@handleProviderCallback');
Route::get('/', function () {
	    return view('front.welcome');
});
Route::auth();


