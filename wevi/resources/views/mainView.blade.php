<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif

            <div class="content", style="font-size:18pt; color: #222222;">
<div align="left">
          <table >
            <tr>
              <td>Photovoltaik WL</td>
              <td>  {{$photovoltaik_WL}} W</td>
            </tr>
            <tr>
              <td>Hausanschluss WL</td>
              <td>  {{$hausanschluss_WL}} W</td>

            </tr>
            <tr>
              <td>BHKW WL</td>
              <td>  {{$bhkw_WL}} W</td>
            </tr>
            <tr>
              <td>Kaelte WL</td>
              <td>        {{$kaelte_WL}} W</td>
            </tr>
            <tr>
              <td>Elektrolyse WL</td>
              <td> {{$elektrolyse_WL}} W</td>
            </tr>
            <tr>
              <td>Wärmepumpe WL</td>
              <td>    {{$waermepumpe_WL}} W</td>
            </tr>
            <tr>
              <td>Mehtanisierung Wl</td>
              <td> {{$methanisierung_WL}} W</td>
            </tr>
            <tr>
              <td>Außenfühler Süden</td>
              <td> {{$aussenfuehler_s}} °C</td>
            </tr>
            <tr>
              <td>Raumluft CO2 Methanisierung </td>
              <td>  {{$raumluft_co2}} ppm<br></td>
            </tr>
          </table>


            </div>
          </div>
        </div>
        </div>

    </body>
</html>
