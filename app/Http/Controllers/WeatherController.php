<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function index()
    {   
        // Define Location: Pasig, Taipan Place
        $location = [
            'lat' => '14.58485463654627',
            'lon' => '121.06213636927811',
        ];

        // Get Weather Data
        $weatherData = Http::get('https://api.openweathermap.org/data/2.5/onecall?', [
            'lang' => 'en',
            'units' => 'metric',
            'lat' => $location['lat'],
            'lon' => $location['lon'],
            'appid' => 'a49ea5246e71b5c07979e6841b393008',
            'exclude' => 'hourly,minutely,current'
        ]);
        
        // If no errors then send to view
        if ($weatherData->getStatusCode() === 200) 
        {
            // Decode json then send to view
            $weatherDataBody = json_decode($weatherData);
            return view('welcome', compact('weatherDataBody'));
        }

        // Show errors in view
        return view('welcome')->with(['error' => $weatherData->getReasonPhrase()]);
    }
}
