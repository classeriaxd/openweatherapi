<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {
        $weatherData = Http::get('https://api.openweathermap.org/data/2.5/weather?', [
            'lang' => 'en',
            'units' => 'metric',
            'lat' => '14.58485463654627',
            'lon' => '121.06213636927811',
            'appid' => 'a49ea5246e71b5c07979e6841b393008',
        ]);

        $weatherDataBody = json_decode($weatherData);
        //dd($weatherDataBody);
        return view('welcome', compact('weatherDataBody'));
    }
}
