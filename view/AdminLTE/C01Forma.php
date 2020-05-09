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
									<div class="row">
										<div class="col-xs-12">
											<h3 class="page-header">
												Identificación del productor
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Identificación del productor" data-txt_info="En esta sección se le pide identificarse. La información se utiliza para poder referenciar toda la información que provea a un punto o zona geográfica para su sector en específico. Sus datos son protegidos; el fin único es utilizar la información técnica para el diseño de políticas públicas y estrategias de acción locales en beneficio de los productores y productoras rurales y de los recursos naturales de los que depende el sector agroalimentario.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h3>
										</div>
									</div>
									<!-- Preg. 1 -->
									<div class="row">
										<div class="col-md-4">
											<label>1. Clave de identificación del productor</label>
											<br>
											<span>Por favor indique si es productor independiente o si responde al cuestionario como una organización de productores. Según corresponda, por favor indique su número de CURP o de RFC.</span>
										</div>
										<div class="col-md-4">
											<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p1r1c1','p1r1c1',array('lbl_txt'=>'Tipo de productor')); ?>
										</div>
										<div class="col-md-4">
											<div id="div_p1r1c2">
												<?php echo $controlador_obj->tag_campo->cmpTexto('p1r1c2',array('lbl_txt'=>'CURP')); ?>
											</div>
											<div id="div_p1r2c2">
												<?php echo $controlador_obj->tag_campo->cmpTexto('p1r2c2',array('lbl_txt'=>'RFC')); ?>
											</div>
										</div>
									</div><!-- Preg. 1 -->
									<!-- Preg. 2 -->
									<div class="row">
										<div class="col-md-4">
											<label>2. Ubicación de la unidad de producción</label>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('p2r1c1','cat_estado','cat_estado_id', 'descripcion','',array('lbl_txt'=>'Estado','lectura'=>true))?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('p2r1c2','cat_municipio','cat_municipio_id', 'descripcion',$controlador_obj->and_mpo, array('lbl_txt'=>'Municipio'))?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('p2r1c3','cat_localidad','cat_localidad_id', 'descripcion',$controlador_obj->and_localidad ,array('lbl_txt'=>'Localidad'))?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p2r2c1',4,array('lbl_txt'=>'Latitud'))?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p2r2c2',4,array('lbl_txt'=>'Longitud'))?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-12">
													<?php echo $controlador_obj->tag_campo->cmpTextArea('p2r3c1',array('lbl_txt'=>'Polígono'))?>
												</div>
											</div>
										</div>
									</div><!-- Preg. 2 -->
									<!-- Preg. 3 -->
									<div class="row">
										<div class="col-md-4">
											<label>2. Sector (seleccionar)</label>
										</div>
										<div class="col-md-3">
											<?php 
												echo $controlador_obj->tag_campo->cmpCheckbox('p3r1', '1. Agricultura');
												echo $controlador_obj->tag_campo->cmpCheckbox('p3r2', '2. Ganadería');
												echo $controlador_obj->tag_campo->cmpCheckbox('p3r3', '3. Pesca');
												echo $controlador_obj->tag_campo->cmpCheckbox('p3r4', '4. Acuacultura');
												echo $controlador_obj->tag_campo->cmpCheckbox('p3r5', '5. Silvicultura');
											?>
										</div>
										<div id="div_p3r1_sel" class="col-md-3">
											<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p3r1_ciclo','p3r1_ciclo', array('lbl_txt'=>'Ciclo'))?>
										</div>
									</div><!-- Preg. 3 -->
									
									<div class="row">
										<div class="col-xs-12">
											<h3 class="page-header">
												Mitigación
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Mitigación" data-txt_info="En esta sección se le solicita información sobre su consumo de energía con el fin de estimar las emisiones de gases de efecto invernadero que genera para sus actividades productivas.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h3>
										</div>
									</div>
									<h4 class="text-light-blue">Consumo de energía</h4>
									<!-- Preg. 4 -->
									<div class="row">
										<div class="col-md-4">
											<label>4. ¿Qué tipos de energía y cuánta consume durante el año? (seleccionar los que apliquen, así como la unidad de medida)</label>
										</div>
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-4">
													<label>Tipo</label>
												</div>
												<div class="col-md-4">
													<label>Cantidad</label>
												</div>
												<div class="col-md-4">
													<label>Unidad de medida</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p4r1c1','1. Diesel') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p4r1c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r1c3','p4r1c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p4r2c1','2. Gasolina') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p4r2c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r2c3','p4r2c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p4r3c1','3. Gas natural') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p4r3c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r3c3','p4r3c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p4r4c1','4. Gas LP') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p4r4c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r4c3','p4r4c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p4r5c1','5. Electricidad') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p4r5c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r5c3','p4r5c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p4r6c1','6. Combustóleo') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p4r6c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r6c3','p4r6c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p4r7c1','7. Leña') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p4r7c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r7c3','p4r7c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p4r8c1','8. Carbón') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p4r8c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r8c3','p4r8c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-8">
													<label>Si es productor independiente y realiza riego, por favor indique si es parte de la Asociación de Usuarios de Riego y paga su cuota de consumo eléctrico a dicha organización.</label>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r9','p4r9') ?>
												</div>
											</div>
										</div>
									</div><!-- Preg. 4 -->
									<!-- Preg. 5 -->
									<div class="row">
										<div class="col-md-4">
											<label>5. ¿En qué actividades o equipos consume la energía? (seleccionar las que apliquen)</label>
										</div>
										<div class="col-md-4">
											<?php
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r1','1. Aire acondicionado');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r2','2. Bombeo de agua para propósitos distintos del riego');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r3','3. Bombeo de agua y riego');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r4','4. Calefacción');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r5','5. Calentamiento de agua');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r6','6. Cosechadora');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r7','7. Empacadora');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r8','8. Equipo de enfriamiento');
											?>
										</div>
										<div class="col-md-4">
											<?php
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r9','9. Iluminación');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r10','10. Invernadero');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r11','11. Matanza de animales / rastro');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r12','12. Motores de lancha');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r13','13. Ordeñadora');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r14','14. Secadora de granos');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r15','15. Tractor');
											echo $controlador_obj->tag_campo->cmpCheckbox('p5r16','16. Transporte');
											?>
										</div>
									</div><!-- Preg. 5 -->
									<!-- Preg. 6 -->
									<div class="row">
										<div class="col-md-4">
											<label>6. ¿Qué produce con esta energía durante el año de producción? Por favor seleccionar de la lista, y especifique la cantidad en la unidad que le corresponda</label>
										</div>
										<div class="col-md-6">
											<div class="row">
												<div class="col-md-4">
													<label>Opción</label>
												</div>
												<div class="col-md-4">
													<label>Cantidad</label>
												</div>
												<div class="col-md-4">
													<label>Unidad de medida</label>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p6r1c1','1. Cultivo agrícola') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p6r1c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p6r1c3','p6r1c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p6r2c1','2. Ganado en pie') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p6r2c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p6r2c3','p6r2c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p6r3c1','3. Carne en canal') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p6r3c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p6r3c3','p6r3c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p6r4c1','4. Leche') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p6r4c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p6r4c3','p6r4c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p6r5c1','5. Huevo') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p6r5c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p6r5c3','p6r5c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p6r6c1','6. Pescado') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p6r6c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p6r6c3','p6r6c3') ?>
												</div>
											</div>
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpCheckbox('p6r7c1','7. Madera') ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpNum('p6r7c2',1) ?>
												</div>
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p6r7c3','p6r7c3') ?>
												</div>
											</div>
										</div>
									</div><!-- Preg. 6 -->
									<!-- Preg. 7 -->
									<div class="row">
										<div class="col-md-4">
											<label>7. ¿Ha instalado un proyecto de energía renovable durante el último año?</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p7r1c1','p7r1c1') ?>
										</div>
										<div class="col-md-6" id="div_p7rNc2">
											<label>Por favor indique qué tipo de proyecto tiene instalado</label>
											<?php
											echo $controlador_obj->tag_campo->cmpCheckbox('p7r1c2','1. Sistema Fotovoltaico interconectado');
											echo $controlador_obj->tag_campo->cmpCheckbox('p7r2c2','2. Sistema Fotovoltaico autónomo');
											echo $controlador_obj->tag_campo->cmpCheckbox('p7r3c2','3. Termo solar');
											echo $controlador_obj->tag_campo->cmpCheckbox('p7r4c2','4. Biomasa');
											echo $controlador_obj->tag_campo->cmpCheckbox('p7r5c2','5. Cogeneración');
											echo $controlador_obj->tag_campo->cmpCheckbox('p7r6c2','6. Biodigestor');
											echo $controlador_obj->tag_campo->cmpCheckbox('p7r7c2','7. Minihidráulica');
											echo $controlador_obj->tag_campo->cmpCheckbox('p7r8c2','8. Aerogenerador');
											?>
										</div>
									</div><!-- Preg. 7 -->
									<!-- Preg. 8 -->
									<div class="row">
										<div class="col-md-4">
											<label>8. ¿Ha implementado un proyecto de eficiencia energética durante el último año?</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p8r1c1','p8r1c1') ?>
										</div>
										<div class="col-md-6" id="div_p8rNc2">
											<label>Por favor indique de qué tipo</label>
											<?php
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r1c2','1. Rediseño u optimización integral');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r2c2','2. Cambios en bombeo de agua y riego');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r3c2','3. Cambio de tractor');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r4c2','4. Cambio de cosechadora');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r5c2','5. Cambio de Empacadora');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r6c2','6. Cambio de secadora de granos');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r7c2','7. Cambio de ordeñadora');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r8c2','8. Cambio en equipo de enfriamiento');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r9c2','9. Cambios en sitio de matanza de animales/ rastro');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r10c2','10. Cambio de motores de lancha');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r11c2','11. Cambios en calentamiento de agua');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r12c2','12. Cambios en calefacción');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r13c2','13. Cambios en aire acondicionado');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r14c2','14. Cambios en bombeo de agua para otros propósitos distintos del riego');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r15c2','15. Cambios en Iluminación');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r16c2','16. Cambios en ventilación de edificaciones');
											echo $controlador_obj->tag_campo->cmpCheckbox('p8r17c2','17. Cambios en transporte');
											?>
										</div>
									</div><!-- Preg. 8 -->
									<div id="div_p9_txt">
										<div class="row">
											<div class="col-xs-12">
												<h3 class="page-header">
													Aprovechamiento de residuos de la producción
													<small class="pull-right">
														<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Aprovechamiento de residuos de la producción" data-txt_info="Los residuos agropecuarios manejados adecuadamente son fuentes de biomasa para incrementar y mejorar la materia orgánica en los suelos, para producir energía y para fabricar otros productos de valor agregado. Sin embargo, también pueden producir emisiones de gases y compuestos efecto invernadero.||En esta sección se le solicita que especifique cómo maneja los residuos de sus cultivos, ganado, pesca y/o maderables según su actividad. La información servirá para hacer un mejor estimado de las emisiones derivadas de los residuos agropecuarios y así proponer proyectos relacionados que mejoren la productividad del sector.">
															<i class="fa fa-fw fa-info"></i>
														</a>
													</small>
												</h3>
											</div>
										</div>
										<!-- Preg. 9 -->
										<label>9. De acuerdo a su actividad productiva, por favor llene la tabla para las opciones de especies aplicables, seleccione el método de manejo de los residuos y establezca un porcentaje por tipo de manejo para cada especie.</label>
										<br>
									</div>
									<!-- Preg. 9.1 -->
									<div id="div_p9_gan">
									<?php include_once 'modulos/Cuestionario/C01/P09_gan.php';?>
									</div><!-- Preg. 9.1 -->
									<!-- Preg. 9.2 -->
									<div id="div_p9_agr">
									<?php include_once 'modulos/Cuestionario/C01/P09_agr.php';?>
									</div><!-- Preg. 9.2 -->
									<!-- Preg. 9.3 -->
									<div id="div_p9_a_p">
									<?php include_once 'modulos/Cuestionario/C01/P09_a_p.php';?>
									</div><!-- Preg. 9.3 -->
									<!-- Preg. 9 -->
									<div id="div_p10_txt">
										<div class="row">
											<div class="col-xs-12">
												<h3 class="page-header">
													Adaptación
													<small class="pull-right">
														<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Adaptación" data-txt_info="En esta sección se solicita información relacionada a los insumos utilizados en sus actividades de producción, así como al tipo de prácticas de manejo de los recursos naturales.">
															<i class="fa fa-fw fa-info"></i>
														</a>
													</small>
												</h3>
											</div>
										</div>
										<div class="row">
											<div class="col-xs-12">
												<h4 class="text-light-blue">
													Insumos: antibióticos, fertilizantes y plaguicidas
													<small class="pull-right">
														<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Insumos: antibióticos, fertilizantes y plaguicidas" data-txt_info="El uso de antibióticos en la ganadería y la acuacultura puede llevar a la propagación de bacterias resistentes a estos medicamentos entre los animales, que después pueden transmitirse al ser humano y contribuir al problema de salud pública que representa la resistencia a los antimicrobianos. Por su parte, el uso de plaguicidas y fertilizantes químicos contribuye a emisiones de compuestos orgánicos volátiles, de amoniaco y de óxido nitroso. Además, se asocian a la degradación química de los suelos y en el caso de los plaguicidas a la salud de los agricultores y pérdida de biodiversidad del ecosistema.||En esta sección se pregunta por la cantidad de agroquímicos que utiliza en su actividad productiva, con la finalidad de analizar los consumos a nivel regional y proponer acciones para el uso más eficiente de estos productos.">
															<i class="fa fa-fw fa-info"></i>
														</a>
													</small>
												</h4>
											</div>
										</div>
										<label>10. Suministro de antibióticos</label>
										<br>
									</div>
									<!-- Preg. 10.1 -->
									<div id="div_p10_gan">
										<label class="text-light-blue">10.1 Ganadería</label>
										<div class="row">
    										<div class="col-md-4">
    											<label>10.1.1. ¿Suministra antibióticos a su ganado?</label>
    										</div>
    										<div class="col-md-8">
    											<div class="row">
    												<div class="col-md-3">
    													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p10Gr1c1','sino') ?>
    												</div>
    											</div>
    											<div id="div_p10_1_si">
    												<label>Por favor responda:</label>
    												<div class="row">
    													<div class="col-md-4">
    														<label>10.1.1.1. Número de dosis utilizadas en el año</label>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpNum('p10Gr2c1',1); ?>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p10Gr2c2','p10Gr2c2') ?>
    													</div>
    												</div>
    												<div class="row">
    													<div class="col-md-4">
    														<label>10.1.1.2. ¿Usa antibióticos para estimular el crecimiento?</label>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p10Gr3c1','sino') ?>
    													</div>
    												</div>
    												<div class="row">
    													<div class="col-md-4">
    														<label>10.1.1.3. ¿Aplica antibióticos antes de que el o los animales se enfermen?</label>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p10Gr4c1','sino') ?>
    													</div>
    												</div>
    												<div class="row">
    													<div class="col-md-4">
    														<label>10.1.1.4. ¿Cuál es el antibiótico que aplica más comúnmente?</label>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpTexto('p10Gr5c1'); ?>
    													</div>
    												</div>
    											</div>
    										</div>
    									</div>
									</div><!-- Preg. 10.1 -->
									<!-- Preg. 10.2 -->
									<div id="div_p10_acu">
										<label class="text-light-blue">10.2 Acuacultura</label>
										<div class="row">
    										<div class="col-md-4">
    											<label>10.2.1. ¿Suministra antibióticos a su producción pesquera?</label>
    										</div>
    										<div class="col-md-8">
    											<div class="row">
    												<div class="col-md-3">
    													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p10Ar1c1','sino') ?>
    												</div>
    											</div>
    											<div id="div_p10_2_si">
    												<label>Por favor responda:</label>
    												<div class="row">
    													<div class="col-md-4">
    														<label>10.2.1.1. Número de dosis utilizadas en el año</label>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpNum('p10Ar2c1',1); ?>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p10Ar2c2','p10Ar2c2') ?>
    													</div>
    												</div>
    												<div class="row">
    													<div class="col-md-4">
    														<label>10.2.1.2. ¿Usa antibióticos para estimular el crecimiento?</label>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p10Ar3c1','sino') ?>
    													</div>
    												</div>
    												<div class="row">
    													<div class="col-md-4">
    														<label>10.2.1.3. ¿Aplica antibióticos antes de que el o los animales se enfermen?</label>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p10Ar4c1','sino') ?>
    													</div>
    												</div>
    												<div class="row">
    													<div class="col-md-4">
    														<label>10.2.1.4. ¿Cuál es el antibiótico que aplica más comúnmente?</label>
    													</div>
    													<div class="col-md-3">
    														<?php echo $controlador_obj->tag_campo->cmpTexto('p10Ar5c1'); ?>
    													</div>
    												</div>
    											</div>
    										</div>
    									</div>
									</div><!-- Preg. 10.2 -->
    									
									<!-- Preg. 11 -->
									<div id="div_p11">
										<?php include_once 'modulos/Cuestionario/C01/P11.php'; ?>
									</div><!-- Preg. 11 -->
									<div class="row">
										<div class="col-xs-12">
											<h4 class="text-light-blue">
												Prácticas productivas
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Prácticas productivas" data-txt_info="En esta sección se le solicita información sobre las características de la tecnología que utiliza en su producción. La información se utilizará para analizarse a nivel territorial y proponer proyectos enfocados al incremento de la productividad en línea con la conservación de los recursos naturales y la reducción de la vulnerabilidad.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h4>
										</div>
									</div>
									<label>12. ¿Qué prácticas productivas realiza?</label>
									<br>
									<!-- Preg. 13.1 -->
									<div id="div_p12_a_g">
										<label class="text-light-blue">12.1 Agricultura y ganadería</label>
										<div class="row">
    										<div class="col-md-4">
    											<label>12.1.1. ¿Realiza riego en su unidad de producción?</label>
    										</div>
    										<div class="col-md-8">
    											<div class="row">
    												<div class="col-md-3">
    													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p12AGr1c1','sino') ?>
    												</div>
    											</div>
    											<div id="div_p12AGr1c1_si">
    												<label>Por favor indique de qué tipo y qué superficie</label>
    												<div class="row">
    													<div class="col-md-4">
    														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p12AGr1c2','p12AGr1c2') ?>
    													</div>
    													<div class="col-md-4">
    														<?php echo $controlador_obj->tag_campo->cmpNum('p12AGr1c3',1) ?>
    													</div>
    													<div class="col-md-4">
    														ha
    													</div>
    												</div>
    											</div>
    										</div>
    									</div>
    									<div class="row">
    										<div class="col-md-4">
    											<label>12.1.2. ¿En su unidad de producción tiene sistemas agroforestales?</label><span>Un sistema agroforestal consiste en la integración simultánea y continua de cultivos anuales o perennes, árboles maderables, frutales o de uso múltiple y/o ganadería.</span>
    										</div>
    										<div class="col-md-8">
    											<div class="row">
    												<div class="col-md-3">
    													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p12AGr2c1','sino') ?>
    												</div>
    											</div>
    											<div id="div_p12AGr2c1_si">
    												<div class="row">
    													<div class="col-md-4">
    														<label>Por favor indique en qué superficie</label>
    													</div>
    													<div class="col-md-4">
    														<?php echo $controlador_obj->tag_campo->cmpNum('p12AGr2c2',1) ?>
    													</div>
    													<div class="col-md-4">
    														ha
    													</div>
    												</div>
    												<div class="row">
    													<div class="col-md-4">
    														<label>y qué tipo</label>
    													</div>
    													<div class="col-md-4">
    														<?php echo $controlador_obj->tag_campo->cmpNum('p12AGr2c3',1) ?>
    													</div>
    												</div>
    											</div>
    										</div>
    									</div>
    									<div class="row">
    										<div class="col-md-4">
    											<label>12.1.3. ¿Maneja a su ganado bajo sistemas silvopastoriles?</label>
    											<span>Los sistemas silvopastoriles son terrenos donde se mantienen árboles y a la vez se practica ganadería.</span>
    										</div>
    										<div class="col-md-8">
    											<div class="row">
    												<div class="col-md-3">
    													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p12AGr3c1','sino') ?>
    												</div>
    											</div>
    											<div id="div_p12AGr3c1_si">
    												<div class="row">
    													<div class="col-md-4">
    														<label>Por favor indique en qué superficie</label>
    													</div>
    													<div class="col-md-4">
    														<?php echo $controlador_obj->tag_campo->cmpNum('p12AGr3c2',1) ?>
    													</div>
    													<div class="col-md-4">
    														ha
    													</div>
    												</div>
    											</div>
    										</div>
    									</div>
    									<div class="row">
    										<div class="col-md-4">
    											<label>12.1.4. ¿Realiza manejo integrado del ganado, la fauna silvestre y el hábitat?</label>
    										</div>
    										<div class="col-md-3">
    											<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p12AGr4c1','sino') ?>
    										</div>
    									</div>
									</div><!-- Preg. 13.1 -->
									<!-- Preg. 13.2 -->
									<div id="div_p12_a_p">
    									<label class="text-light-blue">12.2 Acuacultura y pesca</label>
    									<div class="row">
    										<div class="col-md-4">
    											<label>12.2.1. ¿Utiliza métodos y técnicas para la conservación y aprovechamiento racional de los recursos pesqueros y los ecosistemas acuáticos?</label>
    										</div>
    										<div class="col-md-3">
    											<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p12AP','sino') ?>
    										</div>
    									</div>
									</div>
    								<!-- Preg. 13.2 -->
									<!-- Preg. 13.3 -->
									<div id="div_p12_s">
										<label class="text-light-blue">12.3 Silvicultura</label>
										<div class="row">
    										<div class="col-md-4">
    											<label>12.3.1. ¿Realiza prácticas preventivas de combate a incendios?</label>
    										</div>
    										<div class="col-md-4">
    											<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p12Sr1c1','sino') ?>
    										</div>
    									</div>
    									<div class="row">
    										<div class="col-md-4">
    											<label>12.3.2. ¿En su unidad de producción tiene plantaciones forestales comerciales?</label>
    										</div>
    										<div class="col-md-8">
    											<div class="row">
    												<div class="col-md-4">
    													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p12Sr2c1','sino') ?>
    												</div>
    											</div>
    											<div id="div_p12Sr2c1_si">
        											<div class="row">
        												<div class="col-md-4">
        													<label>Por favor indique qué superficie</label>
        												</div>
        												<div class="col-md-4">
        													<?php echo $controlador_obj->tag_campo->cmpNum('p12Sr2c2',1) ?>
        												</div>
        												<div class="col-md-4">
        													ha
        												</div>
        											</div>
    											</div>
    										</div>
    									</div>
									</div><!-- Preg. 13.3 -->
									<div class="row">
										<div class="col-xs-12">
											<h4 class="text-light-blue">
												Percepción sobre la calidad de los recursos naturales
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Percepción sobre la calidad de los recursos naturales" data-txt_info="En esta sección se pregunta su opinión sobre el estado de los recursos naturales que utiliza en su actividad productiva, dado que inciden en la productividad y la resiliencia al cambio climático.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h4>
										</div>
									</div>
									<!-- Preg. 14 -->
									<div id="div_p13">
    									<div class="row">
                                        	<div class="col-md-4">
                                        		<label>13. ¿Cómo considera que es la calidad de los suelos en su unidad de producción?</label>
                                        	</div>
                                        	<div class="col-md-3">
                                        		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p13r1c1','p13r1c1') ?>
                                        	</div>
                                        	<div class="col-md-2">
                                        		<label class="pull-right">¿Por qué?</label>
                                        	</div>
                                        	<div class="col-md-3">
                                        		<?php echo $controlador_obj->tag_campo->cmpTexto('p13r1c2') ?>
                                        	</div>
                                        </div>
									</div><!-- Preg. 14 -->

                                    <!-- Preg. 15 -->
                                    <div class="row">
                                    	<div class="col-md-4">
                                    		<label>14. ¿Cómo considera que es la calidad del agua que consume en su unidad de producción?</label>
                                    	</div>
                                    	<div class="col-md-3">
                                    		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p14r1c1','p14r1c1') ?>
                                    	</div>
                                    	<div class="col-md-2">
                                    		<label class="pull-right">¿Por qué?</label>
                                    	</div>
                                    	<div class="col-md-3">
                                    		<?php echo $controlador_obj->tag_campo->cmpTexto('p14r1c2') ?>
                                    	</div>
                                    </div><!-- Preg. 15 -->
                                    <div class="row">
										<div class="col-xs-12">
											<h4 class="text-light-blue">
												Talleres y capacitaciones
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Talleres y capacitaciones" data-txt_info="Finalmente, se pregunta sobre la disponibilidad de eventos de información y capacitación en relación al cambio climático en su región.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h4>
										</div>
									</div>
                                    <!-- Preg. 16 -->
                                    <div class="row">
                                    	<div class="col-md-4">
                                    		<label>15. ¿Ha acudido a talleres o ha recibido capacitación en relación al cambio climático y la mitigación y adaptación en el sector agroalimentario?</label>
                                    	</div>
                                    	<div class="col-md-3">
                                    		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p15','sino') ?>
                                    	</div>
                                    </div>
                                    <!-- Preg. 16 -->
                                    <!-- Observaciones -->
                                    <div class="row">
                                    	<div class="col-md-4">
                                    		<label>Observaciones</label>
                                    	</div>
                                    	<div class="col-md-8">
                                    		<?php echo $controlador_obj->tag_campo->cmpTextArea('observaciones', array('rows'=>3)) ?>
                                    	</div>
                                    </div>
									<h4 class="text-light-blue text-center">Fin del cuestionario</h4>
									<p class="text-light-blue text-center">Se agradece mucho su participación en el llenado de este cuestionario.</p>
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
		<script src="/<?php echo DIR_LOCAL; ?>/assets/js/FrmC01.js"></script>
		<script>
		$(document).ready(function(){
			Forma.activaCmpEventos();
			FrmC01.activar();
		});
		
		</script>
	</body>
</html>


