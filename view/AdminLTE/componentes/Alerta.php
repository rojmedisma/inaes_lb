<?php
$titulo = "Alerta";
$alerta = ($alerta=="")? 'danger' : $alerta;
?>
<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<body class="hold-transition skin-black layout-top-nav">
		<!-- Site wrapper -->
		<div class="wrapper">
			<div class="content-wrapper">
				<!-- Main content -->
				<section class="content">
					<div class="callout callout-<?php echo $alerta; ?>">
						<h4><?php echo $tit_error ?></h4>
						<p><?php echo $txt_error ?></p>
					</div>
				</section>
				<!-- /.content -->
			</div>
			<!-- /.content-wrapper -->
		</div>
		<?php include_once 'modulos/Scripts.php'; ?>
	</body>
</html>