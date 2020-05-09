<?php
/**
 * Controlador para mostrar el tablero principal y todas sus opciones
 * @author Ismael
 *
 */
class TableroControl extends ControladorBase{
    public $permiso;
    /**
     * Acción que despliega la pantalla de Tablero
     */
	public function inicio(){
		$this->setPaginaDistintivos();
		$this->setMostrarVista('Tablero.php');
		$this->permiso = new Permiso();
	}
}