
<div>
	<h3 class="blue-text text-darken-4 center">Stock</h3>
</div>
<h5 class="blue-text text-darken-4 left">Pan</h5>
<br>
<div class="col s12">
	<table class="striped">
		<thead>
			<th class="center">Nombre</th>
			<th>Stock</th>
		</thead>
		<tbody>
			@foreach ($pan as $venta)
				<tr>
					<td class="center">{{ $venta->nombre }}</td>
					<td>{{ $venta->cantidad }}</td>				
				</tr>
			@endforeach
		</tbody>
	</table>
</div>
<h5 class="blue-text text-darken-4 left">Bebidas</h5>
<div class="col s12">
	<table class="striped">
		<thead>
			<th class="center">Nombre</th>
			<th>Stock</th>
			<th>Valor</th>
		</thead>
		<tbody>
			@foreach ($beb as $venta)
				<tr>
					<td class="center">{{ $venta->nombre }}</td>
					<td>{{ $venta->stock }}</td>	
					<td>{{ number_format($venta->valor, 0, ",", ".") }}</td>				
				</tr>
			@endforeach
		</tbody>
	</table>
</div>