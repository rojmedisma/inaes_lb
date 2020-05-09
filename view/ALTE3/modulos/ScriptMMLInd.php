<!-- Para MMLIndicador -->
		<script src="/<?php echo DIR_LOCAL; ?>/assets/js/MMLIndicador.js"></script>
		<script>
			var v_accion_act = '<?php echo $controlador_obj->getAccion(); ?>';
			var v_mml_variable_def_id = '<?php echo $controlador_obj->getMMLVariableDefId();?>';
			$(document).ready(function(){
				MMLIndicador.activar(v_accion_act, v_mml_variable_def_id);
			});
		</script>
