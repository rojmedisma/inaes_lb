<!-- Vista de indicadores -->
								<div class="card-body">
									<table id="tbl_mml_vista_ind" class="table table-bordered table-striped table-hover">
										<thead>
											<tr>
												<th>Folio</th>
												<th>Jerarquía de resultado</th>
												<th>Nombre del Indicador</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach($controlador_obj->getArrTblMMLFichaT() as $arr_cont){?>
											<tr data-ind_id="<?php echo $arr_cont['mml_ficha_tecnica_id']; ?>" class="pointer">
												<td><?php echo formato_folio($arr_cont['mml_ficha_tecnica_id']); ?></td>
												<td><?php echo $arr_cont['jerarquia_res_desc']; ?></td>
												<td><?php echo $arr_cont['ind_nombre']; ?></td>
											</tr>
											<?php }?>
											
										</tbody>
										<tfoot>
											<tr>
												<th>Folio</th>
												<th>Jerarquía de resultado</th>
												<th>Nombre del Indicador</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<!-- /.card-body -->
