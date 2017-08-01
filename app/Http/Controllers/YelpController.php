<?php

namespace App\Http\Controllers;

use App\Yelp;
use Illuminate\Http\Request;

class YelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function searchParams(Request $request)
    {
        return $paramaters;
    }


    public function index(Request $request)
    {
        // dd($request);
        $parameters = $request->all();

        // $parameters = [
        // 'term' => $request->place,
        // 'location' => $request->location,
        // ];


        $provider = new \Stevenmaguire\OAuth2\Client\Provider\Yelp([
            'clientId'          => '_D0fpoWGQt3_-FGYLWuntg',
            'clientSecret'      => 'ncas4YPJ5zWCEv9PosBkHPRn5X66qfA45dYbKYF2gpqaO3X3gCKTOd3RIViqvXQq'
        ]);

        $accessToken = (string) $provider->getAccessToken('client_credentials');

        // Provide the access token to the yelp-php client
        $client = new \Stevenmaguire\Yelp\v3\Client(array(
            'accessToken' => $accessToken,
            'apiHost' => 'api.yelp.com' // Optional, default 'api.yelp.com'
        ));


        $results = $client->getBusinessesSearchResults($parameters);
        $data = $results->businesses;
        return $data;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $parameters = $request->all();
        // return $parameters;


        $provider = new \Stevenmaguire\OAuth2\Client\Provider\Yelp([
            'clientId'          => '_D0fpoWGQt3_-FGYLWuntg',
            'clientSecret'      => 'ncas4YPJ5zWCEv9PosBkHPRn5X66qfA45dYbKYF2gpqaO3X3gCKTOd3RIViqvXQq'
        ]);

        $accessToken = (string) $provider->getAccessToken('client_credentials');

        // Provide the access token to the yelp-php client
        $client = new \Stevenmaguire\Yelp\v3\Client(array(
            'accessToken' => $accessToken,
            'apiHost' => 'api.yelp.com' // Optional, default 'api.yelp.com'
        ));


        $results = $client->getBusinessesSearchResults($parameters);
        $data = $results->businesses;
        return $data;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Yelp  $yelp
     * @return \Illuminate\Http\Response
     */
    public function show(Yelp $yelp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Yelp  $yelp
     * @return \Illuminate\Http\Response
     */
    public function edit(Yelp $yelp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Yelp  $yelp
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Yelp $yelp)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Yelp  $yelp
     * @return \Illuminate\Http\Response
     */
    public function destroy(Yelp $yelp)
    {
        //
    }
}
