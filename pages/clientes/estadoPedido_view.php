<?php
 include_once '../../includes/header.php';
?>


<body> 

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
        <li><a href="#">Inicio</a></li>
        <li class="active">Clientes</li>
        <li><a href="informacioContacto_view.php">Información Contacto</a></li>
        <li class="active">Estado Pedido</li>
      </ol>
    </div>
    <div class="container"> 
    
    		    <div class="row">
        <div class="col-md-12">
          <div class="panel panel-visible">
            <div class="panel-heading">
              <div class="panel-title"> <i class="glyphicons glyphicons-cargo"></i> Estado de los pedidos</div>
            </div>
            <div class="panel-body">
              <table class="table table-striped table-bordered table-hover" id="datatable">
                <thead>
                  <tr>
                    <th>Estado</th>
                    <th>Nro Pedido</th>
                    <th>Fecha de entrega incial</th>
                    <th>Fecha entrega Final</th>
                    <th>Cantidad Pedida</th>
                    <th>Cantidad despachada</th>
                   
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>  
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 


<?php
 include_once '../../includes/footer.php';
?>