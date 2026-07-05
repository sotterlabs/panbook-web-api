<!DOCTYPE html
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  	<script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  	<script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  	<link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  	<link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
  	<style type="text/css">

    	html,
	    body,
	    #chart_container {
      		width: 100%;
      		height: 100%;
      		margin: 0;
      		padding: 0;
    	}
  
	</style>
	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	<link rel="icon" type="image/png" href="{{asset('images/minat.png')}}"/>
</head>
<body>
	@yield('content')
	
</body>
</html>
