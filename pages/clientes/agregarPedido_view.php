<?php
 //inserto la cabecera del archivo que me carga todos los estilos
 include_once '../../includes/header.php';
 $idSucursal="";
 //verificamos si se envio el parametro por la url
 if( isset( $_GET["idSucursal"] ) && 0< strlen( $_GET["idSucursal"] ) ){ 
    session_start();
    /*Incluimos el fichero de la clase Db*/
    require '../clases/Db.class.php';
    /*Incluimos el fichero de la clase Conf*/
    require '../clases/Conf.class.php';
    /*Creamos la instancia del objeto. Ya estamos conectados*/
    $bd=Db::getInstance();
    $row=array();
    $idSucursal=$bd->escapar($_GET["idSucursal"]);
    
    //consulto el cliente y el vendedor de la sucursal que me enviaron
    $sql="SELECT s.idCliente,v.Nombres vendedorName,c.Nombre clienteName,s.idSucursal,s.nombreAlmacen,lps.idListaPrecio
          FROM sucursales s 
          JOIN clientes c ON c.idCliente=s.idCliente
          JOIN vendedores v ON v.idVendedor=s.idVendedor
          JOIN listaprecio_sucursales lps ON lps.idSucursal=s.idSucursal
          WHERE s.idSucursal=$idSucursal";
    
    //ejecuto la consulta
    $stmt=$bd->ejecutar($sql);
    //obtengo el numero de registros
    $rowsNumber=mysql_numrows($stmt);
    //verifico que halla encontrado resultados
    if($rowsNumber>0){ while($fila=$bd->obtener_fila($stmt,0,'asociativo')){$row[]=$fila;} }
 }
?>

<body> 
    <div id="divMessage"></div>
    <input type="hidde" id="idlp" value="<?php echo isset($row[0]["idListaPrecio"])? $row[0]["idListaPrecio"]:"" ?>">
<!-- Start: Header -->
<?php
//inserto el banner del sitio
include_once '../../includes/header_body.php'; ?>
<!-- End: Header --> 

<!-- Start: Main -->
<div id="main"> 
  <!-- Start: Sidebar -->
