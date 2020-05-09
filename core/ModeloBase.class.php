<?php
/**
 * Extensión para todas las clases dentro de la carpeta <strong>model</strong>
 * @author Ismael
 *
 */
class ModeloBase extends Ayuda{
	private $arr_tbl;
	private $arr_reg;
	protected $bd;
	protected function __construct(){
		$this->bd = new BaseDatos();
	}
	/**
	 * Genera el arreglo que contiene el detalle de los registros de la tabla definida en el argumento
	 * @param string $tabla
	 * @param string $and
	 */
	protected function setArrTbl($tabla, $and) {
		$and_ft = " AND `borrar` IS NULL ".$and;
		$arr_tbl = $this->bd->getArrDeTabla($tabla, $and_ft);
		$this->arr_tbl = $arr_tbl;
	}
	/**
	 * Genera un arreglo con el contenido del registro indicado a partir de los argumentos necesarios
	 * @param string $tabla	Nombre de la tabla donde se encuentra el registro
	 * @param string $cmp_id_nom	Nombre del campo llave de la tabla
	 * @param string $cmp_id_val	Valor del campo llave del registro
	 */
	protected function setArrReg($tabla, $cmp_id_nom, $cmp_id_val){
		$this->arr_reg = $this->bd->getArrRegDeTabla($tabla, $cmp_id_nom, $cmp_id_val);
	}
	/**
	 * Devuelve el arreglo generado en la función setArrTbl
	 * @return array
	 */
	public function getArrTbl(){
		return $this->arr_tbl;
	}
	/**
	 * Devuelve el arreglo generado en la función setArrReg
	 * @return array
	 */
	public function getArrReg(){
		return $this->arr_reg;
	}
}