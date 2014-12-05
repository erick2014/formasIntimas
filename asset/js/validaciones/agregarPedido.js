//creo este objeto para contener:el codigo de color, la talla asociada a ese codigo
// tambien contengo el id del formulario para saber en que formulario en que campo se insertaran los valores
var objRef = {tallas: [], idForm: "", idColorActual: "", filaActual: 0,precios:[],totalCantidades:0,acumCantidades:[],selectColores:"",prueba:""};
//contador para filas agregadas dinamicamente
contAddedRow = 0;

$(document).ready(function() {
    //reseteo campos que pertenescan a esta clase
    $(".reset").val("");
  
    //llamo a la funcion para calcular las cantidades
    calcularCantidades();

    //llamamos la funcion del auto completar para que esta a la espera
    autoComplete(".panel-body");

    //cuando se da click en el boton agregar en el pedido, entonces se agrega una nueva fila
    $("#addRowPedido").click(function() {
        var rowAdded = "";
        contAddedRow++;
        //aumento el valor darle otra posision en el array a los datos de la nueva fila insertados
        rowAdded += '<div class="row form-group" id="containerTallas' + contAddedRow + '" alt="' + contAddedRow + '">' +
                '<div class="col-xs-2" alt="containerTallas' + contAddedRow + '">' +
                '<label>Referencia</label>' +
                '<input type="text" name="Referencia[' + contAddedRow + ']" id="Referencia" class="form-control buscar required">' +
                '<input type="hidden" name="idSku[' + contAddedRow + ']" id="idSku" class="form-control buscar reset">' +
                '</div>' +
                '<div class="col-xs-2">' +
                '<label>Cód. Color</label>' +
                '<input type="text" name="ColorRef[' + contAddedRow + ']" id="ColorRef" class="form-control buscar2 required">' +
                '</div>' +
                '<div class="col-xs-1" id="fmcolor" style="padding-right:200px">' +
                '<label>Color</label>' +
                '<input disabled="" type="text" name="showColorRef" id="showColorRef" class="form-control" style="width:200px">' +
                '</div>' +
                '</div>';
        $("#containerTallas" + (contAddedRow - 1)).after(rowAdded);

    });//end add row
    
  
    
});//end document ready
//en esta funcion es para realizar un autocompletar por la referencia
function autoComplete(contenedor) {
    $(contenedor).delegate(".buscar", "focusin", function() {
        var lp=$("#idlp").val();
        var suc=$("#idSucursal").val();
        $(this).autocomplete({
            source: function(request, response) {
                $.ajax({
                    type: "POST",
                    url: "../clases/autoCompletar.php",
                    dataType: "json",
                    data: {findRef: request.term,lp:lp,suc:suc},
                    success: function(data) {
                        response(data);
                    }
                });
            },
            minLength: 4,
            select: productoSeleccionado

        });
    });//end autocomplete
}
//esta funcion hace parte del autocompletar pero solo se encarga de enviar el valor al campo y mostrar la lista de valores
function productoSeleccionado(event, ui) {
    //recibo la lista de items a mostrar
    var sku = ui.item.value;
    //le paso la lista de items al campo sobre el que escribio la referencia
    $(this).val(sku.Referencia);
    //envio al objeto objRef, el id del formulario sobre el cual estoy situado
    objRef.idForm = $(this).closest("div").attr("alt");
    //con el id del formulario anterior se donde poner los valores de los campos
    $("#" + objRef.idForm + " #Referencia").val(sku.Referencia);
    $("#" + objRef.idForm + " #idSku").val(sku.idSKU);
    //seteo los precios recibidos, segun la referencia seleccionada
    objRef.precios=sku.Precio;
    event.preventDefault();
    //llenarDetalle(sku.Referencia);
    //lleno el select, con
    procesarSelect(sku.Referencia);
   
}

//con esto mostramos la lsita para los colores                                
function productoSeleccionado2(data){
    //guardo las tallas y colores dentro del objeto tallas
    objRef.tallas=data;
    //vacio lo que hay en el div donde va a ir el select
    $("#" + objRef.idForm + " #fillInSelect").empty();
    //remuevo el select vacio
    $("#" + objRef.idForm + " #fillInSelect #ColorRef").remove();
    //dibujo el select que voy a insertar
    dibujar_Select(data);
    //inserto el select que dibuje
    $("#" + objRef.idForm + " #fillInSelect").append(objRef.selectColores);
     //obtengo el numero de fila sobre el cual se va a trabajar
     objRef.filaActual = parseInt($("#" + objRef.idForm).attr("alt"));
    //si se vuelve a seleccionar otro item sobre la misma linea, 
    //entonces borro el item existente a traves de la clase sizeAdded
     $("#" + objRef.idForm + " .sizeAdded").remove();
    //event.preventDefault();
    //una vez se seleccione el color dibujo las tallas
//    //dibujarTallas();
    //detecta cuando se selecciona un color y dibuja las tallas
    detectarSeleccionColor();
   
}

