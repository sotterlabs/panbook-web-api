<!DOCTYPE html>
<html>
<head>
	<title>Sistema de inventario</title>
	
	<!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="icon" type="image/png" href="./../imagenes/logo.png" />
    <meta charset="UTF-8">
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  	<script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  	<script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>
  	<link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  	<link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
  	<style type="text/css">
    #logo{
        display: block;
        margin:  auto;
    }
    #side{
    	height: 100%;
    }
</style>

</body>
 	<div class="row">
 		<div id="side" class="col s2 blue darken-4">
 			<br>
 			<img  id="logo" width="80%" src="{{asset('images/logo_white.png')}}">
 			<br><br>
 			<h5 class="white-text center">Informe de productos</h5><br><hr>
 			<button onclick="construccion()" class="blue darken-3 white-text btn center"><i class="material-icons left">picture_as_pdf</i>Descargar PDF</button><br><hr>
 			<form action="{{ route('report.product.excel') }}" method="get">
 				@csrf
 				<button type="submit" class="blue darken-3 white-text btn center"><i class="material-icons left">file_download</i>Descargar Excel</button>
 			</form> 			
 		</div>
 		<div class="col s10">
 			<br><br>
 			<table class="striped">
 				<thead>
 					<th class="center">Nombre</th>
 					<th class="center">Proveedor</th>
 					<th class="center">Precio Costo</th>
 					<th class="center">Precio Venta</th>
 					<th class="center">Stock</th>
 					<th class="center">Stock Límite</th>
 					<th class="center">Código de barra</th>
 					<th class="center">Fecha de ingreso</th>
 					<th class="center">Fecha de última actualización</th>
 				</thead>
 				<tbody>
 					@foreach ($pr as $p)
 						<tr>
 							<td class="center">{{ $p->nombre}}</td>
 							<td class="center">{{ $p->proveedor}}</td>
 							<td class="center">$ {{ number_format($p->precio_costo, 0, ",", ".")}}</td>
 							<td class="center">$ {{ number_format($p->precio_venta, 0, ",", ".")}}</td>
 							<td class="center">{{ $p->stock}}</td>
 							<td class="center">{{ $p->stock_limite}}</td>
 							<td class="center">{{ $p->codigo_barra}}</td>
 							<td class="center">{{ $p->created_at}}</td>
 							<td class="center">{{ $p->updated_at}}</td>
 						</tr>
 					@endforeach
 				</tbody>
 			</table>
 		</div>
 	</div>
</head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script>
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

	function construccion(){
		M.toast({html : "Función en construcción", classes : "rounded"});
	}

	function excel(){
		$.ajax({
			url : "{{ route('report.product.excel') }}",
			type : "get"
		})
		.done(function(response){
			M.toast({html : "Descargando Excel", classes : "rounded"});
		})
		.fail( function(jqXHR, textStatus, errorThrown, response){
        	console.log(jqXHR);
        	console.log(textStatus);
        	console.log(errorThrown);
        	console.log(response);
      	})
	}
</script>