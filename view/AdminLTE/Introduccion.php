<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="hold-transition skin-black layout-top-nav">
		<div class="wrapper">
			<!-- Full Width Column -->
			<div class="content-wrapper">
				<div class="container">
					<section class="content-header">
						<h1 class="text-center">Herramienta para el registro y seguimiento a actividades de la Agenda de Cambio Climático y Producción Agroalimentaria</h1>
					</section>
					<section class="content">
						<div class="row">
							 <div class="col-md-9">
							 	<div class="box box-primary">
							 		<div class="box-body">
							 			<h3>Presentación</h3>
							 			<p>El sector agropecuario y forestal tiene gran potencial de mitigación y adaptación para aportar al combate del cambio climático y en general al desarrollo sostenible.</p>
							 			<p>El reto actual es lograr el crecimiento económico del sector y la seguridad alimentaria mediante el aprovechamiento sostenible de los recursos naturales, de la biodiversidad agrícola y la reducción de emisiones.</p>
							 			<p>La Agenda de Cambio Climático y Producción Agroalimentaria (Agenda CC y PA) en México propone acciones de corto, mediano y largo plazo que atienden al logro de dicho reto. </p>
							 			<p>Este sistema de reporte y seguimiento  atiende a la necesidad de monitorear los cambios, los avances y los resultados de las políticas que se implementen en relación al CC y PA.</p>
							 			<h3>Método</h3>
							 			<p>A través de una red interinstitucional de dependencias que inciden sobre el estado del sector agroalimentario, se recaba información de primera mano para calcular indicadores de mitigación y adaptación georreferenciados a nivel de CADERs a través del SIAP.</p>
							 			<p>Las variables que constituyen dichos indicadores se recogen utilizando principalmente cuestionarios dirigidos a productores agropecuarios y funcionarios de los gobiernos locales. </p>
							 		</div>
							 	</div>
							 </div>
							 <div class="col-md-3">
							 	<div class="box box-primary">
							 		<div class="box-header">
							 			<h3 class="box-title">Iniciar sesión</h3>
							 		</div>
							 		<form action="<?php echo url_controlador('autentificar','autentificar', '', false) ?>" method="post">
								 		<div class="box-body">
							 				<input name="url_arg" id="url_arg" type="hidden" value="<?php echo $controlador_obj->getUrlArg(); ?>">
											<input name="url_uri" id="url_uri" type="hidden" value="<?php echo $controlador_obj->getUrlUri(); ?>">
											<div class="form-group has-feedback">
												<input name="usuario" class="form-control" id="usuario" type="text" placeholder="Usuario" value="">
												<span class="glyphicon glyphicon-user form-control-feedback"></span>
											</div>
											<div class="form-group has-feedback">
												<input name="clave" class="form-control" id="clave" type="password" placeholder="Contraseña" value="">
												<span class="glyphicon glyphicon-lock form-control-feedback"></span>
											</div>
											<?php if($controlador_obj->getEsInfoIncorrecta()){ ?>
											<div class="callout callout-danger">
												<p>Nombre de usuario o contraseña incorrectos</p>
											</div>
											<?php } ?>
								 		</div>
								 		<div class="box-footer">
								 			<button type="submit" class="btn btn-primary pull-right">Ingresar</button>
								 		</div>
							 		</form>
							 	</div>
							 </div>
						</div>
					</section>
				</div>
					
			</div>
			<!-- /.content-wrapper -->
			<?php include_once 'modulos/Footer.php'; ?>
		</div>
		<!-- ./wrapper -->
		<?php include_once 'modulos/Scripts.php'; ?>
	</body>
</html>
