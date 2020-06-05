<?php
/**
 * Clase modelo para el cálculo de las validaciones o mensajes de alerta en los cuestionarios
 * @author Ismael
 *
 */
class Validar{
    private $arr_reglas = array();
    private $arr_valor = array();
    private $arr_validaciones = array();
    /**
     * Modifica el arreglo de reglas de validación del cuestionario indicado en el argumento como Id de cuestionario. Dependiendo del identificador, se ejecuta la función de reglas específicas del cuestionario
     * @param integer $cat_cuestionario_id
     * @param array $arr_valor	Arreglo de campos con su valor dentro de la forma actual
     */
    public function serArrReglasDeCuestionario($cat_cuestionario_id, $cat_cuest_modulo_id, $arr_cmps_frm) {
    	//echo "<br>".json_encode($arr_cmps_frm)."<br>";
    	$this->arr_valor = $arr_cmps_frm;
    	switch (intval($cat_cuestionario_id)){
    		case 1:
    			switch(intval($cat_cuest_modulo_id)){
    				case 1:
    					$this->setArrReglasDeC01M01();
    					break;
    				case 2:
    					$this->setArrReglasDeC01M02();
                        break;
                    case 3:
                        $this->setArrReglasDeC01M03();
                        break;
                    case 4:
                    	$this->setArrReglasDeC01M04();
                    	break;
                    case 5:
                    	$this->setArrReglasDeC01M05();
                    	break;
                    case 6:
                    	$this->setArrReglasDeC01M06();
                    	break;
                    case 7:
                    	$this->setArrReglasDeC01M07();
                    	break;
                    case 8:
                    	$this->setArrReglasDeC01M08();
                    	break;
    			}
    			break;
    	}
    }
    /**
     * Devuelve el arreglo de campos enviado por argumento desde el método <strong>serArrReglasDeCuestionario</strong>
     * @return array
     */
    private function getArrValorCampos() {
        return $this->arr_valor;
    }
    /**
     * Modifica el arreglo de validaciones a partir de una serie de reglas predefinidas, en donde mediante el arreglo de reglas de validación del cuestionario, regresa otro arreglo pero con las validaciones que fueron aplicadas
     */
    public function setArrValidaciones() {
        $arr_reglas = $this->getArrReglas();
       
        $arr_valor = $this->getArrValorCampos();
        $arr_validaciones = array();
        
        
        foreach($arr_reglas as $campo=>$arr_param){
        	
            $alerta = "";
            switch($arr_param['regla']){
                case 'requerido':
                	
                    if($arr_valor[$campo] == ""){
                        if(isset($arr_param['desc'])){
                            $alerta = '<strong>'.$arr_param['desc'].'</strong> Es requerido';
                        }else{
                            $alerta = 'Dato requerido';
                        }
                        
                    }
                    break;
                case 'al_menos_n_chk':
                    //Al menos N opciones en campos chk y posiblemente combos
                    if(isset($arr_param['arr_cmp_nom']) && isset($arr_param['val_n'])){
                        $tot_sel = 0;
                        foreach ($arr_param['arr_cmp_nom'] as $cmp_nom){
                            if($arr_valor[$cmp_nom]==1 || $arr_valor[$cmp_nom]!=0){
                                $tot_sel ++;
                            }
                        }
                        $val_n = intval($arr_param['val_n']);
                        if($tot_sel<$val_n){
                            foreach ($arr_param['arr_cmp_nom'] as $cmp_nom){
                                $arr_validaciones[$cmp_nom] = array("alerta"=>'[sin_desc]');
                            }
                            if(isset($arr_param['desc'])){
                                $alerta = ($val_n==1)? 'En <strong>'.$arr_param['desc'].'</strong>, seleccionar al menos una opción' : 'En <strong>'.$arr_param['desc'].'</strong>, seleccionar al menos '.$val_n.' opciones';
                            }else{
                                $alerta = ($val_n==1)? 'Seleccionar al menos una opción' : 'Seleccionar al menos '.$val_n.' opciones';
                            }
                        }
                    }
                    break;
                case 'al_menos_1_cmp':
                	if(isset($arr_param['arr_cmp_nom'])){
                		$al_menos_1_cmp = false;
                		foreach ($arr_param['arr_cmp_nom'] as $cmp_nom){
                			if($arr_valor[$cmp_nom]!=""){
                				$al_menos_1_cmp = true;
                			}
                		}
                		if(!$al_menos_1_cmp){
                			if(isset($arr_param['desc'])){
                				$alerta = $arr_param['desc'];
                			}else{
                				$alerta = 'Llenar al menos uno de los campos';
                			}
                		}
                	}
                	break;
                case 'suma_igual_a_N':
                    //Si la suma da igual a N
                    if(isset($arr_param['arr_cmp_nom']) && isset($arr_param['val_n'])){
                        $suma = 0;
                        foreach ($arr_param['arr_cmp_nom'] as $cmp_nom){
                            $suma += $arr_valor[$cmp_nom];
                        }
                        if($arr_param['val_n'] != $suma){
                            foreach ($arr_param['arr_cmp_nom'] as $cmp_nom){
                                $arr_validaciones[$cmp_nom] = array("alerta"=>'[sin_desc]');
                            }
                            if(isset($arr_param['desc'])){
                                $alerta = 'En <strong>'.$arr_param['desc'].'</strong>, el total es '.$suma.' y debe ser igual a '.$arr_param['val_n'];
                            }else{
                                $alerta = 'El total es '.$suma.' y debe ser igual a '.$arr_param['val_n'];
                            }
                        }
                    }
                    break;
            }
            if($alerta!=""){
            	$arr_validaciones[$campo] = array("alerta"=>htmlentities($alerta));
            }
            
        }
        
        $this->arr_validaciones = $arr_validaciones;
       
    }
    /**
     * Devuelve el arreglo de validaciones obtenidas para el cuestionario actual
     * @return array
     */
    public function getArrValidaciones(){
        return $this->arr_validaciones;
    }
    /**
     * Reglas de validación para cat_cuestionario_id=1 cat_cuest_modulo_id=1
     */
    private function setArrReglasDeC01M01(){
    	$arr_valor = $this->getArrValorCampos();
    	extract($arr_valor, EXTR_OVERWRITE);
    	$arr_reglas = array();
    	$arr_reglas['persona_tipo'] = array('regla'=>'requerido');
    	if($persona_tipo==2){
    		$arr_reglas['org_nombre'] = array('regla'=>'requerido');
    		$arr_reglas['org_razon_soc'] = array('regla'=>'requerido');
    		
    	}
    	$arr_reglas['repre_nombre'] = array('regla'=>'requerido');
    	$arr_reglas['repre_ap_paterno'] = array('regla'=>'requerido');
    	$arr_reglas['repre_ap_materno'] = array('regla'=>'requerido');
    	$arr_reglas['ubica_estado'] = array('regla'=>'requerido');
    	$arr_reglas['ubica_municipio'] = array('regla'=>'requerido');
    	$arr_reglas['ubica_localidad_desc'] = array('regla'=>'requerido');
    	$arr_reglas['ubica_domicilio'] = array('regla'=>'requerido');
    	$arr_reglas['contacto_correo'] = array('regla'=>'requerido');
    	$arr_reglas['contacto_telefono'] = array('regla'=>'requerido');
    	$arr_reglas['contact_whapp'] = array('regla'=>'requerido');
    	$arr_reglas['socio_num_mujeres'] = array('regla'=>'requerido');
    	$arr_reglas['socio_num_hombres'] = array('regla'=>'requerido');
    	$arr_reglas['socio_num_total'] = array('regla'=>'requerido');
    	$arr_reglas['ini_op_anio'] = array('regla'=>'requerido');
    	$arr_reglas['ini_op_mes'] = array('regla'=>'requerido');
    	$arr_reglas['cobertura_municipio'] = array('regla'=>'requerido');
    	$arr_reglas['cobertura_km'] = array('regla'=>'requerido');
    	
    	$this->arr_reglas = $arr_reglas;
    }
    /**
     * Reglas de validación para cat_cuestionario_id=1 cat_cuest_modulo_id=2
     */
    private function setArrReglasDeC01M02(){
    	$arr_valor = $this->getArrValorCampos();
    	extract($arr_valor, EXTR_OVERWRITE);
    	$arr_reglas = array();
    	
    	$arr_reglas['m1p1'] = array('regla'=>'requerido');
    	$arr_reglas['m1p2'] = array('regla'=>'requerido');
    	$arr_reglas['m1p3'] = array('regla'=>'requerido');
    	$arr_reglas['m1p4'] = array('regla'=>'requerido');
    	$arr_reglas['m1p5'] = array('regla'=>'requerido');
    	$arr_reglas['m1p6'] = array('regla'=>'requerido');
    	$arr_reglas['m1p7'] = array('regla'=>'requerido');
    	$arr_reglas['m1p8'] = array('regla'=>'requerido');
    	$arr_reglas['m1p9'] = array('regla'=>'requerido');
    	
    	$this->arr_reglas = $arr_reglas;
    }
    /**
     * Reglas de validación para cat_cuestionario_id=1 cat_cuest_modulo_id=3
     */
    private function setArrReglasDeC01M03(){
    	$arr_valor = $this->getArrValorCampos();
    	extract($arr_valor, EXTR_OVERWRITE);
    	$arr_reglas = array();
    	
    	$arr_reglas['m2p1'] = array('regla'=>'requerido');
        $arr_reglas['m2p2'] = array('regla'=>'requerido');
        $arr_reglas['m2p3'] = array('regla'=>'requerido');
        $arr_reglas['m2p4'] = array('regla'=>'requerido');
        
        
        $desc = 'Para la pregunta 5, dejar llena al menos una de estas cuatro opciones (Bodegas planas, Silos, Patios, Econobodegas)';
        $arr_cmp_nom = array('m2p5r1', 'm2p5r2', 'm2p5r3', 'm2p5r4');
        $arr_reglas['m2p5r1'] = array('regla'=>'al_menos_1_cmp', 'desc'=>$desc, 'arr_cmp_nom'=>$arr_cmp_nom);
        $arr_reglas['m2p5r2'] = array('regla'=>'al_menos_1_cmp', 'desc'=>$desc, 'arr_cmp_nom'=>$arr_cmp_nom);
        $arr_reglas['m2p5r3'] = array('regla'=>'al_menos_1_cmp', 'desc'=>$desc, 'arr_cmp_nom'=>$arr_cmp_nom);
        $arr_reglas['m2p5r4'] = array('regla'=>'al_menos_1_cmp', 'desc'=>$desc, 'arr_cmp_nom'=>$arr_cmp_nom);
        
        
        $arr_reglas['m2p6r1'] = array('regla'=>'requerido');
        $arr_reglas['m2p6r2'] = array('regla'=>'requerido');
        $arr_reglas['m2p6r3'] = array('regla'=>'requerido');
        $arr_reglas['m2p6r4'] = array('regla'=>'requerido');
        $arr_reglas['m2p6r5'] = array('regla'=>'requerido');
        $arr_reglas['m2p6r6'] = array('regla'=>'requerido');
        $arr_reglas['m2p6r7'] = array('regla'=>'requerido');
        $arr_reglas['m2p6r8'] = array('regla'=>'requerido');
        $arr_reglas['m2p7r1'] = array('regla'=>'requerido');
        $arr_reglas['m2p7r2'] = array('regla'=>'requerido');
        $arr_reglas['m2p7r3'] = array('regla'=>'requerido');
        $arr_reglas['m2p7r4'] = array('regla'=>'requerido');
        $arr_reglas['m2p7r5'] = array('regla'=>'requerido');
        $arr_reglas['m2p7r6'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r1'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r2'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r3'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r4'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r5'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r6'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r7'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r8'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r9'] = array('regla'=>'requerido');
        $arr_reglas['m2p8r10'] = array('regla'=>'requerido');
        $arr_reglas['m2p9r1'] = array('regla'=>'requerido');
        $arr_reglas['m2p9r2'] = array('regla'=>'requerido');
        $arr_reglas['m2p9r3'] = array('regla'=>'requerido');
        $arr_reglas['m2p9r4'] = array('regla'=>'requerido');
        $arr_reglas['m2p9r5'] = array('regla'=>'requerido');
        $arr_reglas['m2p9r6'] = array('regla'=>'requerido');
        $arr_reglas['m2p10r1'] = array('regla'=>'requerido');
        $arr_reglas['m2p10r2'] = array('regla'=>'requerido');
        $arr_reglas['m2p10r3'] = array('regla'=>'requerido');
        $arr_reglas['m2p10r4'] = array('regla'=>'requerido');
        $arr_reglas['m2p10r5'] = array('regla'=>'requerido');
        $arr_reglas['m2p10r6'] = array('regla'=>'requerido');
        $arr_reglas['m2p10r7'] = array('regla'=>'requerido');
        $arr_reglas['m2p11r1'] = array('regla'=>'requerido');
        $arr_reglas['m2p11r2'] = array('regla'=>'requerido');
        $arr_reglas['m2p11r3'] = array('regla'=>'requerido');
        $arr_reglas['m2p11r4'] = array('regla'=>'requerido');
        $arr_reglas['m2p11r5'] = array('regla'=>'requerido');
        $arr_reglas['m2p11r6'] = array('regla'=>'requerido');
        $arr_reglas['m2p12r1'] = array('regla'=>'requerido');
        $arr_reglas['m2p12r2'] = array('regla'=>'requerido');
        $arr_reglas['m2p12r3'] = array('regla'=>'requerido');
        $arr_reglas['m2p12r4'] = array('regla'=>'requerido');
        $arr_reglas['m2p12r5'] = array('regla'=>'requerido');
        $arr_reglas['m2p12r6'] = array('regla'=>'requerido');
        $arr_reglas['m2p13r1'] = array('regla'=>'requerido');
        $arr_reglas['m2p13r2'] = array('regla'=>'requerido');
        $arr_reglas['m2p13r3'] = array('regla'=>'requerido');
        $arr_reglas['m2p13r4'] = array('regla'=>'requerido');
        $arr_reglas['m2p14r1'] = array('regla'=>'requerido');
        $arr_reglas['m2p14r2'] = array('regla'=>'requerido');
        $arr_reglas['m2p14r3'] = array('regla'=>'requerido');
        $arr_reglas['m2p14r4'] = array('regla'=>'requerido');
        $arr_reglas['m2p14r5'] = array('regla'=>'requerido');
        $arr_reglas['m2p14r6'] = array('regla'=>'requerido');
    	$this->arr_reglas = $arr_reglas;
    }
    /**
     * Reglas de validación para cat_cuestionario_id=1 cat_cuest_modulo_id=4
     */
    private function setArrReglasDeC01M04(){
    	$arr_valor = $this->getArrValorCampos();
    	extract($arr_valor, EXTR_OVERWRITE);
    	$arr_reglas = array();
    	$arr_reglas['m3p1'] = array('regla'=>'requerido');
    	//$arr_reglas['m3p2'] = array('regla'=>'requerido');
    	$arr_reglas['m3p3'] = array('regla'=>'requerido');
    	$arr_reglas['m3p4'] = array('regla'=>'requerido');
    	$arr_reglas['m3p5'] = array('regla'=>'requerido');
    	$arr_reglas['m3p6'] = array('regla'=>'requerido');
    	$arr_reglas['m3p7'] = array('regla'=>'requerido');
    	$arr_reglas['m3p8'] = array('regla'=>'requerido');
    	$arr_reglas['m3p9'] = array('regla'=>'requerido');
    	$arr_reglas['m3p10'] = array('regla'=>'requerido');
    	$this->arr_reglas = $arr_reglas;
    }
    /**
     * Reglas de validación para cat_cuestionario_id=1 cat_cuest_modulo_id=5
     */
    private function setArrReglasDeC01M05(){
    	$arr_valor = $this->getArrValorCampos();
    	extract($arr_valor, EXTR_OVERWRITE);
    	$arr_reglas = array();
    	
    	if(intval($persona_tipo)==1){
    		$arr_reglas['m4p1'] = array('regla'=>'requerido');
    		$arr_reglas['m4p2r1'] = array('regla'=>'requerido');
    		$arr_reglas['m4p2r2'] = array('regla'=>'requerido');
    		$arr_reglas['m4p2r3'] = array('regla'=>'requerido');
    		$arr_reglas['m4p2r4'] = array('regla'=>'requerido');
    		$arr_reglas['m4p3'] = array('regla'=>'requerido');
    	}elseif(intval($persona_tipo)==2){
    		$arr_reglas['m4p4r1'] = array('regla'=>'requerido');
    		$arr_reglas['m4p4r2'] = array('regla'=>'requerido');
    		$arr_reglas['m4p4r3'] = array('regla'=>'requerido');
    		$arr_reglas['m4p5r1'] = array('regla'=>'requerido');
    		$arr_reglas['m4p5r2'] = array('regla'=>'requerido');
    		$arr_reglas['m4p5r3'] = array('regla'=>'requerido');
    		$arr_reglas['m4p6'] = array('regla'=>'requerido');
    	}
    	$this->arr_reglas = $arr_reglas;
    }
    /**
     * Reglas de validación para cat_cuestionario_id=1 cat_cuest_modulo_id=6
     */
    private function setArrReglasDeC01M06(){
    	$arr_valor = $this->getArrValorCampos();
    	extract($arr_valor, EXTR_OVERWRITE);
    	$arr_reglas = array();
    	$arr_reglas['m5p1'] = array('regla'=>'requerido');
    	$arr_reglas['m5p2'] = array('regla'=>'requerido');
    	$arr_reglas['m5p3'] = array('regla'=>'requerido');
    	$arr_reglas['m5p4'] = array('regla'=>'requerido');
    	$arr_reglas['m5p5'] = array('regla'=>'requerido');
    	$arr_reglas['m5p6'] = array('regla'=>'requerido');
    	$arr_reglas['m5p7'] = array('regla'=>'requerido');
    	$arr_reglas['m5p8'] = array('regla'=>'requerido');
    	$arr_reglas['m5p9'] = array('regla'=>'requerido');
    	$this->arr_reglas = $arr_reglas;
    }
    /**
     * Reglas de validación para cat_cuestionario_id=1 cat_cuest_modulo_id=7
     */
    private function setArrReglasDeC01M07(){
    	$arr_valor = $this->getArrValorCampos();
    	extract($arr_valor, EXTR_OVERWRITE);
    	$arr_reglas = array();
    	$arr_reglas['m6p1'] = array('regla'=>'requerido');
    	$arr_reglas['m6p2'] = array('regla'=>'requerido');
    	$arr_reglas['m6p3'] = array('regla'=>'requerido');
    	$arr_reglas['m6p4'] = array('regla'=>'requerido');
    	$arr_reglas['m6p5'] = array('regla'=>'requerido');
    	$arr_reglas['m6p6'] = array('regla'=>'requerido');
    	$arr_reglas['m6p7'] = array('regla'=>'requerido');
    	$arr_reglas['m6p8'] = array('regla'=>'requerido');
    	$arr_reglas['m6p9'] = array('regla'=>'requerido');
    	$arr_reglas['m6p10'] = array('regla'=>'requerido');
    	$arr_reglas['m6p11r1'] = array('regla'=>'requerido');
    	$arr_reglas['m6p11r2'] = array('regla'=>'requerido');
    	$arr_reglas['m6p12'] = array('regla'=>'requerido');
    	$arr_reglas['m6p13'] = array('regla'=>'requerido');
    	$arr_reglas['m6p14'] = array('regla'=>'requerido');
    	$arr_reglas['m6p15'] = array('regla'=>'requerido');
    	$arr_reglas['m6p16r1'] = array('regla'=>'requerido');
    	$arr_reglas['m6p16r2'] = array('regla'=>'requerido');
    	$arr_reglas['m6p17'] = array('regla'=>'requerido');
    	$arr_reglas['m6p18'] = array('regla'=>'requerido');
    	
    	$this->arr_reglas = $arr_reglas;
    }
    /**
     * Reglas de validación para cat_cuestionario_id=1 cat_cuest_modulo_id=8
     */
    private function setArrReglasDeC01M08(){
    	$arr_valor = $this->getArrValorCampos();
    	extract($arr_valor, EXTR_OVERWRITE);
    	$arr_reglas = array();
    	$arr_reglas['m7p1'] = array('regla'=>'requerido');
    	$arr_reglas['m7p2'] = array('regla'=>'requerido');
    	$arr_reglas['m7p3'] = array('regla'=>'requerido');
    	$arr_reglas['m7p4'] = array('regla'=>'requerido');
    	$arr_reglas['m7p5'] = array('regla'=>'requerido');
    	$arr_reglas['m7p6'] = array('regla'=>'requerido');
    	$arr_reglas['m7p7'] = array('regla'=>'requerido');
    	$arr_reglas['m7p8'] = array('regla'=>'requerido');
    	$arr_reglas['m7p9'] = array('regla'=>'requerido');
    	$arr_reglas['m7p10'] = array('regla'=>'requerido');
    	$arr_reglas['m7p11'] = array('regla'=>'requerido');
    	$arr_reglas['m7p12'] = array('regla'=>'requerido');
    	$arr_reglas['m7p13'] = array('regla'=>'requerido');
    	$arr_reglas['m7p14'] = array('regla'=>'requerido');
    	$arr_reglas['m7p15'] = array('regla'=>'requerido');
    	$arr_reglas['m7p16'] = array('regla'=>'requerido');
    	$arr_reglas['m7p17'] = array('regla'=>'requerido');
    	$arr_reglas['m7p18'] = array('regla'=>'requerido');
    	$arr_reglas['m7p19'] = array('regla'=>'requerido');
    	$arr_reglas['m7p20'] = array('regla'=>'requerido');
    	$arr_reglas['m7p21'] = array('regla'=>'requerido');
    	$arr_reglas['m7p22'] = array('regla'=>'requerido');
    	$arr_reglas['m7p23'] = array('regla'=>'requerido');
    	$arr_reglas['m7p24'] = array('regla'=>'requerido');
    	$arr_reglas['m7p25'] = array('regla'=>'requerido');
    	$arr_reglas['m7p26'] = array('regla'=>'requerido');
    	$arr_reglas['m7p27'] = array('regla'=>'requerido');
    	$arr_reglas['m7p28'] = array('regla'=>'requerido');
    	$arr_reglas['m7p29'] = array('regla'=>'requerido');
    	$arr_reglas['m7p30'] = array('regla'=>'requerido');
    	$arr_reglas['m7p31'] = array('regla'=>'requerido');
    	$arr_reglas['m7p32'] = array('regla'=>'requerido');
    	$arr_reglas['m7p33'] = array('regla'=>'requerido');
    	$arr_reglas['m7p34'] = array('regla'=>'requerido');
    	$this->arr_reglas = $arr_reglas;
    }
       
    /**
     * Devuelve el arreglo de reglas del cuestionario actual
     * @return array
     */
    private function getArrReglas() {
        return $this->arr_reglas;
    }
    
    
}