<?php include_once '../../includes/menu_crm.php'; ?>
  <!-- End: Sidebar --> 
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
        <li><a href="#">Inicio</a></li>
        <li class="active">Clientes</li>
        <li><a href="informacioContacto_view.php">Información Contacto</a></li>
        <li class="active">Agregar Pedido</li>
      </ol>
    </div>
    <div class="container"> 
       <!-- Información de cliente y cupo disponible -->
     <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-body">
               
            </div>
          </div>
        </div>
      </div>
       <!-- Fin Información de cliente y cupo disponible  -->
       
       <!-- Formulario de compra de cliente -->
       	<div class="row">
            
        <!--formulario informacion del cliente-->
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title"> <i class="glyphicons glyphicons-shopping_cart"></i> Encabezado </div>
            </div>
              
            <div class="panel-body">
               <input id="url_save_registro" type="hidden" value="guardarPedido.php">
               <form role="form" class="form-horizontal form">
                  <!--indo cliente-->
                  <div class="row form-group" id="containerPedido" >
                      <div class="col-xs-2" >
                        <label>Sucursal</label>
                        <input type='text' disabled="disabled"  value='<?php echo isset($row[0]['nombreAlmacen'])? $row[0]["nombreAlmacen"]:"" ?>' class='form-control required' style="width:300px"/>
                        <input type='hidden' name='idSucursal' id='idSucursal' value='<?php echo $idSucursal?>' class='form-control required'>
                      </div>
                      <div class="col-xs-2" style="padding-left: 150px">
                        <label >Cliente</label>
                        <label  disabled="disabled" class="form-control required" style="width:300px" ><?php echo isset($row[0]["clienteName"])? $row[0]["clienteName"]:"";?></label>
                      </div>
                      <div class="col-xs-2" style="padding-left: 300px">
                        <label>Vendedor</label>
                        <label  disabled="disabled" class="form-control required" style="width:300px" ><?php echo isset($row[0]["vendedorName"])? $row[0]["vendedorName"]:""    ;?></label>
                      </div>
                  </div>
                  <!--end info cliente-->
              </form>

          </div>
        </div>
       </div>
        <!fin formulario informacion cliente-->
            
       	<!-- Formulario de compra -->
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title"> <i class="glyphicons glyphicons-shopping_cart"></i>Detalle Pedido </div>
            </div>
            <div class="panel-body">
               <input id="url_save_registro" type="hidden" value="guardarPedido.php">
               <form role="form" class="form-horizontal form">
                 <!--container sku-->
                  <div class="row form-group" id="containerTallas0" alt="0">
                      <div class="col-xs-2" alt="containerTallas0">
                        <label>Referencia</label>
                        <input type="text" name="Referencia[0]" id="Referencia" class="form-control buscar reset required">
                      </div>
                      <div class="col-xs-2" id="fillInSelect" style="width:250px" >
                        <label>Cód. Color</label>
                         <!--<input type="text" name="ColorRef[0]" id="ColorRef" class="form-control buscar2 reset required">-->
                        <select name="ColorRef[0]" id="ColorRef" class="form-control reset required" style="width:200px;"><option value="">Seleccionar</option></select>
                      </div>
                      <!-- casilla para mostrar el color seleccionado
                      <div class="col-xs-1" style="padding-right:200px">
                         <label>Color</label>
                         <input disabled="" type="text" name="showColorRef" id="showColorRef" class="form-control reset" style="width:200px">
                      </div>
                      -->
                   </div>
                 <!--end container sku -->
                    <hr class="agpseparador">
                    <div class="row form-group" id="containerTotales" >
                      <div class="col-xs-2" >
                        <label>Total unidades</label>
                        <input type="text" id="TotalUnidades"  class="form-control reset">
                      </div>
                      <div class="col-xs-2">
                        <label>Total</label>
                        <input type="text" id="Total" disabled="disabled" class="form-control reset">
                      </div>
                    </div>
                    <hr class="agpseparador">
                    <p>
                       <button class=" btn btn-gradient btn-success" id="addRowPedido" type="button">Agregar</button>
                       <button class="btn btn-primary btn-gradient" type="submit">Guardar</button>
                    </p>
              </form>

          </div>
        </div>
      </div>
        
       <!-- Fin Formulario de compra -->
       <!-- Fin Formulario de compra de cliente -->
       
       <!-- Información de compra -->
     <div class="row">
        <div class="col-md-12">
          <div class="panel">
            <div class="panel-heading">
              <div class="panel-title"> <i class="fa fa-th-large"></i> Cantidades </div>
            </div>
            <div class="panel-body">
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Referencia</th>
                      <th>Colores</th>
                      <th>XXS</th>
                      <th>XS</th>
                      <th>S</th>
                      <th>M</th>
                      <th>L</th>
                      <th>XL</th>
                      <th>XXL</th>
                      <th>Única</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="xedit">005600</span></td>
                      <td><span class="xedit">300</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                    </tr>
                     <tr>
                      <td><span class="xedit">005600</span></td>
                      <td><span class="xedit">300</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                    </tr>
                    <tr>
                      <td><span class="xedit">005600</span></td>
                      <td><span class="xedit">300</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                    </tr>
                  </tbody>
                </table>
                <hr>
                <table class="table table-striped table-bordered table-hover">
                  <thead>
                    <tr>
                      <th>Referencia</th>
                      <th>Colores</th>
                      <th>2</th>
                      <th>4</th>
                      <th>6</th>
                      <th>8</th>
                      <th>10</th>
                      <th>12</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><span class="xedit">R0108</span></td>
                      <td><span class="xedit">300</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                    </tr>
                     <tr>
                      <td><span class="xedit">R0108</span></td>
                      <td><span class="xedit">300</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                    </tr>
                    <tr>
                      <td><span class="xedit">R0108</span></td>
                      <td><span class="xedit">300</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                      <td><span class="xedit">100</span></td>
                    </tr>
                  </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
       <!-- Fin Información de compra -->
       <footer>......</footer>
     </div>
     </div>
      </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 


<?php
 include_once '../../includes/footer.php';
 //inserto el javascript con las funcionalidadse del pedido
 echo '<script type="text/javascript" src="'.v().'asset/js/validaciones/agregarPedido.js"></script>';
 
?>
    
    