<?php
 include_once '../includes/header.php';
 //compruebo que se haya iniciado la session
  session_start();
  if(!isset($_SESSION["cedula"])){
     //si no ha iniciado session lo redirecciono
     echo "<script>alert('Es necesario iniciar session');</script>";
     echo"<script type='text/javascript'>window.location.href='../index.php'</script>";
 }
?>

<body class="dashboard"> 

<!-- Start: Header -->
<header class="navbar navbar-fixed-top">
  <div class="pull-left"> <a class="navbar-brand" href="index.php">
    <div class="navbar-logo"><img src="../asset/img/logos/logoCRM.png" class="img-responsive" alt="logo"/></div>
    </a> </div>
  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-1"></button>
  <div class="pull-right header-btns">
    <div class="messages-menu">
      <button type="button" class="btn btn-sm dropdown-animate" data-toggle="dropdown"> <span class="glyphicon glyphicon-comment"></span> <b>1</b> </button>
      <ul class="dropdown-menu checkbox-persist" role="menu">
        <li class="menu-arrow">
          <div class="menu-arrow-up"></div>
        </li>
        <li class="dropdown-header">Mensajes recientes <span class="pull-right glyphicons glyphicons-comment"></span></li>
        <li>
          <ul class="dropdown-items">
            <li>
              <div class="item-avatar"><img src="../asset/img/avatars/user.png" class="img-responsive" alt="avatar" /></div>
              <div class="item-message"><b>Juan</b> - <small class="text-muted">12 Minutos</small><br />
                Hola Mundo!</div>
            </li>
          </ul>
        </li>
        <li class="dropdown-footer"><a href="messages.html">Ver todos los mensajes <i class="fa fa-caret-right"></i> </a></li>
      </ul>
    </div>
    <div class="alerts-menu">
      <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown"> <span class="glyphicons glyphicons-bell"></span> <b>2</b> </button>
      <ul class="dropdown-menu checkbox-persist" role="menu">
        <li class="menu-arrow">
          <div class="menu-arrow-up"></div>
        </li>
        <li class="dropdown-header">Alertar recientes <span class="pull-right glyphicons glyphicons-bell"></span></li>
        <li>
          <ul class="dropdown-items">
            
            <li>
              <div class="item-icon"><i style="color: #5cb85c;" class="fa fa-check"></i> </div>
              <div class="item-message"><a href="#">Andres <b>Tarea completada</b> - Se completo la ruta establecida</a></div>
            </li>
            <li>
              <div class="item-icon"><i style="color: #f0ad4e" class="fa fa-user"></i> </div>
              <div class="item-message"><a href="#"><b>Exito</b> Pedido aprobado para el cliente</a></div>
            </li>
          </ul>
        </li>
        <li class="dropdown-footer"><a href="#">Ver todas las alertas <i class="fa fa-caret-right"></i> </a></li>
      </ul>
    </div>
    <div class="tasks-menu">
      <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown"> <span class="glyphicons glyphicons-tag"></span> <b>2</b> </button>
      <ul class="dropdown-menu dropdown-checklist checkbox-persist" role="menu">
        <li class="menu-arrow">
          <div class="menu-arrow-up"></div>
        </li>
        <li class="dropdown-header">Tareas recientes <span class="pull-right glyphicons glyphicons-tag"></span></li>
        <li>
          <ul class="dropdown-items">
           
            <li>
              <div class="item-icon"><i class="fa fa-phone"></i> </div>
              <div class="item-message text-slash"><a>Contactar el cliente para realizar visita</a></div>
              <div class="item-label"><span class="label label-info">Normal</span></div>
              <div class="item-checkbox">
                <input class="checkbox row-checkbox" type="checkbox">
              </div>
            </li>
            <li>
              <div class="item-icon"><i class="fa fa-group"></i> </div>
              <div class="item-message text-slash"><a>Reunión con coordinador de area</a></div>
              <div class="item-label"><span class="label label-success">Realizado</span></div>
              <div class="item-checkbox">
                <input class="checkbox row-checkbox" type="checkbox">
              </div>
            </li>
          </ul>
        </li>
        <li class="dropdown-footer"><a href="#">Ver todas las tareas <i class="fa fa-caret-right"></i> </a></li>
      </ul>
    </div>
    <div class="btn-group user-menu">
      <!--usuario que accede al sistema-->
      <button type="button" class="btn btn-sm dropdown-toggle" data-toggle="dropdown"> <span class="glyphicons glyphicons-user"></span> <b><?php if( isset( $_SESSION["Nombres"] ) ){ echo $_SESSION["Nombres"]; }?></b> </button>
      <!--- -->
      <button type="button" class="btn btn-sm dropdown-toggle padding-none" data-toggle="dropdown"> <img src="../asset/img/avatars/user.png" alt="user avatar" width="28" height="28" /> </button>
      <ul class="dropdown-menu checkbox-persist" role="menu">
        <li class="menu-arrow">
          <div class="menu-arrow-up"></div>
        </li>
        <li class="dropdown-header">Su cuenta <span class="pull-right glyphicons glyphicons-user"></span></li>
        <li>
          <ul class="dropdown-items">
            <li>
              <div class="item-icon"><i class="fa fa-envelope-o"></i> </div>
              <a class="item-message" href="#">Mensajes</a> </li>
            <li>
              <div class="item-icon"><i class="fa fa-calendar"></i> </div>
              <a class="item-message" href="#">Calendario</a> </li>
            <li class="border-bottom-none">
              <div class="item-icon"><i class="fa fa-cog"></i> </div>
              <a class="item-message" href="#">Configuración</a> </li>
            <li class="padding-none">
             
              <div class="dropdown-signout"><i class="fa fa-sign-out"></i> <a href="login.html">Salir</a></div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</header>
<!-- End: Header --> 


<!-- Start: Main -->
<div id="main"> 
  <!-- Start: Sidebar -->
<?php include_once '../includes/menu_crm.php'; ?>
  <!-- End: Sidebar --> 
  
  
  <!-- Start: Content -->
  <section id="content">
    <div id="topbar">
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i></a></li>
      </ol>
    </div>
    
    <div class="container">
      <div class="row">
      </div>
    </div>
    
  </section>
  <!-- End: Content --> 
</div>
<!-- End: Main --> 
            
            
<?php
 include_once '../includes/footer.php';
?>


