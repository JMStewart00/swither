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

Route::resource('/index', 'YelpController');
Route::resource('/likes', 'LikesController');
Route::post('/likesbygroup', 'LikesController@getLikes');
Route::resource('/matches', 'MatchController');
Route::post('/matches', 'MatchController@getMatches');
Route::resource('/groups', 'GroupController');
Route::resource('/usergroups', 'UsersGroupsController');
Route::post('/joingroup', 'UsersGroupsController@joinGroup');
Route::get('/findgroups/{id}', 'GroupController@showGroups');
Route::get('/user/{id}', 'UsersController@show');


Route::get('/user/{user}', function (App\user $user) {
    return $user->email;
});