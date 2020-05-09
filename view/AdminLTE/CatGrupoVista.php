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
									<div class="box-header with-border">
										<h3 class="box-title">&nbsp;</h3>
										<div class="box-tools">
											<a href="<?php echo url_controlador('cat_grupo','abrir') ?>"  class="btn btn-block btn-primary btn-sm"><i class="fa fa-fw fa-user-plus"></i> Alta Grupo</a>
										</div>
									</div>
									<div class="box-body">
										<table id="tbl_cat_usr" class="table table-bordered table-hover">
											<thead>
												<tr>
													<th style="width: 75px;">Opciones</th>
													<th>Título</th>
													<th>Descripción</th>
													<th>Lista de permisos</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($controlador_obj->getArrTblContenido() as $arr_cont){ ?>
												<tr>
													<td>
														<a href="<?php echo url_controlador('cat_grupo','abrir', array('cat_grupo_id'=>$arr_cont['cat_grupo_id'])) ?>" class="btn btn-primary btn-xs">Abrir</a>
														<?php if($controlador_obj->getPermisoBorrar()){?>
															<button type="button" class="btn btn-danger btn-xs btn_borrar" data-cat_gpo_id="<?php echo $arr_cont['cat_grupo_id']; ?>">Borrar</button>
														<?php }?>
													</td>
													<td><?php echo $arr_cont['tit_corto']; ?></td>
													<td><?php echo $arr_cont['descripcion']; ?></td>
													<td><?php echo $arr_cont['li_cp_tit_corto']; ?></td>
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
			$('#tbl_cat_usr').DataTable();
			$('.btn_borrar').click(function(){f_borrar_gpo(this);});
		});
		function f_borrar_gpo(o_borrar){
			v_cat_id = o_borrar.dataset.cat_gpo_id;
			if(v_cat_id!="" && confirm("¿Desea borrar el registro de grupo seleccionado?")){
				f_ir_a_controlador('frm_cero', 'cat_grupo', 'borrar', '&cat_grupo_id='+v_cat_id);
			}
		}
		</script>
	</body>
</html>
