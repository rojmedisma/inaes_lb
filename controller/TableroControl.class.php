<?php
/**
 * Controlador para mostrar el tablero principal y todas sus opciones
 * Plataforma CICDI
 * @author Ismael
 *
 */
class TableroControl extends ControladorBase{
    public $permiso;
    public function __construct(){
    	parent::__constructINAES();
    }
    /**
     * Acción que despliega la pantalla de Tablero
     */
	public function inicio(){
		$this->setPaginaDistintivos();
		$this->setMostrarVista('Tablero.php');
		$this->permiso = new Permiso();
	}
}