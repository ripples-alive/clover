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

Route::group(['prefix' => 'user'], function () {
    Route::post('register', 'GuestController@userRegister');
    Route::post('login', 'GuestController@userLogin');
});

Route::controllers([
    'user' => 'UserController',
    'topic' => 'TopicController',
    'comment' => 'CommentController',
]);
