//en este objeto guardo la url y el id del div
var urlSite={urlDestination:"",idDiv:"",sucSelected:""};

$(document).ready(function(){
    //funcion para validar, si me enviaron una sucursal
    comprobarCampos();
    
    var url=$("#url_save_registro").val();
    $(".datepick").datepicker({ dateFormat: 'yy-mm-dd' });
    
    //funcion para validar y enviar los formularios
    $(".form").validate({
                submitHandler:function(){
                 //capturo la url
                 var url=$("#url_save_registro").val();
                 if(url === undefined){ url=urlSite.urlDestination;}
                 var data=$(".form").serialize();
                 //armo mi funcion ajax y envio el form por ajax :)
                $.ajax({
                  type:"POST",
                  url:url,
                  data:data,
                  success:function(j, k, l){
                         if(j.msj){ alert(j.msj);}
                         if(j.href){ window.location=j.href;}
                         if(j.id){
                               if(j.addToView){generarLinks(j.addToView);}
                               //como todo estuvo bien entonces cierro el dialogo
                               $("#"+urlSite.idDiv).dialog("close");
                         }
                 },
                 error: function() {
                     alert( 'Ocurrió un error en la comunicación con el servidor' );
                 }
               });
              
             }
     });//end validate form
     //
     //esta funcion es para un nuevo contacto pero tambien es general a otros formularios
    $(".Newboxui").click(function(){
       //capturo la informacion que hay dentro del alt del boton presionado
       var values=$(this).attr("alt");
       //convierto los valores del alt en un array
       values=values.split(" ");
       //obtengo el id del div que voy a cargar dentro del dialog
       urlSite.idDiv=values[0];
       //obtengo el titulo y se lo mando a la propiedad title del objeto qie se le pasa al dialog
       options.title=values[1];
       //obtengo la url del formulario que es abierto, sabiendo el id del formulario
       var url=$("#"+urlSite.idDiv+" #url_destination").val();
       //si hay un valor entonces le envio ese valor a la propiedad urlDestination del objeto urlsite
       if(url!=undefined){urlSite.urlDestination=url };
       //llamo el dialog con las opciones creadas en el archivo cuadroDialogo
       $("#"+urlSite.idDiv).dialog(options);
    });
    //funcion para hacer redirect
    prepareAndRedirect(null);
    
});//end document ready
 
function generarLinks(j){
   //remuevo las filas existentes
   $(".rowAdded").remove();
   //inserto las nuevas filas, que vienen desde el servidor
   $("#encabezado").after(j);
   //funcion para hacer la redireccion
   prepareAndRedirect();
  
}

//aca se prepara el link con el parametro y valor que van a la url y hace la redireccion
//para usar esta funcion se debe poner un alt dentro de la etiqueta con los valores: url,parametro,valor
function prepareAndRedirect(){
     //este listener se ejecuta cada hago click en un link con la clase linkClick
   $(".linkClick").click(function(){
       //obtengo todos los valores que necesito para hacer el redirect
       var value=$(this).attr("alt");
       //convierto los valores del alt en un array en el orden: url,parametro,valor
       value=value.split(",");
       //primero cuento los elementos para saber que tipo de url armar, si con un parametro o dos
       var longitud=value.length;
       if(longitud==5){
           //armo mi redireccion y la ejecuto
          window.location.href=value[0]+"?"+value[1]+"="+value[3]+"&"+value[2]+"="+value[4];
       }
       //verifico si me pasaron el valor que va a ir a la url
       else if(longitud==3){
             //armo mi redireccion y la ejecuto
             window.location.href=value[0]+"?"+value[1]+"="+value[2];
       }
       
   });
}
//compruebo que exista la sucursal y la lsita de precios
function comprobarCampos(){
    //compruebo si me mandaron la sucursal, si no muestro un mensaje
   var sucursal=parseInt($("#idSucursal").val());
   var lp=parseInt($("#idlp").val());
   if(sucursal==0){
       $("#divMessage").html("<p>Por favor seleccione una sucursal</p>");
       options.title="Informacion requerida!";
       $("#divMessage").dialog(options);
       funtionName="Redirect"; 
   }else if(lp==0){
       $("#divMessage").html("<p>Es necesario asignar una lista de precios a la sucursal</p>"+sucursal);
       options.title="Informacion requerida!";
       $("#divMessage").dialog(options);
       funtionName="close"; 
   }
}
//funcion que se ejecuta al presionar el boton ok de un dialog
function actionGeneral(action){
    if(action=="Redirect"){
        window.location.href="buscar_cliente_view.php"
    }else if(action=="close"){
        $("#divMessage").dialog("close");
    }
}


