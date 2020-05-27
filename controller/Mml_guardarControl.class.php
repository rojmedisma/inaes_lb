<?php
class Mml_guardarControl extends ControladorBase{
	private $bd;
	public function __construct(){
		parent::__constructINAES();
		if(!$this->tienePermiso("escritura")){
			redireccionar('error','sin_permisos', array('tit_accion'=>'Guardar'));
		}
		$this->bd = new BaseDatos();
	}
	public function ficha(){
		$tbl_nom = "mml_ficha_tecnica";
		$arr_cmps = array();
		$arr_cmps_cu = $this->bd->getArrCmpsTbl($tbl_nom);
		$cmp_id_val = (isset($_REQUEST["mml_ficha_tecnica_id"]))? $_REQUEST["mml_ficha_tecnica_id"] : "";
		foreach ($arr_cmps_cu as $arr_cmps_cu_det){
			$cmp_nom = $arr_cmps_cu_det['Field'];
			switch($cmp_nom){
				case 'mml_ficha_tecnica_id':
				case 'cat_levantamiento_id':
				case 'ft_identificador':
				case 'cat_usuario_autor':
				case 'creacion_fecha':
				case 'creacion_hora':
				case 'borrar':
					break;
				case 'modifica_fecha':
					$arr_cmps[$cmp_nom] = "CURDATE()";
					break;
				case 'modifica_hora':
					$arr_cmps[$cmp_nom] = "CURTIME()";
					break;
				default:
					$arr_cmps[$cmp_nom] = (isset($_REQUEST[$cmp_nom]))? txt_sql($_REQUEST[$cmp_nom]) : "NULL";
					break;
			}
		}
		
		$guardar = new MMLGuardar();
		$guardar->guardarRegMML($arr_cmps, $tbl_nom, $cmp_id_val);
		$cmp_id_val = $guardar->getCmpIdVal();
		$arr_redirec = array(
				"mml_ficha_tecnica_id"=>$cmp_id_val,
				"pestania_frm_act"=>"ficha"
		);
		redireccionar("mml_indicador","ficha",$arr_redirec);
	}
	public function var_def(){
		$tbl_nom = "mml_variable_def";
		$arr_cmps = array();
		$arr_cmps_cu = $this->bd->getArrCmpsTbl($tbl_nom);
		$cmp_id_val = (isset($_REQUEST["mml_variable_def_id"]))? $_REQUEST["mml_variable_def_id"] : "";
		foreach ($arr_cmps_cu as $arr_cmps_cu_det){
			$cmp_nom = $arr_cmps_cu_det['Field'];
			switch($cmp_nom){
				case 'mml_variable_def_id':
				case 'mml_ficha_tecnica_id':
				case 'cat_usuario_autor':
				case 'creacion_fecha':
				case 'creacion_hora':
				case 'borrar':
					break;
				case 'modifica_fecha':
					$arr_cmps[$cmp_nom] = "CURDATE()";
					break;
				case 'modifica_hora':
					$arr_cmps[$cmp_nom] = "CURTIME()";
					break;
				default:
					$arr_cmps[$cmp_nom] = (isset($_REQUEST[$cmp_nom]))? txt_sql($_REQUEST[$cmp_nom]) : "NULL";
					break;
			}
		}
		$guardar = new MMLGuardar();
		$guardar->guardarRegMML($arr_cmps, $tbl_nom, $cmp_id_val);
		$cmp_id_val = $guardar->getCmpIdVal();
		$mml_ficha_tecnica_id = (isset($_REQUEST["mml_ficha_tecnica_id"]))? $_REQUEST["mml_ficha_tecnica_id"] : "";
		$arr_redirec = array(
				"mml_variable_def_id"=>$cmp_id_val,
				"mml_ficha_tecnica_id"=>$mml_ficha_tecnica_id,
				"pestania_frm_act"=>"var_def"
		);
		redireccionar("mml_indicador","var_def",$arr_redirec);
	}
}