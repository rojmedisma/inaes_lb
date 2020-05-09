<!-- Definición de variables -->
							<form role="form" name="frm_ficha_t" id="frm_ficha_t" method="post" action="<?php echo url_controlador('mml_ficha_t','guardar', '', false) ?>">
								<div class="card-body">
									<h4 class="text-primary">Características de las Variables</h4>
									<?php if(count($controlador_obj->getArrVariablesDef())){?>
									<div class="row">
										<div class="col-5 col-sm-3">
											<div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
											<?php foreach ($controlador_obj->getArrVariablesDef() as $arr_det){?>
												<a class="nav-link a_ve_tab_var" id="a_ve_tab_var_id_<?php echo $arr_det["mml_variable_def_id"]; ?>" data-var_id="<?php echo $arr_det["mml_variable_def_id"]; ?>" href="#" role="tab" aria-selected="false">Variable: <?php echo strtoupper($arr_det['var_en_formula']); ?></a>
											<?php }?>
											</div>
										</div>
										<div class="col-7 col-sm-9">
											<div class="tab-content">
												<?php
												echo $controlador_obj->tag_cmp_var_def->cmpTexto("var_nombre",array("lbl_txt"=>"Nombre de la Variable:"));
												echo $controlador_obj->tag_cmp_var_def->cmpTextArea("var_definicion",array("lbl_txt"=>"Descripción de la Variable:"));
												echo $controlador_obj->tag_cmp_var_def->cmpTextArea("medio_verifica",array("lbl_txt"=>"Medios de Verificación:"));
												?>
												<div class="row">
													<div class="col-md-7">
													<?php echo $controlador_obj->tag_cmp_var_def->cmpSelectDeSubCat("unidad_med","ft_unidad_med", array("lbl_txt"=>"Unidad de Medida:")); ?>
													</div>
												</div>
												<div class="row">
													<div class="col-md-7">
													<?php echo $controlador_obj->tag_cmp_var_def->cmpTexto("desgrega_geo",array("lbl_txt"=>"Desagregación geográfica:")); ?>
													</div>
												</div>
												<div class="row">
													<div class="col-md-4">
													<?php echo $controlador_obj->tag_cmp_var_def->cmpSelectDeSubCat("frec_medicion","ft_frec_medicion", array("lbl_txt"=>"Frecuencia de Medición:")); ?>
													</div>
													<div class="col-md-8">
													<?php echo $controlador_obj->tag_cmp_var_def->cmpTexto("frec_medicion_det",array("lbl_txt"=>"Frecuencia de Medició - Detalle:")); ?>
													</div>
												</div>
												<?php 
												echo $controlador_obj->tag_cmp_var_def->cmpTextArea("unidad_resp_info",array("lbl_txt"=>"Unidad Responsable de la información:"));
												echo $controlador_obj->tag_cmp_var_def->cmpTextArea("var_fecha_disp_info",array("lbl_txt"=>"Fecha de Disponibilidad de la Variable:"));
												echo $controlador_obj->tag_cmp_var_def->cmpTextArea("consideraciones_ad",array("lbl_txt"=>"Consideraciones adicionales:"));
												?>
											</div>
										</div>
									</div>
									<?php }else{?>
									No hay variables
									<?php }?>
								</div><!-- /.card-body -->
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Guardar</button>
								</div><!-- /.card-footer -->
							</form>