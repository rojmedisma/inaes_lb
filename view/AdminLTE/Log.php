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
						<div class="row">
							<div class="col-xs-12">
								<div class="box">
									<div class="box-body">
										<table id="tbl_log" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th>Fecha</th>
													<th>Hora</th>
													<th>Usuario</th>
													<th>Id Nombre</th>
													<th>Id Valor</th>
													<th>Evento</th>
													<th>Estatus</th>
													<th>Descripción</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($controlador_obj->getArrTblContenido() as $arr_cont){?>
												<tr>
													<td><?php echo $arr_cont['fecha']; ?></td>
													<td><?php echo $arr_cont['hora']; ?></td>
													<td><?php echo $arr_cont['usuario']; ?></td>
													<td><?php echo $arr_cont['cmp_id_nom']; ?></td>
													<td><?php echo $arr_cont['cmp_id_val']; ?></td>
													<td><?php echo $arr_cont['evento']; ?></td>
													<td><?php echo $arr_cont['estatus']; ?></td>
													<td><?php echo $arr_cont['descripcion']; ?></td>
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
		<script>
		$(document).ready(function(){
			$('#tbl_log').DataTable({
				"aaSorting":[],
			});
		});
		</script>
	</body>
</html>
