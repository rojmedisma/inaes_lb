<!-- Ficha técnica -->
							<form role="form" name="frm_ficha_t" id="frm_ficha_t" method="post" action="<?php echo url_controlador('mml_ficha_t','guardar', '', false) ?>">
								<div class="card-body">
									<h4 class="text-primary">Datos de Identificación del Indicador</h4>
									<div class="row">
										<div class="col-md-6">
										<?php echo $controlador_obj->tag_cmp_ficha->cmpSelectDeSubCat("jerarquia_res", "ft_jerarquia_res", array("lbl_txt"=>"Jerarquía de Resultados:")); ?>
										</div>
									</div>
									<?php echo $controlador_obj->tag_cmp_ficha->cmpTexto("ind_nombre", array("lbl_txt"=>"Nombre del Indicador:")); ?>
									<div class="row">
										<div class="col-md-6">
										<?php echo $controlador_obj->tag_cmp_ficha->cmpSelectDeSubCat("ind_dimension", "ft_ind_dimension", array("lbl_txt"=>"Tipo de Indicador:")); ?>
										</div>
										<div class="col-md-6">
										<?php echo $controlador_obj->tag_cmp_ficha->cmpSelectDeSubCat("ind_tipo", "ft_ind_tipo", array("lbl_txt"=>"Dimensión del indicador:")); ?>
										</div>
									</div>
									<?php echo $controlador_obj->tag_cmp_ficha->cmpTextArea("ind_definicion", array("lbl_txt"=>"Definición del Indicador:")); ?>
									<?php echo $controlador_obj->tag_cmp_ficha->cmpTextArea("metodo_calculo", array("lbl_txt"=>"Método del cálculo:")); ?>
									<?php echo $controlador_obj->tag_cmp_ficha->cmpTextArea("formula", array("lbl_txt"=>"Fórmula:")); ?>
									<div class="row">
										<div class="col-md-6">
										<?php echo $controlador_obj->tag_cmp_ficha->cmpSelectDeSubCat("tp_val_meta", "ft_tp_val_meta", array("lbl_txt"=>"Tipo de valor de la Meta:")); ?>
										</div>
										<div class="col-md-6">
										<?php echo $controlador_obj->tag_cmp_ficha->cmpSelectDeSubCat("unidad_med", "ft_unidad_med", array("lbl_txt"=>"Unidad de medida:")); ?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?php echo $controlador_obj->tag_cmp_ficha->cmpTexto("desgrega_geo", array("lbl_txt"=>"Desagregación geográfica:")); ?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?php echo $controlador_obj->tag_cmp_ficha->cmpSelectDeSubCat("frec_medicion", "ft_frec_medicion", array("lbl_txt"=>"Frecuencia de medición:")); ?>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<?php echo $controlador_obj->tag_cmp_ficha->cmpSelectDeSubCat("ind_comporta", "ft_ind_comporta", array("lbl_txt"=>"Comportamiento del indicador:")); ?>
										</div>
									</div>
								</div><!-- /.card-body -->
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Guardar</button>
								</div><!-- /.card-footer -->
							</form>
