@if( count($ventas) == 0)
	<h3 class="blue-text text-darken-4 center">No hay registro de borrados en Panbook para el día seleccionado</h3>

@else
<br>
	<div>
		<h3 class="blue-text text-darken-4 center">Resumen de borrados Panbook</h3>
		<p class="center">{{ $ventas[0]->created_at }}</p>
	</div>
	<br>
	<div class="col s12">
		<table class="striped">
			<thead>
				<th>Justificación</th>
				<th>Detalle</th>
				<th>Tipo de pago</th>
				<th>Total</th>
				<th>Fecha y hora</th>
			</thead>
			<tbody>
				@foreach ($ventas as $venta)
					<tr>
						<td class="center">{{ $venta->justificacion }}</td>
						<td>{{ $venta->detalle }}</td>	
						<td>{{ $venta->tipo_de_pago }}</td>				
						<td>{{ $venta->total }}</td>
						<td>{{ $venta->created_at }}</td>				
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
						for ( $i = 0 ; $i < count($ventas) ; $i++ ){
							$total = $total + $ventas[$i]->total;
						}					
					@endphp
						$ {{ number_format($total, 0, ",", ".")}}
					</td>		
				</tr>
			</tbody>
		</table>
	</div>
@endif