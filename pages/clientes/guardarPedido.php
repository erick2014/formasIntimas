<?php
    //indicamos el tipo de cabezera a devolver para luego parsearlo desde validar.js
    header( 'Content-Type: application/json' );

    /*Incluimos el fichero de la clase Db*/
    require '../clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
    //valido si me enviaron informacion por post
    if(isset( $_POST['Referencia'] ) &&  isset( $_POST['Talla'] ) && isset( $_POST['idSucursal'] ) )
     {
        $result="";
        //obtengo el ultimo id de la tabla 
        $rowID=$bd->getIdTabla("idPedido","pedido");
        //aumento el numero ya que este numero se lo voy a mandar al id de la fila
        $rowID++;
       
        //recibo los campos del formulario que fueron enviados por post
        $referencias=$_POST["Referencia"];
        //$colorRef=$_POST["ColorRef"];
        $tallas=$_POST["Talla"];
        $idSku=$_POST['idSku'];
        $idSucu=$bd->escapar($_POST['idSucursal']);
        
        //antes de guardar el pedido verifico el id de la sucursal que recibi es real
        $sql="Select idSucursal from sucursales where idSucursal=$idSucu";
        //ejecuto la consulta anterior
        $stmt=$bd->ejecutar($sql);
        //obtengo el numero de registros
        $rowsNumber=mysql_num_rows($stmt);
        //si encontro el id de la sucursal, entonces continuamos con el proceso
        if($rowsNumber>0){
            //armo los campos para el insert
            $campos = "`idPedido`, `Descripcion`, `FechaEntrega`, `FechaPedido`,`idSucursal`";
            //armo los valores que van a llevar los campos anteriores
            $valores = " $rowID,'descripcion','','".date("Y-m-d")."',$idSucu ";
            //inserto el registro y capturo el resultado de la operacion
            $result=$bd->insertar("pedido",$campos,$valores);
            //si ingreso el registro entonces indico que todo estuvo bien
            if($result){
                //salvo el id del pedido 
                $idPedido=$rowID;
                //obtengo el consecutivo de la tabla detalle pedido
                $rowID=$bd->getIdTabla("idDetallePedido","detalle_pedido");
                //aumento el numero ya que este numero se lo voy a mandar al id de la fila
                $rowID++;
                //armamos los campos que va a llevar el encabezado del pedido
                $campos = "`idDetallePedido`, `idPedido`, `idSku`, `cantidad` ";
                //cuento el numero de tallas que me mandaron
                $tallasSize=count($tallas);
                //con este ciclo recorro las filas de los sku
                for($i=0;$i<$tallasSize;$i++){
                    //recorro las columnas para las tallas
                        for($j=0; $j < count( $tallas[$i] ); $j++ ){
                            ( 0 < strlen( $tallas[$i][$j] ) )? $tallas[$i][$j] : $tallas[$i][$j]=0;
                             //pregunto si la talla no esta en cero
                              if($tallas[$i][$j]>0){
                                $sku=$idSku[$i][$j];
                                $talla=$tallas[$i][$j];
                                //armo los valores que van a ir a la tabla
                                $valores = " $rowID,$idPedido,$sku,$talla";
                                //inserto el registro y capturo la respuesta
                                $result=$bd->insertar("detalle_pedido",$campos,$valores);
                                //si hubo un error al insertar, entonces retorno falso
                                if(!$result){return false; }
                                    //aumento el id de la tabla detalle pedido
                                $rowID++;
                             }
                        }
                        
                }
                if($result){
                    $data=array('id'=>true,'msj'=>"Registro guardado! ","addToView"=>false,'href'=>false);
                    echo json_encode($data);
                    return false;
                }else{
                    $data=array('id'=>false,'msj'=>"Hubo un error al guardar!","addToView"=>false,'href'=>false);
                    echo json_encode($data);
                    return false;
                }
                
            }
            //si hubo un error entonces indico que no guardo
            else{
                $data=array('id'=>false,'msj'=>"Registro no guardado","addToView"=>false,'href'=>false);
                echo json_encode($data);
                return false;
                }
        }else{
            $data=array('id'=>false,'msj'=>"La sucursal que intenta guarda no es valida","addToView"=>false,'href'=>false);
            echo json_encode($data);
            return false;
        }
         
       
    }else{
          $data=array('id'=>false,'msj'=>"No post data from pedido","addToView"=>false,'href'=>false);
          echo json_encode($data);
          return false;
        }
        
        
 