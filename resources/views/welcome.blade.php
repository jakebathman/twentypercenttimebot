<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('favicons')
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Twenty Percent Time Time</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link rel="stylesheet" href="{{ mix('/css/all.css') }}">

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

            .top-panel-height {
                height: 20vh;
            }

            .mid-panel-height {
                height: 40vh;
            }

            .bot-panel-height {
                height: 40vh;
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
                font-size: 74px;
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
            #chart_div{
                margin: auto;
            }

            @media(max-width: 900px){
                .title{
                    font-size: 50px;
                }
            }
            @media(max-width: 600px){
                .title{
                    font-size: 30px;
                }
            }

            .bg-light{
                background-color: #EBF4FA;
            }

            .bg-dark{
                background-color: #333C42;
            }
        </style>
    </head>
    <body class="bg-light">
        <div class="flex-center position-ref cogs-background top-panel-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Twenty Percent Time Time
                </div>

        </div>
            </div>
            <div class="mid-panel-height">
    <div id="chart_div" style="width: 90%; height: 350px; max-width:700px; max-height: 350px;"></div>
    </div>

<div class="ct-chart ct-golden-section"></div>
    <div class="bot-panel-height bg-dark">
    </div>
    </body>




        <!--
         <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

window.addEventListener('orientationchange', drawChart);
window.onresize = function(event) {
    drawChart();
};

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Release Date', 'Lenght (minutes)', '20 Minutes'],
            [new Date(1493398800000),17.5,20],
            [new Date(1493910000000),21.11666667,20],
            [new Date(1494604800000),24.98333333,20],
            [new Date(1495187100000),22.16666667,20],
            [new Date(1496402100000),28.1,20],
            [new Date(1497027600000),27.7,20],
            [new Date(1498230000000),37.86666667,20],
            [new Date(1498827600000),32.93333333,20],
            [new Date(1500048000000),34.55,20],
            [new Date(1500649200000),35.53333333,20],
            [new Date(1501027200000),32.61666667,20],
            [new Date(1501246800000),35.18333333,20],
            [new Date(1502118000000),33.73333333,20],
            [new Date(1502474400000),42.56666667,20],
            [new Date(1503072000000),38.93333333,20],
            [new Date(1503666000000),33.25,20],
            [new Date(1504407600000),38.88333333,20],
            [new Date(1506110400000),42.01666667,20],
            [new Date(1507302000000),22.03333333,20],
            [new Date(1508511600000),39.15,20],
            [new Date(1509123600000),43.21666667,20],
            [new Date(1510347600000),45.88333333,20],
        ]);



        var options = {
                backgroundColor: '#EBF4FA',
          title: '',
        hAxis: {
          viewWindow: {
            min: new Date(1493398800000),
            max: new Date(1510347600000)
          },
          gridlines: {
            count: -1,
            units: {
              days: {format: ['MMM dd']},
              hours: {format: ['HH:mm', 'ha']},
            }
          },
          minorGridlines: {
            units: {
              hours: {format: ['hh:mm:ss a', 'ha']},
              minutes: {format: ['HH:mm a Z', ':mm']}
            }
          }
        },
          vAxis: {title: 'Duration (minutes)', minValue: 0, maxValue: 60},
          legend: 'none',
          trendlines: { 0: {
                      type: 'linear',
              showR2: true,
        visibleInLegend: true,
          } 
          },
         series: {1: {type: 'line',pointsVisible:false,lineWidth:2,color:'#A65275'}},
         legend: {position: 'top', textStyle: {color: 'blue', fontSize: 16}}

        };

        var chart = new google.visualization.ScatterChart(document.getElementById('chart_div'));

        chart.draw(data, options);
      }
    </script> 
    -->

    
</html>
