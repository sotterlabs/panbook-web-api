<div>
	<h4 class="blue-text text-darken-4 center">Su situación actual 2021</h4>
	<h5 class="blue-text text-darken-4 center">Fecha de pago general: 07 de cada mes</h5>
	<h6 class="blue-text text-darken-4 center">Posterior a la fecha mencionada, usted tiene 5 días para ponerse al corriente con la mensualidad, de lo contrario, el servicio será suspendido hasta que la deuda sea pagada</h6>
	<a href="">Revisar términos y condiciones</a>
	<h5 class="blue-text text-darken-4 center"><a target="_blank" href="{{asset('pdf/instructivo_de_pago.pdf')}}">Click aquí para ver instructivo de pago</a></h5>
	<table>
		<thead>
			<th class="center">Mes</th>
			<th class="center">Situación</th>
			<th class="center">Opción de pago</th>
		</thead>
		<tbody>
			<tr>
				<td class="center">Enero</td>
				@if ( $pago[0]->enero == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif								
			</tr>
			<tr>
				<td class="center">Febrero</td>
				@if ( $pago[0]->febrero == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Marzo</td>
				@if ( $pago[0]->marzo == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Abril</td>
				@if ( $pago[0]->abril == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Mayo</td>
				@if ( $pago[0]->mayo == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Junio</td>
				@if ( $pago[0]->junio == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Julio</td>
				@if ( $pago[0]->julio == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Agosto</td>
				@if ( $pago[0]->agosto == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Septiembre</td>
				@if ( $pago[0]->septiembre == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Octubre</td>
				@if ( $pago[0]->octubre == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Noviembre</td>
				@if ( $pago[0]->noviembre == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Diciembre</td>
				@if ( $pago[0]->diciembre == null)
					<td class="center">					
						<p class="red-text center">Pendiente de pago 15.000</p>
					</td>
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@else
				<td>
					<p class="green-text center">Pagado</p>
				</td>						
				@endif
			</tr>
			<tr>
				<td class="center">Deuda Total</td>
				<td class="center">
					@php
						$total = 0;
						if($pago[0]->enero == null){ $total = $total + 15000; }
						if($pago[0]->febrero == null){ $total = $total + 15000; }
						if($pago[0]->marzo == null){ $total = $total + 15000; }
						if($pago[0]->abril == null){ $total = $total + 15000; }
						if($pago[0]->mayo == null){ $total = $total + 15000; }
						if($pago[0]->junio == null){ $total = $total + 15000; }
						if($pago[0]->julio == null){ $total = $total + 15000; }
						if($pago[0]->agosto == null){ $total = $total + 15000; }
						if($pago[0]->septiembre == null){ $total = $total + 15000; }
						if($pago[0]->octubre == null){ $total = $total + 15000; }
						if($pago[0]->noviembre == null){ $total = $total + 15000; }
						if($pago[0]->diciembre == null){ $total = $total + 15000; }
					@endphp
					$ {{ number_format($total, 0, ",", ".") }}
				</td>
				@if ($total != 0)
					<td class="center">
						<a href='https://www.flow.cl/btn.php?token=c3vlmpr' target='_blank'>
  							<img src='https://www.flow.cl/img/botones/btn-pagar-celeste.png'>
						</a>
					</td>
				@endif
			</tr>
		</tbody>
	</table>
	@if ($total == 0)
	<br>
	<h3 class="blue-text text-darken-4 center">Felicidades! su cuenta anual está al día</h3>
	@else
	<table>
		<tbody>
			<tr>
				<td>
					<p class="blue-text text-darken-4 center">Si usted ya realizó uno de los pagos y aún figura como "Pendiente" por favor contactarse a rodosoto"empresainnovatica.cl</p>
				</td>
			</tr>
			<tr>
				<td>
					<p class="blue-text text-darken-4 center">Si usted ya pagó el mes actual, no se preocupe, su servicio no será suspendido aunque los demas meses figuren como pendientes</p>
				</td>
			</tr>
		</tbody>
	</table>
	@endif
</div>