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
	//Index Route//
	Route::get('/', 'HomeController@index');

	//Images Routes//
	Route::resource('images', 'ImagesController');
		Route::delete('/images/destroyImage/{id}',[
			'uses' => 'ImagesController@destroyImage',
			'as' => 'admin.image.destroyImage',
		]);
	//Tag Routes//
	Route::resource('tags', 'TagsController');
		Route::get('tags/{id}/destroy',[
			'uses' => 'TagsController@destroy',
			'as'   => 'admin.tags.destroy',
		]);

	//Posts Routes//
	Route::get('posts/all',[
			'uses' => 'PostsController@all',
			'as'   => 'admin.posts.all',
	]);
	Route::resource('posts', 'PostsController');
	Route::get('posts/{id}/destroy',[
		'uses' => 'PostsController@destroy',
		'as'   => 'admin.posts.destroy',
	]);
	Route::get('posts/{id}/approve',[
		'uses' => 'PostsController@approve',
		'as'   => 'admin.posts.approve',
	]);
	Route::get('posts/{id}/suspend',[
		'uses' => 'PostsController@suspend',
		'as'   => 'admin.posts.suspend',
	]);
	//Ebooks Routes//	
	Route::get('ebooks/all',[
			'uses' => 'EbooksController@all',
			'as'   => 'admin.ebooks.all',
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
	//Photos Routes//
	Route::get('photos/all',[
			'uses' => 'PhotosController@all',
			'as'   => 'admin.photos.all',
	]);
	Route::resource('photos', 'PhotosController');
	Route::get('photos/{id}/destroy',[
		'uses' => 'PhotosController@destroy',
		'as'   => 'admin.photos.destroy',
	]);
	Route::get('photos/{id}/approve',[
		'uses' => 'PhotosController@approve',
		'as'   => 'admin.photos.approve',
	]);
	Route::get('photos/{id}/suspend',[
		'uses' => 'PhotosController@suspend',
		'as'   => 'admin.photos.suspend',
	]);
	//Videos Routes//
	Route::get('videos/all',[
		'uses' => 'VideosController@all',
		'as'   => 'admin.videposts.all',
	]);
	Route::resource('videos', 'VideosController');
	Route::get('videos/{id}/destroy',[
		'uses' => 'VideosController@destroy',
		'as'   => 'admin.videos.destroy',
	]);

	Route::get('videos/{id}/approve',[
		'uses' => 'VideosController@approve',
		'as'   => 'admin.videos.approve',
	]);
	Route::get('videos/{id}/suspend',[
		'uses' => 'VideosController@suspend',
		'as'   => 'admin.videos.suspend',
	]);
	
	//Users Routes//
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


