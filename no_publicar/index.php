<?php
include_once '../core/Global.php';
include_once '../core/Conectar.class.php';
include_once '../model/Encriptar.class.php';

$conexion = new Conectar();
$mysqli = $conexion->getConexion();
$bd_nom = $globales['conexion']['bd'];
$tag_cu = '';
$qry_cu = "SELECT * FROM `".$bd_nom."`.`cat_usuario`";
$rs_cu = $mysqli->query($qry_cu);
if(!$rs_cu)	die("Error al ejecutar el query: ".$qry_cu);
while($row_cu = $rs_cu->fetch_assoc()){
	$ll = '1|'.$row_cu['cat_usuario_id'].'|'.$row_cu['usuario'].'|SIAP';
	
	$cr = new encriptar;
	$pw_cr = $cr->decode($row_cu['clave'],$ll);
	
	$tag_cu .= '
		<tr>
			<td>'.$row_cu['usuario'].'</td>
			<td>'.$pw_cr.'</td>
		</tr>
	';
}
$rs_cu->close();
$titulo = "Claves";
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="es"> <!--<![endif]-->
<head>
<title><?php echo $titulo; ?></title>

	<!-- Meta -->
	<meta charset="<?php echo HTML_CODIFICACION; ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Ismael Rojas Medina">
</head>
<body>
	<div>
		<table border="1">
			<thead>
				<tr>
					<th>Usuario</th>
					<th>Clave</th>
				</tr>
			</thead>
			<tbody>
				<?php echo $tag_cu; ?>
			</tbody>
		</table>
	</div>
	<br>
	<div><a href="encriptador.php">Ir a encriptador</a></div>
</body>
</html>