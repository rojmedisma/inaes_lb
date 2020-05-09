<?php
/**
 * Controlador para los cuestionarios
 * Se utiliza en todos los cuestioanarios, ya que la funcionalidad y las acciones son las mismas, lo que cambia es el contenido.
 * @author Ismael Rojas
 *
 */
class CuestionarioControl extends ControladorBase{
	public $tag_campo = null;
	public $and_mpo;
	public $and_localidad;
	public $and_cader;
	public $es_aprobado=false;
	public $es_nuevo;
	private $permiso_escritura=false;
	private $permiso_aprobar=false;
	private $permiso_exportar = false;
	private $permiso_borrar = false;
	private $arr_tbl_cue = array();
	private $cuestionario_id;
	private $cat_cuestionario_id;
	public $permiso;
	public $cat_cuestionario;
	private $and_cuest = "";
	public function __construct(){
	    $this->cuestionario_id= (isset($_REQUEST['cuestionario_id']))? $_REQUEST['cuestionario_id'] : "";
	    $this->setCatCuestionarioId();
	    $this->permiso = new Permiso();
	    $cuet_cve = cuest_cve($this->getCatCuestionarioId());
	    $this->permiso_escritura = $this->permiso->tiene_permiso($cuet_cve.'_ae');
	    $this->permiso_aprobar = $this->permiso->tiene_permiso($cuet_cve.'_aprob');
	    $this->permiso_exportar = $this->permiso->tiene_permiso($cuet_cve.'_exportar');
	    $this->permiso_borrar = $this->permiso->tiene_permiso($cuet_cve.'_borrar');
	    $this->es_nuevo = ($this->getCuestionarioId()!="")? false : true;
	    $this->cat_cuestionario = new CatCuestionario($this->getCatCuestionarioId());
	    $this->cat_cuestionario->setArrCatCuestionario();
	}
	/**
	 * Acción para abrir la vista o consulta de registros de cuestionario
	 */
	public function inicio(){
		$this->setPaginaDistintivos();
		$this->setArrTblContenido();
		if($this->getCatCuestionarioId()!=""){
			$nom_arc_vista = strtoupper(cuest_cve($this->getCatCuestionarioId()))."Vista.php";
			$this->setMostrarVista($nom_arc_vista);
		}else{
			redireccionar("error","sin_arg_cat_cuestionario_id");
		}
		
	}
	/**
	 * Acción para abrir la forma cuestionario y desplegar toda la funcionalidad necesaria para su captura en caso de ser un cuestionario nuevo, adenás de mostrar la información ya capturada en caso de ser un cuestionario capturado.
	 */
	public function abrir(){
		if($this->getCatCuestionarioId()!=""){
			$nom_arc_vista = strtoupper(cuest_cve($this->getCatCuestionarioId()))."Forma.php";
			$this->setPaginaDistintivos();
			$this->setMostrarVista($nom_arc_vista);
		}else{
			redireccionar("error","sin_arg_cat_cuestionario_id");
		}
	    
		
		$usuario = new Usuario();
		$usuario->setArrUsuario();
		
		$arr_cmps_frm = array();
		$es_nuevo = true;
		if($this->getCuestionarioId()){
			$cuestionario = new Cuestionario($this->getCatCuestionarioId());
			$cuestionario->setArrCuestionario($this->getCuestionarioId());
			$arr_cmps_frm = $cuestionario->getArrCuestionario();
			$es_nuevo = false;
			$cat_cader_id = $arr_cmps_frm['cat_cader_id'];
			if($this->getCatCuestionarioId()==1){
				$cat_estado_id = $arr_cmps_frm['p2r1c1'];
			}elseif($this->getCatCuestionarioId()==2){
				$cat_estado_id = $arr_cmps_frm['estado'];
			}elseif($this->getCatCuestionarioId()==3){
				$cat_estado_id = $arr_cmps_frm['estado'];
			}elseif($this->getCatCuestionarioId()==4){
				$cat_estado_id = $arr_cmps_frm['estado'];
			}
			
			if($cat_estado_id==""){
				redireccionar('error','sin_cat_estado_id');
			}
		}else{
		    //Si es cuestionario nuevo
			$catalogo = new Catalogo();
			$cat_estado_id = $usuario->get_val_campo('cat_estado_id');
			$cat_cader_id= $usuario->get_val_campo('cat_cader_id');
			
			
			
			if($cat_estado_id==""){
				redireccionar('error','usr_dato_vacio', array('cmp_desc'=>'Estado'));
			}
			
			$catalogo->setArrTblCatCader(" AND `cat_cader_id` LIKE '".$cat_cader_id."'");
			$arr_cat_cader = $catalogo->getArrTblCat();
			$catalogo->setArrTblCatEstado(" AND `cat_estado_id` LIKE '".$cat_estado_id."' ");
			$arr_cat_estado = $catalogo->getArrTblCat();
			
			$arr_cmps_frm['cat_usuario_id'] = $usuario->getCatUsuarioId();
			$arr_cmps_frm['cat_estado_id'] = $usuario->get_val_campo('cat_estado_id');
			$arr_cmps_frm['cat_cader_id'] = $usuario->get_val_campo('cat_cader_id');
			
			if($this->getCatCuestionarioId()==1){
				//if($cat_cader_id==""){
				//	redireccionar('error','usr_dato_vacio', array('cmp_desc'=>'CADER'));
				//}
				$arr_cmps_frm['p2r1c1'] = $cat_estado_id;
				$arr_cmps_frm['p2r1c1_desc'] = $arr_cat_estado[$cat_estado_id]["descripcion"];
				//$arr_cmps_frm['p3r1c2'] = $cat_cader_id;
				//$arr_cmps_frm['p3r1c2_desc'] = $arr_cat_cader[$cat_cader_id]["descripcion"];
			}elseif($this->getCatCuestionarioId()==2){
				$arr_cmps_frm['estado'] = $cat_estado_id;
				$arr_cmps_frm['estado_desc'] = $arr_cat_estado[$cat_estado_id]["descripcion"];
			}elseif($this->getCatCuestionarioId()==3){
				if($cat_cader_id==""){
					redireccionar('error','usr_dato_vacio', array('cmp_desc'=>'CADER'));
				}
				$arr_cmps_frm['estado'] = $cat_estado_id;
				$arr_cmps_frm['estado_desc'] = $arr_cat_estado[$cat_estado_id]["descripcion"];
				$arr_cmps_frm['cader'] = $cat_cader_id;
				$arr_cmps_frm['cader_desc'] = $arr_cat_cader[$cat_cader_id]["descripcion"];
			}elseif($this->getCatCuestionarioId()==4){
				if($cat_cader_id==""){
					redireccionar('error','usr_dato_vacio', array('cmp_desc'=>'CADER'));
				}
				$arr_cmps_frm['estado'] = $cat_estado_id;
				$arr_cmps_frm['estado_desc'] = $arr_cat_estado[$cat_estado_id]["descripcion"];
				$arr_cmps_frm['cader'] = $cat_cader_id;
				$arr_cmps_frm['cader_desc'] = $arr_cat_cader[$cat_cader_id]["descripcion"];
			}
			
		}
		
		$arr_cmps_frm['cat_cuestionario_id'] = $this->getCatCuestionarioId();
		$cat_municipio_id = (isset($arr_cmps_frm['p2r1c2']))? $arr_cmps_frm['p2r1c2'] : "";
		$municipio_cve = ($cat_municipio_id!="")? substr($cat_municipio_id, -3) : "";
		
		$this->and_mpo = ($cat_estado_id!="")? " AND `cat_estado_id` LIKE '".$cat_estado_id."' " : "";
		$this->and_localidad = ($cat_estado_id!="" && $municipio_cve!="")? " AND `cat_estado_id` LIKE '".$cat_estado_id."' AND `municipio_cve` LIKE '".$municipio_cve."' " : " AND 0 ";
		
		
		
		$arr_validaciones = array();
		if(!$es_nuevo){
		    $validar = new Validar();
		    $validar->serArrReglasDeCuestionario($this->getCatCuestionarioId(), $arr_cmps_frm);
		    $validar->setArrValidaciones();
		    $arr_validaciones = $validar->getArrValidaciones();
		}
		
		
		
		$this->tag_campo = new Campos();
		$this->tag_campo->setConSelect2(false); //Quito la clase select2 para que jalen los eventos
		//$this->tag_campo->setLectura(true);
		$this->tag_campo->setValorCampos($arr_cmps_frm);
		if(count($arr_validaciones)){
		    $this->tag_campo->setArrValidaciones($arr_validaciones);
		}
		if($this->tag_campo->getValor('estatus_cuest')==2){
		    $this->es_aprobado = true;
		}
	}
	/**
	 * Acción guardar para el cuestionario seleccionado
	 */
	public function guardar(){
		if($this->getPermisoEscritura()){
			$bd = new BaseDatos();
			$log = new Log();
			//Se obtienen los campos y su valor en la forma
			
			$arr_cmps = array();
			$arr_tablas = $this->cat_cuestionario->getArrTablas();
			
			foreach ($arr_tablas as $tabla){
				$arr_cmps_cu = $bd->getArrCmpsTbl($tabla);
				foreach ($arr_cmps_cu as $arr_cmps_cu_det){
					$cmp_nom = $arr_cmps_cu_det['Field'];
					switch($cmp_nom){
						case 'cuestionario_id':
						case 'borrar':
							break;
						case 'creacion_fecha':
							$arr_cmps[$tabla][$cmp_nom] = "IFNULL(`creacion_fecha`, CURDATE())";
							break;
						case 'creacion_hora':
							$arr_cmps[$tabla][$cmp_nom] = "IFNULL(`creacion_hora`, CURTIME())";
							break;
						case 'modifica_fecha':
							$arr_cmps[$tabla][$cmp_nom] = "CURDATE()";
							break;
						case 'modifica_hora':
							$arr_cmps[$tabla][$cmp_nom] = "CURTIME()";
							break;
						default:
							$arr_cmps[$tabla][$cmp_nom] = (isset($_REQUEST[$cmp_nom]))? txt_sql($_REQUEST[$cmp_nom]) : "NULL";
							break;
					}
				}
			}
			//Se guarda el registro
			$guardar = new Guardar();
			$guardar->setGuardaCuest($arr_cmps, $this->getCatCuestionarioId(), $this->getCuestionarioId());
			$this->cuestionario_id = $guardar->getCmpIdVal();
			$log->setRegLog('cuestionario_id', $this->getCuestionarioId(), 'guardar', 'Aviso', 'Se guardó cuestionario');
			
			redireccionar('cuestionario','abrir',array('cuestionario_id'=>$this->getCuestionarioId()));
		}else{
			redireccionar('error','sin_permisos', array('tit_accion'=>'Borrar cuestionario'));
		}
	}
	/**
	 * Acción para cambiar la situación actual del cuestionario a "cuestionario aprobado"
	 */
	public function aprobar(){
		if($this->getPermisoAprobar()){
			$cuestionario = new Cuestionario($this->getCatCuestionarioId());
			$cuestionario->aprobar($this->getCuestionarioId());
			$log = new Log();
			$log->setRegLog('cuestionario_id', $this->getCuestionarioId(), 'aprobar', 'Aviso', 'Se aprobó cuestionario');
			redireccionar('cuestionario','abrir',array('cuestionario_id'=>$this->getCuestionarioId()));
		}else{
			redireccionar('error','sin_permisos', array('tit_accion'=>'Aprobar cuestionario'));
		}
	}
	/**
	 * Acción que permite exportar todos los registros de cuestionario a un archivo Excel o CSV, dependiendo la opción seleccionada por el usuario.
	 */
	public function exportar(){
	    $formato = (isset($_REQUEST['formato']))? $_REQUEST['formato'] : "";
	    $cuestionario = new Cuestionario($this->getCatCuestionarioId());
	    $this->setAndCuest();
	    $and_c = $this->getAndCuest();
	    
	    $ahora = date('Ymd_hi');
	    $archivo = cuest_cve($this->getCatCuestionarioId()).'_'.$ahora;
	    
	    switch($formato){
	        case 'xls':
	            header('Content-type: application/vnd.ms-excel');
	            header('Content-Disposition: attachment; filename='.$archivo.'.xls');
	            header('Pragma: no-cache');
	            header('Expires: 0');
	            $cuestionario->exportarExcel($and_c);
	            break;
	        case 'csv':
	            
	            header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	            header('Content-type: text/x-csv');
	            header('Content-Disposition: attachment; filename='.$archivo.'.csv');
	            
	            $cuestionario->exportarCSV($and_c);
	            
	            break;
	    }
	}
	/**
	 * Acción para marcar como borrado el cuestionario seleccionado
	 */
	public function borrar(){
		if($this->getPermisoBorrar()){
			$cat_cuestionario_id = (isset($_REQUEST['cat_cuestionario_id']))? $_REQUEST['cat_cuestionario_id'] : "";
			$cuestionario = new Cuestionario($cat_cuestionario_id);
			$cuetionario_id = $this->getCuestionarioId();
			$cuestionario->borrar($this->getCuestionarioId());
			$log = new log();
			$log->setRegLog("cuetionario_id", $cuetionario_id, "borrar", "Aviso", "Se borró cuestionario");
			redireccionar('cuestionario','inicio',array('cuestionario_id'=>$cuetionario_id));
		}else{
			redireccionar('error','sin_permisos', array('tit_accion'=>'Borrar cuestionario'));
		}
	}
	/**
	 * Modifica el valor de la variable <strong>cat_cuestionario_id</strong> obteniendo el valor de fuentes distintas dependiendo de la situación
	 */
	private function setCatCuestionarioId(){
		$cat_cuestionario_id = "";
		if($this->getCuestionarioId()==""){
			$cat_cuestionario_id = (isset($_REQUEST['cat_cuestionario_id']))? intval($_REQUEST['cat_cuestionario_id']) : "";
		}elseif($this->getCuestionarioId()!=""){
			$cat_cuestionario_id = intval(substr($this->getCuestionarioId(), 0,2));
		}
		if(!intval($cat_cuestionario_id)){
			redireccionar('error','faltan_args', array('argumento'=>'cat_cuestionario_id'));
		}
		$this->cat_cuestionario_id = $cat_cuestionario_id;
	}
	/**
	 * Devuelve el valor de la variable <strong>cuestionario_id</strong>
	 * @return integer
	 */
	public function getCuestionarioId(){
		return $this->cuestionario_id;
	}
	/**
	 * Devuelve el valor de la variable <strong>cat_cuestionario_id</strong>
	 * @return string|number
	 */
	public function getCatCuestionarioId(){
		return $this->cat_cuestionario_id;
	}
	/**
	 * Modifica el valor de la variable que contiene parte de la sentencia query que realiza el filtrado de información de cuestionarios a mostrar dependiendo del usuario que hace la consulta
	 */
	private function setAndCuest(){
	    $cuet_cve = cuest_cve($this->getCatCuestionarioId());
	    $p_v_nac = $cuet_cve."_nac";
	    $p_v_est = $cuet_cve."_est";
	    $p_v_cader = $cuet_cve."_cader";
	    
	    $usuario = new Usuario();
	    $usuario->setArrUsuario();
	    
	    
	    if($this->permiso->tiene_permiso($p_v_nac)){
	        $and_c = "";
	    }elseif($this->permiso->tiene_permiso($p_v_est)){
	        $cat_estado_id = $usuario->get_val_campo("cat_estado_id");
	        if($cat_estado_id == ""){
	            redireccionar('error','usr_dato_vacio', array('cmp_desc'=>'Estado'));
	        }
	        $and_c = "AND `cat_estado_id` LIKE '".$cat_estado_id."'";
	    }elseif($this->permiso->tiene_permiso($p_v_cader)){
	        $cat_cader_id = $usuario->get_val_campo("cat_cader_id");
	        if($cat_cader_id == ""){
	            redireccionar('error','usr_dato_vacio', array('cmp_desc'=>'CADER'));
	        }
	        $and_c = "AND `cat_cader_id` LIKE '".$cat_cader_id."'";
	    }else{
	        //Si es capturista (sin rol de vista), sólo verá lo que ha capturado
	        $and_c = "AND `cat_usuario_id` LIKE '".$usuario->getCatUsuarioId()."'";
	    }
	    
	    $this->and_cuest = $and_c;
	}
	/**
	 * Devuelve el valor de la variable que contiene el query para el filtrado de información de cuestionarios
	 * @return string
	 */
	private function getAndCuest(){
	    return $this->and_cuest;
	}
	/**
	 * Modifica el arreglo que contiene el detalle de registros de cuestionarios a mostrar, definido a partir de los permisos del usuario
	 */
	private function setArrTblContenido(){
		$cuestionario = new Cuestionario($this->getCatCuestionarioId());
		$this->setAndCuest();
		$and_c = $this->getAndCuest();
		
		$cuestionario->setArrTblCuestionario($and_c);
		$this->arr_tbl_cue = $cuestionario->getArrTblCuestionario();
	}
	/**
	 * Devuelve el valor de la variable que contiene el arreglo de registros de cuestionarios a motrar
	 * @return array
	 */
	public function getArrTblContenido(){
		return $this->arr_tbl_cue;
	}
	/**
	 * Devuelve el valor de la variable a la que se le asignó la indicación de si el usuario actual tiene permiso de escritura 
	 * @return boolean
	 */
	public function getPermisoEscritura() {
	    return $this->permiso_escritura;
	}
	/**
	 * Devuelve el valor de la variable a la que se le asignó la indicación de si el usuario actual tiene permiso de aprobar cuestionario
	 * @return boolean
	 */
	public function getPermisoAprobar() {
	    return $this->permiso_aprobar;
	}
	/**
	 * Devuelve el valor de la variable a la que se le asignó la indicación de si el usuario actual tiene permiso para exportar los cuestionarios
	 * @return boolean
	 */
	public function getPermisoExportar() {
	    return $this->permiso_exportar;
	}
	/**
	 * Devuelve el valor de la variable a la que se le asignó la indicación de si el usuario actual tiene permiso para borrar los cuestionarios
	 * @return boolean
	 */
	public function getPermisoBorrar() {
		return $this->permiso_borrar;
		;
	}
	/**
	 * Devuelve el tag o formato html del diseño para desplegar el texto del estatus indicado en el argumento
	 * @param int $estatus_cuest	Clave del estatus del cuestionario
	 * @return string
	 */
	public function getTagEstatus($estatus_cuest) {
		if(intval($estatus_cuest)==2){
			return '<span class="label label-success">Cuestionario Aprobado</span>';
		}else{
			return '';
		}
	}	
}