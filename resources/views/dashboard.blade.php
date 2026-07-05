@extends('layouts.navigation')

@section('content')
<style type="text/css">
    #logo{
        display: block;
        margin:  auto;
    }
</style> 
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
@if(Auth::user()->s_activo == "si")

<div class="col s12 grey lighten-5">
    <div class="col s12 grey lighten-1">
        <div class="col s12 ">
            <p><strong>Bienvenido(a) {{Auth::user()->name}} {{ Auth::user()->apellidos}}</strong></p>
        </div>
    </div>
    <div class="col s12" id="container_panb">

    </div>
</div>
    

@else
    <div class="col s12">
        <h2 class="blue-text text-darken-4 center">Cuenta desactivada</h2>
        <h4 class="black-text text-darken-4 center">Las funciones básicas se han desactivado, no podrás hacer movimientos dentro del sistema</h4>
        <h4 class="black-text text-darken-4 center">Por favor, contactate con soporte para saber por que ocurre esto</h4>
        
    </div>
@endif

<script>
    function printReport(){
        $.ajax({
            url : "print/report",
            type : 'get'    
        })
        .done( function(response){
            M.toast({html : "Se está imprimiendo el resumen de caja", classes : "rounded"});
        })
        .fail( function(jqXHR, textStatus, errorThrown,response){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                    console.log(response);
                })
        document.getElementById("bc").focus();
    }
    function recarga(){ 
        $.ajax({
            url : "producto/tablaVentas"        
        })
        .done( function(response){
            $('#tabla_ventas').html(response);
        })
        .fail( function(jqXHR, textStatus, errorThrown,response){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                    console.log(response);
                })
        document.getElementById("bc").focus();
    }

    function cabecera(){
        $.ajax({
            url : "general/dailyValues"
        })
        .done( function(response){
            console.log(response)
            $('#cabecera').html(response);
        })
        .fail( function(jqXHR, textStatus, errorThrown,response){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                    console.log(response);
                })

    }

    function agrega() {
            var bc = document.getElementById('bc').value;
            var cantidad1 = document.getElementById('cantidad1').value;
            if(bc==""){
                M.toast({html: "No ha ingresado un codigo de barra", classes : "rounded"});
            } else{
                $.ajax({
                    url : 'producto/add/barcode',
                    type : 'get',
                    dataType : 'json',
                    data : {
                        barcode:bc,
                        cantidad1 : cantidad1
                    }
                })
                .done(function(response){
                    if(response=="errorStock"){
                        M.toast({html: "Stock en cero, imposible agregar!", classes : "rounded"}); 
                    } else if(response=="404"){
                        M.toast({html: "Código de barra inexistente!", classes : "rounded"}); 
                    } else{
                        var barcode = document.getElementById('barcode').value = "";
                        M.toast({html: "Producto Agregado!", classes : "rounded"}); 
                        recarga();  
                        document.getElementById("bc").focus(); 
                    }
                })
                .fail( function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                })
            }
         }
    
    $('body').on('keypress', '#bc', function(args) { 
        if (args.keyCode == 13) { 
            $('#boton_add').click(); 
            document.getElementById('bc').value = "";
            return false; 
        } 
    });
    function granel() {
            var det_gr = document.getElementById('det_gr').value;
            var precio_granel = document.getElementById('precio_granel').value;
            if(bc==""){
                M.toast({html: "No ha ingresado un codigo de barra", classes : "rounded"});
            } else{
                $.ajax({
                    url : 'producto/add/granel',
                    type : 'get',
                    dataType : 'json',
                    data : {
                        det_gr:det_gr,
                        precio_granel : precio_granel
                    }
                })
                .done(function(response){
                    var barcode = document.getElementById('det_gr').value = "";
                    var barcode = document.getElementById('precio_granel').value = 0;
                    M.toast({html: "Producto Agregado!", classes : "rounded"}); 
                    recarga();  
                    document.getElementById("barcode").focus(); 
                })
                .fail( function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                })
            }
         }
    function borra(id){
        var resp = confirm("Desea borrar este elemento?");
        if(resp == true){
            $.ajax({
                url : "producto/borraDeBoleta",
                type : "get",
                dataType : "json",
                data : {
                    id : id
                }
            })
            .done( function(response){
                if(response=="borrado"){
                    M.toast({html: "Elemento Borrado", classes : "rounded"});
                    recarga();
                }
            })
            .fail( function(jqXHR, textStatus, errorThrown){
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            })
        }
    }
    function busca_producto(){
        var clave = document.getElementById('buscador').value;
        $.ajax({
            url : "producto/busca/product",
            type : "GET",
            data : {
                clave : clave
            }
        })
        .done(function(response){
            $('#modalButtonBusqueda').click();
            $('#busqueda').html(response);
            document.getElementById('buscador').value = "";
        })
        .fail( function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        })
    }
    function agrega_por_busqueda(id){
        var cant = prompt("Que cantidad desea ingresar?","1");  
        if (cant != 0){
            cantidad = parseInt(cant);
            var resp = confirm("Esta seguro que los datos son correctos?");
            if(resp==true){
                agrega2(id,cantidad);
                $('#busqueda').html("");
                $('#modal_busqueda_a').click();
            }        
        }
    }
    function agrega2(barcode,cantidad){
        $.ajax({
            url : "producto/add/barcode", 
            type: "GET",
            dataType: "json",
            data : {
                barcode : barcode,
                cantidad1 : cantidad
            }
        })
        .done( function(response){
            if(response=="errorStock"){
                M.toast({html: "Stock en cero, imposible agregar!", classes : "rounded"}); 
            } else if(response=="404"){
                M.toast({html: "Código de barra inexistente!", classes : "rounded"}); 
            } else{
                var barcode = document.getElementById('barcode').value = "";
                M.toast({html: "Producto Agregado!", classes : "rounded"}); 
                recarga();  
                document.getElementById("barcode").focus(); 
            }
            
            
        })
        .fail( function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        })
    }
    function detalles_producto2(barcode){
        $.ajax({
            url : "producto/details",
            type : "GET",
            data : {
                barcode : barcode
            }
        })
        .done( function(response){
            $('#details').html(response);
            $("#modal_button").click();

        })
        .fail( function(jqXHR, textStatus, errorThrown){
                console.log(jqXHR);
                console.log(textStatus);
                console.log(errorThrown);
            })
    }
    function editar_producto(barcode){
        $.ajax({
            url : "producto/change",
            type : "GET",
            data : {
                barcode : barcode
            }
        })
        .done( function(response){
            $('#details').html(response);
            $("#modal_button").click();

        })
        .fail( function(jqXHR, textStatus, errorThrown, response){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            console.log(response);
        })
    }
    function add_stock(barcode){
        $.ajax({
            url : "producto/add/stock",
            type : "GET",
            data : {
                barcode : barcode
            }
        })
        .done( function(response){
            $('#details').html(response);
            $("#modal_button").click();

        })
        .fail( function(jqXHR, textStatus, errorThrown, response){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            console.log(response);
        })
    }
    function borrar_producto(barcode){
        $.ajax({
            url : "producto/borra",
            type : "GET",
            data : {
                barcode : barcode
            }
        })
        .done( function(response){
            $('#details').html(response);
            $("#modal_button").click();

        })
        .fail( function(jqXHR, textStatus, errorThrown, response){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            console.log(response);
        })
    } 
    function concluye(){
        var pago = document.getElementById('tipodepago').value;
        if(pago == ""){
            M.toast({html : "seleccione una forma de pago por favor", classes : "rounded"});
        } else{
            var resp = confirm("Esta seguro que quiere concluir la venta?");
            if ( resp == true){
                var boleta = confirm("Desea imprimir comprobante de pago?");
                $.ajax({
                    url : "end/sale",
                    type : "get",
                    dataType : 'json',
                    data : {
                        pago : pago,
                        boleta : boleta
                    }
                })
                .done( function(response){
                    if(response == "success"){
                        M.toast({ html : "venta concluida", classes : "rounded"})
                        recarga();
                    }
                })
                .fail( function(jqXHR, textStatus, errorThrown){
                    console.log(jqXHR);
                    console.log(textStatus);
                    console.log(errorThrown);
                })
            }
        }
        cabecera();      
    }
    function tienda(){
                
        if ('{{Auth::user()->nombre_tienda}}' == "no definida"){
            var razon_social;
            var rut;
            var correo;
            var direccion;
            var telefono;
            var id = '{{Auth::user()->id}}';
            console.log(id)
            var nombre_tienda = prompt("Como se llama tu tienda?","");
            if(nombre_tienda != ""){
                razon_social = prompt("Razón social","");
                if(razon_social != ""){
                    rut = prompt("Rut Comercial","");
                    if(rut != ""){
                        correo = prompt("Correo de la tienda","");
                        if(correo != ""){
                            direccion = prompt("Dirección","");
                            if(telefono != ""){
                                telefono = prompt("Teléfono","");
                                if(nombre_tienda != ""){
                                    $.ajax({
                                        url : 'insert/local',
                                        type : 'get',
                                        dataType : 'json',
                                        data : {
                                            nombre_tienda : nombre_tienda,
                                            razon_social : razon_social, 
                                            rut : rut,
                                            correo : correo,
                                            direccion : direccion,
                                            telefono : telefono,
                                            id : id
                                        }
                                    })
                                    .done(function(response){
                                        if(response == "success"){
                                            alert("Se ha registrado con éxito la tienda");
                                        }
                                    })
                                    .fail( function(jqXHR, textStatus, errorThrown){
                                        console.log(jqXHR);
                                        console.log(textStatus);
                                        console.log(errorThrown);
                                    })
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    function oferta_num(){
    var oferta_conc = prompt("Ingrese el monto que desea descontar del total");
    $.ajax({
        url : "oferta.php",
        type : "GET",
        dataType : "json",
        data : {
            oferta_conc : oferta_conc
        }
    })
    .done(function(response){
        console.log(response);
        if(response=="correcto"){
            M.toast({html : "Oferta actualizada", classes : "rounded"});
            recarga();
        }
    })
    .fail( function(jqXHR, textStatus, errorThrown,response){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
            console.log(response);
        })


}

function oferta_prc(){
    var oferta_porc = prompt("Ingrese el porcentaje de descuento");
    if (oferta_porc<0 || oferta_porc>100){
        M.toast({html : "El valor del porcentaje debe estar entre 0 y 100"});
    }
    else{
        $.ajax({
            url : "oferta.php",
            type : "GET",
            dataType : "json",
            data : {
                oferta_porc : oferta_porc
            }
        })
        .done(function(response){
            if(response=="correcto"){
                M.toast({html : "Oferta actualizada", classes : "rounded"});
                recarga();
            }
        })
        .fail( function(jqXHR, textStatus, errorThrown){
            console.log(jqXHR);
            console.log(textStatus);
            console.log(errorThrown);
        })

    }
}
    tienda()
    recarga();
    cabecera();
</script>
<script>
        document.addEventListener('DOMContentLoaded', function(){
            M.AutoInit();

              $(document).ready(function() {
                M.updateTextFields();
              });
        })
</script>

@endsection
