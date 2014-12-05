<?php
    //indicamos el tipo de cabezera a devolver para luego parsearlo desde validar.js
    header( 'Content-Type: application/json' );

    /*Incluimos el fichero de la clase Db*/
    require '../clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
    //valido si me enviaron informacion
    if(isset($_POST['data'])) {
        $result="";
        //creo un array con el nombre de mis tablas
        $tablesName=array("calendario"=>1,"canales"=>2,"categorias"=>3,"ciudad"=>4,"clientes"=>5,"colores"=>6, "contactos"=>7);
        //obtengo el numero de la tabla
        $clave=$_POST["table"];
        //obtengo el numero de la tabla
        $tabla=array_search($clave,$tablesName);
        $id=$_POST["ID"];
        
        //esto es para consultar el id y aumentarlo manualmente
        $sql = "SELECT count(*) rows FROM $tabla";
        
        /*Ejecutamos la query*/
        $stmt=$bd->ejecutar($sql);
        //obtengo el numero de registros
        $rowsNumber=$bd->obtener_fila($stmt,0,'');
        $rowsNumber=$rowsNumber["rows"];
        
        //aumento el numero ya que este numero se lo voy a mandar al id de la fila
        $rowsNumber++;
       
        //recibo los campos del formulario que fueron enviados por post
        $PostData=$_POST["data"];
        //adjunto el campo id al array que recibo por post
        $PostData[$id]=$rowsNumber;
         
        //parseo el formulario, obtengo los valores y los campos para insertarlos en la tabla
        $dataParseado=$bd->parsearArrayParaInsertar($PostData);
         
        $result=$bd->insertar($tabla,$dataParseado["campos"],$dataParseado["values"]);
        
        if($result){
             $data=array('id'=>true,'msj'=>"Registro guardado","addToView"=>false,'href'=>false);
             echo json_encode($data);
             return false;
        }else{
              $data=array('id'=>false,'msj'=>$dataParseado,"addToView"=>false,'href'=>false);
              echo json_encode($data);
              return false;
        }
       
    }else{
          $data=array('id'=>false,'msj'=>"No post data","addToView"=>false,'href'=>false);
          echo json_encode($data);
          return false;
        }
        
        
 