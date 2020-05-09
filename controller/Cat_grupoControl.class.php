<?php
/**
 * Controlador para el Catálogo de grupo (Cat_grupo)
 * @author Ismael Rojas
 *
 */
class Cat_grupoControl extends ControladorBase{
	private $arr_tbl_cont;
	private $arr_tbl_cont_gpo;
	private $cat_grupo_id;
	private $permiso_escritura=false;
	private $permiso_borrar = false;
	public function __construct(){
		$permiso = new Permiso();
		$this->permiso_escritura = $permiso->tiene_permiso('ae_grupo');
		$this->permiso_borrar = $permiso->tiene_permiso('borrar_grupo');
	}
	/**
	 * Acción para redireccionar a la vista de consulta de registros de catálogo de grupos
	 */
	public function inicio(){
		$this->setPaginaDistintivos();
		$this->setArrTblContenido();
		$this->setMostrarVista('CatGrupoVista.php');
	}
	/**
	 * Acción para abrir un registro o crear uno nuevo, dependiendo de lo que venga en el argumento <strong>cat_grupo_id</strong>
	 */
	public function abrir(){
		$cat_grupo_id = (isset($_REQUEST['cat_grupo_id']))? intval($_REQUEST['cat_grupo_id']) : 0;
		$this->cat_grupo_id = $cat_grupo_id;
		$arr_cat_g = array();
		if($cat_grupo_id){
			$grupo = new Grupo();
			$grupo->setArrTblCatGrupo($cat_grupo_id);
			$arr_cat_g = $grupo->getArrTblCatGrupo();
			$this->setArrTblContGpo();
			
		}
		$this->setPaginaDistintivos();
		$this->setMostrarVista('CatGrupoForma.php');
		$this->tag_campo = new Campos();
		$this->tag_campo->setValorCampos($arr_cat_g);
	}
	/**
	 * Acción para guardar registro
	 */
	public function guardar(){
		if($this->getPermisoEscritura()){
			$cat_grupo_id = (isset($_REQUEST['cat_grupo_id']))? intval($_REQUEST['cat_grupo_id']) : 0;
			$bd = new BaseDatos();
			$log = new Log();
			//Se obtienen los campos y su valor en la forma
			$arr_cmps = array();
			$arr_cmps_cu = $bd->getArrCmpsTbl('cat_grupo');
			foreach ($arr_cmps_cu as $arr_cmps_cu_det){
				$cmp_nom = $arr_cmps_cu_det['Field'];
				if(isset($_REQUEST[$cmp_nom])){
					switch($cmp_nom){
						case 'cat_grupo_id':
						case 'borrar':
							break;
						default:
							$arr_cmps[$cmp_nom] = txt_sql($_REQUEST[$cmp_nom]);
							break;
					}
				}
			}
			//Se guarda el registro
			$guardar = new Guardar();
			$guardar->setGuardaCatalogo($arr_cmps, 'cat_grupo', $cat_grupo_id);
			$cat_grupo_id= $guardar->getCmpIdVal();
			$log->setRegLog('cat_grupo_id', $cat_grupo_id, 'guardar', 'Aviso', 'Se guardó registro de Catálogo de grupo');
			redireccionar('cat_grupo','abrir',array('cat_grupo_id'=>$cat_grupo_id));
		}else{
			redireccionar('error','sin_permisos', array('tit_accion'=>'Guardar'));
		}
		
	}
	/**
	 * Acción para activar o desactivar el permisos seleccionado en el formulario de grupo
	 */
	public function activar(){
		if($this->getPermisoEscritura()){
			$cat_grupo_id = (isset($_REQUEST['cat_grupo_id']))? intval($_REQUEST['cat_grupo_id']) : 0;
			$cat_permiso_cve = (isset($_REQUEST['cat_permiso_cve']))? $_REQUEST['cat_permiso_cve'] : "";
			$activo= (isset($_REQUEST['activo']))? intval($_REQUEST['activo']) : 0;
			$bd = new BaseDatos();
			$log = new Log();
			$and = " AND `cat_grupo_id` = '".$cat_grupo_id."' AND `cat_permiso_cve` = '".$cat_permiso_cve."';";
			if($activo){
				//Se desactiva
				$qry_upd= "UPDATE `".$bd->getBD()."`.`grupo` SET `activo` = NULL WHERE 1 ".$and;
				$bd->ejecutaQry($qry_upd);
				$log->setRegLog('cat_grupo_id', $cat_grupo_id, 'activar', 'Aviso', 'Se desactivó permiso '.$cat_permiso_cve);
			}else{
				//Se activa
				//Se busca por si ya existe y solo está desactivado
				$qry_busca =  "SELECT count(*) AS 'existe' FROM `".$bd->getBD()."`.`grupo` WHERE 1 ".$and;
				$existe = $bd->get1erElemQry("existe", $qry_busca);
				if($existe){
					$qry_upd = "UPDATE `".$bd->getBD()."`.`grupo` SET `activo` = '1' WHERE 1 ".$and;
					$bd->ejecutaQry($qry_upd);
				}else{
					//Se inserta el permiso
					$qry_insert = "INSERT INTO `".$bd->getBD()."`.`grupo` (`cat_grupo_id`, `cat_permiso_cve`, `activo`) VALUES ('".$cat_grupo_id."', '".$cat_permiso_cve."', '1');";
					$bd->ejecutaQry($qry_insert);
				}
				$log->setRegLog('cat_grupo_id', $cat_grupo_id, 'activar', 'Aviso', 'Se activó permiso '.$cat_permiso_cve);
			}
			redireccionar('cat_grupo','abrir',array('cat_grupo_id'=>$cat_grupo_id));
		}else{
			redireccionar('error','sin_permisos', array('tit_accion'=>'Activar/desactivar permisos'));
		}
		
	}
	/**
	 * Acción que marca como borrado el registro de grupo seleccionado
	 */
	public function borrar(){
		if($this->getPermisoBorrar()){
			$cat_grupo_id = (isset($_REQUEST['cat_grupo_id']))? intval($_REQUEST['cat_grupo_id']) : 0;
			$catalogo = new Catalogo();
			$catalogo->borrar('cat_grupo', $cat_grupo_id);
			$log = new log();
			$log->setRegLog("cat_grupo_id", $cat_grupo_id, "borrar", "Aviso", "Se borró registro de grupo");
			redireccionar('cat_grupo','inicio');
		}else{
			redireccionar('error','sin_permisos', array('tit_accion'=>'Borrar grupo'));
		}
	}
	/**
	 * Devuelve el Id del catálogo de grupos, una vez abierto el registro en el formulario de grupo
	 * @return number
	 */
	public function getCatGrupoId(){
		return $this->cat_grupo_id;
	}
	/**
	 * Crea el arreglo que contiene el detalle de los registros a mostrar en la tabla de catálogo de grupo, incluyendo la lista de permisos
	 */
	private function setArrTblContenido(){
		$grupo = new Grupo();
		$grupo->setArrTblCatGrupo();
		$arr_tbl_cont= $grupo->getArrTblCatGrupo();
		
		foreach ($arr_tbl_cont as $cat_grupo_id =>$arr_tc_det){
			$grupo->setArrViGrupo(" AND `cat_grupo_id` = '".$cat_grupo_id."'");
			$arr_grupo = $grupo->getArrViGrupo();
			$arr_cp_tit_corto = array_column($arr_grupo,'cp_tit_corto');
			$arr_tbl_cont[$cat_grupo_id]['li_cp_tit_corto'] = implode(", ", $arr_cp_tit_corto);
		}
		$this->arr_tbl_cont = $arr_tbl_cont;
	}
	/**
	 * Devuelve el arreglo que contiene el detalle de los regisrtros del catálogo de grupo
	 * @return string|array|mixed
	 */
	public function getArrTblContenido(){
		return $this->arr_tbl_cont;
	}
	/**
	 * Crea el arreglo con el detalle de permisos para el grupo actual, indicando los que tiene activados y los que no
	 */
	private function setArrTblContGpo(){
		$grupo = new Grupo();
		$grupo->setArrPermisoGrupo($this->getCatGrupoId());
		$this->arr_tbl_cont_gpo = $grupo->getArrPermisoGrupo();
	}
	/**
	 * Devuelve el arreglo con el detalle de permisos para el grupo actual
	 * @return array
	 */
	public function getArrTblContGpo(){
		return $this->arr_tbl_cont_gpo;
	}
	/**
	 * Devuelve el valor de la variable a la que se le asignó la indicación de si el usuario actual tiene permiso de escritura
	 * @return boolean
	 */
	public function getPermisoEscritura(){
		return $this->permiso_escritura;
	}
	/**
	 * Devuelve el valor de la variable a la que se le asignó la indicación de si el usuario actual tiene permiso para borrar
	 * @return boolean
	 */
	public function getPermisoBorrar() {
		return $this->permiso_borrar;
		;
	}
}