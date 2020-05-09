<?php
include_once '../core/Global.php';
include_once '../core/Conectar.class.php';
include_once '../model/Encriptar.class.php';
$cat_usuario_id = (isset($_REQUEST['cat_usuario_id']))? $_REQUEST['cat_usuario_id'] : "";
$clave = (isset($_REQUEST['clave']))? $_REQUEST['clave'] : "";
if($cat_usuario_id=="" || $clave=="")	die("Argumentos insuficientes:<br><code>cat_usuario_id</code> requerido<br><code>clave</code> requerido");

$conexion = new Conectar();
$mysqli = $conexion->getConexion();


$bd_nom = $globales['conexion']['bd'];
$tag_cu = '';
$qry_cu = "SELECT * FROM `".$bd_nom."`.`cat_usuario` WHERE `cat_usuario_id`='".$cat_usuario_id."'";
$rs_cu = $mysqli->query($qry_cu);
if(!$rs_cu)	die("Error al ejecutar el query: ".$qry_cu);
$row_cu = $rs_cu->fetch_assoc();
$usuario = $row_cu['usuario'];
$ll = '1|'.$row_cu['cat_usuario_id'].'|'.$row_cu['usuario'].'|SIAP';


$cr = new Encriptar();
$pw_cr = $cr->encode($clave,$ll);
$rs_cu->close();
$titulo = "Encriptador";
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
	<br>
	<div>
		<p>Para el usuario: <strong><?php echo $usuario; ?></strong> la palaba codificada <strong><?php echo $clave; ?></strong> es <strong><?php echo $pw_cr; ?></strong></p>
	</div>
	<br>
	<div><a href="index.php">Regresar</a></div>
</body>
</html>