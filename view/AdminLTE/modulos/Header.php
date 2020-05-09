
<header class="main-header">
	<nav class="navbar navbar-static-top">
		<div class="container">
			<div class="navbar-header">
				<a href="<?php echo url_controlador(CONTROLADOR_DEFECTO, ACCION_DEFECTO, '', false); ?>" class="navbar-brand">Herramienta para el registro y seguimiento a actividades de la Agenda de Cambio Climático y Producción Agroalimentaria</a>
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
				<i class="fa fa-bars"></i>
				</button>
			</div>
			<!-- Navbar Right Menu -->
			<div class="navbar-custom-menu">
				<ul class="nav navbar-nav">
				<?php include_once 'DropdownUserMenu.php';?>
				</ul>
			</div>
			<!-- /.navbar-custom-menu -->
		</div>
		<!-- /.container-fluid -->
	</nav>
</header>