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
											<!-- Contenido que se manda al modal para desplegar dicha información -->
											<div id="div_txt_ord_t" style="display:none" >
												<p>El ordenamiento territorial es una política pública que tiene como objeto la ocupación y utilización racional del territorio como base espacial de las estrategias de desarrollo socioeconómico y la preservación ambiental.</p>
												<ul>
													<li>A los municipios les compete "formular, aprobar, administrar y ejecutar los planes o programas municipales de Desarrollo Urbano, de Centros de Población y los demás que de éstos deriven, adoptando normas o criterios de congruencia, coordinación y ajuste con otros niveles superiores de planeación, las normas oficiales mexicanas, así como evaluar y vigilar su cumplimiento".</li>
													<li>A los estados les corresponde "formular, aprobar y administrar su programa estatal de ordenamiento territorial y desarrollo urbano, así como vigilar y evaluar su cumplimiento con la participación de los municipios y la sociedad". (Ley general de asentamientos humanos, ordenamiento territorial y desarrollo urbano).</li>
												</ul>
												<p>En 2014, el INECC propuso incorporar el enfoque de cuencas al ordenamiento territorial. Este enfoque supone describir y planear alrededor de los siguientes aspectos:</p>
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
											<label>Estado</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpSelectDeTbl('estado','cat_estado','cat_estado_id', 'descripcion','',array('lectura'=>true))?>
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
											<label>2. ¿Existe un Plan de ordenamiento territorial para su estado?</label>
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
												Sistemas de alerta temprana
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Sistemas de alerta temprana" data-txt_info="Los sistemas de alerta temprana buscan reducir el riesgo de desastres. Su objetivo es dar elementos de toma de decisiones a quienes se enfrentan una amenaza, de manera que se actúe con suficiente tiempo, adecuadamente y con las menores pérdidas posibles. Implica el conocimiento de los riesgos, un servicio de alerta, la difusión y comunicación de información sobre los riesgos y las alertas, y el desarrollo de capacidades de respuesta.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h3>
										</div>
									</div>
									<!-- Preg. 3 -->
									<div class="row">
										<div class="col-md-4">
											<label>3. ¿El estado cuenta con sistemas de alerta temprana vigentes?</label>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-3">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p3r1c1','sino') ?>
												</div>
											</div>
											<div id="div_p3r1c1_si">
												<div class="row">
													<div class="col-md-4">
														<label>3.1 ¿Con cuántos sistemas cuenta?</label>
													</div>
													<div class="col-md-3">
														<?php echo $controlador_obj->tag_campo->cmpNum('p3r2c1',0) ?>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<label>3.2 Por favor, enuncie los más relevantes</label>
													</div>
													<div class="col-md-8">
														<?php echo $controlador_obj->tag_campo->cmpTexto('p3r3c1') ?>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
														<label>3.3 ¿Cuántos de esos sistemas tocan al sector agroalimentario?</label>
													</div>
													<div class="col-md-3">
														<?php echo $controlador_obj->tag_campo->cmpNum('p3r4c1',0) ?>
													</div>
												</div>
											</div>
										</div>
									</div><!-- Preg. 3 -->
									<div class="row">
										<div class="col-xs-12">
											<h3 class="page-header">
												Cadenas de valor
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Cadenas de valor" data-txt_info="Cadena de valor es la interpretación del análisis económico de una cadena productiva, con énfasis en las relaciones de costo/beneficio y en el valor agregado durante cada una de las distintas etapas. Comprende la visión estratégica comercial de aumentar las ventajas competitivas y el rendimiento económico del proceso. Así, los eslabones la una cadena de valor son: insumos, procesos productivos, postcosecha y transformación, desarrollo de mercados agrícolas y comercialización.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h3>
										</div>
									</div>
									<!-- Preg. 4 -->
									<div class="row">
										<div class="col-md-4">
											<label>4. ¿Cuántas son las cadenas de valor más relevantes en su estado?</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p4',0) ?>
										</div>
									</div><!-- Preg. 4 -->
									<!-- Preg. 5 -->
									<div class="row">
										<div class="col-md-4">
											<label>5. Por favor, enúncielas</label>
										</div>
										<div class="col-md-8">
											<?php echo $controlador_obj->tag_campo->cmpTexto('p5') ?>
										</div>
									</div><!-- Preg. 5 -->
									<!-- Preg. 6 -->
									<div class="row">
										<div class="col-md-12">
											<label>6. Por favor indique el número de cadenas para las que el estado dispone de información documentada vigente sobre los siguientes temas:</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>6.1 Condiciones productivas (tecnologías utilizadas, calidades disponibles, análisis del mercado y requerimientos)</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p6r1c1',0) ?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-4">
											<label>6.2 Condiciones ambientales (cómo el contexto ambiental afecta y se ve afectado por la cadena)</label>
										</div>
										<div class="col-md-2">
											<?php echo $controlador_obj->tag_campo->cmpNum('p6r2c1',0) ?>
										</div>
									</div>
									<div class="row">
										<div class="col-xs-12">
											<h3 class="page-header">
												Recursos para atención a desastres
												<small class="pull-right">
													<a href="#" data-toggle="modal" data-target="#modal_info" data-txt_tit="Mitigación" data-txt_info="El Fondo Nacional para la Prevención de Desastres Naturales (FOPREDEN) tiene el objetivo de 'poner en condiciones seguras y de sobrevivencia a la población en situación de riesgo'.">
														<i class="fa fa-fw fa-info"></i>
													</a>
												</small>
											</h3>
										</div>
									</div>
									<!-- Preg. 7 -->
									<div class="row">
										<div class="col-md-4">
											<label>7. ¿El Estado recibió recursos derivados del FOPREDEN?</label>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p7r1c1','sino') ?>
												</div>
											</div>
											<div id="div_p7r1c1_si">
												<div class="row">
													<div class="col-md-4">
														<label>7.1 ¿El recurso o parte de esté se destinó a zonas rurales donde se realiza producción agroalimentaria?</label>
													</div>
													<div class="col-md-3">
														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p7r2c1','sino') ?>
													</div>
												</div>
												<div id="div_p7r2c1_si">
													<div class="row">
														<div class="col-md-4">
															<label>7.1.1 ¿Qué monto se aplicó en estas zonas?</label>
														</div>
														<div class="col-md-3">
															<?php echo $controlador_obj->tag_campo->cmpNum('p7r3c1',2) ?>
														</div>
														<div class="col-md-3">
															NMX
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- Preg. 7 -->
									<!-- Preg. 8 -->
									<div class="row">
										<div class="col-md-4">
											<label>8. ¿El estado recibió recursos del FONDEN?</label>
										</div>
										<div class="col-md-8">
											<div class="row">
												<div class="col-md-4">
													<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p8r1c1','sino') ?>
												</div>
											</div>
											<div id="div_p8r1c1_si">
												<div class="row">
													<div class="col-md-4">
														<label>8.1 ¿El recurso o parte de este se destinó a zonas rurales donde se realiza producción agroalimentaria?</label>
													</div>
													<div class="col-md-3">
														<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p8r2c1','sino') ?>
													</div>
												</div>
												<div id="div_p8r2c1_si">
													<div class="row">
														<div class="col-md-4">
															<label>8.1.1 ¿Qué monto se destinó a estas zonas?</label>
														</div>
														<div class="col-md-3">
															<?php echo $controlador_obj->tag_campo->cmpNum('p8r3c1',2) ?>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- Preg. 8 -->
									<!-- Observaciones -->
                                    <div class="row">
                                    	<div class="col-md-4">
                                    		<label>Observaciones</label>
                                    	</div>
                                    	<div class="col-md-8">
                                    		<?php echo $controlador_obj->tag_campo->cmpTextArea('observaciones', array('rows'=>3)) ?>
                                    	</div>
                                    </div>
									<!-- Preg. 6 -->
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
		<script src="/<?php echo DIR_LOCAL; ?>/assets/js/FrmC02.js"></script>
		<script>
		$(document).ready(function(){
			Forma.activaCmpEventos();
			FrmC02.activar();
		});
		</script>
	</body>
</html>


