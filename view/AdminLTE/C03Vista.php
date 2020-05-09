<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="hold-transition skin-black layout-top-nav">
		<form action="" id="frm_cero" name="frm_cero"  method="post">
			<input type="hidden" name="cat_cuestionario_id" value="<?php echo $controlador_obj->getCatCuestionarioId(); ?>">
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
							<div class="col-xs-12">
								<div class="box">
									<?php include_once 'modulos/Cuestionario/BoxHeaderVista.php';?>
									<div class="box-body">
										<table id="tbl_cuest" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Opciones</th>
													<th>Usuario</th>
													<th>Fecha Creación</th>
													<th>Estatus</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($controlador_obj->getArrTblContenido() as $arr_cont){ ?>
												<tr>
													<td>
														<a href="<?php echo url_controlador('cuestionario','abrir', array('cuestionario_id'=>$arr_cont['cuestionario_id'])) ?>" class="btn btn-primary btn-xs">Abrir</a>
														<?php if($controlador_obj->getPermisoBorrar()){?>
															<button type="button" class="btn btn-danger btn-xs btn_borrar" data-cuest_id="<?php echo $arr_cont['cuestionario_id']; ?>">Borrar</button>
														<?php }?>
													</td>
													<td><?php echo $arr_cont['usuario']; ?></td>
													<td><?php echo $arr_cont['creacion_fecha']; ?></td>
													<td><?php echo $controlador_obj->getTagEstatus($arr_cont['estatus_cuest']); ?></td>
												</tr>
												<?php }?>
											</tbody>
										</table>
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
		<script src="/<?php echo DIR_LOCAL; ?>/assets/js/Vista.js"></script>
	</body>
</html>
