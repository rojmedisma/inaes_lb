<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<body class="hold-transition login-page">
		<?php include_once 'modulos/FrmCero.php'; ?>
		<div class="login-box">
			<div class="login-logo">
				<a href="#"><b>SIAP</b> CC</a>
			</div>
			<!-- /.login-logo -->
			<div class="login-box-body">
				<p class="login-box-msg">Iniciar sesión</p>
				<form action="<?php echo url_controlador('autentificar','autentificar', '', false) ?>" method="post">
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
					<div class="row">
						<div class="col-xs-8">
						</div>
						<!-- /.col -->
						<div class="col-xs-4">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
						</div>
						<!-- /.col -->
					</div>
				</form>
				<!-- /.social-auth-links -->
			</div>
			<?php if($controlador_obj->getEsInfoIncorrecta()){ ?>
			<div class="social-auth-links text-center">
				<div class="callout callout-danger">
					<p>Nombre de usuario o contraseña incorrectos</p>
				</div>
			</div>
			<?php } ?>
			<!-- /.login-box-body -->
		</div>
		<!-- /.login-box -->
		<?php include_once 'modulos/Scripts.php'; ?>
	</body>
</html>