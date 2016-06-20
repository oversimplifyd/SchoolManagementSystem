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

//Route::get('home', 'HomeController@index');

/*Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);*/

Route::get('/', 'HomeController@index');

Route::group(array('prefix'=>'page'), function() {

    Route::get('/image-gallery', 'PageController@gallery');
    Route::get('/news', 'PageController@news');
    Route::get('/show-news/{id}', 'PageController@showNews');
    Route::get('/about', 'PageController@about');
    Route::get('/contact', 'PageController@contact');
    Route::post('/email', 'PageController@email');

});

Route::controller('admin', 'AdminController');

Route::controller("teacher", 'TeacherController');

Route::controller("student", 'StudentController', [
    'getProfile' => 'profile'
]);

Route::controller("guardian", 'GuardianController');

Route::group(array('middleware'=>'admin_auth'), function() {

    Route::get('news/all', 'NewsController@all');
    Route::post('news/filtered', 'NewsController@filtered');
    Route::post('news/publish', 'NewsController@publish');

    Route::get('students/all', 'StudentAccountController@all');
    Route::post('students/filtered', 'StudentAccountController@filtered');

    Route::get('teachers/all', 'TeacherAccountController@all');
    Route::post('teachers/filtered', 'TeacherAccountController@filtered');

    Route::get('photo/all', 'GalleryController@all');
    Route::post('photo/filtered', 'GalleryController@filtered');

    Route::get('subjects/all', 'SubjectController@all');
    Route::post('subjects/filtered', 'SubjectController@filtered');

    Route::resource('news', 'NewsController');
    Route::resource('students', 'StudentAccountController');
    Route::resource('teachers', 'TeacherAccountController');
    Route::resource('subjects', 'SubjectController');
    Route::resource('photo', 'GalleryController');

    Route::controller('session', 'SessionController');

});

Route::get('/forum/login', ['as' => 'forum_login', 'uses' => 'ForumController@getLogin']);
Route::get('/forum/logout', ['as' => 'forum_logout', 'uses' => 'ForumController@getLogout']);
Route::post('/forum/post_login', ['as' => 'post_forum_login', 'uses' => 'ForumController@postLogin']);