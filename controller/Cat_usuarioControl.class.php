<?php
/**
 * Controlador para el catálogo de usuarios
 * @author Ismael Rojas
 *
 */
class Cat_usuarioControl extends ControladorBase{
	public $tag_campo = null;
	private $arr_tbl_cu = array();
	private $arr_grupo = array();
	public $and_cader;
	private $arr_cat_edo_cader = array();
	private $permiso_escritura=false;
	private $permiso_borrar = false;
	public function __construct(){
		$permiso = new Permiso();
		$this->permiso_escritura = $permiso->tiene_permiso('ae_usuario');
		$this->permiso_borrar = $permiso->tiene_permiso('borrar_usr');
	}
	/**
	 * Acción para abrir la vista o consulta de registros del catálogo de usuarios
	 */
	public function inicio(){
		$this->setPaginaDistintivos();
		$this->setArrTblContenido();
		$this->setMostrarVista('CatUsuarioVista.php');
	}
	/**
	 * Acción para abrir el formulario de usuario y desplegar el detalle del registro seleccionado o una forma nueva y crear un registro de usuario
	 */
	public function abrir(){
		$cat_usuario_id = (isset($_REQUEST['cat_usuario_id']))? intval($_REQUEST['cat_usuario_id']) : 0;
		
		$arr_usuario_frm = array();
		if($cat_usuario_id){
			$usuario = new Usuario();
			$usuario->setArrUsuario($cat_usuario_id);
			$arr_usuario_frm = $usuario->getArrUsuario();
			
			if(isset($arr_usuario_frm['cat_grupo_id']) && intval($arr_usuario_frm['cat_grupo_id'])){
				$grupo = new Grupo();
				$grupo->setArrViGrupo("AND `cat_grupo_id` = '".$arr_usuario_frm['cat_grupo_id']."'");
				$this->arr_grupo = $grupo->getArrViGrupo();
			}
		}
		
		$catalogo = new Catalogo();
		$catalogo->setArrCatEdoCader();
		$this->arr_cat_edo_cader = $catalogo->getArrTblCat();
		
		if(isset($arr_usuario_frm['cat_estado_id']) && $arr_usuario_frm['cat_estado_id']!=""){
			$this->and_cader = " AND `cat_estado_id` LIKE '".$arr_usuario_frm['cat_estado_id']."' ORDER BY `descripcion` ";
		}else{
			$this->and_cader = " AND 0 ";
		}
		
		//Asignación temporal del estado de Jalisco
		//$arr_usuario_frm['cat_estado_id'] = '14';
		//$arr_usuario_frm['cat_estado_id_desc'] = 'Jalisco';
		//$this->and_mpo = " AND `cat_municipio_id` IN('14047', '14051', '14066', '14063', '14123') ";
		
		$this->setPaginaDistintivos();
		$this->setMostrarVista('CatUsuarioForma.php');
		$this->tag_campo = new Campos();
		$this->tag_campo->setValorCampos($arr_usuario_frm);
		
	}
	/**
	 * Acción que marca como borrado el registro de usuario seleccionado
	 */
	public function borrar(){
		if($this->getPermisoBorrar()){
			$cat_usuario_id = (isset($_REQUEST['cat_usuario_id']))? intval($_REQUEST['cat_usuario_id']) : 0;
			$catalogo = new Catalogo();
			$catalogo->borrar('cat_usuario', $cat_usuario_id);
			$log = new log();
			$log->setRegLog("cat_usuario_id", $cat_usuario_id, "borrar", "Aviso", "Se borró registro de usuario");
			redireccionar('cat_usuario','inicio');
		}else{
			redireccionar('error','sin_permisos', array('tit_accion'=>'Borrar usuario'));
		}
	}
	/**
	 * Devuelve el arreglo con el detalle de permisos del grupo actual
	 * @return array
	 */
	public function getArrGrupo(){
		return $this->arr_grupo;
	}
	/**
	 * Devuelve el arreglo con el catálogo de CADER categorizado por estado
	 * @return array
	 */
	public function getArrCatEdoCader(){
		return $this->arr_cat_edo_cader;
	}
	/**
	 * Devuelve parte de la sentencia query con la condición del filtrado para la consulta al catálogo de CADER
	 * @return string
	 */
	public function getAndCader(){
		return $this->and_cader;
	}
	/**
	 * Acción Guardar para el catálgo de usuario
	 */
	public function guardar(){
		if($this->getPermisoEscritura()){
			$cat_usuario_id = (isset($_REQUEST['cat_usuario_id']))? intval($_REQUEST['cat_usuario_id']) : 0;
			$clave= (isset($_REQUEST['clave']))? $_REQUEST['clave'] : "";
			$bd = new BaseDatos();
			$log = new Log();
			//Se obtienen los campos y su valor en la forma
			$arr_cmps = array();
			$arr_cmps_cu = $bd->getArrCmpsTbl('cat_usuario');
			foreach ($arr_cmps_cu as $arr_cmps_cu_det){
				$cmp_nom = $arr_cmps_cu_det['Field'];
				if(isset($_REQUEST[$cmp_nom])){
					switch($cmp_nom){
						case 'cat_usuario_id':
						case 'clave':	//No se guarda la clave ingresa, esa se encripta y guarda con la clase Autentificar
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
			$guardar->setGuardaCatalogo($arr_cmps, 'cat_usuario', $cat_usuario_id);
			$cat_usuario_id = $guardar->getCmpIdVal();
			$log->setRegLog('cat_usuario_id', $cat_usuario_id, 'guardar', 'Aviso', 'Se guardó registro de Catálogo de usuario');
			
			//Se guarda la clave ingresada
			if($clave!=""){
				$autentificar = new Autentificar();
				$autentificar->setActualizaClave($cat_usuario_id, $clave);
				$log->setRegLog('cat_usuario_id', $cat_usuario_id, 'guardar', 'Aviso', 'Se actualizó clave en registro de Catálogo de usuario');
			}
			redireccionar('cat_usuario','abrir',array('cat_usuario_id'=>$cat_usuario_id));
		}else{
			redireccionar('error','sin_permisos', array('tit_accion'=>'Guardar usuario'));
		}
	}
	/**
	 * Crea o modifica el arreglo del contenido de la tabla <strong>cat_usuario</strong>
	 */
	private function setArrTblContenido(){
		$usuario = new Usuario();
		$usuario->setArrTblCatUsuario();
		$this->arr_tbl_cu = $usuario->getArrTblCatUsuario();
	}
	/**
	 * Devuelve el arreglo con el contenido de la tabla <strong>cat_usuario</strong>
	 * @return array
	 */
	public function getArrTblContenido(){
		return $this->arr_tbl_cu;
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