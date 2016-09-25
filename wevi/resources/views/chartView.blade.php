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

            <div class="content">
                <div class="title m-b-md">
                    Plots
                  </div>

<div>
                <canvas id="hausanschluss_WL" width="600" height="300">
                </div>
                <br>
<div>
                <canvas id="pv_wl" width="600" height="300">

</div>



                <script type="text/javascript" src="{{ URL::asset('js/Chart.js') }}"></script>

                <script>

{{$photovoltaik_WL[1]['value']}}


                var ctx = document.getElementById('pv_wl').getContext('2d');
                var scatterChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        datasets: [{
                            label: 'Photovoltaik Wirkleistung gesamt',
                            data: [{
                                x: 1,
                                y: (-1)*{{$photovoltaik_WL[13]['value']}}
                            }, {
                                x: 2,
                                y: (-1)*{{$photovoltaik_WL[12]['value']}}
                            }, {
                                x: 3,
                                y: (-1)*{{$photovoltaik_WL[11]['value']}}
                            }, {
                                x: 4,
                                y: (-1)*{{$photovoltaik_WL[10]['value']}}
                            }, {
                                x: 5,
                                y: (-1)*{{$photovoltaik_WL[9]['value']}}
                            }, {
                                x: 6,
                                y: (-1)*{{$photovoltaik_WL[8]['value']}}
                            }, {
                                x: 7,
                                y: (-1)*{{$photovoltaik_WL[7]['value']}}
                              }, {
                                x: 8,
                                y: (-1)*{{$photovoltaik_WL[6]['value']}}
                            }, {
                                x: 9,
                                y: (-1)*{{$photovoltaik_WL[5]['value']}}
                            }, {
                                x: 10,
                                y: (-1)*{{$photovoltaik_WL[4]['value']}}
                            }, {
                                x: 11,
                                y: (-1)*{{$photovoltaik_WL[3]['value']}}
                            }, {
                                x: 12,
                                y: (-1)*{{$photovoltaik_WL[2]['value']}}
                            }, {
                                x: 13,
                                y: (-1)*{{$photovoltaik_WL[1]['value']}}
                            }]
                        }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                type: 'linear',
                                position: 'bottom'
                            }],
                            yAxes: [{
                              display: true,
                              ticks: {
                                  suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                                  // OR //
                                  beginAtZero: true,   // minimum value will be 0.
                                   max: 10000
                                }
                            }]
                        }
                    }
                });


                var ctx2 = document.getElementById('hausanschluss_WL').getContext('2d');
                var scatterChart = new Chart(ctx2, {
                    type: 'line',
                    data: {
                        datasets: [{
                            label: 'Hausanschluss Wirkleistung gesamt',
                            data: [{
                                x: 1,
                                y: {{$hausanschluss_WL[13]['value']}}
                            }, {
                                x: 2,
                                y: {{$hausanschluss_WL[12]['value']}}
                            }, {
                                x: 3,
                                y: {{$hausanschluss_WL[11]['value']}}
                            }, {
                                x: 4,
                                y: {{$hausanschluss_WL[10]['value']}}
                            }, {
                                x: 5,
                                y: {{$hausanschluss_WL[9]['value']}}
                            }, {
                                x: 6,
                                y: {{$hausanschluss_WL[8]['value']}}
                            }, {
                                x: 7,
                                y: {{$hausanschluss_WL[7]['value']}}
                              }, {
                                x: 8,
                                y: {{$hausanschluss_WL[6]['value']}}
                            }, {
                                x: 9,
                                y: {{$hausanschluss_WL[5]['value']}}
                            }, {
                                x: 10,
                                y: {{$hausanschluss_WL[4]['value']}}
                            }, {
                                x: 11,
                                y: {{$hausanschluss_WL[3]['value']}}
                            }, {
                                x: 12,
                                y: {{$hausanschluss_WL[2]['value']}}
                            }, {
                                x: 13,
                                y: {{$hausanschluss_WL[1]['value']}}
                            }]
                        }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                type: 'linear',
                                position: 'bottom'
                            }],
                            yAxes: [{
                              display: true,
                              ticks: {
                                  suggestedMin: 0,    // minimum will be 0, unless there is a lower value.
                                  // OR //
                                  beginAtZero: true,   // minimum value will be 0.
                                   max: 16000
                                }
                            }]
                        }
                    }
                });
</script>




            </div>
        </div>
    </body>
</html>
