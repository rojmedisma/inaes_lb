var MMLIndicador = function(){
	/**
	 * Activa el tab seleccionado del navegador de formularios
	 */
	function nav_tab_frm_activar(v_accion){
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
	 * Función para el tab vertical dentro de la forma para las variables de definición
	 * Se hizo de esta forma debido a que no funciona el uso de la funcion en php, ya que el valor que toma primero 
	 * es el del campo oculto almacenado en frm_cero en lugar de el argumento en la función php
	 */
	function on_click_en_a_ve_tab_var(){
		$('.a_ve_tab_var').on("click", function(){
			
			var v_mml_variable_def_id = $(this).data('var_id');
			$("#frm_cero #mml_variable_def_id").val(v_mml_variable_def_id);	//Se actualiza el valor en frm_cero
			f_ir_a_controlador('frm_cero','mml_indicador','var_def');
		})
	}
	/**
	 * Dentro del formulario de Definición de variables, activa el tab seleccionado a partir del argumento v_mml_variable_def_id
	 */
	function nav_ve_tab_var_activar(v_mml_variable_def_id){
		try{
			if(v_mml_variable_def_id!=""){
				var id_nav_tab = 'a_ve_tab_var_id_'+v_mml_variable_def_id;
				$('#'+id_nav_tab).addClass('active');
			}
		}catch(e){
			alert("Error interno: ["+e.message+"]");
			console.log(e);
		}
	}
	
	return{
		activar:function(v_accion, v_mml_variable_def_id){
			nav_tab_frm_activar(v_accion);
			on_click_en_a_ve_tab_var();
			nav_ve_tab_var_activar(v_mml_variable_def_id);
		}
	}
}();