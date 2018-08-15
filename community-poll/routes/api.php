<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//list all data
Route::get('polls', 'PollsController@index');
//list a single data
Route::get('polls/{id}', 'PollsController@show');
//save data
Route::post('polls', 'PollsController@store');
//update data
Route::put('polls/{poll}', 'PollsController@update');
//delete data
Route::delete('polls/{poll}', 'PollsController@delete');

Route::any('errors', 'PollsController@errors');

//this create resources for all verbs
Route::apiResource('questions', 'QuestionsController');

//managing subresources
Route::get('polls/{poll}/questions', 'PollsController@questions');

