<?php
    class Db{
        private $host;
        private $db;
        private $user;
        private $pass;
        private $con;
        private $ConnectionStatus;
        
        static function getInstance(){
            return new static;
        }
        private function __construct(){
           $this->setParameters();
           $this->connect();
        }
        
        private function setParameters(){
           $this->host="localhost";
           $this->db="crm_movil";
           $this->user="root";
           $this->pass="";
        }
        
        private function connect(){
            try{
                $this->con=  mysqli_connect( $this->host, $this->user, $this->pass, $this->db );
                if(!$this->con){
                    $this->ConnectionStatus=false;
                    throw new Exception("Error en la conexion");
                }else{
                    $this->ConnectionStatus=true;
                }
             }catch (Exception $e){
                 echo $e->getMessage();  
              }
        }
        //funcion para ejecutar una funcion y retornar la info obtenida
        public function ejecutar($sql){
             //primero pregunto si la conexion se pudo establecer
             if($this->ConnectionStatus){
                 //ejecuto la query y almaceno el resultado en la propiedad rows
                 $resultado=mysqli_query($this->con,$sql);
                 if($resultado){
                    //si se obtuvo filas de la consulta devuelvo la data
                     if( mysqli_num_rows( $resultado ) > 0 ) return $resultado;
                    //si no se obtuvieron resultados, seteo a cero la propiedad 
                    else  return $resultado=0;
                 }else{
                     return 0;
                 }
             }else{
                return 0;
             }
        }
        //funcion para obtener las filas de la data que me pasen
        public function obtener_fila($data=null,$fila=null,$arraytype=null){
            //si no necesito una fila en especifica ejecuto esto
            if($fila!=0 || $fila!=null){
                mysqli_data_seek($data,$fila);
            }
            //verifico el tipo de array que voy a devolver
            if( $arraytype=='asociativo' ) $row= mysqli_fetch_assoc( $data );
            else if($arraytype=="")$row= mysqli_fetch_array( $data );
            //si me manda una fila en especifico, la obtengo
            return $row;
        }
        //funcion para limpiar cadenas
        public function escapar( $valor ) {
        return mysqli_real_escape_string($this->con,$valor);
       } 

        
    }//end class
     
?>
