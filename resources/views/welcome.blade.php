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
				color: #636b6f;
				font-family: 'Raleway', sans-serif;
				font-family: 'VT323', monospace;
				font-weight: 100;
				margin: 0;
				height: 100%;
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

			.pad-sides-15 {
				padding: 0 15px;
			}

			.stats h1 {
				font-size: 3.5em;
				margin-top: 5px;
				margin-bottom: 0;
			}

			h1+h4 {
				margin-top: 0;
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
				position: relative;
				bottom: 0;
				width: 100%;
				padding: 50px 15px 25px;
				text-align: center;
				color: #AAAAAA;
				line-height: 1.25em;
			}

			#chart_div {
				padding-top: 15px;
				margin: auto;
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
			<div id="chart_div" class="center">
				<div id="chart" class="ct-chart ct-golden-section"></div>
			</div>
		</div>

		<div class="bot-panel-height stats center">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<div class="div-inline pad-sides-15 center">
									<h1 class="color-red">{{ $avgLength }}</h1>
									<h4 class="color-red">{{ str_plural('minute', $avgLength) }}</h4>
									<h4>Avg Length</h4>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<div class="div-inline pad-sides-15 center">
									<h1 class="color-yellow">{{ $numUnderTwenty }}</h1>
									<h4 class="color-yellow">{{ str_plural('episode', $numUnderTwenty) }}</h4>
									<h4>
										< 20 min</h4>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<div class="div-inline pad-sides-15 center">
									<h1 class="color-green">{{ $longestLength }}</h1>
									<h4 class="color-green">{{ str_plural('minute', $longestLength) }}</h4>
									<h4>Longest Episode</h4>
								</div>
							</div>
							<div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
								<div class="div-inline pad-sides-15 center">
									<h1 class="color-blue">{{ $milestoneEpisode }}</h1>
									<h4 class="color-blue">Episode #</h4>
									<h4>First > {{ $milestone }} Minute
										<br />(estimated)</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="footer">
			Made with <span class="color-red">♥</span> by
			<a href="https://twitter.com/JakeBathman" target="_blank">@JakeBathman</a>
			<br /> Code for this site is
			<a href="https://github.com/jakebathman/twentypercenttimebot" target="_blank">on GitHub</a>
			<br /> Listen to Twenty Percent Time, a great podcast about Laravel development hosted by
			<a href="https://twitter.com/calebporzio" target="_blank">Caleb</a> &
			<a href="https://twitter.com/DCoulbourne" target="_blank">Daniel</a>, at
			<a href="http://twentypercent.fm/" target="_blank">twentypercent.fm</a>
		</div>
	</body>


	<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
	<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

	<script>
		(function() {
            // When the DOM is loaded, render the chart
            renderChart();
        })();

        window.addEventListener('resize', function(){
            // If the window size changes (mostly to catch mobile phone rotation)
            // let's re-render the chart
            console.log('rendering again!');
            document.getElementById('chart').innerHTML = "";
            renderChart();
        }, true);

		function renderChart(){
            var w = document.documentElement.clientWidth;
            var h = document.documentElement.clientHeight;

                document.getElementById('chart_div').setAttribute("style", "max-width: "+Math.min(w,h)+"px;");

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
    }
	</script>


</html>