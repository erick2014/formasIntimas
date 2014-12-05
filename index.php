<!DOCTYPE html>
<html lang="es">
<head>
<!-- Meta, title, CSS, favicons, etc. -->

<title>CRM Formas Intimas</title>
<meta charset="utf-8">
<meta name="keywords" content="" />
<meta name="description" content="">
<meta name="author" content="abcdsign">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Font CSS  -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700">

<!-- Core CSS  -->
<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="asset/fonts/glyphicons_pro/glyphicons.min.css">

<!-- Theme CSS -->
<link rel="stylesheet" type="text/css" href="asset/css/theme.css">
<link rel="stylesheet" type="text/css" href="asset/css/pages.css">
<link rel="stylesheet" type="text/css" href="asset/css/plugins.css">
<link rel="stylesheet" type="text/css" href="asset/css/responsive.css">

<!-- Boxed-Layout CSS -->
<link rel="stylesheet" type="text/css" href="asset/css/boxed.css">

<!-- Demonstration CSS -->
<link rel="stylesheet" type="text/css" href="asset/css/demo.css">

<!-- Your Custom CSS -->
<link rel="stylesheet" type="text/css" href="asset/css/custom.css">

<!-- Favicon -->
<link rel="shortcut icon" href="img/favicon.ico">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<input type="hidden" id="url_save_registro" value="pages/usuarios/validarLogin.php" /> 
<body class="login-page"> 
<!-- Start: Main -->
<div id="main">
  <div class="container">
    <div class="row">
      <div id="page-logo"> <img src="asset/img/logos/logoCRM.png" class="img-responsive" alt="logo"> </div>
    </div>
    <div class="row">
      <div class="panel">
        <div class="panel-heading">
          <div class="panel-title"> <i class="fa fa-lock"></i> Iniciar Sesion </div>
           </div>
        <form class="cmxform form" id="altForm" method="get">
          <div class="panel-body">
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-user"></i> </span>
                <input type="text" class="form-control phone" maxlength="10" autocomplete="on" placeholder="Nombre de usuario" name="cedula">
              </div>
            </div>
            <div class="form-group">
              <div class="input-group"> <span class="input-group-addon"><i class="fa fa-key"></i> </span>
                <input type="password" class="form-control product" maxlength="10" autocomplete="off" placeholder="Contraseña" name="clave">
              </div>
            </div>
          </div>
          <div class="panel-footer"> <span class="panel-title-sm pull-left" style="padding-top: 7px;"><a> Recuperar contraseña</a></span>
            <div class="form-group margin-bottom-none">
              <input class="btn btn-primary pull-right" type="submit" value="Iniciar Sesión" />
              <div class="clearfix"></div>
            </div>
          </div>
        </form>
      </div>

<!-- End: Main --> 

      <div class="footer">
<img alt="Logo Formas Intimas" class="img-responsive" src="asset/img/logos/logo_fi.jpg">
</div>

    </div>
  </div>
</div>
<!-- Core Javascript - via CDN --> 
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> 
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script> 
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script> 
<!scripts para validacion-->
<script type="text/javascript" src="asset/js/librerias/jquery.validate.min.js"></script> 
<script type="text/javascript" src="asset/js/librerias/messages_es.js"></script> 
<script type="text/javascript" src="asset/js/librerias/additional-methods.js"></script> 
<script type="text/javascript" src="asset/js/validaciones/validar.js"></script> 
<!-- Theme Javascript --> 
<script type="text/javascript" src="asset/js/uniform.min.js"></script> 
<script type="text/javascript" src="asset/js/main.js"></script>
<script type="text/javascript" src="asset/js/custom.js"></script> 

<script type="text/javascript">

jQuery(document).ready(function() {

	// Init Theme Core 	  
	Core.init();   
	
});

</script>
</body>

</html>