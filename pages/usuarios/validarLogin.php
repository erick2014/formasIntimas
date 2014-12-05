<?php

    /*Incluimos el fichero de la clase Db*/
    require '../clases/Db.class.php';
  
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
    //consultamos si la cedula y la clave existe en la base de datos
    $sql="select count(*) as rows,cedulaNit,usuario,tipoUsuario,token,Nombres,idVendedor 
           from usuario_sistema 
           inner join vendedores ON vendedores.Cedula=usuario_sistema.cedulaNit
           where usuario='".$_POST['cedula']."' and clave='".$_POST['clave']."' ";
    //ejecuto la consulta
    $stmt=$bd->ejecutar($sql);
  
    //si encontro un registro, quiere decir que el usuario existe, entonces lo dejamos entrar al sistema
    if($stmt){
            //obtengo la fila
             $rows=$bd->obtener_fila($stmt,0,'asociativo');
             session_start();
             //si se pudo iniciar una session, entonces inicializo los datos de la session
             $_SESSION['cedula']=$rows["cedulaNit"];
             $_SESSION['usuario']=$rows["usuario"];
             $_SESSION['tipoUsuario']=$rows["tipoUsuario"];
             $_SESSION['Nombres']=$rows["Nombres"];
             $_SESSION['id']=$rows["idVendedor"];
            //genero un array con las opciones a utilizar dentro del archivo validar.js
            $data=array('id'=>true,'msj'=>"Bienvenido al sistema","href"=>"pages/index.php","addToView"=>false);
    }
    //si no encontro el usuario entonces no lo dejamos pasar
    else{
        //genero un array con las opciones a utilizar dentro del archivo validar.js
        $data=array('id'=>false,'msj'=>"Usuario o clave incorrecta","href"=>"","addToView"=>false);
    } 
    //indicamos el tipo de cabezera a devolver para luego parsearlo desde validar.js
    header( 'Content-Type: application/json' );
    //encodeo el array como notacion json para luego utilizarlo en validar.js
    echo json_encode($data);
?>

