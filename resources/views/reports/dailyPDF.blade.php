@if( count($ventas) == 0)
	<h3>No hay registro de ventas para el día seleccionado</h3>

@else
<br>
	<div>
		<h3 >Resumen del día seleccionado</h3>
		<p >{{ $ventas[0]->created_at }}</p>
	</div>
	<br>
	<div >
		<br><br>
	</div>
@endif