@if( count($array[2]) == 0)
	<h3 class="blue-text text-darken-4 center">No hay registro de ventas para el intervalo seleccionado</h3>

@else
	<br><br>
	<div>
		<h3 class="blue-text text-darken-4 center">Resumen del ventas del intervalo seleccionado</h3>
		<p class="center">{{ $array[0] }} - {{ $array[1] }}</p>
	</div>
	<div class="col s12">
		<table class="striped">
			<thead>
				<th>Número de boleta</th>
				<th>Detalle de venta</th>
				<th>Tipo de pago</th>
				<th>Hora</th>
				<th>Total</th>
			</thead>
			<tbody>
				@foreach ($array[2] as $venta)
					<tr>
						<td class="center">{{ $venta->num_boleta }}</td>
						<td>{{ $venta->detalle }}</td>				
						<td>{{ $venta->tipo_de_pago }}</td>
						<td>{{ $venta->created_at }}</td>
						<td>${{ number_format($venta->total, 0, ",", ".") }}</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td>Total</td>
					<td>
					@php
						$total = 0;
						for ( $i = 0 ; $i < count($array[2]) ; $i++ ){
							$total = $total + $array[2][$i]->total;
						}					
					@endphp
						$ {{ number_format($total, 0, ",", ".")}}
					</td>				
				</tr>
			</tbody>
		</table>	
		<br><br>
		<div class="col s12">
			<div class="col s4 center">
				<button class="btn blue">Generar PDF</button>
			</div>
			<div class="col s4 center">
				<button class="btn blue">Generar Excel</button>
			</div>
			<div class="col s4 center">
				<button class="btn blue">Imprimir Resumen</button>
			</div>
		</div>
		<br><br>
	</div>
@endif