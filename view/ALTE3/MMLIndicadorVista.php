<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once 'modulos/EnHead.php'; ?>
		<!-- DataTables -->
  		<link rel="stylesheet" href="/<?php echo DIR_LOCAL; ?>/library/ALTE3/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  		<style type="text/css">
  			.pointer {cursor: pointer;}
  		</style>
	</head>
	<!--
		BODY TAG OPTIONS:
		=================
		Apply one or more of the following classes to to the body tag
		to get the desired effect
		|---------------------------------------------------------|
		|LAYOUT OPTIONS | sidebar-collapse                        |
		|               | sidebar-mini                            |
		|---------------------------------------------------------|
		-->
	<body class="hold-transition sidebar-mini">
		<?php include_once 'modulos/FrmCeroMML.php';?>
		<div class="wrapper">
			<!-- Navbar -->
			<nav class="main-header navbar navbar-expand navbar-white navbar-light">
				<?php include_once 'modulos/EnNavbar.php'; ?>
			</nav>
			<!-- /.navbar -->
			<!-- Main Sidebar Container -->
			<aside class="main-sidebar sidebar-dark-primary elevation-4">
				<?php include_once 'modulos/EnMainSidebar.php'; ?>
			</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<?php include_once 'modulos/ContentHeader.php'; ?>
				<!-- Main content -->
				<div class="content">
					<div class="container-fluid">
						<!-- /.card -->
							<div class="card card-secondary card-tabs">
								<div class="card-header p-0 pt-1">
									<ul class="nav nav-tabs" role="tablist">
										<li class="nav-item">
											<a id="a_nav_tab_vista_ind" class="nav-link" href="<?php echo url_controlador("mml_indicador","vista_ind",array("pestania_vista_act"=>"vista_ind"),true,true); ?>" role="tab" aria-selected="false">Por Indicadores</a>
										</li>
										<li class="nav-item">
											<a id="a_nav_tab_vista_var" class="nav-link" href="<?php echo url_controlador("mml_indicador","vista_var",array("pestania_vista_act"=>"vista_var"),true,true); ?>" role="tab" aria-selected="false">Por Variables de indicador</a>
										</li>
									</ul>
								</div>
								<!-- /.card-header -->
								<?php
								$accion_act = $controlador_obj->getAccion();
								switch($accion_act){
									case 'vista_ind':	include_once 'modulos/MMLIndicadorVista/Indicadores.php';	break;
									case 'vista_var':	include_once 'modulos/MMLIndicadorVista/VariablesDef.php';	break;
								}
								?>
							</div>
							<!-- /.card -->
						<!-- /.row -->
					</div>
					<!-- /.container-fluid -->
				</div>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<!-- Control Sidebar -->
			<aside class="control-sidebar control-sidebar-dark">
				<?php include_once 'modulos/EnAside.php'; ?>
			</aside>
			<!-- /.control-sidebar -->
			<!-- Main Footer -->
			<footer class="main-footer">
				<?php include_once 'modulos/EnFooter.php'; ?>
			</footer>
		</div>
		<!-- ./wrapper -->
		<?php include_once 'modulos/Scripts.php'; ?>
		<?php include_once 'modulos/ScriptMainSB.php'; ?>
		<?php include_once 'modulos/ScriptMMLIndVista.php'; ?>
	</body>
</html>