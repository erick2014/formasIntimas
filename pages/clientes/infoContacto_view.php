<?php
 //incluimos la cabezera del html
 include_once '../../includes/header.php';
 $nitSucursal="";
 //verificamos si se envio el parametro por la url
 if( isset( $_GET["nitSucursal"] ) && 0< strlen( $_GET["nitSucursal"] ) ){   
      session_start();
     /*Incluimos el fichero de la clase Db*/
     require '../clases/Db.class.php';
     /*Incluimos el fichero de la clase Conf*/
     require '../clases/Conf.class.php';
     /*Creamos la instancia del objeto. Ya estamos conectados*/
     $bd=Db::getInstance();
     //creamos una variable para contener la fila extraida de la consulta
     $row="";
     //limpiamos el parametro obtenido de la url de cualquier  contenido malicioso
     $nitSucursal=$bd->escapar($_GET['nitSucursal']);
     //armamos la consulta
     $sql = sprintf( 'SELECT s.idSucursal, city.Ciudad,z.DescZona,c.NIT,c.RazonSocial,c.Nombre,c.Apellido,c.Telefono,c.Celular,c.Direccion
	               FROM sucursales s 
	               JOIN clientes c ON s.idCliente=c.idCliente
                       JOIN ciudad city ON s.idCiudad=city.idCiudad 
                       JOIN zonas z ON z.idZona=s.idZona
                       WHERE s.idSucursal=%s',
                       $nitSucursal
                    );
     //ejecuto la consulta
     $stmt=$bd->ejecutar($sql);
     //obtengo el numero de registros
     $rowsNumber=mysql_numrows($stmt);
     //si encontro un registro, quiere decir que tenemos informacion disponible para mostrar
     if($rowsNumber>0){
         //obtengo la fila de la consulta
         $row=$bd->obtener_fila($stmt,0,'');
     }
 }
 
?>

<body class="dashboard"> 
<!-- Start: Header -->
<?php include_once '../../includes/header_body.php'; ?>
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
         <li class="active">Clientes</li>
         <li class="active">Información Contacto</li>
      </ol>
    </div>
    
    <div class="container">
      <div class="row">
		
      <!-- Información de cliente -->
      	<div class="row">
	        <div class="col-md-4">
	          <div class="panel">
	            <div class="panel-heading">
	              <div class="panel-title"> <i class="fa fa-th-large"></i>Información de cliente </div>
	            </div>
                    <!--panel body-->
	            <div class="panel-body">
                        <div class="input-group">
                          <label class="">Razón social</label>
                            <p class="form-control-static text-muted"><?php echo 0<strlen(isset($row["RazonSocial"])&& 0< strlen($row["RazonSocial"]))? $row["RazonSocial"]: "ninguno";?></p>
                        </div>

                        <div class="input-group">
                          <label class="text-right">C.C / NIT</label>
                            <p class="form-control-static text-muted"><?php echo 0<strlen(isset($row["NIT"])&& 0< strlen($row["NIT"]))? $row["NIT"]: "ninguno";?></p>
                        </div>

