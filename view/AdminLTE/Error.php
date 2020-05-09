<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="hold-transition skin-black layout-top-nav">
		<form action="" id="frm_cero" name="frm_cero"  method="post">
		</form>
		<div class="wrapper">
			<?php include_once 'modulos/Header.php'; ?>
			<!-- Full Width Column -->
			<div class="content-wrapper">
				<div class="container">
					<!-- Content Header (Page header) -->
					<section class="content-header">
						<h1>Error</h1>
						<ol class="breadcrumb">
							<li class="active">Error</li>
						</ol>
					</section>
					<!-- Main content -->
					<section class="content">
						<div class="callout callout-danger">
							<h4><?php echo $controlador_obj->getTitError(); ?></h4>
							<p><?php echo $controlador_obj->getTxtError(); ?></p>
						</div>
					</section>
					<!-- /.content -->
				</div>
				<!-- /.container -->
			</div>
			<!-- /.content-wrapper -->
			<?php include_once 'modulos/Footer.php'; ?>
		</div>
		<!-- ./wrapper -->
		<?php include_once 'modulos/Scripts.php'; ?>
	</body>
</html>
