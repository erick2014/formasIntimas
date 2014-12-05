 <!-- Panel-Footer -->
<!-- Core Javascript - via CDN -->
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

<!-- Plugins - Via CDN -->
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/flot/0.8.1/jquery.flot.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.dataTables/1.9.4/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/fullcalendar/1.6.4/fullcalendar.min.js"></script>

<!-- Plugins - Via Local Storage
<script type="text/javascript" src="../lib/vendor/plugins/jqueryflot/jquery.flot.min"></script>
<script type="text/javascript" src="../lib/vendor/plugins/sparkline/jquery.sparkline.min.js"></script>
<script type="text/javascript" src="../lib/vendor/plugins/datatables/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../lib/vendor/plugins/calendar/fullcalendar.min.js"></script>
-->

<!-- Plugins -->
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/calendar/gcal.js"></script><!-- Calendar Addon -->
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/jqueryflot/jquery.flot.resize.min.js"></script><!-- Flot Charts Addon -->
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/datatables/js/datatables.js"></script><!-- Datatable Bootstrap Addon -->

<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/globalize/globalize.js"></script> 
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/chosen/chosen.jquery.min.js"></script> 
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/daterange/moment.min.js"></script> 
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/daterange/daterangepicker.js"></script> 
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/colorpicker/bootstrap-colorpicker.js"></script> 
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/timepicker/bootstrap-timepicker.min.js"></script> 
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/datepicker/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo v(); ?>lib/vendor/plugins/chosen/chosen.jquery.min.js"></script> 

<!-- scripts para validacion-->
<script type="text/javascript" src="<?php echo v(); ?>asset/js/librerias/jquery.validate.min.js"></script> 
<script type="text/javascript" src="<?php echo v(); ?>asset/js/librerias/messages_es.js"></script> 
<script type="text/javascript" src="<?php echo v(); ?>asset/js/librerias/additional-methods.js"></script> 


<!-- jquery dialog style -->
<link rel="shortcut icon" href="<?php echo v(); ?>asset/css/smoothness/jquery.ui.all.css" >

<!-- Theme Javascript -->
<script type="text/javascript" src="<?php echo v(); ?>asset/js/uniform.min.js"></script>
<script type="text/javascript" src="<?php echo v(); ?>asset/js/main.js"></script>
<!--<script type="text/javascript" src="js/plugins.js"></script>-->
<script type="text/javascript" src="<?php echo v(); ?>asset/js/custom.js"></script>

<script type="text/javascript">
  jQuery(document).ready(function() {
	  
	// Init Theme Core 	  
	Core.init();

	 $('#datatable').dataTable( {
			"aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ -1 ] }],
			"oLanguage": {
			    "sProcessing":     "Procesando...",
			    "sLengthMenu":     "Mostrar _MENU_ registros",
			    "sZeroRecords":    "No se encontraron resultados",
			    "sEmptyTable":     "Ningún dato disponible en esta tabla",
			    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
			    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
			    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
			    "sInfoPostFix":    "",
			    "sSearch":         "Buscar pedido:",
			    "sUrl":            "",
			    "sInfoThousands":  ",",
			    "sLoadingRecords": "Cargando...",
			    "oPaginate": {
			        "sFirst":    "Primero",
			        "sLast":     "Último",
			        "sNext":     "Siguiente",
			        "sPrevious": "Anterior"
			    },
			    "oAria": {
			        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
			        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
			    }
			},
			"iDisplayLength": 6,
			"aLengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "Todos"]],
		  });

	  $("select[name='datatable_length']").chosen();

	//Init jquery Date Range Picker
	 $('input[name="ventas_desd_hast"]').daterangepicker();


	
	
	// Init Sparkline Plugin
 	var runSparkline = function () {
		
		// Define Sparklines values
		var Values1 = [0,1,5,2,4,3,5,8,7];
		var Values2 = [3,2,3,1,0,2,5,6,4];
		var Values3 = [6,4,5,3,4,2,1,2,3];
		var Values4 = [2,1,2,3,2,4,2,1,0];

	    // Pass values, define options, and create chart
		$('.sparkbar1').sparkline(Values1, {type: "bar",
				barColor: "#428bca",
				barWidth: "8",
				height: "35"} 
		);
		$('.sparkbar2').sparkline(Values2, {type: "bar",
				barColor: "#5cb85c",
				barWidth: "8",
				height: "35"} 
		);
		$('.sparkbar3').sparkline(Values3, {type: "bar",
				barColor: "#5bc0de",
				barWidth: "8",
				height: "35"} 
		);
		$('.sparkbar4').sparkline(Values4, {type: "bar",
				barColor: "#777777",
				barWidth: "8",
				height: "35"} 
		);
		
		// Quick function to animate the appearance of Sparklines
		// Only ran on Sparkline elements which have the 
		// ".sparkline-delay" class and a set data-delay attr
		(function() {
			$('.sparkline-delay').each(function() {
				var This = $(this)
				var delayTime = $(this).data('delay');
	
				$(This).children('canvas').css({"height": "0", "vertical-align": "bottom"});
				var delayCharts = setTimeout(function () {
					  $(This).children('canvas').animate({height: 35}, 1800);
				}, delayTime); 
			});
		})();		
  	}

	// Init Calendar Plugin
	var runFullCalendar = function () {
		var date = new Date();
		var d = date.getDate();
		var m = date.getMonth();
		var y = date.getFullYear();
		
		// Define Calendar options and events
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: new Date(y, m, 9),
					color: '#008aaf '
				},
				{
					title: 'Long Event',
					start: new Date(y, m, d-5),
					end: new Date(y, m, d-3)
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+3, 16, 0),
					allDay: false
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: new Date(y, m, d+10, 16, 0),
					allDay: false
				},
				{
					title: 'Meeting',
					start: new Date(y, m, d, 10, 30),
					allDay: false,
					color: '#0070ab'
				},
				{
					title: 'Lunch',
					start: new Date(y, m, d, 12, 0),
					end: new Date(y, m, d, 14, 0),
					allDay: false,
					color: '#0070ab'
				},
				{
					title: 'Birthday Party',
					start: new Date(y, m, d+1, 19, 0),
					end: new Date(y, m, d+1, 22, 30),
					allDay: false
				},
				{
					title: 'Mandatory!',
					start: new Date(y, m, 22),
					color: '#d10011'
				}
			]
		});
	}

	
     
  runSparkline();
  runFullCalendar();	  
			  

});
</script>

</body>

</html>