function procesarSelect(referencia){
 
   $.ajax({
                type: "POST",
                url: "../clases/autoCompletar.php",
                dataType: "json",
                data: {findColor: referencia},
                success: function(data) {
                    objRef.tallas = [];
                    objRef.idColorActual = "";
                    //recorro la info obtenida de la consulta y la guardo en un objeto
                    for (var campos in data) {
                      //guardo las tallas encontradas en la propiedad de un onjeto que es de tipo array
                      objRef.tallas[campos]={"Talla":data[campos]["value"]["Talla"],idColor:data[campos]["value"]["idColor"],color:data[campos]["value"]["nombre"]};
                    }
                   productoSeleccionado2(objRef.tallas);
                }
          });
         

}

function dibujar_Select(){
    var colores="<label>Cod. Color</label><select id='ColorRef' class='form-control' style='width:200px'><option value=''>Seleccionar</option>";
    for(var i in objRef.tallas){
        colores+="<option value='"+objRef.tallas[i]["idColor"]+"'>"+objRef.tallas[i]["idColor"]+"-"+objRef.tallas[i]["color"]+"</option>";
    }
    colores+="</select>";
    objRef.selectColores=colores;
}

function detectarSeleccionColor(){
    $("#" + objRef.idForm + " #fillInSelect #ColorRef").change(function(){
      
      var tallas = "";
      var cont = 0;
     //seteo el color actual, cuando se seleccion un color
     objRef.idColorActual = $(this).val();
     dibujarTallas();
   
    });
}

//con esta funcion diubujo los cuadros para las tallas segun la referencia                    
function dibujarTallas() {
    var tallas = "";
    var cont = 0;
    //primero recorro las filas de cada color recibido
    for (var campo in objRef.tallas) {
        //pregunto si el id del color que va en el contador, es igual al seleccionado en la vista
        if (objRef.tallas[campo]["idColor"] == objRef.idColorActual) {
            for(var i in objRef.tallas[campo]["Talla"]){
                 //empiezo a recorrer el array
            tallas += '<div class="col-xs-1 sizeAdded" id="size'+objRef.filaActual+i+'" style="text-align:center" >' +
                    '<label>' + objRef.tallas[campo]["Talla"][i]["Talla"] + '</label>' +
                    '<input type="text" name="Talla[' + objRef.filaActual + '][' + i + ']" class="form-control required" id="size'+objRef.filaActual+i+'"  alt="idSku'+objRef.filaActual+i+'" >' +
                    '<input type="hidden" name="idSku[' + objRef.filaActual + '][' + i + ']" id="idSku'+objRef.filaActual+i+'" class="form-control" value="' + objRef.tallas[campo]["Talla"][i]["idSKu"] + '" >' +
                   '</div>';
            }
           
        }
    }
    //inserto el cuadro de la talla 
    $("#" + objRef.idForm).append(tallas);

    
}
 function calcularCantidades(){
    $("#TotalUnidades").click(function(){
        var cant=0;
        var idsku=0;
        var total=0;
        console.log(objRef.totalCantidades);
        //cade que se detecta un cambio entoncs nos recorremos todos los input para capturar las cantidades
        objRef.totalCantidades=0;
        $(".sizeAdded").each(function(){
            var valor=$(".sizeAdded #"+this.id).val();
            idsku=$(".sizeAdded #"+this.id).attr("alt");
            idsku=$(".sizeAdded #"+idsku).val();
            valor=parseInt(valor);
            if( !isNaN( valor ) ){ 
                objRef.totalCantidades+=valor;
                objRef.acumCantidades[cant]={idsku:idsku,cantidad:valor};
                cant++;
            }
        });
        $("#TotalUnidades").val(objRef.totalCantidades);
        console.log(objRef.precios);
       for(var cantidades in objRef.acumCantidades){
          
           cant=objRef.acumCantidades[cantidades].cantidad;
           idsku=objRef.acumCantidades[cantidades].idsku;
           for(var i in objRef.precios){
               var id=objRef.precios[i].idSKU;
               var precio=objRef.precios[i].Precio;
               if(id==idsku){
                   total+=parseInt(precio*cant);
                   total=total.toFixed(2);
                   $("#containerTotales #Total").val("$"+total);
                   break;
               }
           }
           
       }
   });
}

    //cuando se digite la cantidad en cada talla, captudo el id y luego la cantidad
//    $(".sizeAdded").change(function(){
//        //cade que se detecta un cambio entoncs nos recorremos todos los input para capturar las cantidades
//        objRef.totalCantidades=0;
//        $(".sizeAdded").each(function(){
//            var id=this.id;
//            var valor=$(".sizeAdded #"+id).val();
//            valor=parseInt(valor);
//            if( !isNaN( valor ) ){ objRef.totalCantidades+=valor; }
//            
//        });
//       $("#TotalUnidades").val(objRef.totalCantidades);
//       console.log(objRef.tallas);
//    });
   