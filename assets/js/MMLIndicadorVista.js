var MMLIndicadorVista = function(){
	/**
	 * Activa el tab seleccionado del navegador de la vista
	 */
	function nav_tab_activar(v_accion){
		try{
			if(v_accion!=""){
				var id_nav_tab = 'a_nav_tab_'+v_accion;
				$('#'+id_nav_tab).addClass('active');
			}
		}catch(e){
			alert("Error interno: ["+e.message+"]");
			console.log(e);
		}
	}
	/**
	 * En la vista de indicadores, abre la forma de Indentificación del indicador al seleccionar el renglón en la vista
	 */
	function on_click_tr_ind(){
		$('#tbl_mml_vista_ind tbody').on('click', 'tr', function(){
			var v_mml_ficha_tecnica_id = $(this).data('ind_id');
			$("#frm_cero #mml_ficha_tecnica_id").val(v_mml_ficha_tecnica_id);
			f_ir_a_controlador('frm_cero','mml_indicador','ficha');
		})
	}
	/**
	 * En la vista de variables, abre la forma de variables de definción al seleccionar el renglón en la vista
	 */
	function on_click_tr_var(){
		$('#tbl_mml_vista_var tbody').on('click', 'tr', function(){
			var v_mml_ficha_tecnica_id = $(this).data('ind_id');
			var v_mml_variable_def_id = $(this).data('var_id');
			$("#frm_cero #mml_ficha_tecnica_id").val(v_mml_ficha_tecnica_id);
			$("#frm_cero #mml_variable_def_id").val(v_mml_variable_def_id);
			f_ir_a_controlador('frm_cero','mml_indicador','var_def');
		})
	}
	return{
		activar:function(v_accion){
			nav_tab_activar(v_accion);
			on_click_tr_ind();
			on_click_tr_var();
		}
	}
}();