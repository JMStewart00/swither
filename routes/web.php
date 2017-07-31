<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/index', 'YelpController@index');

Route::get('/callback', function (Illuminate\Http\Request $request) {
    $http = new GuzzleHttp\Client;

	$response = $http->post('http://localhost:7000/oauth/token', [
	    'form_params' => [
	        'grant_type' => 'password',
	        'client_id' => '1',
	        'client_secret' => 'VWaDOa2bPQH1iiYyMfFER6wFAAWjNyBAGfSE1uK6',
	        'username' => 'josh@example.com',
	        'password' => 'justlax1',
	        'scope' => '',
	    ],
	]);

return json_decode((string) $response->getBody(), true);
});