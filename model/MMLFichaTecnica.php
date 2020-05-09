<?php
/**
 * Clase modelo para obtener información de la tabla mml_ficha_tecnica
 * @author Ismael Rojas
 *
 */
class MMLFichaTecnica extends ModeloBase{
	public function __construct(){
		parent::__construct();
	}
	/**
	 * Genera el arreglo que contiene el detalle de los registros de la tabla mml_ficha_tecnica
	 * @param string $and
	 */
	public function setArrTblMMLFichaT($and="") {
		$this->setArrTbl("mml_ficha_tecnica", $and);
	}
	/**
	 * Genera el arreglo con el contenido del registro de la tabla mml_ficha_tecnica a partir del id mml_ficha_tecnica_id
	 * @param integer $mml_ficha_tecnica_id
	 */
	public function setArrMMLFichaT($mml_ficha_tecnica_id){
		$this->setArrReg("mml_ficha_tecnica", "mml_ficha_tecnica_id", $mml_ficha_tecnica_id);
	}
}