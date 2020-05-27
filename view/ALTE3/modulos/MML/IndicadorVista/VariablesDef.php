<!-- Vista de indicadores -->
								<div class="card-body">
									<table id="tbl_mml_vista_var" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>Folio</th>
												<th>Nombre</th>
												<th>Unidad de medida</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($controlador_obj->getArrTblMMLVarDef() as $arr_cont){?>
											<tr data-ind_id="<?php echo $arr_cont['mml_ficha_tecnica_id']; ?>" data-var_id="<?php echo $arr_cont['mml_variable_def_id']; ?>" class="pointer">
												<td><?php echo formato_folio($arr_cont['mml_variable_def_id']); ?></td>
												<td><?php echo $arr_cont['var_nombre']; ?></td>
												<td><?php echo $arr_cont['unidad_med_desc']; ?></td>
											</tr>
											<?php }?>
											
										</tbody>
										<tfoot>
											<tr>
												<th>Folio</th>
												<th>Nombre</th>
												<th>Unidad de medida</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<!-- /.card-body -->