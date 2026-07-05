<!DOCTYPE html
<html>
<head>
	<meta charset="utf-8">
	<title>@yield('title')</title>
	<!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <link rel="icon" type="image/png" href="{{asset('images/minat.png')}}"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
</head>
<body>
	@yield('content')
	 <footer class="page-footer white">
          <div class="container">
            <div class="row">
              <div class="col l6 s12">
                <h5 class="black-text">Punto de venta Innovática</h5>
                <p class="black-text text-lighten-4">Versión 2.0.0</p>
              </div>
              <!--<div class="col l4 offset-l2 s12">
                <h5 class="white-text">Links</h5>
                <ul>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 2</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 3</a></li>
                  <li><a class="grey-text text-lighten-3" href="#!">Link 4</a></li>
                </ul>
              </div> -->
            </div>
          </div>
          <div class="footer-copyright">
            <div class="container black-text">
            © 2021 Copyright Text
            </div>
          </div>
        </footer>
</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    var height = $(window).height();

    document.addEventListener('DOMContentLoaded', function(){
      M.AutoInit();
      var collapsibleElem = document.querySelector('.collapsible');
      var collapsibleInstance = M.Collapsible.init(collapsibleElem, options);

      $(document).ready(function() {
        M.updateTextFields();
      });
    });
  });
  </script>