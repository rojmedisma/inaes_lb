<!DOCTYPE html>
<html lang="en">
	<head>
		<?php include_once 'modulos/EnHead.php'; ?>
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
						<div class="card">
							<div class="card-body">
								<h5 class="card-title">Folio del indicador: <?php echo $controlador_obj->getIndFolio();?></h5>
							</div>
						</div>
						<!-- Ficha técnica -->
						<div class="card card-secondary card-tabs">
							<div class="card-header p-0 pt-1">
								<ul class="nav nav-tabs" role="tablist">
									<li class="nav-item">
										<a id="a_nav_tab_ficha" class="nav-link" href="<?php echo url_controlador("mml_indicador","ficha",array("pestania_frm_act"=>"ficha"),true,true); ?>" role="tab" aria-selected="false">Identificación</a>
									</li>
									<li class="nav-item">
										<a id="a_nav_tab_var_def" class="nav-link" href="<?php echo url_controlador("mml_indicador","var_def",array("pestania_frm_act"=>"var_def"),true,true); ?>" role="tab" aria-selected="false">Variables</a>
									</li>
								</ul>
							</div><!-- /.card-header -->
							<?php
							$accion_act = $controlador_obj->getAccion();
							switch($accion_act){
								case 'ficha':	include_once 'modulos/MMLIndicador/FichaTecnica.php';	break;
								case 'var_def':	include_once 'modulos/MMLIndicador/VariableDef.php';	break;
							}
							?>
						</div><!-- /.card -->
						
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
		<?php include_once 'modulos/ScriptMMLInd.php'; ?>
	</body>
</html>