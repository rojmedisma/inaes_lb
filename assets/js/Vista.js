$(document).ready(function(){
	$('#tbl_cuest').DataTable();
	$('.btn_borrar').click(function(){f_borrar_cuest(this);});
});

function f_borrar_cuest(o_borrar){
	v_cuestionario_id = o_borrar.dataset.cuest_id;
	if(v_cuestionario_id!="" && confirm("¿Desea borrar el cuestionario con Id = "+v_cuestionario_id+"?")){
		
		v_cat_cuestionario_id = $("#frm_cero input[name='cat_cuestionario_id']").val();
		f_ir_a_controlador('frm_cero', 'cuestionario', 'borrar', '&cat_cuestionario_id='+v_cat_cuestionario_id+'&cuestionario_id='+v_cuestionario_id);
	}
}