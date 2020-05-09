<?php
/**
 * Clase modelo para obtener información de la tabla mml_variable_def
 * @author Ismael Rojas
 *
 */
class MMLVariableDef extends ModeloBase{
	private $arr_tbl_mml_variable_d = array();
	public function __construct(){
		parent::__construct();
	}
	/**
	 * Cuando no hay argumento mml_variable_def_id, se obtiene la primer variable de definición del indicador
	 * @param string $mml_ficha_tecnica_id
	 * @return number
	 */
	public function getIdPrimerVariable($mml_ficha_tecnica_id){
		$qry = "SELECT MIN(`mml_variable_def_id`) AS 'id_primer_var' FROM `".$this->bd->getBD()."`.`mml_variable_def` WHERE `mml_ficha_tecnica_id` = '".$mml_ficha_tecnica_id."'";
		$rs = $this->bd->ejecutaQry($qry);
		$id_primer_var = 0;
		if($rs->num_rows){
			$obj = $rs->fetch_object();
			$id_primer_var = $obj->id_primer_var;
		}
		$rs->close();
		return $id_primer_var;
	}
	/**
	 * Genera el arreglo que contiene el detalle de los registros de la tabla mml_variable_def
	 * @param string $and
	 */
	public function setArrTblVariableDef($and="") {
		$this->setArrTbl("mml_variable_def", $and);
	}
	/**
	 * Genera el arreglo con el contenido del registro de la tabla mml_variable_def a partir del id mml_variable_def_id
	 * @param string $mml_variable_def_id
	 */
	public function setArrRegVariableDef($mml_variable_def_id) {
		$this->setArrReg("mml_variable_def", "mml_variable_def_id", $mml_variable_def_id);
	}
}