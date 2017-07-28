<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleHttpClient;
use GuzzleHttp\Exception\RequestException;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function passwordHash()
{
      try {
 
           $client = new GuzzleHttpClient();
 
           $apiRequest = $client->request('GET', 'http://legacyapp.com/api/PasswordServiceAPI/hashPassword', [
                'query' => ['plain' => 'Ab1L853Z24N'],
               // 'auth' => ['John', 'password777'],       //If authentication required
               // 'debug' => true                                  //If needed to debug   
          ]);
 
          // echo $apiRequest->getStatusCode());
          // echo $apiRequest->getHeader('content-type'));
 
          $content = json_decode($apiRequest->getBody()->getContents());
 
      } catch (RequestException $re) {
          //For handling exception
      }
 }
}
