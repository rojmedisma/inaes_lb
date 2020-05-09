<!-- Para MMLIndicadorVista -->
		<script src="/<?php echo DIR_LOCAL; ?>/assets/js/MMLIndicadorVista.js"></script>
		<script>
			var v_accion_act = '<?php echo $controlador_obj->getAccion(); ?>';
			$(document).ready(function(){
				MMLIndicadorVista.activar(v_accion_act);
				$('#tbl_mml_'+v_accion_act).DataTable({
					"paging": true,
					"lengthChange": true,
					"searching": true,
					"ordering": true,
					"info": true,
					"autoWidth": false,
				});
			});
		</script>