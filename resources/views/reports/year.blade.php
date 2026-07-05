@if( count($ventas) == 0)
	<h3 class="blue-text text-darken-4 center">No hay registro de ventas para el año seleccionado</h3>

@else
	<br><br>
	<div>
		<h3 class="blue-text text-darken-4 center">Resumen del año seleccionado</h3>
	</div>
	<div class="col s12">
		<table class="striped">
			<thead>
				<th>Número de boleta</th>
				<th>Cantidad</th>
				<th>Detalle de venta</th>
				<th>Tipo de pago</th>
				<th>Hora</th>
				<th>Vendido por</th>
				<th>Comisión</th>
				@if(Auth::user()->tipo != 'user')
				<th>IVA a pagar<th>
				@endif
				
				<th>Total</th>
			</thead>
			<tbody>
				@foreach ($ventas as $venta)
					<tr>
						<td class="center">{{ $venta->num_boleta }}</td>
						<td>{{ $venta->numero }}</td>	
						<td>{{ $venta->detalle }}</td>				
						<td>{{ $venta->tipo_de_pago }}</td>
						<td>{{ $venta->created_at }}</td>
						<td>{{ $venta->vendido_por }}</td>
						<td>${{ number_format($venta->comision, 0, ",", ".") }}</td>
						@if(Auth::user()->tipo != 'user')
						<td>${{ number_format((($venta->total*19)/119), 0, ",", ".") }}</td>
						@endif
						<td>${{ number_format($venta->total, 0, ",", ".") }}</td>
					</tr>
				@endforeach
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					@if(Auth::user()->tipo != 'user')
						<td></td>
					@endif
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
					@if(Auth::user()->tipo != 'user')
					<td>
					@php
						$iva_total = 0;
						for ( $i = 0 ; $i < count($ventas) ; $i++ ){
							$iva_total = $iva_total + $ventas[$i]->total;
						}					
					@endphp
						$ {{ number_format((($iva_total*19)/119), 0, ",", ".")}}
					</td>
					@endif				
				</tr>
				@if(Auth::user()->tipo != 'user')
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>Total final</td>
					<td>
						@php
						$tf = $total - (($iva_total*19)/119);
						@endphp
						$ {{ number_format($tf, 0, ",", ".")}}
					</td>				
				</tr>
				@endif
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