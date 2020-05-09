<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="hold-transition skin-black layout-top-nav">
		<?php include_once 'modulos/FrmCero.php'; ?>
		<div class="wrapper">
			<?php include_once 'modulos/Header.php'; ?>
			<!-- Full Width Column -->
			<div class="content-wrapper">
				<div class="container">
					<!-- Content Header (Page header) -->
					<section class="content-header">
						<h1><?php echo $controlador_obj->getTituloPagina(); ?></h1>
						<ol class="breadcrumb">
							<li><a href="javaScript:f_ir_a_controlador('frm_cero', 'tablero','inicio', '')">Tablero</a></li>
							<li class="active"><?php echo $controlador_obj->getTituloPagina(); ?></li>
						</ol>
					</section>
					<!-- Main content -->
					<section class="content">
						<p><a class="btn btn-primary" href="<?php echo url_controlador("indicador_adm", "crear_tablas_ind", "", false) ?>">1. Crear tablas de detalle de indicadores</a></p>
						<p><a class="btn btn-primary" href="<?php echo url_controlador("indicador_adm", "genera_detalle", "", false) ?>">2. Generar detalle de indicadores</a></p>
						<?php if(count($controlador_obj->getArrTxtInfo())){?>
						<pre>
							<?php 
							echo '<br>';
							foreach ($controlador_obj->getArrTxtInfo() as $txt_info){
								echo '<span>'.$txt_info.'</span><br>';
							}
							?>
						</pre>
						<?php }?>
						
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