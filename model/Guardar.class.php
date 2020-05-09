<?php
/**
 * Clase modelo para ejecutar el guardado del registro actual
 * @author Ismael
 *
 */
class Guardar{
	private $cmp_id_val;
	/**
	 * Ejecuta el guardado para cuando el registro es de tipo catálogo
	 * @param array $arr_cmps	Arreglo de campos a ser actualizados o insertados
	 * @param string $tbl_cat_nom
	 * @param string $cmp_id_val
	 */
	public function setGuardaCatalogo($arr_cmps, $tbl_cat_nom, $cmp_id_val){
		$bd = new BaseDatos();
		$cmp_id_nom = $tbl_cat_nom."_id";	//cat_usuario + _id
		if($cmp_id_val){
			//Modificar registro
			$arr_act = array();
			foreach($arr_cmps as $cmp_nom => $cmp_val){
				if($cmp_nom!=$cmp_id_nom){
					$arr_act[] = "`".$cmp_nom."` = ".$cmp_val;
				}
			}
			$qry_act = "UPDATE `".$bd->getBD()."`.`".$tbl_cat_nom."` SET ".implode(",", array_values($arr_act))." WHERE `".$cmp_id_nom."` ='".$cmp_id_val."' LIMIT 1;";
			$bd->ejecutaQry($qry_act);
		}else{
			//Nuevo registro
			$qry_act = "INSERT INTO `".$bd->getBD()."`.`".$tbl_cat_nom."` (".implode(",",array_keys($arr_cmps)).") VALUES (".implode(",",array_values($arr_cmps)).");";
			$cmp_id_val = $bd->ejecutaQryInsert($qry_act);
		}
		$this->cmp_id_val = $cmp_id_val;
	}
	/**
	 * Ejecuta el guardado para cuando el registro es de tipo cuestionario
	 * @param string $arr_cmps	Arreglo de campos a ser actualizados o insertados
	 * @param string $cat_cuestionario_id
	 * @param string $cuestionario_id
	 */
	public function setGuardaCuest($arr_cmps, $cat_cuestionario_id, $cuestionario_id){
		$bd = new BaseDatos();
		if($cuestionario_id!=""){
			//Modificar registro
			foreach($arr_cmps as $tbl_nom => $arr_cmp_det){
				$arr_act = array();
				foreach ($arr_cmp_det as $cmp_nom => $cmp_val){
					if($cmp_nom!='cuestionario_id'){
						$arr_act[] = "`".$tbl_nom."`.`".$cmp_nom."` = ".$cmp_val;
					}
				}
				$qry_act = "UPDATE `".$bd->getBD()."`.`".$tbl_nom."` SET ".implode(",", array_values($arr_act))." WHERE `cuestionario_id` ='".$cuestionario_id."' LIMIT 1;";
				$bd->ejecutaQry($qry_act);
			}
		}else{
			//Nuevo registro
			$cuestionario_id = $this->crearCuestionarioId($cat_cuestionario_id);
			foreach($arr_cmps as $tbl_nom => $arr_cmp_det){
				$arr_cmps_ins = array_merge(array('cuestionario_id'=>txt_sql($cuestionario_id)),$arr_cmp_det);
				$qry_act = "INSERT INTO `".$bd->getBD()."`.`".$tbl_nom."` (".implode(",",array_keys($arr_cmps_ins)).") VALUES (".implode(",",array_values($arr_cmps_ins)).");";
				$bd->ejecutaQry($qry_act);
			}
		}
		$this->cmp_id_val = $cuestionario_id;
	}
	/**
	 * Devuelve el Id del registro insertado, cuando el guardado realizó un insert
	 * @return mixed
	 */
	public function getCmpIdVal(){
		return $this->cmp_id_val;
	}
	/**
	 * Crea el id para los registros de cuestioanrio
	 * @param integer $cat_cuestionario_id
	 * @return string
	 */
	private function crearCuestionarioId($cat_cuestionario_id){
		$parte1 = str_pad($cat_cuestionario_id, 2, '0', STR_PAD_LEFT);
		$parte2 = time();
		$usuario = new Usuario();
		$usuario->setArrUsuario();
		$parte3 = $usuario->getCatUsuarioId();
		$cadena = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$parte4 = "";
		for ($i = 0; $i < 3; $i++){
			$parte4.= substr($cadena, rand(0,strlen($cadena)-1),1);
		}
		return $parte1.$parte2.$parte3.$parte4;
	}
}