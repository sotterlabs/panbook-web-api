@extends('layouts.header')

@section('title','Reportes')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<style type="text/css">
    #logo{
        display: block;
        margin:  auto;
    }
</style>

<div class="row">
	<div class="col s2 blue darken-4" style="height: 100%;">
		<br>
		<img  id="logo" width="60%" src="{{asset('images/logo_white.png')}}">
		<h5 class="white-text center">Sección de informes</h5>
		<div class="col s12">
			<ul class="collapsible blue darken-3">
    			<li>
      				<div class="collapsible-header blue darken-3 white-text bold"><i class="material-icons">assignment</i>Informes predeterminados</div>
      				<div class="collapsible-body white-text">
      					<button class="btn blue darken-4 white-text" onclick="daily()">
      						<i class="material-icons left">event</i>Informe diario.
      					</button>
      				</div>
      				<div class="collapsible-body white-text">
      					<button class="btn blue darken-4 white-text" onclick="monthly()">
      						<i class="material-icons left">event_available</i>Informe mensual.
      					</button>
      				</div>
      				<div class="collapsible-body white-text">
      					<button class="btn blue darken-4 white-text" onclick="yearly()">
      						<i class="material-icons left">filter_frames</i>Informe anual.
      					</button>
      				</div>
      				<div class="collapsible-body white-text">
      					<button class="btn blue darken-4 white-text" onclick="alerta()"><i class="material-icons left">report</i>Alertas.
      					</button>
      				</div>
    			</li>
    			<li>
      				<div class="collapsible-header blue darken-3 white-text bold"><i class="material-icons">event</i>Informe por dia</div>
      				<div class="collapsible-body"><input id="datepicker1" type="text" class="datepicker white-text" value="click aquí">
      				<button onclick="day()" class=" btn waves white-text blue darken-4">Buscar</button></div>
    			</li>
    			<li>
      				<div class="collapsible-header blue darken-3 white-text bold"><i class="material-icons">event_available</i>Informe por mes</div>
      				<div class="collapsible-body white-text">
                		<select class="white-text" id="month_1">
      						<option class="white-text" class="white-text" value="" disabled selected>Mes</option>
      						<option class="white-text" value="01">Enero</option>
      						<option class="white-text" value="02">Febrero</option>
      						<option class="white-text" value="03">Marzo</option>
      						<option class="white-text" value="04">Abril</option>
      						<option class="white-text" value="05">Mayo</option>
      						<option class="white-text" value="06">Junio</option>
	      					<option class="white-text" value="07">Julio</option>
	      					<option class="white-text" value="08">Agosto</option>
      						<option class="white-text" value="09">Septiembre</option>
      						<option class="white-text" value="10">Octubre</option>
      						<option class="white-text" value="11">Novimebre</option>
      						<option class="white-text" value="12">Diciembre</option>
    					</select>
                	</div>
                	<div class="collapsible-body white-text">
                		<select id="year_1">
      						<option class="white-text" value="" disabled selected>Año</option>
      						<option class="white-text" value="2020">2020</option>
      						<option class="white-text" value="2021">2021</option>
      						<option class="white-text" value="2022">2022</option>
    					</select>
                	</div>
                	<div class="collapsible-body white-text">
                		<button onclick="month()" class=" btn waves white-text blue darken-4">Buscar</button>
                	</div>
    			</li>
    			<li>
      				<div class="collapsible-header blue darken-3 white-text bold"><i class="material-icons">filter_frames</i>Informe por año</div>
      				<div class="collapsible-body white-text">
      					<select id="year_2">
      						<option value="" disabled selected>Año</option>
      						<option value="2020">2020</option>
      						<option value="2021">2021</option>
      						<option value="2022">2022</option>
    					</select>
      					<button onclick="year()" class=" btn waves white-text blue darken-4">Buscar</button>
      				</div>
    			</li>
    			<li>
      				<div class="collapsible-header blue darken-3 white-text bold"><i class="material-icons">event_available</i>Informe por rango de fechas</div>
      				<div class="collapsible-body white-text">
      					<input id="datepicker2" type="text" class="datepicker" value="fecha inicial">
      				</div>
      				<div class="collapsible-body white-text">
      					<input id="datepicker3" type="text" class="datepicker" value="fecha final">
      				</div>
      				<div class="collapsible-body white-text">
      					<button onclick="interval()" class=" btn waves white-text blue darken-4">Buscar</button>
      				</div>      				
    			</li>
    			<li>
      				<div class="collapsible-header blue darken-3 white-text bold"><i class="material-icons">shopping_basket</i>Los 5 mas vendidos</div>
      				<div class="collapsible-body white-text">
      					<h6>Función en construcción</h6>
      				</div>  				
    			</li>
    			<li>
      				<div class="collapsible-header blue darken-3 white-text bold"><i class="material-icons">schedule</i>Las horas mas rentables</div>
      				<div class="collapsible-body white-text">
      					<h6>Función en construcción</h6>
      				</div>  				
    			</li>
    			<li>
      				<div class="collapsible-header blue darken-3 white-text bold"><i class="material-icons">delete</i>Eliminar boleta</div>
      				<div class="center collapsible-body white-text">
      					<a class="center waves-effect blue darken-4 btn modal-trigger" href="#modal1">Click aquí</a>
      					<div id="modal1" class="modal" style="height: 400px">
    						<div class="modal-content">
      							<div class="col s12">
      								<h4 class="blue-text text-darken-4 center">Borrar artículo</h4>
      								<p class="blue-text text-darken-4 center">Por favor, ingrese número de boleta y el día en que se emitió (solo se borrará de punto de venta innovática, si desea borrar una boleta oficial debe hacerlo desde la página web del servicio de impuestos internos sii.cl)<br>Le avisamos que una vez haya efectuado el borrado, no podrá recuperarla de vuelta</p>
      							</div>
      							<div class="container">
      								<div class="col s6">
      									<input placeholder="12" id="reciepeDate" type="text" class="validate">
          								<label for="reciepeDate">Número de boleta</label>
      								</div>      								
      							</div>
      							<div class="container">
      								<div class="col s6">
      									<input id="datepicker4" type="text" class="datepicker" value="fecha de emisión">
      								</div>      								
      							</div>
      							<div class="col s12 center">
      								<br><br>
      								<button onclick="deleteRecipe()" class="blue darken-4 btn waves-effect">Eliminar</button>
      								<br>
      							</div>
    						</div>
    						<div class="modal-footer">
      							<a hidden href="#!" class="modal-close waves-effect waves-green btn-flat" id="closeDeleteReciepe">Agree</a>
    						</div>
  						</div>
      				</div>  				
    			</li>
  			</ul>
		</div>
		<div class="col s12">
		</div>
		<div class="col s12">
			
		</div>
		

		<!-- <table class="blue darken-3">
			<thead>
				<th class="white-text">Selección de fechas</th>
				<th class="white-text center">Diario</th>
				<th class="white-text center">Mensual</th>
				<th class="white-text center">Anual</th>
				<th class="white-text center">Productos en alerta</th>
			</thead>
			<tbody>
				<tr>
					<td class="center white-text"></td>
					<td class="center">
						<input id="datepicker1" type="text" class="datepicker" value="click aquí">
					</td>
					<td class="center">
						<select id="month_1">
      				<option value="" disabled selected>Mes</option>
      				<option value="01">Enero</option>
      				<option value="02">Febrero</option>
      				<option value="03">Marzo</option>
      				<option value="04">Abril</option>
      				<option value="05">Mayo</option>
      				<option value="06">Junio</option>
      				<option value="07">Julio</option>
      				<option value="08">Agosto</option>
      				<option value="09">Septiembre</option>
      				<option value="10">Octubre</option>
      				<option value="11">Novimebre</option>
      				<option value="12">Diciembre</option>
    			</select>
                	</div>
                	<div class="col s6">
                		<select id="year_1">
      								<option value="" disabled selected>Año</option>
      								<option value="2020">2020</option>
      								<option value="2021">2021</option>
      								<option value="2022">2022</option>
    								</select>
                	</div>
					</td>
					<td class="center">
						<a class="btn-floating btn-medium cyan pulse blue-text text-darken-4 center" onclick="yearly()"> <i class="material-icons">arrow_right</i></a>
					</td>
					<td class="center">
						<a class="btn-floating btn-medium cyan pulse blue-text text-darken-4 center" onclick="alerta()"> <i class="material-icons">arrow_right</i></a>						
					</td>
				</tr>
			</tbody>
		</table> -->
	
    </div>
    <div class="col s10">
        <div id="chart_container" style="padding: 50px">
        	<h3 class="blue-text text-darken-4 center">Escoge un <strong>tipo de informe</strong> dentro de la variedad que te ofrecemos.</h3>
        	<img  id="logo" width="50%" src="{{asset('images/report.png')}}">
        </div>
    </div>		
