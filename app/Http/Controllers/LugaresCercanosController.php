<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;
use App\Models\Location;

class LugaresCercanosController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getData(){
        $latitude = $_GET['latitude'];
        $longitude = $_GET['longitude'];
        $radius = $_GET['radius'];


        $contents = LugaresCercanosController::makeRequest($latitude, $longitude, $radius);
        $sortedContent = LugaresCercanosController::sortResponse($contents);
        echo json_encode($sortedContent);
    }
    
    public function makeRequest($latitude, $longitude, $radius){
        $client = new Client();

        $location = $latitude.'%2C'.$longitude;

        //$location = '-33.8670522%2C151.1957362';
        $type = 'restaurant';
        $key = 'AIzaSyCipl8K3XpcoH8n2fBvGaDUymcjuK6AE2I';

        $response = $client->get('https://maps.googleapis.com/maps/api/place/nearbysearch/json?location='.$location.'&radius='.$radius.'&type='.$type.'&key='.$key);
        //return view('maps.cercanos')->with('data', $response);
        $contents = json_decode($response->getBody(), true);

        return $contents;
        //return view('maps.cercanos',compact('contents'));
    }

    public function sortResponse($contents){
        $results = $contents['results'];

        $array = [];

        foreach($results as $lugar){
            $myJson = [
                'name' => $lugar['name'],
                'location' => $lugar['geometry']['location'],
                'street' => $lugar['vicinity'],
            ];
            
            array_push($array, $myJson);

        }

        return $array;
    }
}