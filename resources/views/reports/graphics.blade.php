@extends('layouts.charts')

@section('title','Respuesta de pago')

@section('content')
<style type="text/css">
    #logo{
        display: block;
        margin:  auto;
    }
</style>

<div class="row">
	<div class="col s2 blue darken-4" style="height: 100%;">
		<div class="col s12">
			<br>
		<img  id="logo" width="50%" src="{{asset('images/logo_white.png')}}">
		<br>
		<h3 class="white-text center">Sección de gráficos</h3>
		</div>
		<div class="col s12">
			<select class="browser-default" id="charts" required>
				<option value="" selected>Tipo de gráfico</option>
				<option value="bar">Gráfico de barras</option>
				<option value="line">Gráfico de linea</option>
			</select>
		</div>		
		<div class='col s12'>
			<h5 class="col s12 white-text text-darken-4 left">Rangos disponibles.</h5>
			<ul class="collection">
      			<li class="collection-item blue darken-3"><button class="btn blue darken-4 white-text" onclick="today()">Hoy.</button></li>
      			<li class="collection-item blue darken-3"><button class="btn blue darken-4 white-text" onclick="lastWeek()">Última semana.</button></li>
      			<li class="collection-item blue darken-3"><button class="btn blue darken-4 white-text" onclick="month()">Último Mes.</button></li>
      			<li class="collection-item blue darken-3"><button class="btn blue darken-4 white-text" onclick="year()">Último año.</button></li>
    		</ul>
		</div>
		<div class='col s12'>
			<h5 class="col s12 white-text text-darken-4 left">Otros.</h5>
			<ul class="collection">
      			<li class="collection-item blue darken-3"><button class="btn blue darken-4 white-text" onclick="todayByHour()">Ventas por hora de hoy.</button></li>

    		</ul>
		</div>					
    </div>
    <div class="col s10">
        <div id="chart_container" style="padding: 50px">
        	<h3 class="blue-text text-darken-4 center">Escoge un <strong>tipo de gráfico</strong> y luego el <strong>rango</strong> que desees que represente.</h3>
        	<img  id="logo" width="50%" src="{{asset('images/chart1.png')}}">
        </div>
    </div>		
</div>	

@endsection

