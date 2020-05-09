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
					<?php include_once 'modulos/ContentHeader.php'; ?>
					<!-- Main content -->
					<section class="content">
						<div class="box box-primary">
							<form name="frm_prueba" id="frm_prueba" role="form" method="post" action="<?php echo url_controlador('zprueba','guardar', '', false) ?>">
								<?php echo $controlador_obj->tag_campo->cmpOculto('z_prueba_id');?>
								<div class="box-body">
									<div class="row">
										<div class="col-md-6">
										<?php
										//echo $controlador_obj->tag_campo->cmpNum('campo1', 2, array('lbl_txt'=>'Campo 1'));
										echo $controlador_obj->tag_campo->cmpSelectDeSubCat('campo2','sino', array('lbl_txt'=>'Campo 2', 'lectura'=>true));
										//echo $controlador_obj->tag_campo->cmpTextArea('campo1', array('lbl_txt'=>'Titulo campo 1'))
										//echo $controlador_obj->tag_campo->cmpAdjunto('campo1', array('lbl_txt'=>'Titulo campo 1'));
										//echo $controlador_obj->tag_campo->cmpCheckbox('campo1', "Opción 1", array('lbl_txt'=>'Titulo campo 1'));
										//echo $controlador_obj->tag_campo->cmpFecha('campo1', array('lbl_txt'=>'Titulo campo 1'));
										?>
										</div>
										<div class="col-md-6">
											<div class="form-group">
												<label>Titulo campo 1</label>
												<i class="fa fa-fw fa-check-square-o"></i>
											</div>
											<div class="form-group">
												<i class="fa fa-fw fa-square-o"></i>
											</div>
										</div>
									</div>
								</div>
								<div class="box-footer">
									<button type="submit" class="btn btn-primary">Guardar</button>
								</div>
							</form>
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
		<script>
		$(document).ready(function(){
			Forma.activaCmpEventos();
		});
		</script>
	</body>
</html>
