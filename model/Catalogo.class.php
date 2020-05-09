<?php
/**
 * Clase modelo para los métodos que hacen consulta a las tablas de tipo catálogo
 * @author Ismael
 *
 */
class Catalogo{
	private $bd;
	private $arr_tbl_cat = array();
	private $lista_opciones;
	public function __construct(){
		$this->bd = new BaseDatos();
	}
	/**
	 * Modifica el arreglo de catálogo con el contenido de la tabla <strong>cat_cuestionario</strong>
	 * @param string $and
	 */
	public function setArrTblCatCuestionario($and=""){
		$this->arr_tbl_cat = $this->bd->getArrDeTabla("cat_cuestionario",$and,"cat_cuestionario_id");
	}
	/**
	 * Modifica el arreglo de catálogo con el contenido de la tabla <strong>cat_cader</strong>
	 * @param string $and
	 */
	public function setArrTblCatCader($and=""){
		$this->arr_tbl_cat = $this->bd->getArrDeTabla("cat_cader",$and,"cat_cader_id");
	}
	/**
	 * Modifica el arreglo de catálogo con el contenido de la tabla <strong>cat_estado</strong>
	 * @param string $and
	 */
	public function setArrTblCatEstado($and=""){
		$this->arr_tbl_cat = $this->bd->getArrDeTabla("cat_estado",$and,"cat_estado_id");
	}
	/**
	 * Modifica el arreglo de catálogo con el contenido de la tabla <strong>cat_cader</strong>, categorizando la información por el Id del estado y el Id del CADER
	 */
	public function setArrCatEdoCader() {
		$arr_cader = $this->bd->getArrDeTabla("cat_cader",'',"cat_cader_id");
		$arr_edo_cader = array();
		foreach ($arr_cader as $cat_cader_id=>$arr_det){
			$cat_estado_id = $arr_det['cat_estado_id'];
			$descripcion = htmlentities($arr_det["descripcion"]);
			$desc_corta = (strlen($descripcion)>=23)? substr($descripcion,0,23)."..." : $descripcion;
			$arr_edo_cader[$cat_estado_id][$cat_cader_id] = array(
					"descripcion"=>$descripcion,
					"desc_corta"=>$desc_corta,
			);
		}
		$this->arr_tbl_cat = $arr_edo_cader;
	}
	/**
	 * Devuelve el arreglo de la tabla de catálogo definida previamente, todos los métodos usan la misma variable tipo arreglo
	 * @return array
	 */
	public function getArrTblCat(){
		return $this->arr_tbl_cat;
	}
	/**
	 * Marca como borrado el registro con el id y nombre de la tabla de catálogo indicados en los argumentos
	 * @param string $tbl_cat	Nombre de la tabla de catálogo
	 * @param string $id_reg	Id del registro a marcar como borrado
	 */
	public function borrar($tbl_cat, $id_reg){
		$qry = "UPDATE `".$this->bd->getBD()."`.`".$tbl_cat."` SET `borrar` = '1' WHERE `".$tbl_cat."_id` = '".$id_reg."';";
		$this->bd->ejecutaQry($qry);
	}
	public function setListaOpcCatLocalidad($cat_municipio_id) {
		$cat_estado_id = substr($cat_municipio_id, 0,2);
		$municipio_cve = substr($cat_municipio_id, -3);
		$and = " AND `cat_estado_id` LIKE '".$cat_estado_id."' AND `municipio_cve` LIKE '".$municipio_cve."' ";
		
		$arr_cat_localidad = $this->bd->getArrDeTabla("cat_localidad",$and);
		$lista_opciones = '<option value="" data-desc_val="" data-esp_val="">[SELECCIONAR]</option>';
		foreach ($arr_cat_localidad as $arr_det_loc){
			$cat_localidad_id = $arr_det_loc['cat_localidad_id'];
			$desc = $arr_det_loc['descripcion'];
			$lista_opciones .= '<option value="'.$cat_localidad_id.'" data-desc_val="'.$desc.'" data-esp_val="">'.$desc.'</option>';
		}
		$this->lista_opciones = $lista_opciones;
	}
	public function getListaOpciones() {
		return $this->lista_opciones;
	}
}