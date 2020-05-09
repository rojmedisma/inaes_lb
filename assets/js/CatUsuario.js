/**
 * Funciones para la forma de Catálogo de usuario
 */
var CatUsuario = function(){
	/**
	 * A partir del arreglo a_cat_edo_cader declarado dentro de la forma, se crea la lista de opciones para el combo de CADER, cuyo valor se actualiza al cambiar el nombre del estado
	 */
	function cambiar_cader(){
		v_cat_estado_id = getValueForm('cat_estado_id',false);
		v_list_opt = '<option value="" data-desc_val="" data-esp_val="">[SELECCIONAR]</option>';
		if(v_cat_estado_id != ""){
			for(var cat_cader_id in a_cat_edo_cader[v_cat_estado_id]){
				v_desc = a_cat_edo_cader[v_cat_estado_id][cat_cader_id]["descripcion"];
				v_list_opt += '<option value="'+cat_cader_id+'" data-desc_val="'+v_desc+'" data-es_esp="">'+v_desc+'</option>';
			}
		}
		$("#cat_cader_id").html(v_list_opt);
	}
	return {
		activar:function(){
			$("#cat_estado_id").change(function(){
				cambiar_cader();
			});
		}
	}
}();