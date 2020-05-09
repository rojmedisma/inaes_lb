<head>
	<meta charset="<?php echo HTML_CODIFICACION; ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title><?php echo $controlador_obj->getTituloPagina(); ?></title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<!-- Bootstrap 3.3.6 -->
	<link rel="stylesheet" href="/<?php echo DIR_LOCAL; ?>/library/AdminLTE/bootstrap/css/bootstrap.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
	<!-- bootstrap datepicker -->
	<link rel="stylesheet" href="/<?php echo DIR_LOCAL; ?>/library/AdminLTE/plugins/datepicker/datepicker3.css">
	<!-- Select2 -->
	<link rel="stylesheet" href="/<?php echo DIR_LOCAL; ?>/library/AdminLTE/plugins/select2/select2.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="/<?php echo DIR_LOCAL; ?>/library/AdminLTE/plugins/datatables/dataTables.bootstrap.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="/<?php echo DIR_LOCAL; ?>/library/AdminLTE/dist/css/AdminLTE.css">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	   folder instead of downloading all of them to reduce the load. -->
	<link rel="stylesheet" href="/<?php echo DIR_LOCAL; ?>/library/AdminLTE/dist/css/skins/skin-black.css">
	<!-- maxazan-jquery-treegrid -->
	<link rel="stylesheet" href="/<?php echo DIR_LOCAL; ?>/library/maxazan-jquery-treegrid/css/jquery.treegrid.css">
	
	<style type="text/css">
	/*Para las formas de cuestionarios*/
	.campo_nombre {
    	color: #605ca8 !important;
    	display:none;
	}
	/*Para el tablero de indicadores*/
	.sidebar div.checkbox {
    	color: #b8c7ce;
    }
	.sidebar-menu > li:hover > div.checkbox, .skin-black .sidebar-menu > li.active > div.checkbox {
    	color: #ffffff;
    	background: #1e282c;
    	border-left-color: #ffffff;
    }
	.sidebar-menu > li > div.checkbox {
		border-left: 3px solid transparent;
	}
	.sidebar-menu > li > div.checkbox {
		padding: 12px 5px 12px 15px;
		display: block;
	}
	</style>

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

