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
					<section class="content-header">
						<h1><?php echo $controlador_obj->getTituloPagina(); ?></h1>
						<ol class="breadcrumb">	
							<li class="active"><?php echo $controlador_obj->getTituloPagina(); ?></li>
						</ol>
					</section>
					<!-- Main content -->
					<section class="content">
						<?php if($controlador_obj->permiso->tiene_permiso('c01_al')){?>
						<div class="row">
							<div class="col-md-12">
								<div class="box box-solid">
									<div class="box-header with-border">
										<span class="glyphicon glyphicon-open-file"></span>
										<h3 class="box-title"><?php echo $controlador_obj->cat_cuestionario_1->get_val_campo('descripcion')?></h3>
									</div>
									<div class="box-body">
										<div class="row">
											<div class="col-md-12">
												<div id="c01_def" class="collapse">
													<p><?php echo nl2br($controlador_obj->cat_cuestionario_1->get_val_campo('definicion'))?></p>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<?php if($controlador_obj->permiso->tiene_permiso('c01_ae')){?>
												<a class="btn btn-primary pull-right" style="margin-right: 5px;" href="<?php echo url_controlador('cuestionario','abrir', array('cat_cuestionario_id'=>$controlador_obj->cat_cuestionario_1->getCatCuestionarioId())) ?>"><i class="fa fa-fw fa-file-o"></i> Alta cuestionario</a>
												<?php }?>
												<a class="btn btn-primary pull-right" style="margin-right: 5px;" href="<?php echo url_controlador('cuestionario', 'inicio', array('cat_cuestionario_id'=>$controlador_obj->cat_cuestionario_1->getCatCuestionarioId())); ?>"><i class="fa fa-fw fa-list-alt"></i> Consultar cuestionarios</a>
												<a class="btn btn-primary pull-right" style="margin-right: 5px;" href="#c01_def" data-toggle="collapse"><i class="fa fa-fw fa-info"></i> Introducción</a>
											</div>
										</div>
									</div>
									<!-- /.box-body -->
								</div>
							</div>
						</div>
						<?php }?>
						<?php if($controlador_obj->permiso->tiene_permiso('c02_al')){?>
						<div class="row">
							<div class="col-md-12">
								<div class="box box-solid">
									<div class="box-header with-border">
										<span class="glyphicon glyphicon-open-file"></span>
										<h3 class="box-title"><?php echo $controlador_obj->cat_cuestionario_2->get_val_campo('descripcion')?></h3>
									</div>
									<div class="box-body">
										<div class="row">
											<div class="col-md-12">
												<div id="c02_def" class="collapse">
													<p><?php echo nl2br($controlador_obj->cat_cuestionario_2->get_val_campo('definicion'))?></p> 
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<?php if($controlador_obj->permiso->tiene_permiso('c02_ae')){?>
												<a class="btn btn-primary pull-right" href="<?php echo url_controlador('cuestionario','abrir', array('cat_cuestionario_id'=>$controlador_obj->cat_cuestionario_2->getCatCuestionarioId())) ?>"><i class="fa fa-fw fa-file-o"></i> Alta cuestionario</a>
												<?php }?>
												<a class="btn btn-primary pull-right"  style="margin-right: 5px;"href="<?php echo url_controlador('cuestionario', 'inicio', array('cat_cuestionario_id'=>$controlador_obj->cat_cuestionario_2->getCatCuestionarioId())); ?>"><i class="fa fa-fw fa-list-alt"></i> Consultar cuestionarios</a>
												<a class="btn btn-primary pull-right" style="margin-right: 5px;" href="#c02_def" data-toggle="collapse"><i class="fa fa-fw fa-info"></i> Introducción</a>
											</div>
										</div>
									</div>
									<!-- /.box-body -->
								</div>
							</div>
						</div>
						<?php }?>
						<?php if($controlador_obj->permiso->tiene_permiso('c03_al')){?>
						<div class="row">
							<div class="col-md-12">
								<div class="box box-solid">
									<div class="box-header with-border">
										<span class="glyphicon glyphicon-open-file"></span>
										<h3 class="box-title"><?php echo $controlador_obj->cat_cuestionario_3->get_val_campo('descripcion')?></h3>
									</div>
									<div class="box-body">
										<div class="row">
											<div class="col-md-12">
												<div id="c03_def" class="collapse">
													<p><?php echo nl2br($controlador_obj->cat_cuestionario_3->get_val_campo('definicion'))?></p>  
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<?php if($controlador_obj->permiso->tiene_permiso('c03_ae')){?>
												<a class="btn btn-primary pull-right" href="<?php echo url_controlador('cuestionario','abrir', array('cat_cuestionario_id'=>$controlador_obj->cat_cuestionario_3->getCatCuestionarioId())) ?>"><i class="fa fa-fw fa-file-o"></i> Alta cuestionario</a>
												<?php }?>
												<a class="btn btn-primary pull-right"  style="margin-right: 5px;"href="<?php echo url_controlador('cuestionario', 'inicio', array('cat_cuestionario_id'=>$controlador_obj->cat_cuestionario_3->getCatCuestionarioId())); ?>"><i class="fa fa-fw fa-list-alt"></i> Consultar cuestionarios</a>
												<a class="btn btn-primary pull-right" style="margin-right: 5px;" href="#c03_def" data-toggle="collapse"><i class="fa fa-fw fa-info"></i> Introducción</a>
											</div>
										</div>
									</div>
									<div class="box-footer">
									</div>
									<!-- /.box-body -->
								</div>
							</div>
						</div>
						<?php }?>
						<?php if($controlador_obj->permiso->tiene_permiso('c04_al')){?>
						<div class="row">
							<div class="col-md-12">
								<div class="box box-solid">
									<div class="box-header with-border">
										<span class="glyphicon glyphicon-open-file"></span>
										<h3 class="box-title"><?php echo $controlador_obj->cat_cuestionario_4->get_val_campo('descripcion')?></h3>
									</div>
									<div class="box-body">
										<div class="row">
											<div class="col-md-12">
												<div id="c04_def" class="collapse">
													<p><?php echo nl2br($controlador_obj->cat_cuestionario_4->get_val_campo('definicion'))?></p>  
												</div>
											</div>
										</div>
										 <div class="row">
										 	<div class="col-md-12">
												<?php if($controlador_obj->permiso->tiene_permiso('c04_ae')){?>
												<a class="btn btn-primary pull-right" href="<?php echo url_controlador('cuestionario','abrir', array('cat_cuestionario_id'=>$controlador_obj->cat_cuestionario_4->getCatCuestionarioId())) ?>"><i class="fa fa-fw fa-file-o"></i> Alta cuestionario</a>
												<?php }?>
												<a class="btn btn-primary pull-right"  style="margin-right: 5px;"href="<?php echo url_controlador('cuestionario', 'inicio', array('cat_cuestionario_id'=>$controlador_obj->cat_cuestionario_4->getCatCuestionarioId())); ?>"><i class="fa fa-fw fa-list-alt"></i> Consultar cuestionarios</a>
												<a class="btn btn-primary pull-right" style="margin-right: 5px;" href="#c04_def" data-toggle="collapse"><i class="fa fa-fw fa-info"></i> Introducción</a>
										 	</div>
										 </div>
									</div>
									<div class="box-footer">
									</div>
									<!-- /.box-body -->
								</div>
							</div>
						</div>
						<?php }?>
						<div class="row">
							<div class="col-md-12">
								<!-- Cuadro Catálogos -->
								<div class="box box-solid">
									<div class="box-header with-border">
										<i class="fa fa-fw fa-archive"></i>
										<h3 class="box-title">Más opciones</h3>
									</div>
									<div class="box-body">
										<div class="row">
											<div class="col-md-3">
											</div>
											<div class="col-md-6">
												<div class="list-group">
													<?php if($controlador_obj->permiso->tiene_permiso('indicadores_al')){?>
													<a href="<?php echo url_controlador('indicador', 'inicio'); ?>" class="list-group-item"><i class="fa fa-fw fa-sitemap"></i> Indicadores</a>
													<?php }?>
													<?php if($controlador_obj->permiso->tiene_permiso('al_usuario')){?>
													<a href="<?php echo url_controlador('cat_usuario', 'inicio'); ?>" class="list-group-item"><i class="fa fa-fw fa-user"></i> Catálogo de Usuarios</a>
													<?php }?>
													<?php if($controlador_obj->permiso->tiene_permiso('al_grupo')){?>
													<a href="<?php echo url_controlador('cat_grupo', 'inicio'); ?>" class="list-group-item"><i class="fa fa-fw fa-users"></i> Catálogo de Grupos</a>
													<?php }?>
													<?php if($controlador_obj->permiso->tiene_permiso('al_log')){?>
													<a href="<?php echo url_controlador('log', 'inicio'); ?>" class="list-group-item"><i class="fa fa-fw fa-list-alt"></i> Ver registro de Log</a>
													<?php }?>
													<?php if($controlador_obj->permiso->tiene_permiso('indicadores_ae')){?>
													<a href="<?php echo url_controlador('indicador_adm', 'inicio'); ?>" class="list-group-item"><i class="fa fa-fw fa-wrench"></i>Administrar indicadores</a>
													<?php }?>
													<?php if($controlador_obj->permiso->tiene_permiso('ver_doc_cod')){?>
													<a href="<?php echo url_controlador('doc_codigo', 'inicio'); ?>" class="list-group-item"><i class="fa fa-fw fa-code"></i>Documentación del código fuente</a>
													<?php }?>
													<a href="javaScript:f_ir_a_otra_ventana('library/manual_usr/Manual_usuario.pdf')" class="list-group-item"><i class="fa fa-fw fa-file-pdf-o"></i>Manual de usuario</a>
												</div>
											</div>
											<div class="col-md-3">
											</div>
										</div>
												
									</div>
									<!-- /.box-body -->
								</div>
							</div>
						</div>
						<div class="row" style="display:none">
							<div class="col-md-6">
								<!-- Cuadro Pruebas -->
								<div class="box box-default">
									<div class="box-header with-border">
										<h3 class="box-title">Pruebas</h3>
									</div>
									<div class="box-body">
										<div class="list-group">
											<a href="<?php echo url_controlador('zprueba', 'inicio'); ?>" class="list-group-item">Pruebas</a>
										</div>
									</div>
									<!-- /.box-body -->
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
	</body>
</html>