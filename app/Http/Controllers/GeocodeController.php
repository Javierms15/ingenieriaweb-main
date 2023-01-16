<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class GeocodeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getData(){
        $address = $_GET['address'];
        $contents = GeocodeController::makeRequest($address);
        $sortedContent = GeocodeController::sortResponse($contents);
        echo json_encode($sortedContent);
    }
    
    public function makeRequest($address){
        $client = new Client();

        //$address = 'Paseo de Antonio Machado, 62';
        //$address = utf8_encode($address);
        
        $key = 'AIzaSyCipl8K3XpcoH8n2fBvGaDUymcjuK6AE2I';

        $response = $client->get('https://maps.googleapis.com/maps/api/geocode/json?address='.$address.'&key='.$key);
        $contents = json_decode($response->getBody(), true);

        return $contents;
        //return view('maps.cercanos',compact('contents'));
    }

    public function sortResponse($contents){
        $results = $contents['results'];

        $array = [];

        foreach($results as $lugar){
            $myJson = [
                'full_address' => $lugar['formatted_address'],
                'location' => $lugar['geometry']['location'],
                'address_info' => $lugar['address_components'],
            ];
            
            array_push($array, $myJson);
        }

        return $array;
    }
}