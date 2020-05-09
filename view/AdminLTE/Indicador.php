<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<body class="hold-transition skin-black sidebar-mini">
		<form action="" id="frm_cero" name="frm_cero"  method="post">
			<input type="hidden" name="h_entidad_tipo" value="<?php echo $controlador_obj->getEntidadTipo()?>">
			<input type="hidden" name="h_entidad_id" value="<?php echo $controlador_obj->getEntidadId()?>">
		</form>
		<?php include_once 'modulos/Indicador/modals.php';?>
		<div class="wrapper">
			<header class="main-header">
				<!-- Logo -->
				<a href="<?php echo url_controlador(CONTROLADOR_DEFECTO, ACCION_DEFECTO, '', false); ?>" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>I</b></span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Indicadores</b></span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
					<span class="sr-only">Toggle navigation</span>
					</a>
					
        			<!-- Navbar Right Menu -->
        			<div class="navbar-custom-menu">
        				<ul class="nav navbar-nav">
        					<?php include_once 'modulos/DropdownUserMenu.php';?>
        				</ul>
        			</div>
				</nav>
			</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
					
					<!-- sidebar menu: : style can be found in sidebar.less -->
					<?php include_once 'modulos/Indicador/SidebarMenu.php';?>
				</section>
				<!-- /.sidebar -->
			</aside>
			<!-- Content Wrapper. Contains page content -->
			<div class="content-wrapper">
				<?php include_once 'modulos/ContentHeader.php'; ?>
				<!-- Main content -->
				<section class="content">
					<!-- Barra de botones -->
					<div class="box box-solid">
						<div class="box-body no-padding">
        					<table class="table table-bordered">
        						<tbody>
        							<tr>
        								<td width="100px">
        									Filtro: 
        								</td>
        								<td>
        								<?php if($controlador_obj->getEntidadTipo() == 'nacional'){?>
        									<a href="<?php echo url_controlador('indicador','limpiar_entidad', array("entidad_tipo"=>"","entidad_id"=>""))?>" type="button" class="btn btn-default">Nacional <span class="glyphicon glyphicon-remove"></span></a>
        								<?php }?>
        								<?php if($controlador_obj->getEntidadTipo() == 'estatal'){?>
        									<a href="<?php echo url_controlador('indicador','limpiar_entidad', array("entidad_tipo"=>"","entidad_id"=>""))?>" type="button" class="btn btn-default">Estado: <?php echo $controlador_obj->getCatEstadoDesc(); ?><span class="glyphicon glyphicon-remove"></span></a>
        								<?php }?>
        								<?php if($controlador_obj->getEntidadTipo() == 'de_cader'){?>
        									<a href="<?php echo url_controlador('indicador','limpiar_entidad', array("entidad_tipo"=>"","entidad_id"=>""))?>" type="button" class="btn btn-default">CADER: <?php echo $controlador_obj->getCatCaderDesc(); ?><span class="glyphicon glyphicon-remove"></span></a>
        								<?php }?>
        								<?php if($controlador_obj->getEntidadTipo() == 'municipal'){?>
        									<a href="<?php echo url_controlador('indicador','limpiar_entidad', array("entidad_tipo"=>"","entidad_id"=>""))?>" type="button" class="btn btn-default">Municipio: <?php echo $controlador_obj->getCatMunicipioDesc(); ?><span class="glyphicon glyphicon-remove"></span></a>
        								<?php }?>
        								</td>
        								<td width="150px">
        									<button type="button" class="btn btn-block btn-primary" onclick="f_ir_a_controlador('frm_cero', 'indicador','calcular')">Calcular</button>
        								</td>
        							</tr>
        						</tbody>
        					</table>
						</div>
					</div>
					<div class="box box-solid">
						<div class="box-body">
							<table class="table table-bordered tree">
								<tr>
									<th>Indicador</th>
									<th>Tot. Cuest.</th>
									<th>Valor</th>
								</tr>
								<?php
								if(count($controlador_obj->getArrTblConsol())){
									foreach ($controlador_obj->getArrTblConsol() as $ind_var_id=>$arr_det){
								?>
								<tr class="treegrid-<?php echo $ind_var_id?> treegrid-parent-<?php echo $arr_det['ind_var_padre_id']?>">
									<td><?php echo $arr_det['variable_desc']?></td>
									<td style="text-align: right;"><?php echo $controlador_obj->getConsol($ind_var_id,'n'); ?></td>
									<td style="text-align: right;"><?php echo formato_miles($controlador_obj->getConsol($ind_var_id,'valor'),2); ?></td>
								</tr>
								<?php
									}		
								}
								?>
							</table>
						</div>
					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
			<?php include_once 'modulos/Footer.php'; ?>
			<!-- Add the sidebar's background. This div must be placed
				immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div>
		<!-- ./wrapper -->
		<?php include_once 'modulos/Scripts.php'; ?>
		<script type="text/javascript">
		$('.tree').treegrid();
		</script>
	</body>
</html>