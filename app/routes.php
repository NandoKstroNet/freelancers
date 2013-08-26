<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route main (Index)
Route::any('/', array("as" => "home", "uses" => "UserController@viewAll"));

//Routes to Registration views
Route::get('user/add', array("as" => "add", "uses" => "UserController@getAdd"));
Route::post('user/add', "UserController@postAdd");

//Route to list perfil
Route::get('perfil/{user_id?}', array("as" => "perfil", "uses" => "UserController@listPeril"));