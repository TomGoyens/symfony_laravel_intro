<?php

namespace App\Http\Controllers;


class WeatherController extends Controller{
  public function index(){
    if (empty($_GET['q'])){
      return view('weather', [
          'title' => 'Weather not found',
          'city' => "",
          'wind_speed' => 'NaN',
          'temperature' => 'NaN',
          'humidity' => 'NaN',
          'weather' => "",
          'weatherShort' => "",
          'icon' => "",
      ]);
    }
    $url = 'http://api.openweathermap.org/data/2.5/weather?q='.$_GET['q'].'&APPID=c4d64189685c30187df7546364d23e5b';
    if (@file_get_contents($url) === false) {
      return view('weather', [
          'title' => 'Weather not found',
          'city' => ucfirst($_GET['q']),
          'wind_speed' => 'NaN',
          'temperature' => 'NaN',
          'humidity' => 'NaN',
          'weather' => "",
          'weatherShort' => "",
          'icon' => "",
      ]);
    }
    $obj = json_decode(file_get_contents($url), true);

    $url = 'http://openweathermap.org/img/w/'.$obj['weather'][0]['icon'].'.png';

      return view('weather', [
        'title' => 'Weather in '.$_GET['q'],
        'city' => ucfirst($_GET['q']),
        'wind_speed' => round($obj['wind']['speed'], 2),
        'temperature' => round($obj['main']['temp']-273.15, 2),
        'humidity' => round($obj['main']['humidity'], 2),
        'weather' => ucfirst($obj['weather'][0]['description']),
        'weatherShort' => $obj['weather'][0]['main'],
        'icon' => $url,
    ]);
  }
}
