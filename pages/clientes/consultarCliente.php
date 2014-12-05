<?php
    /*Incluimos el fichero de la clase Db*/
    require '../clases/Db.class.php';
    //indicamos el tipo de cabezera a devolver para luego parsearlo desde validar.js
    header( 'Content-Type: application/json' );
    session_start();
    $idVendedor=$_SESSION["id"];
    $sql="";
   
     error_reporting(E_ALL);
 ini_set('display_errors', 1);
    
    
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
    //valido si me enviaron informacion
    if(isset($_POST['data']) ) {
        //fucion que me devuelve el campo y valor a usar para la consulta
        $criterio=get_Criterio( $_POST[ 'data' ],$bd );
        $criterio=$criterio["cadena"];
        //realizo la consulta del cliente segun el criterio que devuelve la funncion getCriterio
        $sql.="SELECT s.idSucursal,s.nombreAlmacen,s.Cupo,c.Nombre ";
        $sql.=" FROM sucursales s";
        $sql.=" JOIN clientes c ON s.idCliente=c.idCliente";
        $sql.=" JOIN cuentas cuenta on cuenta.idCuenta=c.idCuenta";
        $sql.=" JOIN ciudad city ON s.idCiudad=city.idCiudad";
        $sql.=" WHERE %s  AND s.idVendedor=%s";
        $sql=  sprintf($sql,$criterio,$idVendedor);

        //ejecuto la consulta
        $stmt=$bd->ejecutar($sql);
        //si encontro un registro, quiere decir que tenemos informacion disponible para mostrar
        if($stmt){
            //creo un array donde voy a insertar cada uno de los registros
            $dataRow="";
            while($row=$bd->obtener_fila($stmt,0,'asociativo')){
              //Pregunto si dentro de los criterios recibidos esta la cuenta
              if( isset( $criterio['Cuenta'] ) ){
                //genero los links que voy a mostrar en la vista con js
                $dataRow.="<tr class='rowAdded'><td><a href='#' alt='infoContacto_view.php,nitSucursal,".$row['idSucursal']."' class='linkClick' >".$row['idSucursal']."</a></td><td>".$row['nombreAlmacen']."</td><td>".$row['Nombre']."</td></tr>";
              }else{
                $dataRow.="<tr class='rowAdded'><td><a href='#' alt='infoContacto_view.php,nitSucursal,".$row['idSucursal']."' class='linkClick' >".$row['idSucursal']."</a></td><td>".$row['nombreAlmacen']."</td></tr>";
              }
           }
           
            $data=array('id'=>true,'msj'=>'mierda','addToView'=>$dataRow,'href'=>false);
            //encodeo el array como notacion json para luego utilizarlo en validar.js
            echo json_encode($data);
            return false;
        }else{
              //indico que no hay informacion para mostrar
              $data=array('id'=>false,'msj'=>'No se encontraron concidencias',"addToView"=>false,'href'=>false);
              echo json_encode($data);
              return false;
             }
    }else{
          $data=array('id'=>false,'msj'=>"No se recibio informacion","addToView"=>false,'href'=>false);
          echo json_encode($data);
          return false;
       }
        
 //funcion para devolver el campo y criterio de busqueda que se va a utilizar
 //segun el parametro que se envia desde la vista
 function get_Criterio( $dataCriterio = null, $bd=null ) {
     $criterio = array();
     $cadena="";
         foreach( $dataCriterio as $key => $value ){
             //limpiamos la cadena
             $value= $bd->escapar( $value );
             
             if( 0 < strlen( $dataCriterio[ $key ] ) ) {
                 if($cadena!=""){
                     if($key=="Nombre"){
                         $cadena.=" AND ".$key." like"."'%$value%'"; 
                     }else{
                         $cadena.=" AND ".$key."="."'$value'"; 
                     }
                 }
                 else{ 
                     if($key=="Nombre"){
                          $cadena.=$key." like"."'%$value%'";
                     }
                     else{
                         $cadena.=$key."="."'$value'";
                         
                     }
                 }
                 if($key=='nitCuenta'){
                    $criterio["Cuenta"]=$value;
                 }
             }
         }
     $criterio["cadena"]=$cadena;
     return $criterio;
  }