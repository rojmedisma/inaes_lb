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
    public function serArrReglasDeCuestionario($cat_cuestionario_id, $arr_valor) {
        $this->setArrReglas(cuest_cve($cat_cuestionario_id), $arr_valor);
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
            $arr_validaciones[$campo] = array("alerta"=>htmlentities($alerta));
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
     * Modifica el arreglo de reglas de validación del cuestionario indicado en el argumento a modo de identificador de cuestionario o clave de cuestionario. Dependiendo del identificador, se ejecuta la función de reglas específicas del cuestionario 
     * @param string $identificador	Indentificador del cuestionario sacada a partir del Id de cuestionario
     * @param array $arr_valor
     */
    private function setArrReglas($identificador, $arr_valor) {
        $this->arr_valor = $arr_valor;
        switch ($identificador){
            case 'c01': $this->setArrReglasDeC01(); break;
            case 'c02': $this->setArrReglasDeC02(); break;
            case 'c03': $this->setArrReglasDeC03(); break;
        }
    }
    /**
     * Se define el arreglo de reglas para el cuestionario para productores
     */
    private function setArrReglasDeC01() {
        $arr_valor = $this->getArrValorCampos();
        extract($arr_valor, EXTR_OVERWRITE);
        $arr_reglas = array();
        $arr_reglas['p1r1c1'] = array('regla'=>'requerido');
        if($p1r1c1==1){
            $arr_reglas['p1r1c2'] = array('regla'=>'requerido');
        }elseif($p1r1c1==2){
            $arr_reglas['p1r2c2'] = array('regla'=>'requerido');
        }
        
        
        
        for($r=1; $r<=8; $r++){
            if($arr_valor['p4r'.$r.'c1']==1){
                $arr_reglas['p4r'.$r.'c2'] = array('regla'=>'requerido');
                $arr_reglas['p4r'.$r.'c3'] = array('regla'=>'requerido');
            }
        }
        $arr_reglas['p4r9'] = array('regla'=>'requerido');
        for($r=1; $r<=7; $r++){
            if($arr_valor['p6r'.$r.'c1']==1){
                $arr_reglas['p6r'.$r.'c2'] = array('regla'=>'requerido');
                $arr_reglas['p6r'.$r.'c3'] = array('regla'=>'requerido');
            }
        }
        $arr_reglas['p7r1c1'] = array('regla'=>'requerido');
        if($p7r1c1==1){
            $arr_reglas['p7r8c2'] = array('regla'=>'al_menos_n_chk', 'val_n'=>1, 'arr_cmp_nom'=>array('p7r1c2','p7r2c2','p7r3c2','p7r4c2','p7r5c2','p7r6c2','p7r7c2','p7r8c2'));
        }
        
        $arr_reglas['p8r1c1'] = array('regla'=>'requerido');
        if($p8r1c1==1){
            $arr_reglas['p8r17c2'] = array('regla'=>'al_menos_n_chk', 'val_n'=>1, 'arr_cmp_nom'=>array('p8r1c2','p8r2c2','p8r3c2','p8r4c2','p8r5c2','p8r6c2','p8r7c2','p8r8c2','p8r9c2','p8r10c2','p8r11c2','p8r12c2','p8r13c2','p8r14c2','p8r15c2','p8r16c2','p8r17c2'));
        }
        //Agricultura 
        if($p3r1==1){
            $arr_reglas['p9Ar1c1'] = array('regla'=>'requerido');
            for($r=1; $r<=5; $r++){
                if($arr_valor['p9Ar'.$r.'c1']!=""){
                    $arr_reglas['p9Ar'.$r.'c2'] = array('regla'=>'requerido');
                    $arr_reglas['p9Ar'.$r.'c3'] = array('regla'=>'requerido');
                    if($arr_valor['p9Ar'.$r.'c3']!=""){
                        $arr_reglas['p9Ar'.$r.'c5'] = array('regla'=>'requerido');
                    }
                    $arr_reglas['p9Ar'.$r.'c6'] = array('regla'=>'suma_igual_a_N', 'val_n'=>100, 'arr_cmp_nom'=>array('p9Ar'.$r.'c5','p9Ar'.$r.'c6'));
                    if($arr_valor['p9Ar'.$r.'c4']!=""){
                        $arr_reglas['p9Ar'.$r.'c6'] = array('regla'=>'requerido');
                    }
                    
                }
            }
        }
        //Ganadería
        if($p3r2==1){
            $arr_reglas['p9Gr1c1'] = array('regla'=>'requerido');
            for($r=1; $r<=10; $r++){
                if($arr_valor['p9Gr'.$r.'c1']!=""){
                    $arr_reglas['p9Gr'.$r.'c2'] = array('regla'=>'requerido');
                    $arr_reglas['p9Gr'.$r.'c3'] = array('regla'=>'requerido');
                    $arr_reglas['p9Gr'.$r.'c4'] = array('regla'=>'requerido');
                    if($arr_valor['p9Gr'.$r.'c4']!=""){
                        $arr_reglas['p9Gr'.$r.'c6'] = array('regla'=>'requerido');
                    }
                    $arr_reglas['p9Gr'.$r.'c7'] = array('regla'=>'suma_igual_a_N', 'val_n'=>100, 'arr_cmp_nom'=>array('p9Gr'.$r.'c6','p9Gr'.$r.'c7'));
                    if($arr_valor['p9Gr'.$r.'c5']!=""){
                        $arr_reglas['p9Gr'.$r.'c7'] = array('regla'=>'requerido');
                    }
                }
            }
        }
        //Acuacultura y pesca
        if($p3r3==1 || $p3r4==1){
            $arr_reglas['p9APr1c1'] = array('regla'=>'requerido');
            for($r=1; $r<=5; $r++){
                if($arr_valor['p9APr'.$r.'c1']!=""){
                    $arr_reglas['p9APr'.$r.'c2'] = array('regla'=>'requerido');
                    $arr_reglas['p9APr'.$r.'c3'] = array('regla'=>'requerido');
                    $arr_reglas['p9APr'.$r.'c4'] = array('regla'=>'requerido');
                    if($arr_valor['p9APr'.$r.'c4']!=""){
                        $arr_reglas['p9APr'.$r.'c6'] = array('regla'=>'requerido');
                    }
                    $arr_reglas['p9Gr'.$r.'c7'] = array('regla'=>'suma_igual_a_N', 'val_n'=>100, 'arr_cmp_nom'=>array('p9APr'.$r.'c6','p9APr'.$r.'c7'));
                    if($arr_valor['p9APr'.$r.'c5']!=""){
                        $arr_reglas['p9APr'.$r.'c7'] = array('regla'=>'requerido');
                    }
                }
            }
        }
        //Ganadería
        if($p3r2==1){
            $arr_reglas['p10Gr1c1'] = array('regla'=>'requerido');
            if($p10Gr1c1==1){
                $arr_reglas['p10Gr2c1'] = array('regla'=>'requerido');
                $arr_reglas['p10Gr2c2'] = array('regla'=>'requerido');
                $arr_reglas['p10Gr3c1'] = array('regla'=>'requerido');
                $arr_reglas['p10Gr4c1'] = array('regla'=>'requerido');
                $arr_reglas['p10Gr5c1'] = array('regla'=>'requerido');
            }
        }
        //
        //Acuacultura
        if($p3r4==1){
            $arr_reglas['p10Ar1c1'] = array('regla'=>'requerido');
            if($p10Ar1c1==1){
                $arr_reglas['p10Ar2c1'] = array('regla'=>'requerido');
                $arr_reglas['p10Ar2c2'] = array('regla'=>'requerido');
                $arr_reglas['p10Ar3c1'] = array('regla'=>'requerido');
                $arr_reglas['p10Ar4c1'] = array('regla'=>'requerido');
                $arr_reglas['p10Ar5c1'] = array('regla'=>'requerido');
            }
        }
        //si es agr, gan, silv
        if($p3r1==1 || $p3r2==1 || $p3r5==1){
            $arr_reglas['p11'] = array('regla'=>'requerido');
            for($r=1; $r<=10; $r++){
                if($arr_valor['p11Fr'.$r.'c1']){
                    $arr_reglas['p11Fr'.$r.'c2'] = array('regla'=>'requerido');
                    $arr_reglas['p11Fr'.$r.'c3'] = array('regla'=>'requerido');
                    $arr_reglas['p11Fr'.$r.'c4'] = array('regla'=>'requerido');
                    $arr_reglas['p11Fr'.$r.'c5'] = array('regla'=>'requerido');
                }
            }
            for($r=1; $r<=6; $r++){
                if($arr_valor['p11Hr'.$r.'c1']){
                    $arr_reglas['p11Hr'.$r.'c2'] = array('regla'=>'requerido');
                    $arr_reglas['p11Hr'.$r.'c3'] = array('regla'=>'requerido');
                    $arr_reglas['p11Hr'.$r.'c4'] = array('regla'=>'requerido');
                }
            }
            for($r=1; $r<=8; $r++){
                if($arr_valor['p11Ir'.$r.'c1']){
                    $arr_reglas['p11Ir'.$r.'c2'] = array('regla'=>'requerido');
                    $arr_reglas['p11Ir'.$r.'c3'] = array('regla'=>'requerido');
                    $arr_reglas['p11Ir'.$r.'c4'] = array('regla'=>'requerido');
                }
            }
        }
        //si es agr, gan
        if($p3r1==1 || $p3r2==1){
            $arr_reglas['p12AGr1c1'] = array('regla'=>'requerido');
            $arr_reglas['p12AGr2c1'] = array('regla'=>'requerido');
            $arr_reglas['p12AGr3c1'] = array('regla'=>'requerido');
            $arr_reglas['p12AGr4c1'] = array('regla'=>'requerido');
            
            if($p12AGr1c1==1){
                $arr_reglas['p12AGr1c2'] = array('regla'=>'requerido');
                $arr_reglas['p12AGr1c3'] = array('regla'=>'requerido');
            }
            if($p12AGr2c1==1){
                $arr_reglas['p12AGr2c2'] = array('regla'=>'requerido');
                $arr_reglas['p12AGr2c3'] = array('regla'=>'requerido');
            }
            if($p12AGr3c1==1){
                $arr_reglas['p12AGr3c2'] = array('regla'=>'requerido');
            }
        }
        
        $arr_reglas['p14r1c1'] = array('regla'=>'requerido');
        if($p14r1c1!=""){
            $arr_reglas['p14r1c2'] = array('regla'=>'requerido');
        }
        $arr_reglas['p15'] = array('regla'=>'requerido');
        $this->arr_reglas = $arr_reglas;
    }
    /**
     * Se define el arreglo de reglas para el cuestionario para gobiernos estatales
     */
    private function setArrReglasDeC02() {
        extract($this->getArrValorCampos(), EXTR_OVERWRITE);
        $arr_reglas = array();
        $arr_reglas['p1'] = array('regla'=>'requerido');
        $arr_reglas['p2r1c1'] = array('regla'=>'requerido');
        if($p2r1c1==1){
            $arr_reglas['p2r2c1'] = array('regla'=>'requerido');
        }
        $arr_reglas['p3r1c1'] = array('regla'=>'requerido');
        if($p3r1c1==1){
            $arr_reglas['p3r2c1'] = array('regla'=>'requerido');
            $arr_reglas['p3r3c1'] = array('regla'=>'requerido');
            $arr_reglas['p3r4c1'] = array('regla'=>'requerido');
        }
        $arr_reglas['p4'] = array('regla'=>'requerido');
        $arr_reglas['p5'] = array('regla'=>'requerido');
        $arr_reglas['p6r1c1'] = array('regla'=>'requerido');
        $arr_reglas['p6r2c1'] = array('regla'=>'requerido');
        $arr_reglas['p7r1c1'] = array('regla'=>'requerido');
        if($p7r1c1==1){
        	$arr_reglas['p7r2c1'] = array('regla'=>'requerido');
        	if($p7r2c1==1){
        		$arr_reglas['p7r3c1'] = array('regla'=>'requerido');
        	}
        }
        $arr_reglas['p8r1c1'] = array('regla'=>'requerido');
        if($p8r1c1==1){
        	$arr_reglas['p8r2c1'] = array('regla'=>'requerido');
        	if($p8r2c1==1){
        		$arr_reglas['p8r3c1'] = array('regla'=>'requerido');
        	}
        }
        $this->arr_reglas = $arr_reglas;
    }
    /**
     * Se define el arreglo de reglas para el cuestionario para gobiernos municipales
     */
    private function setArrReglasDeC03() {
        extract($this->getArrValorCampos(), EXTR_OVERWRITE);
        $arr_reglas = array();
        $arr_reglas['municipio'] = array('regla'=>'requerido');
        $arr_reglas['p1'] = array('regla'=>'requerido');
        $arr_reglas['p1'] = array('regla'=>'requerido');
        $arr_reglas['p2r1c1'] = array('regla'=>'requerido');
        if($p2r1c1==1){
            $arr_reglas['p2r2c1'] = array('regla'=>'requerido');
        }
        $arr_reglas['p3r1c1'] = array('regla'=>'requerido');
        if($p3r1c1==1){
            $arr_reglas['p3r2c1'] = array('regla'=>'requerido');
            $arr_reglas['p3r3c1'] = array('regla'=>'requerido');
            $arr_reglas['p3r4c1'] = array('regla'=>'requerido');
            $arr_reglas['p3r5c1'] = array('regla'=>'requerido');
            $arr_reglas['p3r6c1'] = array('regla'=>'requerido');
            $arr_reglas['p3r7c1'] = array('regla'=>'requerido');
        }
        $arr_reglas['p4r1c1'] = array('regla'=>'requerido');
        if($p4r1c1){
            $arr_reglas['p4r2c1'] = array('regla'=>'requerido');
        }
        $arr_reglas['p5r1c1'] = array('regla'=>'requerido');
        if($p5r1c1==1){
        	$arr_reglas['p5r2c1'] = array('regla'=>'requerido');
        	if($p5r2c1==1){
        		$arr_reglas['p5r3c1'] = array('regla'=>'requerido');
        	}
        }
        
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