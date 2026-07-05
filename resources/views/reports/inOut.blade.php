@extends('layouts.charts')

@section('title', 'Entrada y salida de productos')

@section('content')

<style type="text/css">
    #logo{
        display: block;
        margin:  auto;
    }
</style>

<div class="row">
	<div class="col s2 blue darken-4" style="height: 100%;">
		<br>
		<img  id="logo" width="50%" src="{{asset('images/logo_white.png')}}">
		<br>
		<h5 class="white-text center">Movimiento de productos el día de hoy</h5>
		<br><br>
		<h5 class="white-text center">¿Necesitas ver una fecha distinta?</h5>
		<input type="text" class="datepicker" value="click aquí">			
    </div>
    <div class="col s10">
        <div id="chart_container" style="padding: 50px">
        	<table class="striped">
        		<thead>
        			<th class="center">Nombre del producto</th>
        			<th class="center">Ingreso</th>
        			<th class="center">Egreso</th>
        			<th class="center">Primera venta</th>
        			<th class="center">Última venta</th>
        		</thead>
        		<tbody>
        			@foreach ($pr as $p)
        				<tr>
        					<td class="center">{{ $p->nombre }}</td>
        					<td class="center">{{ $p->ingreso}} </td>
        					<td class="center">{{ $p->egreso }}</td>
        					<td class="center">{{ $p->created_at }}</td>
        					<td class="center">{{ $p->updated_at }}</td>
        				</tr>
        			@endforeach
        		</tbody>
        	</table>
        </div>
    </div>		
</div>	
@endsection
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="{{ asset('js/materialize.min.js') }}"></script>
<script type="text/javascript">
	document.addEventListener('DOMContentLoaded', function(){
    	M.AutoInit();
    });
</script>