<script type="text/javascript">

	function todayByHour(){
		var tipo = document.getElementById('charts').value;
		console.log(tipo)
		if(tipo==""){
			M.toast({html : "No ha seleccionado un tipo de gráfico", classes : "rounded"});
		} else{

			$.ajax({
				url : "{{ route('today.chart.by.hour') }}",
				type : 'get',
				dataType : 'json',
				data : {
					tipo : tipo
				}
			})
			.done(function(response){
				if(tipo=="bar"){
				$('#chart_container').html("");
				anychart.onDocumentReady(function () {
      			// create column chart
      			var chart = anychart.column();

      			// turn on chart animation
      			chart.animation(true);

      			// set chart title text settings
      			chart.title('Total de hoy');

      			// create area series with passed data
      			var series = chart.column([
        				
        				[response[0][1], response[0][0]],
        				[response[1][1], response[1][0]],
        				[response[2][1], response[2][0]],
        				[response[3][1], response[3][0]],
        				[response[4][1], response[4][0]],
        				[response[5][1], response[5][0]],
        				[response[6][1], response[6][0]],
        				[response[7][1], response[7][0]],
        				[response[8][1], response[8][0]],
        				[response[9][1], response[9][0]],
        				[response[10][1], response[10][0]],
        				[response[11][1], response[11][0]],
        				[response[12][1], response[12][0]],
        				[response[13][1], response[13][0]],
        				[response[14][1], response[14][0]],
        				[response[15][1], response[15][0]]
        			
      			]);

      			// set series tooltip settings
      			series.tooltip().titleFormat('{%X}');

      			series
        			.tooltip()
        			.position('center-top')
        			.anchor('center-bottom')
        			.offsetX(0)
        			.offsetY(5)
        			.format('${%Value}{groupsSeparator: }');

      			// set scale minimum
      			chart.yScale().minimum(0);

      			// set yAxis labels formatter
      			chart.yAxis().labels().format('${%Value}{groupsSeparator: }');

      			// tooltips position and interactivity settings
      			chart.tooltip().positionMode('point');
      			chart.interactivity().hoverMode('by-x');

      			// axes titles
      			chart.xAxis().title('Total');
      			chart.yAxis().title('Fecha');

      			// set container id for the chart
      			chart.container('chart_container');

      			// initiate chart drawing
      			chart.draw();
    			});
    		} else if(tipo=="line"){
    			$('#chart_container').html("");
				anychart.onDocumentReady(function () {
      				// create data set on our data
      				var dataSet = anychart.data.set(getData());

        			// map data for the first series, take x from the zero column and value from the first column of data set
        			var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });


        			// create line chart
        			var chart = anychart.line();

        			// turn on chart animation
        			chart.animation(true);

        			// set chart padding
        			chart.padding([10, 20, 5, 20]);

        			// turn on the crosshair
        			chart.crosshair().enabled(true).yLabel(false).yStroke(null);

        			// set tooltip mode to point
        			chart.tooltip().positionMode('point');

        			// set chart title text settings
        			chart.title(
          				'Ventas por hora'
        			);

        			// set yAxis title
       		    	chart.yAxis().title('Total alcanzado');
        			chart.xAxis().labels().padding(5);

        			// create first series with mapped data
        			var firstSeries = chart.line(firstSeriesData);
        			firstSeries.name('');
        			firstSeries.hovered().markers().enabled(true).type('circle').size(4);
        			firstSeries
          			.tooltip()
          			.position('right')
          			.anchor('left-center')
          			.offsetX(5)
          			.offsetY(5);

        			// turn the legend on
       		 		chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

        			// set container id for the chart
        			chart.container('chart_container');
        			// initiate chart drawing
        			chart.draw();
      			});

      			function getData() {
        			return [
          				[response[0][1], response[0][0]],
        				[response[1][1], response[1][0]],
        				[response[2][1], response[2][0]],
        				[response[3][1], response[3][0]],
        				[response[4][1], response[4][0]],
        				[response[5][1], response[5][0]],
        				[response[6][1], response[6][0]],
        				[response[7][1], response[7][0]],
        				[response[8][1], response[8][0]],
        				[response[9][1], response[9][0]],
        				[response[10][1], response[10][0]],
        				[response[11][1], response[11][0]],
        				[response[12][1], response[12][0]],
        				[response[13][1], response[13][0]],
        				[response[14][1], response[14][0]],
        				[response[15][1], response[15][0]]
        			];
      			}
    		}
		})

			
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})
	}
	}

	function today(){
		var tipo = document.getElementById('charts').value;
		console.log(tipo)
		if(tipo==""){
			M.toast({html : "No ha seleccionado un tipo de gráfico", classes : "rounded"});
		} else{



		$.ajax({
			url : "{{ route('week.chart') }}",
			type : 'get',
			dataType : 'json',
			data : {
				tipo : tipo
			}
		})
		.done(function(response){

			if(tipo=="bar"){
				$('#chart_container').html("");
				anychart.onDocumentReady(function () {
      			// create column chart
      			var chart = anychart.column();

      			// turn on chart animation
      			chart.animation(true);

      			// set chart title text settings
      			chart.title('Total de hoy');

      			// create area series with passed data
      			var series = chart.column([
        			[response[0][1], response[0][0]]
      			]);

      			// set series tooltip settings
      			series.tooltip().titleFormat('{%X}');

      			series
        			.tooltip()
        			.position('center-top')
        			.anchor('center-bottom')
        			.offsetX(0)
        			.offsetY(5)
        			.format('${%Value}{groupsSeparator: }');

      			// set scale minimum
      			chart.yScale().minimum(0);

      			// set yAxis labels formatter
      			chart.yAxis().labels().format('${%Value}{groupsSeparator: }');

      			// tooltips position and interactivity settings
      			chart.tooltip().positionMode('point');
      			chart.interactivity().hoverMode('by-x');

      			// axes titles
      			chart.xAxis().title('Total');
      			chart.yAxis().title('Fecha');

      			// set container id for the chart
      			chart.container('chart_container');

      			// initiate chart drawing
      			chart.draw();
    			});
    		}
		})

			
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})
	}
	}
	function lastWeek(){
		var tipo = document.getElementById('charts').value;
		if(tipo==""){
			M.toast({html : "No ha seleccionado un tipo de gráfico", classes : "rounded"});
		} else{

		$.ajax({
			url : "{{ route('week.chart') }}",
			type : 'get',
			dataType : 'json',
			data : {
				tipo : tipo
			}
		})
		.done(function(response){
			if(tipo == "bar"){			

				$('#chart_container').html("");
				anychart.onDocumentReady(function () {
      			// create column chart
      			var chart = anychart.column();

      			// turn on chart animation
      			chart.animation(true);

      			// set chart title text settings
      			chart.title('Última semana');

      			// create area series with passed data
      			var series = chart.column([
        			[response[6][1], response[6][0]],
        			[response[5][1], response[5][0]],
        			[response[4][1], response[4][0]],
        			[response[3][1], response[3][0]],
        			[response[2][1], response[2][0]],
        			[response[1][1], response[1][0]],
        			[response[0][1], response[0][0]]
      			]);

      			// set series tooltip settings
      			series.tooltip().titleFormat('{%X}');

      			series
        			.tooltip()
        			.position('center-top')
        			.anchor('center-bottom')
        			.offsetX(0)
        			.offsetY(5)
        			.format('${%Value}{groupsSeparator: }');

      			// set scale minimum
      			chart.yScale().minimum(0);

      			// set yAxis labels formatter
      			chart.yAxis().labels().format('${%Value}{groupsSeparator: }');

      			// tooltips position and interactivity settings
      			chart.tooltip().positionMode('point');
      			chart.interactivity().hoverMode('by-x');

      			// axes titles
      			chart.xAxis().title('Total');
      			chart.yAxis().title('Fecha');

      			// set container id for the chart
      			chart.container('chart_container');

      			// initiate chart drawing
      			chart.draw();
    			});
			} else if(tipo=="line"){
				$('#chart_container').html("");
				anychart.onDocumentReady(function () {
      				// create data set on our data
      				var dataSet = anychart.data.set(getData());

        			// map data for the first series, take x from the zero column and value from the first column of data set
        			var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });


        			// create line chart
        			var chart = anychart.line();

        			// turn on chart animation
        			chart.animation(true);

        			// set chart padding
        			chart.padding([10, 20, 5, 20]);

        			// turn on the crosshair
        			chart.crosshair().enabled(true).yLabel(false).yStroke(null);

        			// set tooltip mode to point
        			chart.tooltip().positionMode('point');

        			// set chart title text settings
        			chart.title(
          				'Ultima semana'
        			);

        			// set yAxis title
       		    	chart.yAxis().title('Total alcanzado');
        			chart.xAxis().labels().padding(5);

        			// create first series with mapped data
        			var firstSeries = chart.line(firstSeriesData);
        			firstSeries.name('');
        			firstSeries.hovered().markers().enabled(true).type('circle').size(4);
        			firstSeries
          			.tooltip()
          			.position('right')
          			.anchor('left-center')
          			.offsetX(5)
          			.offsetY(5);

        			// turn the legend on
       		 		chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

        			// set container id for the chart
        			chart.container('chart_container');
        			// initiate chart drawing
        			chart.draw();
      			});

      			function getData() {
        			return [
          				[response[6][1], response[6][0]],
        				[response[5][1], response[5][0]],
        				[response[4][1], response[4][0]],
        				[response[3][1], response[3][0]],
        				[response[2][1], response[2][0]],
        				[response[1][1], response[1][0]],
        				[response[0][1], response[0][0]]
        			];
      			}
			}
		})
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})	
      	}	
	}
	function year(){
		var tipo = document.getElementById('charts').value;
		if(tipo==""){
			M.toast({html : "No ha seleccionado un tipo de gráfico", classes : "rounded"});
		} else{
		$.ajax({
			url : "{{ route('year.chart') }}",
			type : 'get',
			dataType : 'json',
			data : {
				tipo : tipo
			}
		})
		.done(function(response){
			if(tipo=="bar"){
				$('#chart_container').html("");
				anychart.onDocumentReady(function () {
      			// create column chart
      			var chart = anychart.column();

      			// turn on chart animation
      			chart.animation(true);

      			// set chart title text settings
      			chart.title('Última semana');
      			console.log(response);

      			// create area series with passed data
      			var series = chart.column([
        			[response[11][1], response[11][0]],
        			[response[10][1], response[10][0]],
        			[response[9][1], response[9][0]],
        			[response[8][1], response[8][0]],
        			[response[7][1], response[7][0]],
        			[response[6][1], response[6][0]],
        			[response[5][1], response[5][0]],
        			[response[4][1], response[4][0]],
        			[response[3][1], response[3][0]],
        			[response[2][1], response[2][0]],
        			[response[1][1], response[1][0]],
        			[response[0][1], response[0][0]]
      			]);

      			// set series tooltip settings
      			series.tooltip().titleFormat('{%X}');

      			series
        			.tooltip()
        			.position('center-top')
        			.anchor('center-bottom')
        			.offsetX(0)
        			.offsetY(5)
        			.format('${%Value}{groupsSeparator: }');

      			// set scale minimum
      			chart.yScale().minimum(0);

      			// set yAxis labels formatter
      			chart.yAxis().labels().format('${%Value}{groupsSeparator: }');

      			// tooltips position and interactivity settings
      			chart.tooltip().positionMode('point');
      			chart.interactivity().hoverMode('by-x');

      			// axes titles
      			chart.xAxis().title('Total');
      			chart.yAxis().title('Fecha');

      			// set container id for the chart
      			chart.container('chart_container');

      			// initiate chart drawing
      			chart.draw();
    			});
			} else if(tipo=="line"){
				$('#chart_container').html("");
				anychart.onDocumentReady(function () {
      				// create data set on our data
      				var dataSet = anychart.data.set(getData());

        			// map data for the first series, take x from the zero column and value from the first column of data set
        			var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });


        			// create line chart
        			var chart = anychart.line();

        			// turn on chart animation
        			chart.animation(true);

        			// set chart padding
        			chart.padding([10, 20, 5, 20]);

        			// turn on the crosshair
        			chart.crosshair().enabled(true).yLabel(false).yStroke(null);

        			// set tooltip mode to point
        			chart.tooltip().positionMode('point');

        			// set chart title text settings
        			chart.title('Ultimo año');

        			// set yAxis title
       		    	chart.yAxis().title('Total alcanzado');
        			chart.xAxis().labels().padding(5);

        			// create first series with mapped data
        			var firstSeries = chart.line(firstSeriesData);
        			firstSeries.name('');
        			firstSeries.hovered().markers().enabled(true).type('circle').size(4);
        			firstSeries
          			.tooltip()
          			.position('right')
          			.anchor('left-center')
          			.offsetX(5)
          			.offsetY(5);

        			// turn the legend on
       		 		chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

        			// set container id for the chart
        			chart.container('chart_container');
        			// initiate chart drawing
        			chart.draw();
      			});

      			function getData() {
        			return [
          				[response[11][1], response[11][0]],
        				[response[10][1], response[10][0]],
        				[response[9][1], response[9][0]],
        				[response[8][1], response[8][0]],
        				[response[7][1], response[7][0]],
        				[response[6][1], response[6][0]],
        				[response[5][1], response[5][0]],
        				[response[4][1], response[4][0]],
        				[response[3][1], response[3][0]],
        				[response[2][1], response[2][0]],
        				[response[1][1], response[1][0]],
        				[response[0][1], response[0][0]],
        			];
      			}
			}
			
		})
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})
	}

	}

	function month(){
		var tipo = document.getElementById('charts').value;
		if(tipo==""){
			M.toast({html : "No ha seleccionado un tipo de gráfico", classes : "rounded"});
		} else{
		$.ajax({
			url : "{{ route('month.chart') }}",
			type : 'get',
			dataType : 'json',
			data : {
				tipo : tipo
			}
		})
		.done(function(response){
			if(tipo=="bar"){
				$('#chart_container').html("");
				anychart.onDocumentReady(function () {
      			// create column chart
      			var chart = anychart.column();

      			// turn on chart animation
      			chart.animation(true);

      			// set chart title text settings
      			chart.title('Último mes');

      			// create area series with passed data
      			var series = chart.column([
      				[response[31][1], response[31][0]],
        			[response[30][1], response[30][0]],
        			[response[29][1], response[29][0]],
        			[response[28][1], response[28][0]],
        			[response[27][1], response[27][0]],
        			[response[26][1], response[26][0]],
        			[response[25][1], response[25][0]],
        			[response[24][1], response[24][0]],
        			[response[23][1], response[23][0]],
      				[response[22][1], response[22][0]],
        			[response[21][1], response[21][0]],
        			[response[20][1], response[20][0]],
        			[response[19][1], response[19][0]],
        			[response[18][1], response[18][0]],
        			[response[17][1], response[17][0]],
        			[response[16][1], response[16][0]],
        			[response[15][1], response[15][0]],
        			[response[14][1], response[14][0]],
        			[response[13][1], response[13][0]],
        			[response[12][1], response[12][0]],
        			[response[11][1], response[11][0]],
        			[response[10][1], response[10][0]],
        			[response[9][1], response[9][0]],
        			[response[8][1], response[8][0]],
        			[response[7][1], response[7][0]],
        			[response[6][1], response[6][0]],
        			[response[5][1], response[5][0]],
        			[response[4][1], response[4][0]],
        			[response[3][1], response[3][0]],
        			[response[2][1], response[2][0]],
        			[response[1][1], response[1][0]],
        			[response[0][1], response[0][0]]
      			]);

      			// set series tooltip settings
      			series.tooltip().titleFormat('{%X}');

      			series
        		.tooltip()
        		.position('center-top')
        		.anchor('center-bottom')
        		.offsetX(0)
        		.offsetY(5)
        		.format('${%Value}{groupsSeparator: }');

      			// set scale minimum
      			chart.yScale().minimum(0);

      			// set yAxis labels formatter
      			chart.yAxis().labels().format('${%Value}{groupsSeparator: }');

      			// tooltips position and interactivity settings
      			chart.tooltip().positionMode('point');
      			chart.interactivity().hoverMode('by-x');

      			// axes titles
      			chart.xAxis().title('Total');
      			chart.yAxis().title('Fecha');

      			// set container id for the chart
      			chart.container('chart_container');

      			// initiate chart drawing
      			chart.draw();
    			});
			} else if(tipo=="line"){
				$('#chart_container').html("");
				anychart.onDocumentReady(function () {
      				// create data set on our data
      				var dataSet = anychart.data.set(getData());

        			// map data for the first series, take x from the zero column and value from the first column of data set
        			var firstSeriesData = dataSet.mapAs({ x: 0, value: 1 });


        			// create line chart
        			var chart = anychart.line();

        			// turn on chart animation
        			chart.animation(true);

        			// set chart padding
        			chart.padding([10, 20, 5, 20]);

        			// turn on the crosshair
        			chart.crosshair().enabled(true).yLabel(false).yStroke(null);

        			// set tooltip mode to point
        			chart.tooltip().positionMode('point');

        			// set chart title text settings
        			chart.title('Ultimo año');

        			// set yAxis title
       		    	chart.yAxis().title('Total alcanzado');
        			chart.xAxis().labels().padding(5);

        			// create first series with mapped data
        			var firstSeries = chart.line(firstSeriesData);
        			firstSeries.name('');
        			firstSeries.hovered().markers().enabled(true).type('circle').size(4);
        			firstSeries
          			.tooltip()
          			.position('right')
          			.anchor('left-center')
          			.offsetX(5)
          			.offsetY(5);

        			// turn the legend on
       		 		chart.legend().enabled(true).fontSize(13).padding([0, 0, 10, 0]);

        			// set container id for the chart
        			chart.container('chart_container');
        			// initiate chart drawing
        			chart.draw();
      			});

      			function getData() {
        			return [
          				[response[31][1], response[31][0]],
        				[response[30][1], response[30][0]],
        				[response[29][1], response[29][0]],
        				[response[28][1], response[28][0]],
        				[response[27][1], response[27][0]],
        				[response[26][1], response[26][0]],
        				[response[25][1], response[25][0]],
        				[response[24][1], response[24][0]],
        				[response[23][1], response[23][0]],
      					[response[22][1], response[22][0]],
        				[response[21][1], response[21][0]],
        				[response[20][1], response[20][0]],
        				[response[19][1], response[19][0]],
        				[response[18][1], response[18][0]],
        				[response[17][1], response[17][0]],
        				[response[16][1], response[16][0]],
        				[response[15][1], response[15][0]],
        				[response[14][1], response[14][0]],
        				[response[13][1], response[13][0]],
        				[response[12][1], response[12][0]],
        				[response[11][1], response[11][0]],
        				[response[10][1], response[10][0]],
        				[response[9][1], response[9][0]],
        				[response[8][1], response[8][0]],
        				[response[7][1], response[7][0]],
        				[response[6][1], response[6][0]],
        				[response[5][1], response[5][0]],
        				[response[4][1], response[4][0]],
        				[response[3][1], response[3][0]],
        				[response[2][1], response[2][0]],
        				[response[1][1], response[1][0]],
        				[response[0][1], response[0][0]]
        			];
      			}
			}
			
		})
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})
	}

	}
</script>
