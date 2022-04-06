<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>OpenWeatherAPI</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row">
                <div class="col">
                    @if(! ($error ?? false))
                    <h2 class="display-2 text-center">Current Weather in Pasig</h2>

                    {{-- Current Weather --}}
                    <div class="d-flex justify-content-center my-1">
                        <div class="card" style="width: 18rem;">
                            <img src="{{'http://openweathermap.org/img/wn/' . $weatherDataBody->daily[0]->weather[0]->icon . '@2x.png'}}" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title">{{ 'Today' }}</h5>
                                <hr>
                                <h5 class="card-title">{{ $weatherDataBody->daily[0]->weather[0]->main }}</h5>
                                <p class="card-text">{{ $weatherDataBody->daily[0]->weather[0]->description }}</p>
                                <hr>
                                <h5 class="card-title">{{ 'Stats' }}</h5>
                                <p class="card-text">Temperature: {{ $weatherDataBody->daily[0]->temp->day }}℃</p>
                                <p class="card-text">Humidity: {{ $weatherDataBody->daily[0]->humidity }}</p>
                            </div>
                        </div>
                        
                    </div>
                    {{-- Week Forecast starting tomorrow --}}
                    <div class="d-flex justify-content-center">
                        @foreach($weatherDataBody->daily as $data)
                            @if ($loop->first) @continue @endif
                            <div class="card mx-1" style="width: 18rem;">
                                <img src="{{'http://openweathermap.org/img/wn/' . $data->weather[0]->icon . '@2x.png'}}" class="card-img-top" alt="...">
                                <div class="card-body text-center">
                                    <h5 class="card-title">{{ date('l', $data->dt) }} <br>{{ date('F d, Y', $data->dt) }}</h5>
                                    <hr>
                                    <h5 class="card-title">{{ $data->weather[0]->main }}</h5>
                                    <p class="card-text">{{ $data->weather[0]->description }}</p>
                                    <hr>
                                    <h5 class="card-title">{{ 'Stats' }}</h5>
                                    <p class="card-text">Temperature: {{ $data->temp->day }}℃</p>
                                    <p class="card-text">Humidity: {{ $data->humidity }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    @else
                        <div class="alert alert-danger text-center" role="alert">
                            {{$error}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </body>
</html>
