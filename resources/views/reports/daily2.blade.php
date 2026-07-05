@if( count($ventas) == 0)
	<h3 class="blue-text text-darken-4 center">No hay registro de ventas para el día seleccionado</h3>

@else
<br>
	<div>
		<h3 class="blue-text text-darken-4 center">Resumen del dia seleccionado</h3>
		<p class="center">{{ $ventas[0]->created_at }}</p>
	</div>
	<br>
	<div class="col s12">
		<table class="striped">
			<h3 class="blue-text text-darken-4 center">Servir/Llevar</h3>
			<thead>
				<th>Num comanda</th>
				<th>Detalle</th>
				<th>Tipo de pago</th>
				<th>Total</th>
				<th>Fecha y hora</th>
				<th>Borrar</th>
			</thead>
			<tbody>
				@foreach ($ventas as $venta)
					@if ($venta->tipo != "Reparto")
					<tr>
						<td class="center">{{ $venta->comanda }}</td>
						<td>{{ $venta->detalle }}</td>	
						<td>{{ $venta->tipo_de_pago }}</td>				
						<td>{{ $venta->total }}</td>
						<td>{{ $venta->created_at }}</td>
						<th onclick="borra_picza('{{ $venta->id }}','{{ $venta->tienda }}','{{ $venta->detalle }}','{{ $venta->tipo_de_pago }}','{{ $venta->total }}')"><i class="material-icons red-text">delete</i></th>				
					</tr>
					@endif
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
							if ( $ventas[$i]->tipo != "Reparto"){
								$total = $total + $ventas[$i]->total;
							}
						}					
					@endphp
						$ {{ number_format($total, 0, ",", ".")}}
					</td>		
				</tr>
			</tbody>
		</table>
		<table class="striped">
			<h3 class="blue-text text-darken-4 center">Reparto</h3>
			<thead>
				<th>Num comanda</th>
				<th>Detalle</th>
				<th>Tipo de pago</th>
				<th>Total</th>
				<th>Fecha y hora</th>
				<th>Borrar</th>
			</thead>
			<tbody>
				@foreach ($ventas as $venta)
					@if ($venta->tipo == "Reparto")
					<tr>
						<td class="center">{{ $venta->comanda }}</td>
						<td>{{ $venta->detalle }}</td>	
						<td>{{ $venta->tipo_de_pago }}</td>				
						<td>{{ $venta->total }}</td>
						<td>{{ $venta->created_at }}</td>
						<th onclick="borra_picza('{{ $venta->id }}','{{ $venta->tienda }}','{{ $venta->detalle }}','{{ $venta->tipo_de_pago }}','{{ $venta->total }}')"><i class="material-icons red-text">delete</i></th>				
					</tr>
					@endif
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
							if ( $ventas[$i]->tipo == "Reparto"){
								$total = $total + $ventas[$i]->total;
							}
						}					
					@endphp
						$ {{ number_format($total, 0, ",", ".")}}
					</td>		
				</tr>
			</tbody>
		</table>
	</div>
@endif