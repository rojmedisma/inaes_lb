<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="hold-transition skin-black layout-top-nav">
		<form action="" id="frm_cero" name="frm_cero"  method="post">
			<?php echo $controlador_obj->tag_campo->cmpOculto('cat_grupo_id'); ?>
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
							<div class="col-md-12">
								<div class="box box-primary">
									<div class="box-header with-border">
										<h3 class="box-title">Identificación del grupo</h3>
									</div>
									<form name="frm_grupo" id="frm_grupo" role="form" method="post" action="<?php echo url_controlador('cat_grupo','guardar', '', false) ?>">
										<?php echo $controlador_obj->tag_campo->cmpOculto('cat_grupo_id'); ?>
										<div class="box-body">
											<div class="row">
												<div class="col-md-3">
													<?php echo $controlador_obj->tag_campo->cmpTexto('tit_corto', array('lbl_txt'=>'Título corto')); ?>
												</div>
												<div class="col-md-9">
													<?php echo $controlador_obj->tag_campo->cmpTexto('descripcion', array('lbl_txt'=>'Descripción')); ?>
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
						</div>
						<div class="row">
							<div class="col-xs-12">
								<div class="box box-primary">
									<div class="box-header with-border">
										<h3 class="box-title"><i class="fa fa-fw fa-key"></i> Permisos</h3>
									</div>
									<div class="box-body">
									<?php if(count($controlador_obj->getArrTblContGpo())){ ?>
										<table id="tbl_grupo" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Acción</th>
													<th>Título</th>
													<th>Descripción</th>
												</tr>
											</thead>
											<tbody>
											<?php foreach ($controlador_obj->getArrTblContGpo() as $arr_cont){ ?>
												<tr>
													<td>
														<?php if($controlador_obj->getPermisoEscritura()){?>
															<a href="<?php echo url_controlador('cat_grupo', 'activar', array('cat_permiso_cve'=>$arr_cont['cat_permiso_cve'], 'activo'=>$arr_cont['activo'])) ?>" type="button" class="btn btn-block <?php echo $arr_cont['cls_color'] ?> btn-xs"><?php echo $arr_cont['activo_txt']?></a>
														<?php }else{?>
															<span><?php echo $arr_cont['activo_txt']?></span>
														<?php }?>
													</td>
													<td><?php echo $arr_cont['tit_corto']; ?></td>
													<td><?php echo $arr_cont['descripcion']; ?></td>
												</tr>
											<?php }?>
											</tbody>
										</table>
									<?php } ?>
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
		<script>
		$(document).ready(function(){
			Forma.activaCmpEventos();
			$('#tbl_grupo').DataTable({
				"paging":false,
				"info":false,
				"searching":false,
			});
		});
		</script>
	</body>
</html>
