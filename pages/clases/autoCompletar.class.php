<?php
    /*Incluimos el fichero de la clase Db*/
    include('Db.class.php');
     /*Incluimos el fichero de la clase Conf*/
    include('Conf.class.php');
    
    class autoCompletar{
        //defino propiedades
        private $db="";
        private $tallas=array();
        private $tallasNuevas=array();
        private $colorAnterior=array();
        private $sku=array();
        private $sql="";
        private $rows=array();
        private $longitud=0;
        private $array=array();

        
       public function __construct($sql,$lp,$ref){
            $this->sql=$sql;
            //creo una instancia de la clase base de datos 
            //para utilizar las funciones de la clase
            $this->db=Db::getInstance();
            //seteo la query que se va a usar por defecto
            $this->setQuery($ref,$lp);
            //obtengo las filas
            $this->setRows();
       }
       
       private function setQuery($ref,$lp){
         //limpio la $referencia antes de adjuntarla a la consulta
         $ref=$this->db->escapar($ref);
         $lp=$this->db->escapar($lp);
         //recibo el parametro que va en la sql y lo adjunto a la sql
         if( 0 < strlen( $ref ) && 0 < strlen( $lp )  ){
            $sql=sprintf($this->sql,$lp,$ref);
         }else{
            $sql=sprintf($this->sql,$ref);
         }
         //seteo la nueva sql con el parametro a la propiedad
         $this->sql=$sql;
       }
       //metodo para obtener las filas segun la consulta de la propiedad sql
       private function setRows(){
           $stmt=$this->db->ejecutar($this->sql);
           while($row =$this->db->obtener_fila($stmt,0,'asociativo')){$this->rows[]=$row;}
           $this->longitud=count($this->rows);
       }
       //funcion para que hace de get para obtener la referencia
       public function getRef(){ return $this->setPriceBySku(); }
       
       public function getSizesByColor(){
           return $this->setSizesByColor();
       }
       //metodo super poderoso :) para armar un label y mandar todas las tallas segun un color
       private function setSizesByColor(){
         for($i=0;$i<$this->longitud;$i++){
            //inicializo las propiedades con los valores iniciales
            if($i==0){
               $this->colorAnterior=array("idColor"=>$this->rows[$i]["idColor"],"DescColor"=>$this->rows[$i]["DescColor"],"Referencia"=>$this->rows[$i]["Referencia"]);

            }
            //si el color anterior es igual al actual registro las tallas
            if($this->colorAnterior["idColor"]==$this->rows[$i]["idColor"]){
                $this->tallas[]=array("Talla"=>$this->rows[$i]["Talla"],"idSKu"=>$this->rows[$i]["idSKU"]);
            }
            //si me cambio la referencia entonces agrego las nuevas tallas en otro array
            else if($this->colorAnterior["idColor"]!=$this->rows[$i]["idColor"] ){
               $this->tallasNuevas=array("Talla"=>$this->rows[$i]["Talla"],"idSKu"=>$this->rows[$i]["idSKU"]);
            }
            //para que no me cambie los valores iniciales pongo la propiedad en false
            $this->actualizar=false;
            //si pasa de un color a otro entonces lo registro
            if(($this->colorAnterior["idColor"]!=$this->rows[$i]["idColor"]) || $i==($this->longitud-1)){
               //preparo el label que va a llevar la lista
               $label=$this->colorAnterior["idColor"].'-'.$this->colorAnterior["DescColor"];
               //preparo los valores del label
               $value=array("idColor"=>$this->colorAnterior["idColor"],"nombre"=>$this->colorAnterior["DescColor"],"Referencia"=>$this->colorAnterior["Referencia"],"Talla"=>$this->tallas);
               //inserto el label y los valores en la lista a mostrar
               $this->array[]=array("label"=>$label,"value"=>$value);
               
               //si cambio de color pero llego al final entonces inserto el nuevo valor
               if( ( $i==($this->longitud-1 ) ) && ( $this->rows[$i]["idColor"]!= $this->colorAnterior["idColor"] ) ){
                    //preparo el label que va a llevar la lista
                    $label=$this->rows[$i]["idColor"].'-'.$this->rows[$i]["DescColor"];
                    //preparo los valores del label
                    $value=array("idColor"=>$this->rows[$i]["idColor"],"nombre"=>$this->rows[$i]["DescColor"],"Referencia"=>$this->rows[$i]["Referencia"],"Talla"=>$this->tallasNuevas);
                    //inserto el label y los valores en la lista a mostrar
                    $this->array[]=array("label"=>$label,"value"=>$value);
               } 
               //reseteo el array de tallas
               $this->tallas=null;
               //le envio la talla que salio del nuevo
               $this->tallas[]=  $this->tallasNuevas;
               //actualizo el valor anterior
               $this->colorAnterior=array("idColor"=>$this->rows[$i]["idColor"],"DescColor"=>$this->rows[$i]["DescColor"],"Referencia"=>$this->rows[$i]["Referencia"]);
            }
            
         }//end for
         return json_encode($this->array);
      }//end function
      //funcion que sefun la referencia recibida, me busca los precios
      private function setPriceBySku(){
          //preparo el label que va a llevar la lista
         for($i=0;$i<$this->longitud;$i++){
             //acomulo los id y los precios para la referencia recibida
             $this->sku[]=array("idSKU"=>$this->rows[$i]["idsku"],"Precio"=>$this->rows[$i]["Precio"]);
            //si llega al ultimo registro, entonces almaceno el label y los valores
            if($i==($this->longitud-1)){
               //preparo el label que va a llevar la lista
               $label=$this->rows[$i]["Referencia"];
               //preparo los valores del label
               $value=array("Referencia"=>$this->rows[$i]["Referencia"],"Precio"=>$this->sku);
               //inserto el label y los valores en la lista a mostrar
               $this->array[]=array("label"=>$label,"value"=>$value);
             }
         }//end for
         return json_encode($this->array);
      }//end function
     
      
    }//end class
    
    
        
    
?>