<!--                     <div class="input-group">
                          <label class="text-right">Cuenta</label>
                            <p class="form-control-static text-muted"></p>
                        </div>-->

                        <div class="input-group">
                          <label class="text-right">Teléfono</label>
                            <p class="form-control-static text-muted"><?php echo 0<strlen(isset($row["Telefono"])&& 0< strlen($row["Telefono"]))? $row["Telefono"]: "ninguno";?></p>
                        </div>

                        <div class="input-group">
                          <label class="text-right">Celular</label>
                            <p class="form-control-static text-muted"><?php echo 0<strlen(isset($row["Celular"])&& 0< strlen($row["Celular"]))? $row["Celular"]: "ninguno";?></p>
                        </div>

                        <div class="input-group">
                          <label class="text-right">Correo Electrónico</label>
                            <p class="form-control-static text-muted"><?php echo 0<strlen(isset($row["Email"])&& 0< strlen($row["Email"]))? $row["Email"]: "ninguno";?></p>
                        </div>

                         <div class="input-group">
                          <label class="text-right">Dirección</label>
                            <p class="form-control-static text-muted"><?php echo 0<strlen(isset($row["Direccion"])&& 0< strlen($row["Direccion"]))? $row["Direccion"]: "ninguno";?></p>
                        </div>

                         <div class="input-group">
                          <label class="text-right">Ciudad</label>
                            <p class="form-control-static text-muted"><?php echo 0<strlen(isset($row["Ciudad"])&& 0< strlen($row["Ciudad"]))? $row["Ciudad"]: "ninguno";?></p>
                        </div>

                         <div class="input-group">
                          <label class="text-right">Zona</label>
                            <p class="form-control-static text-muted"><?php echo 0<strlen(isset($row["DescZona"])&& 0< strlen($row["DescZona"]))? $row["DescZona"]: "ninguno";?></p>
                        </div>

                        <hr class="short margin-top-none">
                        <h3>Contactos</h3>
                       <button type="button" class="btn btn-primary Newboxui" data-toggle="modal" alt="AgregarContacto Nuevo Contacto"><i class="glyphicons glyphicons-user_add"></i> Agregar nuevo contacto</button>
                    </div>
                   <!--end panel body-->
	          </div>
	        </div>
	       <!-- fin Información de cliente -->
	        
	        <!-- Formulario para compras del cliente -->
	        <div class="col-md-8">
	          <div class="panel">
	            <div class="panel-heading">
	              <div class="panel-title"> <i class="fa fa-th-large"></i>Panel de acciones </div>
	            </div>
	            <div class="panel-body">
	            	<div class="cont_iconos">
                            <span class="infocon_agregarpedido"><img src="../../asset/img/form/agregar_pedido.jpg"><br><span><a href="#" class="linkClick" alt="agregarPedido_view.php,idSucursal,<?php echo $nitSucursal;?>">Agregar Pedido</a></span></span>
	            		<span class="infocon_devolucion"><img alt="Devolución" src="../../asset/img/form/devolucion.jpg"><br><span>Devolución</span></span>
	            		<span class="infocon_despaEstadopedido"><a href="estadoPedido_view.php"  title="Despachos Estado Pedido"><img alt="Despachos Estado Pedido" src="../../asset/img/form/estado.jpg"></a><br><span><a href="estadoPedido_view.php"  title="Despachos Estado Pedido">Despachos Estado Pedido</a></span></span>
	            		<span class="infocon_descuento"><a href="#clienDescuento" data-toggle="modal" title="Descuento"><img alt="Descuento" src="../../asset/img/form/descuento.jpg"></a><br><span><a href="#clienDescuento" data-toggle="modal" title="Descuento">Descuento</a></span></span>
	            		<span class="infocon_verFotos"><a href="#compraPedido" data-toggle="modal" title="Ver Fotos"><img alt="Ver Fotos" src="../../asset/img/form/foto.jpg"></a><br><span><a href="#compraPedido" data-toggle="modal" title="Ver Fotos">Ver Fotos</a></span></span>
	            	</div>
	            </div>
	            <form class="form-horizontal"  role="form">
	            <div class="form-group">
                      <label class="col-lg-4 control-label" for="inputStandard">Subir foto o archivos</label>
                      <div class="col-lg-6">
                        <input type="file" id="inputStandard">
                      </div>
               </div>
               </form>
               
               <!-- Información para realizar pedido -->
               
               <div class="infoConc_informacioCompra">
               		<div class="row">
			        <div class="col-md-6">
			          <div class="panel">
			            <div class="panel-heading">
			               <i class="glyphicons glyphicons-globe_af"></i> Sucursales 
			            </div>
			            <div class="panel-body">
			            .....
			            </div>
			          </div>
			        </div>
			        <div class="col-md-6">
			          <div class="panel">
			            <div class="panel-heading">
			              <i class="glyphicons glyphicons-cart_in"></i> Motivo no compra 
			            </div>
			            <div class="panel-body">
			            ...
			            </div>
			          </div>
			        </div>
		      	</div>
               </div>	
               
                <div class="infoConc_informacioCompra">
               		<div class="row">
			        <div class="col-md-6">
			          <div class="panel">
			            <div class="panel-heading">
			             <i class="glyphicons glyphicons-calendar"></i>  Fechas especiales
			            </div>
			            <div class="panel-body">
			            .....
			            </div>
			          </div>
			        </div>
			        <div class="col-md-6">
			          <div class="panel">
			            <div class="panel-heading">
			              <i class="glyphicons glyphicons-calculator"></i> Cartera 
			            </div>
			            <div class="panel-body">
			            ...
			            </div>
			          </div>
			        </div>
		      	</div>
               </div>	
               
                <div class="infoConc_informacioCompra">
               		<div class="row">
			        <div class="col-md-6">
			          <div class="panel">
			            <div class="panel-heading">
			             <i class="glyphicons glyphicon-tasks"></i>  Tareas
			            </div>
			            <div class="panel-body">
			            <p class="text-danger">Agregar imágenes de la exhibición</p>
			            <p class="text-danger">Medidas aviso exterior</p>
			            </div>
			          </div>
			        </div>
			        <div class="col-md-6">
			          <div class="panel">
			            <div class="panel-heading">
			             <i class="fa fa-times-circle"></i> Deserción
			            </div>
			            <div class="panel-body">
			            ...
			            <p><button class="btn btn-primary" type="button">Agregar</button></p>
			            </div>
			          </div>
			        </div>
		      	</div>
               </div>	
               
               
               <!-- Fin Formulario para realizar pedido -->
	          </div>
	        </div>
	        <!-- Fin Formulario para compra de clientes -->
	        
	        <!-- Formulario compra o pedido -->
				<div class="modal fade" id="compraPedido" tabindex="-1" role="dialog" aria-labelledby="compraPedidoLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">Foto o Archivo</h4>
				      </div>
				      <div class="modal-body">
				        <form class="form-horizontal" role="form">
				           <div class="form-group">
                     		 <label for="TipoFoto" class="col-md-2 control-label">Título</label>
		                      <div class="col-md-9">
		                        <select class="form-control" name="TipoFoto" id="TipoFoto">
		                          <option>Nombre foto 1</option>
		                          <option>Nombre foto 2</option>
		                          <option>Nombre foto 3</option>
		                          <option>Nombre foto 4</option>
		                          <option>Nombre foto 5</option>
		                        </select>
		                      </div>
                    	 </div>
                    	 <div class="form-group">
                     		<label for="DescImagen" class="col-lg-2 control-label">Descripción</label>
		                      <div class="col-lg-9">
		                        <textarea rows="3" id="DescImagen" name="DescImagen" class="form-control"></textarea>
		                      </div>
                    	</div>
				        </form>
				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				        <button type="button" class="btn btn-primary">Guardar</button>
				      </div>
				    </div>
				  </div>
				</div>
			<!-- Fin Formulario compra o pedido -->
			
			<!-- Formulario descuento -->
			
				<div class="modal fade bs-modal-sm" id="clienDescuento" tabindex="-1" role="dialog" aria-labelledby="clienDescuentoLabel" aria-hidden="true">
				  <div class="modal-dialog modal-sm">
				    <div class="modal-content">
				      <div class="modal-header">
				        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				        <h4 class="modal-title" id="myModalLabel">Descuento</h4>
				      </div>
				      <div class="modal-body">
				        <table class="table">
		                    <thead>
		                      <tr>
		                        <th>Tipo</th>
		                        <th>Porcentaje</th>
		                      </tr>
		                    </thead>
		                    <tbody>
		                      <tr>
		                        <td>
		                        <table>
		                         <tbody>
		                         	<tr>
		                         	  <td>General</td>		                         	  
		                         	</tr>
		                         	<tr>
		                         		<td>Ref. 05481</td>
		                         	</tr>
		                         </tbody>
		                        </table>
		                        
		                        </td>
		                        <td>
		                        	<table>
		                         <tbody>
		                         	<tr>
		                         	  <td><p class="text-danger">10%</p></td>
		                         	</tr>
		                         	
		                         	<tr>
		                         		<td><p class="text-danger">25%</p></td>
		                         	</tr>
		                         </tbody>
		                        </table>		                        		                        
		                        </td>		                        
		                      </tr>
		                      <tr>
		                        <td>
		                        <table>
		                         <tbody>
		                         	<tr>
		                         	  <td>General</td>		                         	  
		                         	</tr>
		                         	<tr>
		                         		<td>Ref. 05481</td>
		                         	</tr>
		                         </tbody>
		                        </table>
		                        </td>
		                        <td>
		                        	
		                        	<table>
		                         <tbody>
		                         	<tr>
		                         	  <td><p class="text-danger">10%</p></td>
		                         	</tr>
		                         	
		                         	<tr>
		                         		<td><p class="text-danger">25%</p></td>
		                         	</tr>
		                         </tbody>
		                        </table>		     
		                        </td>		                       
		                      </tr>
		                      <tr>
		                        <td>
		                        	 <table>
		                         <tbody>
		                         	<tr>
		                         	  <td>General</td>		                         	  
		                         	</tr>
		                         	<tr>
		                         		<td>Ref. 05481</td>
		                         	</tr>
		                         </tbody>
		                        </table>
		                        </td>
		                        <td>
		                          
		                        	<table>
		                         <tbody>
		                         	<tr>
		                         	  <td><p class="text-danger">10%</p></td>
		                         	</tr>
		                         	
		                         	<tr>
		                         		<td><p class="text-danger">25%</p></td>
		                         	</tr>
		                         </tbody>
		                        </table>		     
		                        </td>
		                      </tr>
		                    </tbody>
		                  </table>
		                  
		                  <p><button class="btn btn-success btn-gradient" type="button"><i class="fa fa-check"></i> Agregar</button></p>
                  
				      </div>
				    </div>
				  </div>
				</div>
			
			<!-- Fin Formulario descuento -->
		
      </div>
    </div>
    </div>
    
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 


<?php
 include_once '../../includes/footer.php';
 //agregamos la vista de nuevo contacto
 include_once 'nuevoContacto_view.php';
?>