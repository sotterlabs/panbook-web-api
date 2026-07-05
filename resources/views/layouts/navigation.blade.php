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
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
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
 			<ul class="collapsible blue darken-2">
        @if (Auth::user()->s_activo == "si")
        <li>
          <div class="collapsible-header blue darken-2 white-text"><i class="material-icons">description</i>Resumenes de venta</div>
          <div class="collapsible-body">
            <input id="datepicker1" type="text" class="datepicker" value="Click aqui para fecha" class="white-text">
            <a class="blue darken-4 btn modal-trigger" onclick="panb_res()">Resumen Panbook</a>
            <br><br>
            <hr>
            <br><br>
            <input id="datepicker2" type="text" class="datepicker" value="Click aqui para fecha" class="white-text">
            <a class="blue darken-4 btn modal-trigger" onclick="picza_res()">Resumen Picza</a>
          </div>
        </li>
        <li>
          <div class="collapsible-header blue darken-2 white-text"><i class="material-icons">library_books</i>Inventario</div>
          <div class="collapsible-body">
            <a class="blue darken-4 btn modal-trigger" onclick="inv()">Inventario general</a>
          </div>
        </li>
        <li>
          <div class="collapsible-header blue darken-2 white-text"><i class="material-icons">delete</i>Borrados</div>
          <div class="collapsible-body">
            <a class="blue darken-4 btn modal-trigger" onclick="panb_errased()">Borrados Panbook</a>
            <br><br>
            <a class="blue darken-4 btn modal-trigger" onclick="picza_errased()">Borrados Picza</a>
          </div>
        </li>
        @endif
    		<li>
          @if (Auth::user()->tipo == "Su" || Auth::user()->tipo == "admin")
    			<div class="collapsible-header blue darken-2 white-text"><i class="material-icons">account_box</i>Administrador</div>
          @endif
          @if (Auth::user()->tipo == "Su")
      		<div class="collapsible-body">
      			<a class="blue darken-4 btn modal-trigger" onclick="user_list()">Activar usuario</a>
      		</div>
          @endif
          @if (Auth::user()->tipo == "Su" || Auth::user()->tipo == "admin")
          <div class="collapsible-body">
            <a class="blue darken-4 btn modal-trigger" onclick="construccion()">Crear usuario</a>
          </div>
          <div class="collapsible-body">
            <a class="blue darken-4 btn modal-trigger" onclick="construccion()">Ver usuarios</a>
          </div>
          @endif
				</li>
    		<li>
      		<div class="collapsible-header blue darken-2 white-text"><i class="material-icons">account_circle</i>Otras funciónes</div>
      		<div class="collapsible-body">
      			<a class="blue darken-4 btn white-text modal-trigger" href="{{ route('profile.show') }}"><i class="material-icons left">account_circle</i>Perfil</a><br><hr>
  					<a class="blue darken-4 btn white-text modal-trigger" onclick="pay()"><i class="material-icons left">payment</i>Pago</a><br><hr>
  					<a class="blue darken-4 btn white-text modal-trigger" target="_blank" href="{{asset('pdf/terminos_y_condiciones.pdf')}}">Términos y condiciones</a><br><hr>
            <a class="blue darken-4 btn white-text modal-trigger" target="_blank" href="{{asset('pdf/POLITICA_DE_PRIVACIDAD.pdf')}}">Políitica de privacidad</a><br><hr>

  					<form method="POST" action="{{ route('logout') }}">
           		@csrf
            	<a class="blue darken-4 btn white-text "
		    				href="{{ route('logout') }}" 
		    				onclick="event.preventDefault();
		    				this.closest('form').submit();">
              	<i class="material-icons left">exit_to_app</i>{{ __('Cerrar Sesión') }}
          		</a>
          	</form><hr>
      		</div>      			
    		</li>
  		</ul>
 		</div>
		<div class="col s10 center">
			<!-- RELOJ -->
			<form name="reloj_javascript">
		    <input class="grey-text text-darken-4 center" type="text" name="reloj" onfocus="window.document.reloj_javascript.reloj.blur()">
	    </form>

	   	<!-- DAILY MODAL -->
	    <div id="dailyReportModal" class="modal">
    		<div class="modal-content" id="dailyReportModalContent">                           
    		</div>
    		<div class="modal-footer">
      		<button id="modal_daily_close" href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar ventana</button>
    		</div>
  		</div>

  		<!-- MONTHLY MODAL -->
  		<div id="monthReportModal" class="modal">
    		<div class="modal-content" id="monthReportModalContent">                           
    		</div>
    		<div class="modal-footer">
      		<button id="modal_monthly_close" href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar ventana</button>
    		</div>
  		</div>

  		<!-- YEARLY MODAL -->
  		<div id="yearReportModal" class="modal">
    		<div class="modal-content" id="yearReportModalContent">                           
    		</div>
    		<div class="modal-footer">
      		<button id="modal_yearly_close" href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar ventana</button>
    		</div>
  		</div>

  		<!-- ALERT PRODUCTS MODAL -->
  		<div id="alertReportModal" class="modal">
    		<div class="modal-content" id="alertReportModalContent">                           
    		</div>
    		<div class="modal-footer">
      		<button id="modal_alert_close" href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar ventana</button>
    		</div>
  		</div>

  		<!-- USERS MODAL -->
  		<div id="userModal" class="modal">
    		<div class="modal-content" id="userModalContent">                           
    		</div>
    		<div class="modal-footer">
      		<button id="modal_user_close" href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar ventana</button>
    		</div>
  		</div>

  		<!-- PAY MODAL -->
  		<div id="payModal" class="modal">
    		<div class="modal-content" id="payModalContent">                           
    		</div>
    		<div class="modal-footer">
      		<button id="modal_pay_close" href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar ventana</button>
    		</div>
  		</div>

  		<!-- OPEN MODAL BUTTONS --> 
  		<div class="col s12" hidden>
  			<button class="blue darken-3 btn modal-trigger" href="#dailyReportModal" id="daily_open_modal" hidden></button>
  			<button class="blue darken-3 btn modal-trigger" href="#monthReportModal" id="month_open_modal" hidden></button>
  			<button class="blue darken-3 btn modal-trigger" href="#yearReportModal" id="year_open_modal" hidden></button>
  			<button class="blue darken-3 btn modal-trigger" href="#alertReportModal" id="alert_open_modal" hidden></button>
  			<button class="blue darken-3 btn modal-trigger" href="#userModal" id="user_open_modal" hidden></button> 
  			<button class="blue darken-3 btn modal-trigger" href="#payModal" id="pay_open_modal" hidden></button>
  			<button class="blue darken-3 btn modal-trigger" href="#graphicsModal" id="graphics_open_modal" hidden></button> 
  		</div>

  			<!-- INSERT PROUDCT MODAL -->
	     <div id="ip_modal" class="modal">
    		<div class="modal-content">
      		<h4>Ingresar nuevo producto</h4>
      		<p>Completa los campos requeridos</p>
            <div class="input-field col s6">
              <input placeholder="Nombre" id="nombre" name="nombre" type="text" class="validate">
              <label for="first_name">Nombre del Producto</label>
            </div>
            <div class="input-field col s6">
              <input id="proveedor" name="proveedor" type="text" class="validate">
              <label for="last_name">Proveedor</label>
            </div>
            <div class="input-field col s6">
              <input id="costo" name="costo" type="number" class="validate" value="0">
              <label for="last_name">Precio Costo</label>
            </div>
            <div class="input-field col s6">
              <input id="venta" name="venta" type="number" class="validate" value="0">
              <label for="last_name">Precio Venta</label>
            </div>
            <div class="input-field col s6">
              <input id="stock" name="stock" type="number" class="validate" value="0">
              <label for="last_name">Stock</label>
            </div>
            <div class="input-field col s6">
              <input id="stock_lim" name="stock_lim" type="number" class="validate" value="0">
              <label for="last_name">Stock limite</label>
            </div>
            <div class="input-field col s6">
              <input id="barcode" name="barcode" type="text" class="validate">
              <label for="last_name">Codigo de barra</label>
            </div>
            <div class="input-field col s6">
              <input id="porcentaje_comision" name="porcentaje_comision" type="number" class="validate" placeholder="0.70" step="0.01" max="1" min="0">
              <label for="last_name">Procentaje de comisión para vendedor</label>
            </div>            
            <div class="input-field col s6">
              <input id="tienda" name="tienda" type="text" class="validate" value="{{ Auth::user()->nombre_tienda}}" hidden>
            </div>
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            <div class="col s6">
              <br><br>
              <button onclick="add_producto()" class="btn waves-effect indigo darken-4 right"><i class="material-icons right">add</i>Agregar Producto</button><br><br>
            </div>                            
    			</div>
    			<div class="modal-footer">
      			<a href="#!" id="ip_modal_close" class="modal-close waves-effect waves-green btn-flat">Cerrar ventana</a>
    			</div>
  			</div>

	      <!-- REPORTS MODAL -->
  			<div id="modal1" class="modal">
    			<div class="modal-content" id="modalContent">
      			<h3 class="blue-text text-darken-4 center">Informes</h3>
      			<div class="col s12">
      				<h4 class="blue-text text-darken-4 center">Informes predefinidos</h4>
      				
            	      				
      			</div>
      			<div class="col s12">
      				<h4 class="blue-text text-darken-4 center">Informes personalizados</h4>
      				<div class="card grey lighten-2 col s4">
              	<div class="card-image">
              	<br><br>              
                <i class="material-icons large blue-text text-darken-4">event</i></div>
              	<div class="card-content">
                	<p><strong>Informe Diario</strong></p>
                	<input id="datepicker1" type="text" class="datepicker" value="click aquí">        		
              	</div>
              	<div class="card-action">
              		<a class="btn-floating btn-large cyan pulse blue-text text-darken-4 center" onclick="day()"> <i class="material-icons">arrow_right</i></a>
              	</div>
            	</div>
            	<div class="card grey lighten-2 col s4">
              	<div class="card-image">
              	<br><br>              
                <i class="material-icons large yellow-text text-darken-4">event_available</i></div>
              	<div class="card-content">
                	<p><strong>Informe Mensual</strong></p>
                	<div class="col s6">
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
                	<div class="col s12"><br><br></div>    		
              	</div>
              	<br>
              	<div class="card-action">
              		<a class="btn-floating btn-large cyan pulse blue-text text-darken-4 center" onclick="month()"> <i class="material-icons">arrow_right</i></a>
              	</div>
            	</div>
            	<div class="card grey lighten-2 col s4">
              	<div class="card-image">
              		<br><br>              
                	<i class="material-icons large green-text text-darken-4">event_note</i>
                </div>
              	<div class="card-content">
                	<p><strong>Informe anual</strong></p>
                	<select id="year_2">
      								<option value="" disabled selected>Año</option>
      								<option value="2020">2020</option>
      								<option value="2021">2021</option>
      								<option value="2022">2022</option>
    								</select>
              	</div>
              	<div class="card-action">
              		<a class="btn-floating btn-large cyan pulse blue-text text-darken-4 center" onclick="year()"> <i class="material-icons">arrow_right</i></a>
              	</div>
            	</div>
      			</div>
      			<div class="col s12">
      				<div class="col s3"></div>
      				<div class="card grey lighten-2 col s6">
              	<div class="card-image">
              		<br><br>              
                	<i class="material-icons large red-text text-darken-4">event_note</i>
                </div>
              	<div class="card-content">
                	<p><strong>Informe por rango de fechas</strong></p>
                	<div class="col s6">
                		<input id="datepicker2" type="text" class="datepicker" value="fecha inicial"></div>
                	<div class="col s6">
                		<input id="datepicker3" type="text" class="datepicker" value="fecha final"></div>
                		<br>
                		<br>
              	</div>
              	<div class="card-action">
              		<a class="btn-floating btn-large cyan pulse blue-text text-darken-4 center" onclick="interval()"> <i class="material-icons">arrow_right</i></a>
              	</div>
            	</div>
      				
      			</div>
    			</div>
    			<div class="modal-footer">
      			<button id="report_modal_close" href="#!" class="modal-close waves-effect waves-green btn-flat">Cerrar ventana</button>
    			</div>
  			</div>			
			</div>
 			<div class="col s10">
 				@yield('content')
 			</div>
 		</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script type="text/javascript">
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

  function reloj() {
		//Variables
		horareal = new Date()
		hora = horareal.getHours()
		minuto = horareal.getMinutes()
		segundo = horareal.getSeconds()
		//Codigo para evitar que solo se vea un numero en los segundos
		comprobarsegundo = new String (segundo)
		if (comprobarsegundo.length == 1)
		segundo = "0" + segundo
		//Codigo para evitar que solo se vea un numero en los minutos
		comprobarminuto = new String (minuto)
		if (comprobarminuto.length == 1)
		minuto = "0" + minuto
		//Codigo para evitar que solo se vea un numero en las horas
		comprobarhora = new String (hora)
		if (comprobarhora.length == 1)
		hora = "0" + hora
		// Codigo para mostrar el reloj en pantalla
		verhora = hora + " : " + minuto + " : " + segundo
		document.reloj_javascript.reloj.value = verhora
		setTimeout("reloj()",1000)
	}
	reloj();

	function add_producto(){
			var nombre = document.getElementById('nombre').value;
			var proveedor = document.getElementById('proveedor').value;
			var costo = document.getElementById('costo').value;
			var venta = document.getElementById('venta').value;
			var stock = document.getElementById('stock').value;
			var stock_lim = document.getElementById('stock_lim').value;
			var barcode = document.getElementById('barcode').value;
			var tienda = document.getElementById('tienda').value;
      var porcentaje_comision = document.getElementById('porcentaje_comision').value;

      if(nombre == ""){
        M.toast({html : "Debe ingresar un nombre de producto", classes : "rounded"});
      }
      if(proveedor == ""){
        M.toast({html : "Debe ingresar un proveedor de producto", classes : "rounded"});
      }
      if(costo == "0"){
        M.toast({html : "Debe ingresar un precio costo de producto", classes : "rounded"});
      }
      if(venta == "0"){
        M.toast({html : "Debe ingresar un precio venta de producto", classes : "rounded"});
      }
      if(stock == "0"){
        M.toast({html : "Debe ingresar un stock de producto", classes : "rounded"});
      }
      if(stock_lim == "0"){
        M.toast({html : "Debe ingresar un stock límite de producto", classes : "rounded"});
      }
      if(barcode == ""){
        M.toast({html : "Debe ingresar un código de barra de producto", classes : "rounded"});
      }
      if(porcentaje_comision == ""){
        M.toast({html : "Debe ingresar un porcentaje para el vendedor", classes : "rounded"});
      } else{
        $.ajax({
          url : 'producto/insert',
          dataType : 'json',
          type : 'get',
          data : {
            nombre : nombre,
            proveedor : proveedor,
            costo : costo,
            venta : venta,
            stock : stock,
            stock_lim : stock_lim,
            barcode : barcode,
            tienda : tienda,
            porcentaje_comision : porcentaje_comision
          }
        })
        .done(function(response){
          if(response=="success"){
            M.toast({html : "Producto agregado", classes : "rounded"});
            nombre = document.getElementById('nombre').value = "";
            proveedor = document.getElementById('proveedor').value = "";
            costo = document.getElementById('costo').value = "0";
            venta = document.getElementById('venta').value = "0";
            stock = document.getElementById('stock').value = "0";
            stock_lim = document.getElementById('stock_lim').value = "0";
            barcode = document.getElementById('barcode').value = "";
            tienda = document.getElementById('tienda').value = "";
            tienda = document.getElementById('porcentaje_comision').value = "0";
            $("#ip_modal_close").click();
            recarga();
          }
        })
        .fail( function(jqXHR, textStatus, errorThrown, response){
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          console.log(response);
        })
      }
		}

		function daily(){
			$("#report_modal_close").click();
			$("#dailyReportModalContent").html("");
			$("#daily_open_modal").click();
			$.ajax({
				url : 'reports/daily',
				type : 'get'
			})
			.done(function(response){
				$('#dailyReportModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function day(){
			$("#report_modal_close").click();
			$("#dailyReportModalContent").html("");
			$("#daily_open_modal").click();
			var date = $("#datepicker1").datepicker({ dateFormat: "yyyy-mm-dd" }).val();
			console.log(date)
			$.ajax({
				url : 'reports/daily',
				type : 'get',
				data : {
					date : date
				}
			})
			.done(function(response){
				$('#dailyReportModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function monthly(){
			$("#report_modal_close").click();
			$("#monthReportModalContent").html("");
			$("#month_open_modal").click();
			$.ajax({
				url : 'reports/month',
				type : 'get'
			})
			.done(function(response){
				$('#monthReportModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function month(){
			$("#report_modal_close").click();
			$("#monthReportModalContent").html("");
			$("#month_open_modal").click();
			var month = document.getElementById('month_1').value; 
			var year = document.getElementById('year_1').value;
			$.ajax({
				url : 'reports/month',
				type : 'get',
				data : {
					month : month,
					year : year
				}
			})
			.done(function(response){
				$('#monthReportModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function yearly(){
			$("#report_modal_close").click();
			$("#yearReportModalContent").html("");
			$("#year_open_modal").click();
			$.ajax({
				url : 'reports/year',
				type : 'get'
			})
			.done(function(response){
				$('#yearReportModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function year(){
			$("#report_modal_close").click();
			$("#yearReportModalContent").html("");
			$("#year_open_modal").click();
			var date = document.getElementById('year_2').value;
			$.ajax({
				url : 'reports/year',
				type : 'get',
				data : {
					date : date
				}
			})
			.done(function(response){
				$('#yearReportModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function interval(){
			$("#report_modal_close").click();
			$("#dailyReportModalContent").html("");
			$("#daily_open_modal").click();
			var date1 = $("#datepicker2").datepicker({ dateFormat: "yyyy-mm-dd" }).val();
			var date2 = $("#datepicker3").datepicker({ dateFormat: "yyyy-mm-dd" }).val();
			$.ajax({
				url : 'reports/interval',
				type : 'get',
				data : {
					date1 : date1,
					date2 : date2
				}
			})
			.done(function(response){
				$('#dailyReportModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function alerta(){
			$("#report_modal_close").click();
			$("#alertReportModalContent").html("");
			$("#alert_open_modal").click();
			$.ajax({
				url : 'reports/alert',
				type : 'get'
			})
			.done(function(response){
				$('#alertReportModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function pay(){
			$("#payModalContent").html("");
			$("#pay_open_modal").click();
			var tienda = '{{ Auth::user()->nombre_tienda }}';
			console.log(tienda)
			$.ajax({
				url : 'plan/report',
				type : 'get',
				data : {
					tienda : tienda
				}
			})
			.done(function(response){
				$('#payModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function user_list(){
			$("#userModalContent").html("");
			$("#user_open_modal").click();
			$.ajax({
				url : 'admin/users',
				type : 'get'
			})
			.done(function(response){
				$('#userModalContent').html(response);
			})
			.fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
		}

		function construccion(){
			M.toast({html : "Función en construcción", classes : "rounded"});
		}

    function panb_res(){
      var date = document.getElementById('datepicker1').value;
      if(date == "Click aqui para fecha"){
        M.toast({html : "por favor, selecione una fecha", classes : "rounded"});
      }
      $.ajax({
        url : "{{ route('panb.res') }}",
        type : 'get',
        data : {
          fecha : date
        }
      })
      .done(function(response){
        $('#container_panb').html(response);
      })
      .fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
    }

    function picza_res(){
      var date = document.getElementById('datepicker2').value;
      if(date == "Click aqui para fecha"){
        M.toast({html : "por favor, selecione una fecha", classes : "rounded"});
      }
      $.ajax({
        url : "{{ route('pic.res') }}",
        type : 'get',
        data : {
          fecha : date
        }
      })
      .done(function(response){
        $('#container_panb').html(response);
      })
      .fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
    }

    function inv(){
      $.ajax({
        url : "{{ route('inv.res') }}",
        type : 'get'
      })
      .done(function(response){
        $('#container_panb').html(response);
      })
      .fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
    }

  function borra_panb(id,tienda,detalle,tipo_de_pago,total){
    var a = confirm("Desea borrar esta venta?");
    if ( a == true){
      var b = prompt("Ingrese motivo de borrado");
      $.ajax({
        url : "{{ route('borra.panb') }}",
        type : 'get',
        data : {
          id : id,
          tienda : tienda,
          motivo : b,
          detalle : detalle,
          tipo_de_pago : tipo_de_pago,
          total : total
        }
      })
      .done(function(response){
        if (response == 'success'){
          panb_res()
        }
      })
      .fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
    }
  }

  function borra_picza(id,tienda,detalle,tipo_de_pago,total){
    var a = confirm("Desea borrar esta venta?");
    if ( a == true){
      var b = prompt("Ingrese motivo de borrado");
      $.ajax({
        url : "{{ route('borra.picza') }}",
        type : 'get',
        data : {
          id : id,
          tienda : tienda,
          motivo : b,
          detalle : detalle,
          tipo_de_pago : tipo_de_pago,
          total : total
        }
      })
      .done(function(response){
        if (response == 'success'){
          picza_res()
        }
      })
      .fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
    }
  }

  function panb_errased(){
      $.ajax({
        url : "{{ route('panb.errased') }}",
        type : 'get'
      })
      .done(function(response){
        $('#container_panb').html(response);
      })
      .fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
    }

    function picza_errased(){
      $.ajax({
        url : "{{ route('picza.errased') }}",
        type : 'get'
      })
      .done(function(response){
        $('#container_panb').html(response);
      })
      .fail( function(jqXHR, textStatus, errorThrown, response){
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        console.log(response);
      })
    }

	

</script>