<?php 
function v() {
    $baseDir="pages";
    $dir=dirname($_SERVER['PHP_SELF']);
    $dir=explode("/",$dir);
    $dir=end($dir);
    if($dir=="$baseDir"){
        $ruta="../";
    }else if($dir!=$baseDir){
        $ruta="../../";
    }
    return $ruta;
}
   
?>

<!DOCTYPE html>
<html>
<head>
<!-- Meta, title, CSS, favicons, etc. -->
<title>CRM Formas Intimas - Inicio</title>
<meta charset="utf-8">
<meta name="keywords" content="" />
<meta name="description" content="">
<meta name="author" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<!-- Font CSS  -->
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,600,700">

<!-- Core CSS  -->
<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo v();?>asset/fonts/glyphicons_pro/glyphicons.min.css">

<!-- Plugin CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo v();?>lib/vendor/plugins/calendar/fullcalendar.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>lib/vendor/plugins/datatables/css/datatables.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>asset/css/animate.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>lib/vendor/plugins/timepicker/bootstrap-timepicker.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>lib/vendor/plugins/colorpicker/colorpicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>lib/vendor/plugins/datepicker/datepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>lib/vendor/plugins/daterange/daterangepicker.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>lib/vendor/plugins/formswitch/css/bootstrap-switch.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>lib/vendor/plugins/tags/tagmanager.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>lib/vendor/plugins/chosen/chosen.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo v();?>lib/vendor/plugins/jqueryui/css/smoothness/jquery-ui-1.10.4.custom.min.css" />

<!-- Theme CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>asset/css/theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>asset/css/pages.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>asset/css/plugins.css">
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>asset/css/responsive.css">

<!-- Boxed-Layout CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>asset/css/boxed.css">

<!-- Demonstration CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>asset/css/demo.css">

<!-- Your Custom CSS -->
<link rel="stylesheet" type="text/css" href="<?php echo v(); ?>asset/css/custom.css">

<!-- Favicon -->
<link rel="shortcut icon" href="<?php echo v(); ?>asset/img/favicon.ico">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo v();?>asset/js/validaciones/cuadroDialogo.js"></script>
<script type="text/javascript" src="<?php echo v(); ?>asset/js/validaciones/validar.js"></script> 

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>