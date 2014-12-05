<?php
     /*Incluyo la clase para auto completar*/
    require 'autoCompletar.class.php';
    
    //recibo por post la referencia a buscar
    if (isset($_POST["findRef"])){
       
        //capturo la referencia del sku
        $ref=$_POST["findRef"];
        //capturo la lista de precios
        $lp=$_POST["lp"];
        
         $sql="select listaprecio_detalle.idListaPrecio,sku.idsku,sku.Referencia,listaprecio_detalle.Precio
               from  sku
               inner join listaprecio_detalle on  sku.idsku = listaprecio_detalle.idsku 
               where  listaprecio_detalle.idListaPrecio in(%s) and sku.Referencia='%s'";
            //instancio la clase autoCompletar
        $objAutoComplete=new autoCompletar($sql,$lp,$ref);
     
        //ejecuto la funcion que me trae las referencias y la imprimo
        echo $objAutoComplete->getRef();

    }
    else if(isset($_POST["findColor"])){
        
        $ref=$_POST["findColor"];
        
        $sql="SELECT s.Referencia,s.Talla,c.idColor,c.DescColor,s.idSKU FROM crm_movil.sku s
              join colores c on c.idColor=s.idColor
              where s.Referencia='%s' order by c.idColor";
	//instancio la clase autoCompletar
        $objAutoComplete=new autoCompletar($sql,"",$ref);
        //ejecuto la funcion que me trae las referencias y la imprimo
        echo $objAutoComplete->getSizesByColor();
        
    }
    
    
 
      
  ?>