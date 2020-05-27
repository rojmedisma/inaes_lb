<?php
/**
 * Controlador para los catálogos
 * @author Ismael Rojas
 *
 */
class CatalogoControl extends ControladorBase{
	/**
	 * Imprime texto HTML de las opciones combo para el municipio
	 */
	public function imprime_municipios(){
		$cat_estado_id = (isset($_REQUEST["cat_estado_id"]))? $_REQUEST["cat_estado_id"] : "";
		$opt_municipio = "";
		if($cat_estado_id!=""){
			$catalogo = new Catalogo();
			$catalogo->setListaOpcCatMunicipio($cat_estado_id);
			$opt_municipio = $catalogo->getListaOpciones();
		}
		echo $opt_municipio;
	}
	/**
	 * Imprime texto HTML de las opciones combo para la localidad
	 */
	public function imprime_localidades() {
		$cat_municipio_id = (isset($_REQUEST["cat_municipio_id"]))? $_REQUEST["cat_municipio_id"] : "";
		$opt_localidades = "";
		if($cat_municipio_id!=""){
			$catalogo = new Catalogo();
			$catalogo->setListaOpcCatLocalidad($cat_municipio_id);
			$opt_localidades = $catalogo->getListaOpciones();
		}
		echo $opt_localidades;
	}
	
}