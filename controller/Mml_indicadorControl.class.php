<?php
/**
 * Controlador para la Ficha Técnica de la Matriz de Marco Lógico
 * @author Ismael Rojas
 *
 */
class Mml_indicadorControl extends ControladorBase{
	private $arr_tbl_mml_ficha_t = array();
	private $arr_tbl_mml_var_def = array();
	private $mml_ficha_tecnica_id=0;
	private $mml_variable_def_id=0;
	private $ind_folio="";
	private $frm_nav_tab_activo="";	//Id del nav tab activo del formulario
	private $arr_variables_def=array();
	private $pestania_vista_act;
	private $pestania_frm_act;
	public $tag_cmp_ficha = null;
	public $tag_cmp_var_def = null;
	public function __construct(){
		$mml_ficha_tecnica_id = (isset($_REQUEST['mml_ficha_tecnica_id']))? $_REQUEST['mml_ficha_tecnica_id'] : "";
		$pestania_vista_act = (isset($_REQUEST['pestania_vista_act']))? $_REQUEST['pestania_vista_act'] : "";
		$pestania_frm_act = (isset($_REQUEST['pestania_frm_act']))? $_REQUEST['pestania_frm_act'] : "";
		$this->pestania_vista_act = $pestania_vista_act;
		$this->pestania_frm_act = $pestania_frm_act;
		
		$this->mml_ficha_tecnica_id = $mml_ficha_tecnica_id;
		$this->ind_folio = formato_folio($mml_ficha_tecnica_id);
	}
    /**
     * Acción para abrir la vista o consulta de registros de indicador a partir de las fichas técnicas
     */
    public function vista_ind(){
        $this->setPaginaDistintivos();
        
        $mml_ficha_t = new MMLFichaTecnica();
        $mml_ficha_t->setArrTblMMLFichaT();
        $this->arr_tbl_mml_ficha_t = $mml_ficha_t->getArrTbl();
        $this->setMostrarVista("MMLIndicadorVista.php");
        
    }
    /**
     * Acción para abrir la vista o consulta de registros de variables de definición
     */
    public function vista_var(){
    	$this->setPaginaDistintivos();
    	
    	$mml_var_def = new MMLVariableDef();
    	$mml_var_def->setArrTblVariableDef();
    	$this->arr_tbl_mml_var_def = $mml_var_def->getArrTbl();
    	$this->setMostrarVista("MMLIndicadorVista.php");
    	
    }
    /**
     * Acción para abrir la forma "ficha técnica" de registro de indicador
     */
    public function ficha(){
    	$this->setPaginaDistintivos();
    	
    	$mml_ficha_tecnica_id = $this->getMMLFichaTecnicaId();
    	$arr_cmps_frm = array();
    	if($mml_ficha_tecnica_id){
    		
    		$mml_ficha_t = new MMLFichaTecnica();
    		$mml_ficha_t->setArrMMLFichaT($mml_ficha_tecnica_id);
    		$arr_cmps_frm = $mml_ficha_t->getArrReg();
    	}
    	$this->tag_cmp_ficha = new Campos();
    	$this->tag_cmp_ficha->setVerNombreCampo(false);
    	$this->tag_cmp_ficha->setValorCampos($arr_cmps_frm);
    	
    	$this->setMostrarVista("MMLIndicador.php");
    }
    /**
     * Acción para abrir la forma "Características de la variable" de registro de indicador
     */
    public function var_def(){
    	$this->setPaginaDistintivos();
    	$mml_ficha_tecnica_id = $this->getMMLFichaTecnicaId();
    	$arr_cmps_frm = array();
    	if($mml_ficha_tecnica_id){
    		$mml_var_der = new MMLVariableDef();
    		$and_vd = "AND `mml_ficha_tecnica_id` = '".$mml_ficha_tecnica_id."'";
    		$mml_var_der->setArrTblVariableDef($and_vd);
    		$this->arr_variables_def = $mml_var_der->getArrTbl();
    		$this->setMMLVariableDefId();	//Se define mml_variable_def_id
    		
    		$mml_var_der->setArrRegVariableDef($this->getMMLVariableDefId());
    		$arr_cmps_frm = $mml_var_der->getArrReg();
    		
    	}
    	
    	$this->tag_cmp_var_def = new Campos();
    	$this->tag_cmp_var_def->setVerNombreCampo(false);
    	$this->tag_cmp_var_def->setValorCampos($arr_cmps_frm);
    	
    	$this->setMostrarVista("MMLIndicador.php");
    }
    /**
     * Define el Id mml_variable_def_id, si no viene en el argumento, entonces se saca el id de la primer variable del indicador
     */
    private function setMMLVariableDefId(){
    	$mml_ficha_tecnica_id = $this->getMMLFichaTecnicaId();
    	$mml_variable_def_id = (isset($_REQUEST['mml_variable_def_id']))? $_REQUEST['mml_variable_def_id'] : 0;
    	//echo "<br>mml_variable_def_id".$mml_variable_def_id."<br>";
    	if(!$mml_variable_def_id){
    		$mml_var_der = new MMLVariableDef();
    		$mml_variable_def_id = $mml_var_der->getIdPrimerVariable($mml_ficha_tecnica_id);
    	}
    	$this->mml_variable_def_id = $mml_variable_def_id;
    }
    /**
     * Devuelve un arreglo con el contenido de la tabla mml_ficha_tecnica
     * @return array
     */
    public function getArrTblMMLFichaT(){
    	return $this->arr_tbl_mml_ficha_t;
    }
    /**
     * Devuelve un arreglo con el contenido de la tabla mml_variable_def
     * @return array
     */
    public function getArrTblMMLVarDef(){
    	return $this->arr_tbl_mml_var_def;
    }
    /**
     * Devuelve el valor del id indicador/ficha mml_ficha_tecnica_id
     * @return integer
     */
    public function getMMLFichaTecnicaId(){
    	return $this->mml_ficha_tecnica_id;
    }
    /**
     * Devuelve el valor del id mml_variable_def_id de "Variable de definición"
     * @return number integer
     */
    public function getMMLVariableDefId(){
    	return $this->mml_variable_def_id;
    }
    /**
     * Si se tiene cargada la ficha, devuelve el valor del campo asignado en el argumento
     * @param string $cmp_nom
     * @return string
     */
    public function getCmpValFicha($cmp_nom) {
    	if(is_object($this->tag_cmp_ficha)){
    		return $this->tag_cmp_ficha->getValor($cmp_nom);
    	}else{
    		return "";
    	}
    }
    /**
     * Devuelve el valor del id indicador/ficha mml_ficha_tecnica_id en formato de Folio
     * @return string
     */
    public function getIndFolio(){
    	return $this->ind_folio;
    }
    /**
     * Devuelve el arreglo de detalle de todas las variables de definición pertenecientes al indicador
     */
    public function getArrVariablesDef(){
    	return $this->arr_variables_def;
    }
    /**
     * Devuelve el nombre de la pestaña últimamente seleccionada en los formularios de indicador
     * @return string
     */
    public function getPestaniaFrmAct(){
    	return $this->pestania_frm_act;
    }
    /**
     * Devuelve el nombre de la pestaña últimamente seleccionada en las vistas de consulta
     * @return string
     */
    public function getPestaniaVistaAct(){
    	return $this->pestania_vista_act;
    }
     
}