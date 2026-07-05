<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Punto de venta Innovática</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Let browser know website is optimized for mobile-->
      <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}" />
    <meta charset="UTF-8">
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <style>
        body{
            background-image: url("{{ asset('images/fondo.jpg')}}");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size:  cover;
        }
        #cont{
            backdrop-filter: blur(7px);
            margin-left : 50px;
            margin-right : 50px;
            background-color: rgba(0,0,0,0.5);
        }

        #logo{
            display: block;
            margin:  auto;
        }
        #lateral_1{
            -webkit-text-stroke: 0.5px black;
        }
        #medio_1{
            -webkit-text-stroke: 1px black;
        }
    </style>
</head>
<body>

    <nav>
    <div class="nav-wrapper blue darken-4">
      <a href="#" class="brand-logo">Punto de Venta Innovática</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        @if (Route::has('login'))
            <li>
            @auth
                <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Volver al punto de venta</a>
            @endauth
            </li>
        @endif
        @if (Route::has('register'))
            <li>
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Ingresar</a>
            </li>
            <li>
            
                <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Registrate</a>
            </li>
        @endif
      </ul>
    </div>
    </nav>
    <br>
    <div id="cont">
        <div class="row">
            <h1 class="white-text regular center" >¿Necesitas ayuda con tu negocio?</h1>
            <div class="col s4">
                <br>
                <img  id="logo" width="80%" src="{{asset('images/logo_white.png')}}">
                <h6 class="white-text center">Un sistema desarrollado en el sur de Chile.</h6>
                <img  id="logo" width="80%" src="{{asset('images/minat.png')}}">
            </div>
            <div class="col s8" id="lateral_1">
                <div class="col s12">
                    <h2 class="white-text bold-italic left">Un sistema en el que podrás: </h2>
                </div>
                <div class="col s8">
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Ingresar tus productos.</h5>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Ordenar tu stock.</h5>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Tener claridad de cuánto estas vendiendo.</h5>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Saber qué día vendiste más.</h5>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Saber cuáles son las horas donde vendiste más.</h5>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Generar una venta.</h5>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Cancelar una venta.</h5>
                    </div>
                </div>
                <div class="col s4">
                    <img  id="logo" width="80%" src="{{asset('images/truck.png')}}">
                </div>
                <div class="col s8">
                    <div class="col s12">
                        <h2 class="white-text bold-italic left">- Cambia la forma de vender: </h2>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Informes de venta diarios.</h5>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Informes de venta mensuales.</h5>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Informes de venta anuales.</h5>
                    </div>
                    <div class="col s12">
                        <h5 class="white-text bold-italic left">- Informes de venta por rango de fechas.</h5>
                    </div>
                </div>
                <div class="col s4">
                    <img  id="logo" width="80%" src="{{asset('images/bar.png')}}">
                    <h5 class="white-text center">¡Mira como suben tus ventas!</h5>
                </div>
                
            </div>
            <div class="col s12">
                <br>
                <br>
                <br>
                <div class="container">
                    <div class="col s12">
                        <h2 class="white-text regular center" >¡Escanea! ¡Imprime! ¡Registra! ¡Crece! ¡Gana!</h2>
                    </div>
                    <!-- <img  id="logo" width="80%" src="{{asset('images/innovatica.png')}}"> -->
                    <div class="col s4"><br><br>
                        <img class="right" id="logo" width="40%" src="{{asset('images/barcodegun.png')}}">       
                    </div>
                    <div class="col s4"><br><br>
                        <img  id="logo" width="40%" src="{{asset('images/barcode.png')}}">       
                    </div>
                    <div class="col s4"><br><br>
                        <img class="left" id="logo" width="40%" src="{{asset('images/printer.png')}}">       
                    </div>
                    <div class="col s12">
                        
                        <img class="center" id="logo" width="40%" src="{{asset('images/minat.png')}}">
                    </div>
                </div>
            </div>   
            <div id="medio_1" class="col s12">
                <br>
                <h1 class="white-text bold center">¡Únete a nosotros!</h1>
                <h3 class="white-text bold center">Un sistema de inventario que tiene todo lo que necesitas, a un precio que puedes pagar.</h3>

                <div class="col s4">
                    <img class="center" id="logo" width="90%" src="{{asset('images/emp2.png')}}"> 
                </div>
                <div class="col s4">
                    <img class="center" id="logo" width="80%" src="{{asset('images/innovatica.png')}}">
                </div>                
                <div class="col s4">
                    <img class="center" id="logo" width="90%" src="{{asset('images/emp.png')}}"> 
                </div>
            </div>           
        </div>        
    </div>
     <footer class="page-footer blue darken-4">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="white-text">Innovática, desarrollo y modernización</h5>
                <p class="grey-text text-lighten-4">Una empresa creada en el sur de Chile.</p>
              </div>
              <div class="col l4 offset-l2 s12">
                <h5 class="white-text">Nuestros Productos</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="http://www.empresainnovatica.cl">Página principal</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Punto de venta Innovática</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Restaurant Innovática</a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container">
            © Desarrollado por Innovática D.M. 2021
            <img class="right" id="logo" width="30%" src="{{asset('images/pagos-via-flow.png')}}"> 
            </div>
          </div>
        </footer>

</body>

<script>
    $(document).ready(function(){
        document.addEventListener('DOMContentLoaded', function(){
        M.AutoInit();
        var options = [
            {selector: '.class', offset: 200, callback: customCallbackFunc },
            {selector: '.other-class', offset: 200, callback: function() {
            customCallbackFunc();
        } },
    ];
  Materialize.scrollFire(options);

        });
    });

    </script>
</html>

