<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class FoursquareController extends Controller
{
    public function venues() {

        $client = new Client();
        $categories = $client->request('GET', 'https://api.foursquare.com/v2/venues/categories', [
            'query' => [
                'client_id' => env('FOURSQUARE_CLIENT_ID'),
                'client_secret' => env('FOURSQUARE_SECRET_ID'),
                'v' => "20191009",
            ]
        ]);

        //Return json format
        return $categories->getBody();


    }

    public function venueSearch($id,$name) {

        $client = new Client();
        $result = $client->request('GET', 'https://api.foursquare.com/v2/venues/search', [
            'query' => [
                'client_id' => env('FOURSQUARE_CLIENT_ID'),
                'client_secret' => env('FOURSQUARE_SECRET_ID'),
                'v' => "20191009",
                'll' => '35.8989,14.5146',
                'query'=>$name,
                'intent'=>'global',
                'categoryId' =>$id,

            ]
        ]);

        //Return JSON format
        return $result->getBody();

    }

}
