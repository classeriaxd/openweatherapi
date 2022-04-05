<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Weather eheh</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <body class="antialiased">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h2 class="display-2 text-center">Current Weather in {{ $weatherDataBody->name }}</h2>
                    <div class="d-flex justify-content-center">
                        <div class="card" style="width: 18rem;">
                          <img src="{{'http://openweathermap.org/img/wn/' . $weatherDataBody->weather[0]->icon . '@2x.png'}}" class="card-img-top" alt="...">
                          <div class="card-body text-center">
                            <h5 class="card-title">{{ $weatherDataBody->weather[0]->main }}</h5>
                            <p class="card-text">{{ $weatherDataBody->weather[0]->description }}</p>
                            <br>
                            <h5 class="card-title">{{ 'Stats' }}</h5>
                            <p class="card-text">Temperature: {{ $weatherDataBody->main->temp }}℃</p>
                            <p class="card-text">Humidity: {{ $weatherDataBody->main->humidity }}</p>
                          </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </body>
</html>
