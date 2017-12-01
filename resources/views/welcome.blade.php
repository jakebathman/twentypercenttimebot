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
		<link href="https://fonts.googleapis.com/css?family=VT323" rel="stylesheet">

		<link rel="stylesheet" href="{{ mix('/css/all.css') }}">

		<!-- Styles -->
		<style>
			html,
			body {
				background-color: #fff;
				color: #636b6f;
				font-family: 'Raleway', sans-serif;
				font-family: 'VT323', monospace;
				font-weight: 100;
				height: 100vh;
				margin: 0;
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

			.content,
			.center {
				text-align: center;
			}

			.title {
				font-size: 74px;
				font-family: 'VT323', monospace;
				color: #FFFFFF;
			}

			.links>a {
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

			#chart_div {
				margin: auto;
				font-weight: bold;
			}

			@media(max-width: 900px) {
				.title {
					font-size: 50px;
				}
			}

			@media(max-width: 600px) {
				.title {
					font-size: 30px;
				}
			}

			.bg-light {
				background-color: #EBF4FA;
			}

			.bg-md {
				background-color: #465C6A;
			}

			.bg-dark {
				background-color: #283138;
			}

			.ct-label {
				font-size: 15px !important;
				color: #AAAAAA !important;
			}

			.ct-series-a .ct-line,
			.ct-series-a .ct-point {
				stroke: #85DDFE !important;
			}

			.ct-series-b .ct-line,
			.ct-series-b .ct-point {
				stroke: #AAAAAA !important;
			}

			div.div-inline {
				display: inline-block;
			}

			.pad-15 {
				padding: 15px;
			}

			.stats h1 {
				font-size: 3em;
			}

			.stats table {
				width: 100%;
				margin: auto;
				text-align: center;
			}

			.color-red {
				color: #FF546E;
			}

			.color-yellow {
				color: #FECC69;
			}

			.color-green {
				color: #C7E992;
			}

			.color-blue {
				color: #85DDFE;
			}

			.footer {
				position: absolute;
				right: 0;
				bottom: 0;
				left: 0;
				padding: 1rem;
				text-align: center;
				color: #AAAAAA;
			}
		</style>
	</head>

	<body class="diag-background">
		<div class="flex-center position-ref top-panel-height bg-md">

			<div class="content">
				<div class="title">
					Twenty Percent Time Time
				</div>

			</div>
		</div>
		<div class="mid-panel-height">
			<div id="chart_div" style="width: 100%; max-width:700px; padding-top: 15px; ">
				<div class="ct-chart ct-golden-section"></div>
			</div>
		</div>

		<div class="bot-panel-height stats center">
			<div class="row">
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<div class="div-inline pad-15 center">
						<h1 class="color-red">{{$avgLength}}</h1>
						<h4>Avg Length (min)</h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<div class="div-inline pad-15 center">
						<h1 class="color-yellow">{{$numUnderTwenty}}</h1>
						<h4>Episodes <20 min</h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<div class="div-inline pad-15 center">
						<h1 class="color-green">{{$longestLength}}</h1>
						<h4>Longest Episode (min)</h4>
					</div>
				</div>
				<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
					<div class="div-inline pad-15 center">
						<h1 class="color-blue">{{$hourLongEpisode}}</h1>
						<h4>First Episode > 1 hour<br />(Estimated)</h4>
					</div>
				</div>
			</div>
		</div>

		<div class="footer">
			Made with ♥ by
			<a href="https://twitter.com/JakeBathman" target="_blank">@JakeBathman</a>
			<br /> Listen to Twenty Percent Time, a great podcast about Laravel development hosted by
			<a href="https://twitter.com/calebporzio" target="_blank">Caleb</a> &
			<a href="https://twitter.com/DCoulbourne" target="_blank">Daniel</a>
		</div>
	</body>


	<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
	<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

	<script>
		// Our labels and three data series
        var data = {
            series: [
                {
                    name: "Episode lengths",
                    data: {!! json_encode($series) !!}
                },
                {
                    name: "Twenty minutes (or less)",
                    data: {!! json_encode($twenty) !!}
                }
            ]
        };

        console.debug(data);

        // We are setting a few options for our chart and override the defaults
        var options = {
            // Don't draw the line chart points
            showPoint: true,
            // Disable line smoothing
            lineSmooth: true,
            // X-Axis specific configuration
            axisX: {
                // We can disable the grid for this axis
                showGrid: false,
                // and also don't show the label
                showLabel: true
            },
            // Y-Axis specific configuration
            axisY: {
                onlyInteger: true
            },
            series: {
                "Episode lengths": {
                    showPoint: true
                },
                "Twenty minutes (or less)": {
                    showPoint: false
                }
            }
        };

        // All you need to do is pass your configuration as third parameter to the chart function
        new Chartist.Line('.ct-chart', data, options);
	</script>


</html>