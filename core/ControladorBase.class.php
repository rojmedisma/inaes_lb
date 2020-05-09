<?php
/**
 * Extensión para todas las clases dentro de la carpeta <strong>controller</strong>
 * @author Ismael Rojas
 */
class ControladorBase{
	private $cargar_vista = false;
	private $nombre_vista = '';
	private $autentificar = true;
	private $titulo_pagina = '';
	private $arr_pag_anterior = array();
	/**
	 * Modifica el título principal de la página actual (Función obsoleta, ahora se usa setPaginaDistintivos)
	 * @param string $titulo_pagina	Título principal de la página actual
	 */
	public function setTituloPagina($titulo_pagina){
		$this->titulo_pagina = $titulo_pagina;
	}
	/**
	 * Devuelve el título principal de la página actual
	 * @return string
	 */
	public function getTituloPagina(){
		return $this->titulo_pagina;
	}
	/**
	 * Activas/desactiva el atributo que permita ejecutar la validación de la sesión actual
	 * @param boolean $autentificar
	 */
	public function setAutentificar($autentificar){
		$this->autentificar = $autentificar;
	}
	/**
	 * Devuelve la indicación para permitir validar la sesión actual
	 * @return boolean
	 */
	public function getAutentificar(){
		return $this->autentificar;
	}
	/**
	 * Devuelve el nombre del controlador de la página que se está consultando, cuyo argumento también aparece la URL
	 * @return string
	 */
	public function getControlador(){
		return (isset($_REQUEST['controlador']))? $_REQUEST['controlador'] : CONTROLADOR_DEFECTO;
	}
	/**
	 * Devuelve el nombre de la acción de la página que se está consultando, cuyo argumento también aparece la URL
	 * @return string
	 */
	public function getAccion(){
		return (isset($_REQUEST['accion']))? $_REQUEST['accion'] : ACCION_DEFECTO;
	}
	/**
	 * Redirecciona a la página de autenficar usuario, cerrado previamente la sesión actual
	 */
	public function setValidaSesion(){
		$cat_usuario_id = (isset($_SESSION['cat_usuario_id']))? $_SESSION['cat_usuario_id'] : '';
		$controlador = (isset($_REQUEST['controlador']))? $_REQUEST['controlador'] :"";
		if($cat_usuario_id==""){
			$url_uri = ($controlador!="")? $_SERVER['REQUEST_URI'] : "";
			//Antes de autentificar, se va a desautentificar para eliminar lo que haya quedado de la variable de sessión
			redireccionar('desautentificar', 'inicio', '', $url_uri);
		}
	}
	/**
	 * Devuelve la indicación de permitir cargar la página asignada en el atributo <strong>nombre_vista</strong>
	 * @return boolean
	 */
	public function getCargarVista(){
		return $this->cargar_vista;
	}
	/**
	 * Devuelve el nombre del archivo de la página a mostrar, este archivo puede ser cualquiera de los que se encuentran dentro de la carpeta <strong>view</strong>
	 * @return string
	 */
	public function getNombreVista(){
		return $this->nombre_vista;
	}
	/**
	 * Modifica el atributo con el nombre del archivo de la página a mostrar
	 * @param string $nombre_vista
	 */
	protected function setMostrarVista($nombre_vista){
		$this->cargar_vista = ($nombre_vista!="")? true : false;
		$this->nombre_vista = $nombre_vista;
	}
	/**
	 * Devuelve un arreglo con la información del usuario actual del catálogo de usuarios
	 * @return array
	 */
	public function getArrUsuario(){
		$usuario = new Usuario();
		$usuario->setArrUsuario();
		$arr_usuario = array();
		if($usuario->getCatUsuarioId()!=""){
			$arr_usuario= $usuario->getArrUsuario();
		}
		return $arr_usuario;
	}
	/**
	 * Devuelve un arreglo con los datos necesarios para permitir regresar a la página previamente visitada
	 * @return array
	 */
	public function getArrPagAnterior(){
		return $this->arr_pag_anterior;
	}
	/**
	 * Devuelve los datos de la pagina anterior donde
	 * @param int $indice	es el indice del arreglo
	 * @param string $variable	es la variable (controlador, accion, titulo_pagina)
	 * @return string
	 */
	public function getPaginaAnterior($indice, $variable) {
		$arr_pag_anterior = $this->getArrPagAnterior();
		$valor_variable = "";
		if(isset($arr_pag_anterior[$indice][$variable])){
			$valor_variable = $arr_pag_anterior[$indice][$variable];
		}
		return $valor_variable;
	}
	/**
	 * A partir del controlador y la acción se asignan en variables los distintivos de cada página, como el título o la navegación
	 * @param string $controlador
	 * @param string $accion
	 */
	public function setPaginaDistintivos($controlador="", $accion=""){
		$controlador_actual = ($controlador=="")? $this->getControlador() : $controlador;
		if($controlador_actual=="error"){
			$accion_actual = "__construct";
		}else{
			$accion_actual = ($accion=="")? $this->getAccion() : $accion;
		}
		if($controlador_actual!="" && $accion_actual!=""){
			
			$distintivos = new Distintivos();
			$distintivos->setArrDistintivosPagina($controlador_actual, $accion_actual);
			$arr_pag_distintivos = $distintivos->getArrDistintivosPagina();
			
			if(isset($arr_pag_distintivos['titulo_pagina']) && isset($arr_pag_distintivos['arr_pagina_anterior'])){
				$this->titulo_pagina = $arr_pag_distintivos['titulo_pagina'];
				$this->arr_pag_anterior = $arr_pag_distintivos['arr_pagina_anterior'];
			}elseif($this->getControlador()!="error"){	//Para que no se cicle
				redireccionar('error','sin_distintivos_pagina', array("controlador_d"=>$controlador_actual, "accion_d"=>$accion_actual));
			}
			
		}
	}
}
