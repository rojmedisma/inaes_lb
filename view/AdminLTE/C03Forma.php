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
												Ordenamiento territorial
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Ordenamiento territorial" data-id_info="#div_txt_ord_t">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h3>
											<div id="div_txt_ord_t" style="display:none" >
												<p>El ordenamiento territorial es una política pública que tiene como objeto la ocupación y utilización racional del territorio como base espacial de las estrategias de desarrollo socioeconómico y la preservación ambiental.</p>
												<ul>
													<li>A los municipios les compete “formular, aprobar, administrar y ejecutar los planes o programas municipales de Desarrollo Urbano, de Centros de Población y los demás que de éstos deriven, adoptando normas o criterios de congruencia, coordinación y ajuste con otros niveles superiores de planeación, las normas oficiales mexicanas, así como evaluar y vigilar su cumplimiento”.</li>
													<li>A los estados les corresponde “formular, aprobar y administrar su programa estatal de ordenamiento territorial y desarrollo urbano, así como vigilar y evaluar su cumplimiento con la participación de los municipios y la sociedad”. (Ley General de Asentamientos Humanos, Ordenamiento Territorial y Desarrollo Urbano).</li>
												</ul>
												<p>En 2014, el INECC (Instituto Nacional de Ecología y Cambio Climático) propuso incorporar el enfoque de cuencas al ordenamiento territorial. Este enfoque supone describir y planear alrededor de los siguientes aspectos:</p>
												<ul>
													<li>La transformación humana de los ecosistemas por zona funcional</li>
													<li>Sistemas prioritarios de conservación por zona funcional</li>
													<li>Reservas potenciales de agua para el medio ambiente</li>
													<li>Conflictos por el agua según su origen</li>
													<li>Déficit de saneamiento de aguas residuales</li>
													<li>Impacto potencial de los ríos y cuerpos de agua por residuos sólidos</li>
													<li>Contaminación potencial difusa por actividad agrícola</li>
													<li>Presión sobre el recurso hídrico (superficial y subterráneo)</li>
													<li>Alteración ecohidrológica de los ríos</li>
												</ul>
												<p>Considerando lo anterior, por favor responda a las siguientes preguntas.</p>
											</div>
										</div>
									</div>
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
									
									<!-- Preg. 1 -->
									<div class="row">
										<div class="col-md-4">
											<label>1. ¿Cuál es el cargo de la persona, servidor(a) público(a) que responde a este cuestionario?</label>
										</div>
										<div class="col-md-8">
											<?php echo $controlador_obj->tag_campo->cmpTexto('p1'); ?>
										</div>
									</div><!-- Preg. 1 -->
									<!-- Preg. 2 -->
									<div class="row">
										<div class="col-md-4">
											<label>2. ¿Existe un Plan de ordenamiento territorial vigente para su municipio?</label>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-3">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p2r1c1','sino') ?>
												</div>
											</div>
											<div id="div_p2r1c1_si">
												<div class="row">
													<div class="col-md-4">
														<label>2.1 ¿Dicho plan tiene o considera un enfoque de cuencas hidrográficas vinculantes?</label>
													</div>
													<div class="col-md-3">
														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p2r2c1','sino') ?>
													</div>
												</div>
											</div>
										</div>
									</div><!-- Preg. 2 -->
									<div class="row">
										<div class="col-xs-12">
											<h3 class="page-header">
												Programa Municipal de Cambio Climático
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Programa Municipal de Cambio Climático" data-id_info="#div_txt_prog_mcc">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h3>
											<!-- Contenido que se manda al modal para desplegar dicha información -->
											<div id="div_txt_prog_mcc" style="display:none">
												<p>La Ley General de Cambio Climático establece que los municipios deberán formular e instrumentar políticas y acciones para enfrentar al cambio climático en congruencia con el Plan Nacional de Desarrollo, la Estrategia Nacional, el Programa Nacional de Cambio Climático, el Programa estatal en materia de cambio climático y con las leyes aplicables […]. Entre las materias por las que los municipios son responsables se encuentran el ordenamiento ecológico local, el desarrollo urbano y los recursos naturales. Otras atribuciones importantes son:</p>
												<ul>
													<li>Fomentar la investigación científica y tecnológica, el desarrollo, transferencia y despliegue de tecnologías, equipos y procesos para la mitigación y adaptación al cambio climático;</li>
													<li>Realizar campañas de educación e información, en coordinación con el gobierno estatal y federal, para sensibilizar a la población sobre los efectos adversos del cambio climático;</li>
													<li>Elaborar e integrar, en colaboración con el INECC, la información de las categorías de Fuentes Emisoras que se originan en su territorio, para su incorporación al Inventario Nacional de Emisiones […]</li>
												</ul>
												<p>Considerando lo anterior, por favor responda.</p>
											</div>
										</div>
									</div>
									<!-- Preg. 3 -->
									<div class="row">
										<div class="col-md-4">
											<label>3. ¿El municipio cuenta con un programa de acción climática municipal (PACMUN)?</label>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-3">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p3r1c1','sino') ?>
												</div>
											</div>
											<div id="div_p3r1c1_si">
												<div class="row">
													<div class="col-md-8">
														<label>3.1	¿Su PACMUN considera acciones en las zonas rurales donde ser realiza la producción agroalimentaria?</label>
													</div>
													<div class="col-md-4">
														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p3r2c1','sino') ?>
													</div>
												</div>
												<div id="div_p3r2c1_si">
													<label>Por favor indique si su PACMUN considera alguno de los siguientes temas:</label>
													<div class="row">
														<div class="col-md-8">
															<label>3.1.1. Reducción de emisiones y fortalecimiento de sistemas productivos agroalimentarios sostenibles</label>
														</div>
														<div class="col-md-4">
															<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p3r3c1','c03p3rNc1') ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-8">
															<label>3.1.2. Estrategias de carbono neutral en subsectores agroalimentarios</label>
														</div>
														<div class="col-md-4">
															<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p3r4c1','c03p3rNc1') ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-8">
															<label>3.1.3. Incorporación de prácticas sostenibles de los sistemas productivos, gestión integral de cuencas y conservación de la biodiversidad y los suelos</label>
														</div>
														<div class="col-md-4">
															<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p3r5c1','c03p3rNc1') ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-8">
															<label>3.1.4. Medidas sobre preparación, mitigación, recuperación y respuesta ante riesgos de origen hidrometeorológicos y amenazas climáticas en zonas del sector agroalimentario</label>
														</div>
														<div class="col-md-4">
															<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p3r6c1','c03p3rNc1') ?>
														</div>
													</div>
													<div class="row">
														<div class="col-md-8">
															<label>3.1.5. Medidas para lograr que los actores clave del sector agroalimentario cuenten con la información relevante sobre cambio climático</label>
														</div>
														<div class="col-md-4">
															<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p3r7c1','c03p3rNc1') ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- Preg. 3 -->
									<div class="row">
										<div class="col-xs-12">
											<h3 class="page-header">
												Atlas de Riesgo
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Atlas de Riesgo" data-txt_info="Un Altlas de Riesgo es un 'documento dinámico cuyas evaluaciones de riesgo en asentamientos humanos, regiones o zonas geográficas vulnerables, consideran los actuales y futuros escenarios climáticos'.||La Ley General de Cambio Climático establece que 'en materia de protección civil, la Federación, las Entidades Federativas y los Municipios deberán establecer un Programa a fin de que antes de que finalice el año 2013 se integren y publiquen el atlas nacional de riesgo, los atlas estatales y locales de riesgo de los asentamientos humanos más vulnerables ante el cambio climático'.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h3>
										</div>
									</div>
									<!-- Preg. 4 -->
									<div class="row">
										<div class="col-md-4">
											<label>4. ¿El municipio cuenta con un atlas de riesgo vigente?</label>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-3">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r1c1','sino') ?>
												</div>
											</div>
											<div id="div_p4r1c1_si">
												<div class="row">
													<div class="col-md-4">
														<label>4.1 ¿Dicho atlas contempla el área rural?</label>
													</div>
													<div class="col-md-3">
														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p4r2c1','sino') ?>
													</div>
												</div>
											</div>
										</div>
									</div><!-- Preg. 4 -->
									<div class="row">
										<div class="col-xs-12">
											<h3 class="page-header">
												Recursos para atención a desastres
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Recursos para atención a desastres" data-txt_info="El Fondo Nacional para la Prevención de Desastres Naturales (FOPREDEN) tiene el objetivo de 'poner en condiciones seguras y de sobrevivencia a la población en situación de riesgo'.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h3>
										</div>
									</div>
									<!-- Preg. 5 -->
									<div class="row">
										<div class="col-md-4">
											<label>5. ¿El municipio recibió recursos derivados del FOPREDEN?</label>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-3">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p5r1c1','sino') ?>
												</div>
											</div>
											<div id="div_p5r1c1_si">
												<div class="row">
													<div class="col-md-4">
														<label>5.1 ¿El recurso o parte de esté se destinó a zonas rurales donde se realiza producción agroalimentaria?</label>
													</div>
													<div class="col-md-3">
														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p5r2c1','sino') ?>
													</div>
												</div>
												<div id="div_p5r2c1_si">
													<div class="row">
														<div class="col-md-4">
															<label>5.1.1 ¿Qué monto se aplicó en estas zonas?</label>
														</div>
														<div class="col-md-3">
															<?php echo $controlador_obj->tag_campo->cmpNum('p5r3c1',2) ?>
														</div>
														<div class="col-md-1">
														NMX
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<!-- Preg. 5 -->
									
									
									<!-- Observaciones -->
                                    <div class="row">
                                    	<div class="col-md-4">
                                    		<label>Observaciones</label>
                                    	</div>
                                    	<div class="col-md-8">
                                    		<?php echo $controlador_obj->tag_campo->cmpTextArea('observaciones', array('rows'=>3)) ?>
                                    	</div>
                                    </div>
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
		<script src="/<?php echo DIR_LOCAL; ?>/assets/js/FrmC03.js"></script>
		<script>
		$(document).ready(function(){
			Forma.activaCmpEventos();
			FrmC03.activar();
		});
		</script>
	</body>
</html>