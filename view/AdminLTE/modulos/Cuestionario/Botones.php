<div class="btn-group pull-right">
	<!--  
	<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_info" data-txt_tit="<?php echo $controlador_obj->cat_cuestionario->get_val_campo('descripcion'); ?>" data-txt_info="<?php echo nl2br($controlador_obj->cat_cuestionario->get_val_campo('definicion')); ?>">
		<i class="fa fa-fw fa-info"></i>
	</button>
	-->
	<?php if($controlador_obj->getPermisoEscritura() && !$controlador_obj->es_aprobado){?>
	<button type="submit" class="btn btn-primary"><i class="fa fa-fw fa-save"></i> Guardar</button>
	<?php }?>
	<?php if($controlador_obj->getPermisoAprobar() && !$controlador_obj->es_nuevo && !$controlador_obj->es_aprobado){?>
	<button type="button" class="btn btn-success" onclick="f_ir_a_controlador('frm_cero', 'cuestionario','aprobar','')"><i class="fa fa-fw fa-check-circle"></i> Aprobar</button>
	<?php }?>
	<?php if($controlador_obj->permiso->tiene_permiso('ver_cmp_nom')){?>
	<button type="button" class="btn btn-primary" onClick="Forma.verNombreCampo()"><i class="fa fa-fw fa-eye-slash"></i> Ver/Ocultar Nombre de campo</button>
	<?php }?>
</div>