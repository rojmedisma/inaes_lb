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
		<form action="" id="frm_cero" name="frm_cero"  method="post">
		</form>
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
						<div class="row">
							<div class="col-lg-4">
								<a href="<?php echo url_controlador("mml_indicador","vista_ind")?>">
									<div class="info-box mb-3 bg-indigo color-palette">
                                    	<span class="info-box-icon"><i class="fas fa-book"></i></span>
                                    	<div class="info-box-content">
                                    		<span class="info-box-text">Indicadores MML</span>
                                    	</div>
                                    	<!-- /.info-box-content -->
                                    </div>
    								<!-- /.card -->
								</a>
								
							</div>
							<!-- /.col-md-6 -->
						</div>
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
	</body>
</html>