</div>	

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function(){
    	M.AutoInit();
    });
	$(document).ready(function(){
		var height = $(window).height();
    $('#side').height(height);

    document.addEventListener('DOMContentLoaded', function(){
    	M.AutoInit();
    	var elems = document.querySelectorAll('.sidenav');
    	var instances = M.Sidenav.init(elems, options);
    	var collapsibleElem = document.querySelector('.collapsible');
  		var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

   		$(document).ready(function() {
      	M.updateTextFields();
    	});
    });
  });

	function deleteRecipe(){
		var date = document.getElementById('datepicker4').value; 
		var num = document.getElementById('reciepeDate').value;
		if( date == ""){
			M.toast({html : "Por favor, seleccione una fecha", classes : "rounded"});
		}
		if( num == ""){
			M.toast({html : "por favor, indique un número de boleta", classes : "rounded"});
		}
		var resp = confirm("¿Está seguro que desea eliminar para siempre esta boleta?");
		if ( resp == true){
			$.ajax({
				url : "{{ route('delete.reciepe') }}",
				type : "get",
				dataType : "json",
				data : {
					date : date,
					num : num
				}
			})
			.done(function(response){
				if(response=="success"){
					$('#closeDeleteReciepe').click();
					M.toast({html : "Boleta eliminada, por favor, recargue la página", classes : "rounded"});
				} else{
					M.toast({html : "Error al borrar", classes : "rounded"});
				}
				
			})
			.fail( function(jqXHR, textStatus, errorThrown){
       			console.log(jqXHR);
        		console.log(textStatus);
        		console.log(errorThrown);
      		})
		}
	}

	function daily(){

		$("#chart_container").html("");
		$.ajax({
			url : "{{ route('daily.report') }}",
			type : 'get'
		})
		.done(function(response){
			$('#chart_container').html(response);
		})
		.fail( function(jqXHR, textStatus, errorThrown){
       		console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
      	})
	}

	function day(){
			$("#report_modal_close").click();
			$("#dailyReportModalContent").html("");
			$("#daily_open_modal").click();
			var date = $("#datepicker1").val();
			console.log(date)
			$.ajax({
				url : "{{ route('daily.report') }}",
				type : 'get',
				data : {
					date : date
				}
			})
			.done(function(response){
				$('#chart_container').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

	function monthly(){

		$("#chart_container").html("");
		$.ajax({
			url : "{{ route('month.report') }}",
			type : 'get'
		})
		.done(function(response){
			$('#chart_container').html(response);
		})
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})
	}

	function month(){

		$("#chart_container").html("");
		var month = document.getElementById('month_1').value; 
		var year = document.getElementById('year_1').value;
		$.ajax({
			url : "{{ route('month.report') }}",
			type : 'get',
			data : {
				month : month,
				year : year
			}
		})
		.done(function(response){
			$('#chart_container').html(response);
		})
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})
	}

	function yearly(){

		$("#chart_container").html("");
		$.ajax({
			url : "{{ route('year.report') }}",
			type : 'get'
		})
		.done(function(response){
			$('#chart_container').html(response);
		})
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})
	}

	function year(){
			$("#chart_container").html("");
			var date = document.getElementById('year_2').value;
			$.ajax({
				url : "{{ route('year.report') }}",
				type : 'get',
				data : {
					date : date
				}
			})
			.done(function(response){
				$('#chart_container').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function interval(){
			$("#chart_container").html("");
			var date1 = $("#datepicker2").val();
			var date2 = $("#datepicker3").val();
			$.ajax({
				url : "{{ route('interval.report') }}",
				type : 'get',
				data : {
					date1 : date1,
					date2 : date2
				}
			})
			.done(function(response){
				$('#chart_container').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

	function alerta(){

		$("#chart_container").html("");
		$.ajax({
			url : "{{ route('alert.report') }}",
			type : 'get'
		})
		.done(function(response){
			console.log(response)
			if(response==""){
				M.toast({html: "Wow! no tienes productos en alerta por stock", classes : "rounded"})
			}
			$('#chart_container').html(response);
		})
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})
	} 
</script>