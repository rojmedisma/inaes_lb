<?php
/**
 * Controlador para el catálogo de usuarios
 * @author Ismael Rojas
 *
 */
class Cat_usuarioControl extends ControladorBase{
	public $permiso;
	
	public $tag_campo = null;
	private $arr_tbl_cu = array();
	private $arr_grupo = array();
	private $activo = true;
	public function __construct(){
		
		$this->setArrRegUsuario();
		
		$this->permiso = new Permiso();
		$this->setArrPermiso("lectura", $this->permiso->tiene_permiso("al_usuario"));
		$this->setArrPermiso("escritura", $this->permiso->tiene_permiso("ae_usuario"));
		$this->setArrPermiso("borrar", $this->permiso->tiene_permiso("borrar_usr"));
	}
	/**
	 * Acción para abrir la vista o consulta de registros del catálogo de usuarios
	 */
	public function vista(){
		$this->setPaginaDistintivos();
		$this->setArrTblContenido();
		$this->setMostrarVista('CatUsuarioVista.php');
	}
	/**
	 * Acción para abrir el formulario de usuario y desplegar el detalle del registro seleccionado o una forma nueva y crear un registro de usuario
	 */
	public function forma(){
		$cat_usuario_id = (isset($_REQUEST['cat_usuario_id']))? intval($_REQUEST['cat_usuario_id']) : 0;
		
		$arr_usuario_frm = array();
		if($cat_usuario_id){
			$usuario = new Usuario();
			$usuario->setArrUsuario($cat_usuario_id);
			$arr_usuario_frm = $usuario->getArrUsuario();
			
			if(isset($arr_usuario_frm['cat_grupo_id']) && intval($arr_usuario_frm['cat_grupo_id'])){
				$grupo = new Grupo();
				$grupo->setArrViGrupo("AND `cat_grupo`.`cat_grupo_id` = '".$arr_usuario_frm['cat_grupo_id']."'");
				$this->arr_grupo = $grupo->getArrViGrupo();
			}
			if(intval($arr_usuario_frm["activo"])!=1){
				$this->activo = false;
			}
		}
		
		$this->setPaginaDistintivos();
		$this->setMostrarVista('CatUsuarioForma.php');
		$this->tag_campo = new Campos();
		$this->tag_campo->setVerNombreCampo(false);
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
			die();
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
	 * Acción Guardar para el catálgo de usuario
	 */
	public function guardar(){
		if($this->tienePermiso("escritura")){
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
			redireccionar('cat_usuario','forma',array('cat_usuario_id'=>$cat_usuario_id));
		}else{
			redireccionar('error','sin_permisos', array('tit_accion'=>'Guardar usuario'));
			die();
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
	 * Devuelve el estatus activo (si,no) del usuario para ser indicador o desplegado
	 * @return boolean
	 */
	public function esActivo(){
		return $this->activo;
	}
}