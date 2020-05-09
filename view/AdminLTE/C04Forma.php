<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="hold-transition skin-black layout-top-nav">
		<form action="" id="frm_cero" name="frm_cero"  method="post">
			<input type="hidden" name="cat_cuestionario_id" value="<?php echo $controlador_obj->getCatCuestionarioId(); ?>">
			<?php echo $controlador_obj->tag_campo->cmpOculto('cuestionario_id'); ?>
		</form>
		<div class="wrapper">
			<?php include_once 'modulos/Header.php'; ?>
			<!-- Full Width Column -->
			<div class="content-wrapper">
				<div class="container">
					<?php include_once 'modulos/ContentHeader.php'; ?>
					<!-- Main content -->
					<section class="content">
						<div class="box box-primary">
							<form name="frm_cuest" id="frm_cuest" role="form" method="post" action="<?php echo url_controlador('cuestionario','guardar', '', false) ?>">
								<?php echo $controlador_obj->tag_campo->cmpOculto('cuestionario_id'); ?>
								<?php echo $controlador_obj->tag_campo->cmpOculto('cat_cuestionario_id'); ?>
								<?php echo $controlador_obj->tag_campo->cmpOculto('cat_usuario_id'); ?>
								<?php echo $controlador_obj->tag_campo->cmpOculto('cat_estado_id'); ?>
								<?php echo $controlador_obj->tag_campo->cmpOculto('cat_cader_id'); ?>
								<?php echo $controlador_obj->tag_campo->cmpOculto('estatus_cuest'); ?>
								<div class="box-header with-border">
									<h3 class="box-title"><?php echo $controlador_obj->cat_cuestionario->get_val_campo('descripcion'); ?></h3>
									<?php include 'modulos/Cuestionario/Botones.php'; ?>
								</div>
								<div class="box-body">
									<!-- Datos informativos del cuestionario -->
									<div class="row">
										<div class="col-md-4">
											<?php if(!$controlador_obj->es_nuevo){?>
												<label>Fecha de creación:</label> <span><?php echo $controlador_obj->tag_campo->getValor('creacion_fecha')." ".$controlador_obj->tag_campo->getValor('creacion_hora'); ?></span>
											<?php }?>
										</div>
										<div class="col-md-4">
											<?php if(!$controlador_obj->es_nuevo){?>
												<label>Id:</label> <span><?php echo $controlador_obj->getCuestionarioId(); ?></span>
											<?php }?>
										</div>
										<div class="col-md-4">
											<p class="pull-right"><?php echo $controlador_obj->getTagEstatus($controlador_obj->tag_campo->getValor('estatus_cuest')); ?></p>
										</div>
									</div>
									<div class="callout callout-info">
										<?php echo nl2br($controlador_obj->cat_cuestionario->get_val_campo('definicion')); ?>
									</div>
									<p>Los indicadores se deben registrar a nivel de municipios.</p>
									<div class="row">
										<div class="col-md-4">
											<label>Entidad</label>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('estado','cat_estado','cat_estado_id', 'descripcion','',array('lbl_txt'=>'Estado','lectura'=>true))?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('cader','cat_cader','cat_cader_id', 'descripcion','',array('lbl_txt'=>'CADER','lectura'=>true))?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('municipio','cat_mpo_cader','cat_municipio_id', 'cat_municipio_desc',$controlador_obj->and_mpo,array('lbl_txt'=>'Municipio'))?>
												</div>
											</div>
										</div>
									</div>
									<h4 class="text-light-blue">Suelo</h4>
									<div class="row">
										<div class="col-md-4">
											<label>1. Índice de calidad del suelo</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p1r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>adimensional</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p1r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<h4 class="text-light-blue">Agua</h4>
									<div class="row">
										<div class="col-md-4">
											<label>2. Consumo de agua subterránea</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p2r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>Miles de Hm3/año</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p2r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>3. Consumo de agua superficial</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p3r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>Miles de Hm3/año</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p3r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>4. Agua pluvial disponible</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p4r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>mm /año</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p4r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>5. Proporción del agua disponible que es de calidad adecuada</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p5r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>%</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p5r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<h4 class="text-light-blue">Ecosistemas</h4>
									<div class="row">
										<div class="col-md-4">
											<label>6. Integridad del ecosistema</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p6r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>adimensional</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p6r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<label>7. Cobertura vegetal</label>
									<div class="row">
										<div class="col-md-4">
											<label>7.1 Superficie sin datos</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p7r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p7r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>7.2 Superficie de bosque templado</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p7r2c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p7r2c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>7.3 Superficie de selvas</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p7r3c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p7r3c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>7.4 Superficie de matorral</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p7r4c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p7r4c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>7.5 Superficie con vegetación menor y pastizales</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p7r5c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p7r5c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>7.6 Superficie con tierras agrícolas</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p7r6c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p7r6c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>7.7 Superficie de uso urbano y construido</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p7r7c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p7r7c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>7.8 Superficie con suelo desnudo</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p7r8c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p7r8c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>7.9 Superficie con agua</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p7r9c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p7r9c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<h4 class="text-light-blue">Agrobiodiversidad</h4>
									<div class="row">
										<div class="col-md-4">
											<label>8. Índice de diversidad aves silvestres en áreas productivas</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p8r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p8r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>9. Índice de diversidad pecuaria</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p9r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p9r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>10. Índice de diversidad vegetal</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p10r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p10r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>11. Índice de polinizadores en áreas productivas</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p11r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p11r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>12. Índice de productividad del hábitat basado en NDVI</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p12r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p12r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<h4 class="text-light-blue">Productividad</h4>
									<div class="row">
										<div class="col-md-4">
											<label>13. Productividad agrícola de temporal</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p13r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>t/ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p13r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>14. Productividad agrícola de riego</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p14r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>t/ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p14r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>15. Porcentaje de superficie agrícola para producir alimentos</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p15r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>%</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p15r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>16. Superficie agrícola con siniestros</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p16r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p16r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<h4 class="text-light-blue">Actividades que ocurren en el territorio </h4>
									<div class="row">
										<div class="col-md-4">
											<label>17. Superficie bajo esquema de pagos por servicios ambientales en territorios e inmediaciones de producción agropecuaria</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p17r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p17r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>18. Superficie con presencia de incendios</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p18r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p18r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>19. Superficie donde ocurre tala ilegal</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p19r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p19r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>20. Superficie asegurada con criterios de cambio climático</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p20r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>ha</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p20r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>21. Porcentaje de productores que han integrado prácticas ancestrales, tradicionales y locales con conocimientos científicos</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p21r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>%</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p21r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>22. Porcentaje de la producción pesquera y acuícola bajo producción sustentable</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p22r1c1',2,array('lbl_txt'=>'Valor')) ?>
										</div>
										<div class="col-md-2">
											<label>Unidades</label>
											<p>%</p>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpTextArea('p22r1c2', array('lbl_txt'=>'Fuente','rows'=>2));?>
										</div>
									</div>
								</div>
								<div class="box-footer">
									<?php include 'modulos/Cuestionario/Botones.php'; ?>
								</div>
							</form>
						</div>
					</section>
					<!-- /.content -->
				</div>
				<!-- /.container -->
			</div>
			<!-- /.content-wrapper -->
			<?php include 'modulos/Cuestionario/Modal.php'; ?>
			<?php include_once 'modulos/Footer.php'; ?>
		</div>
		<!-- ./wrapper -->
		<?php include_once 'modulos/Scripts.php'; ?>
		<script src="/<?php echo DIR_LOCAL; ?>/assets/js/FrmC04.js"></script>
		<script>
		$(document).ready(function(){
			Forma.activaCmpEventos();
			FrmC04.activar();
		});
		</script>
	</body>
</html>


