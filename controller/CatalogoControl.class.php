<?php
class CatalogoControl extends ControladorBase{
	
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