<?php
class MMLGuardar{
	private $bd;
	private $cmp_id_val;
	public function __construct() {
		$this->bd = new BaseDatos();
	}
	public function guardarRegMML($arr_cmps, $tbl_nom, $cmp_id_val){
		$cmp_id_nom = $tbl_nom."_id";	//mml_ficha_tecnica + _id
		if($cmp_id_val){
			//Modificar registro
			$arr_act = array();
			foreach($arr_cmps as $cmp_nom => $cmp_val){
				if($cmp_nom!=$cmp_id_nom){
					$arr_act[] = "`".$cmp_nom."` = ".$cmp_val;
				}
				$qry_act = "UPDATE `".$this->bd->getBD()."`.`".$tbl_nom."` SET ".implode(",", array_values($arr_act))." WHERE `".$cmp_id_nom."` ='".$cmp_id_val."' LIMIT 1;";
				$this->bd->ejecutaQry($qry_act);
			}
		}else{
			//Nuevo registro
			$qry_act = "INSERT INTO `".$this->bd->getBD()."`.`".$tbl_nom."` (".implode(",",array_keys($arr_cmps)).") VALUES (".implode(",",array_values($arr_cmps)).");";
			$cmp_id_val = $this->bd->ejecutaQryInsert($qry_act);
		}
		$this->cmp_id_val = $cmp_id_val;
	}
	/**
	 * Devuelve el Id del registro insertado, cuando el guardado realizó un insert
	 * @return mixed
	 */
	public function getCmpIdVal(){
		return $this->cmp_id_val;
	}
}