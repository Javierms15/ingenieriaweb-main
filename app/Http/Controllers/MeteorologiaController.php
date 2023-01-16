<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MeteorologiaController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function getDataHourly(){
        $latitude = $_GET['latitude'];
        $longitude = $_GET['longitude'];

        $contents = MeteorologiaController::makeRequestHourly($latitude, $longitude);
        $sortedContent = MeteorologiaController::sortResponseHourly($contents);
        echo json_encode($sortedContent);
    }
    
    public function makeRequestHourly($latitude, $longitude){
        $client = new Client();

        //$address = 'Paseo de Antonio Machado, 62';
        //$address = utf8_encode($address);
        
        $response = $client->get('https://api.open-meteo.com/v1/forecast?latitude='.$latitude.'&longitude='.$longitude.'&hourly=temperature_2m&hourly=weathercode&hourly=precipitation');
        $contents = json_decode($response->getBody(), true);

        return $contents;
        //return view('maps.cercanos',compact('contents'));
    }

    public function sortResponseHourly($contents){
        $results = $contents['hourly'];
        $array = [];

        for($i = 0; $i<count($results['time']); $i++){
            $myJson = [
                'time' => $results['time'][$i],
                'temp' => $results['temperature_2m'][$i],
                'weather_code' => $results['weathercode'][$i],
                'weather_translate' => MeteorologiaController::getStringFromWeathercode($results['weathercode'][$i]),
                'precipitation' => $results['precipitation'][$i],
            ];
            
            array_push($array, $myJson);
        }

        return $array;
    }

    public function getDataDaily(){
        $latitude = $_GET['latitude'];
        $longitude = $_GET['longitude'];
        $contents = MeteorologiaController::makeRequestDaily($latitude, $longitude);
        $sortedContent = MeteorologiaController::sortResponseDaily($contents);
        echo json_encode($sortedContent);
    }
    
    public function makeRequestDaily($latitude, $longitude){
        $client = new Client();

        //$address = 'Paseo de Antonio Machado, 62';
        //$address = utf8_encode($address);
        $latitude = $_GET['latitude'];
        $longitude = $_GET['longitude'];

        $response = $client->get('https://api.open-meteo.com/v1/forecast?latitude='.$latitude.'&longitude='.$longitude.'&daily=temperature_2m_max&daily=temperature_2m_min&daily=weathercode&daily=precipitation_sum&timezone=auto');
        $contents = json_decode($response->getBody(), true);

        return $contents;
        //return view('maps.cercanos',compact('contents'));
    }

    public function sortResponseDaily($contents){
        $results = $contents['daily'];
        $array = [];

        for($i = 0; $i<count($results['time']); $i++){
            $myJson = [
                'time' => $results['time'][$i],
                'temp_max' => $results['temperature_2m_max'][$i],
                'temp_min' => $results['temperature_2m_min'][$i],
                'weather_code' => $results['weathercode'][$i],
                'weather_translate' => MeteorologiaController::getStringFromWeathercode($results['weathercode'][$i]),
                'precipitation' => $results['precipitation_sum'][$i],
            ];
            
            array_push($array, $myJson);
        }

        return $array;
    }

    public function getStringFromWeathercode($weathercode){
        $dictionary = [
            '0' => 'soleado',
            '1' => 'intervalos nubosos',
            '2' => 'parcialmente nublado',
            '3' => 'nublado',
            '45' => 'niebla',
            '48' => 'niebla',
            '51' => 'llovizna ligera',
            '53' => 'llovizna media',
            '55' => 'llovizna intensa',
            '56' => 'llovizna gelida',
            '57' => 'llovizna gelida',
            '61' => 'lluvia',
            '63' => 'lluvia',
            '65' => 'lluvia',
            '66' => 'lluvia gelida',
            '67' => 'lluvia gelida',
            '71' => 'nieve',
            '73' => 'nieve',
            '75' => 'nieve',
            '77' => 'nieve',
            '80' => 'lluvia intensa',
            '81' => 'lluvia intensa',
            '82' => 'lluvia intensa',
            '85' => 'nieve intensa',
            '86' => 'nieve intensa',
            '95' => 'tormenta electrica',
            '96' => 'tormenta con nieve',
            '99' => 'tormenta con nieve',
        ];

        return $dictionary[$weathercode];
    }
}