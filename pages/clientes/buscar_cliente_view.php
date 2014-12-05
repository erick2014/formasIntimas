<?php
//incluimos el head de la vista que carga los estilos
 include_once '../../includes/header.php';
 session_start();
 if(!isset($_SESSION["cedula"])){
     //si no ha iniciado session lo redirecciono
     echo "<script>alert('Es necesario iniciar session');</script>";
     echo"<script type='text/javascript'>window.location.href='../../index.php'</script>";
 }
?>

<body class="dashboard"> 
<input type="hidden" id="url_save_registro" value="consultarCliente.php" /> 
<!-- Start: Header -->
<?php include_once '../../includes/header_body.php'; ?>
<!-- End: Header --> 

<!-- Start: Main -->
<div id="main"> 

<?php 
 include_once '../../includes/menu_crm.php';
?>
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
         <li class="active">Clientes</li>
         <li class="active">Buscar</li>
      </ol>
    </div>
    
    <div class="container">
      <div class="row">	
		<!-- Inicio Formulario de b�squeda -->
            <div class="col-md-6">
              <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-search"></i> Buscar Cliente </div>
                </div>
                <div class="panel-body">
                  <form id="buscarCliente" class="form-horizontal form" method="post" role="form">
               
                    <div class="form-group">
                      <label for="nombre_cuenta" class="col-lg-2 control-label">Nombre</label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="data[Nombre]" class="form-control" placeholder="Escriba nombre del cliente">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="nombre_cuenta" class="col-lg-2 control-label">Cuenta</label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="data[nitCuenta]" class="form-control" placeholder="Escriba la cuenta">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="cc_nit" class="col-lg-2 control-label">C.C / NIT</label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="data[NIT]" class="form-control" placeholder="Escibe la C.C o NIT">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="razon_social" class="col-lg-2 control-label">Razón Social</label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="data[RazonSocial]" class="form-control" placeholder="Escriba la razón social">
                      </div>
                    </div>
                    
                    <div class="form-group">
                      <label for="almacen" class="col-lg-2 control-label">Almacen</label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="data[nombreAlmacen]" class="form-control" placeholder="Escriba el almacen">
                      </div>
                    </div>
                    
                      <div class="form-group">
                      <label for="Buscar_ciudad" class="col-lg-2 control-label">Ciudad</label>
                      <div class="col-lg-10">
                        <input type="text" id="inputStandard" name="data[Ciudad]" class="form-control" placeholder="Escriba la ciudad">
                      </div>
                    </div>
                    <div class="form-group">
                     <label for="botones" class="col-lg-2 control-label"></label>
                     <div class="col-lg-10">
	                    <button class="btn btn-default btn-gradient" type="button"><i class="glyphicons glyphicons-user_add"></i> Agregar propecto</button>
	                    <button class="btn btn-success btn-gradient" type="submit"><i class="fa fa-search"></i> Buscar cliente</button>
	             </div> 
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- Fin Formulario de busqueda -->
            
            <!-- Inicio panel de resultados -->
            <div class="col-md-6">
              <div class="panel">
                <div class="panel-heading">
                  <div class="panel-title"> <i class="fa fa-check-square-o"></i> Resultados de la busqueda </div>
                </div>
               <div class="panel-body">
               <!--tabla donde se van a mostrar las sucursales -->
               <table class="table">
                    <thead>
                      <tr id="encabezado">
                        <th>C.C / NIT</th>
                        <th>Sucursal</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td></td>
                        <td></td>
                      </tr>
                    </tbody>
              </table>
             <!--end table sucursales-->	
            	</div>
          </div>
            </div>
            
            <!-- Fin Panel de resultados -->

      </div>
    </div>
    
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 
            
<?php
 include_once '../../includes/footer.php';
?>