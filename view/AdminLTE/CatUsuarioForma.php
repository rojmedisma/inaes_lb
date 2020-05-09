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
					<?php include_once 'modulos/ContentHeader.php'; ?>
					<!-- Main content -->
					<section class="content">
						<div class="row">
							<div class="col-md-8">
								<!-- Cuadro de usuario -->
								<div class="box box-primary">
									<form name="frm_usuario" id="frm_usuario" role="form" method="post" action="<?php echo url_controlador('cat_usuario','guardar', '', false) ?>">
										<?php echo $controlador_obj->tag_campo->cmpOculto('cat_usuario_id'); ?>
										<div class="box-body">
											<h4>Datos personales</h4>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpTexto('nombre', array('lbl_txt'=>'Nombre')); ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpTexto('ap_paterno', array('lbl_txt'=>'Apellido paterno')); ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpTexto('ap_materno', array('lbl_txt'=>'Apellido materno')); ?>
												</div>
											</div>
											<h4>Entidad asignada</h4>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('cat_estado_id','cat_estado','cat_estado_id', 'descripcion','',array('lbl_txt'=>'Estado')); ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('cat_cader_id','cat_cader', 'cat_cader_id', 'descripcion',$controlador_obj->getAndCader(), array('lbl_txt'=>'CADER')); ?>
												</div>
											</div>
											<h4>Datos de autentificación</h4>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('cat_grupo_id','cat_grupo','cat_grupo_id','tit_corto','AND `borrar` IS NULL',array('lbl_txt'=>'Grupo')) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpTexto('usuario', array('lbl_txt'=>'Usuario')); ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpContrasenia('clave', array('lbl_txt'=>'Contraseña','value'=>'')); ?>
												</div>
											</div>
										</div>
										<div class="box-footer">
											<?php if($controlador_obj->getPermisoEscritura()){?>
											<button type="submit" class="btn btn-primary">Guardar</button>
											<?php }?>
										</div>
									</form>
								</div>
							</div>
							<div class="col-md-4">
								<!-- Cuadro de permisos -->
								<div class="box box-primary">
									<div class="box-header">
										<h3 class="box-title">Lista de permisos</h3>
									</div>
									<div class="box-body">
									<?php if(count($controlador_obj->getArrGrupo())){ ?>
										<ul class="list-group list-group-unbordered">
											<?php foreach ($controlador_obj->getArrGrupo() as $arr_det){ ?>
											<li class="list-group-item"><?php echo $arr_det['cp_tit_corto'];?></li>
											<?php } ?>
										</ul>
									<?php }?>
									</div>
								</div>
							</div>
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
		<script src="/<?php echo DIR_LOCAL; ?>/assets/js/CatUsuario.js"></script>
		<script>
		var a_cat_edo_cader = <?php echo json_encode($controlador_obj->getArrCatEdoCader()); ?>;
		$(document).ready(function(){
			Forma.activaCmpEventos();
			CatUsuario.activar();
		});
		</script>
	</body>
</html>
