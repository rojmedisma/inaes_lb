<?php
$arr_p11_f = array(
		1=>array("tipo"=>"1. Fertilizante foliar"),
		2=>array("tipo"=>"2. Fosfato de amonio"),
		3=>array("tipo"=>"3. Mezclas NPK 10 20 20"),
		4=>array("tipo"=>"4. Mezclas NPK 22 10 6"),
		5=>array("tipo"=>"5. Mezclas NPK 15 15 15"),
        6=>array("tipo"=>"6. Mezclas NPK 17 17 17"),
		7=>array("tipo"=>"7. Nitrato de amonio"),
		8=>array("tipo"=>"8. Sulfato de amonio"),
		9=>array("tipo"=>"9. Urea"),
		10=>array("tipo"=>"10. Otro (especificar)"),
);
$arr_p11_h = array(
    1=>array("tipo"=>"1. Glifosato"),
    2=>array("tipo"=>"2. 2-4 D"),
    3=>array("tipo"=>"3. Picloram"),
    4=>array("tipo"=>"4. Atrazina y/o Terbutrina"),
    5=>array("tipo"=>"5. Paraquat"),
    6=>array("tipo"=>"6. Otro (especificar)"),
);
$arr_p11_i = array(
    1=>array("tipo"=>"1. Clorpirifos etil"),
    2=>array("tipo"=>"2. Cipermetrina"),
    3=>array("tipo"=>"3. Permetrina"),
    4=>array("tipo"=>"4. Paration Metilico"),
    5=>array("tipo"=>"5. Benzoato de emamectina"),
    6=>array("tipo"=>"6. Carbarilo"),
    7=>array("tipo"=>"7. Spinosad"),
    8=>array("tipo"=>"8. Otro (especificar)"),
);
?>
<div class="row">
	<div class="col-md-4">
		<label>11. ¿Aplicó fertilizante, herbicidas y/o plaguicidas durante el año productivo?</label>
	</div>
	<div class="col-md-3">
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p11','sino') ?>
	</div>
</div>
<div id="div_p11_si">
	<label>Por favor llene los campos indicados para cada tipo de fertilizante, herbicida o plaguicida utilizado.</label>
	<p>Fertilizantes</p>
    <div class="row">
    	<div class="col-md-2">
    		<label>Tipo</label>
    	</div>
    	<div class="col-md-2">
    		<label>Superficie (ha)</label>
    	</div>
    	<div class="col-md-2">
    		<label>Cantidad Aplicada (kg/ha)</label>
    	</div>
    	<div class="col-md-2">
    		<label>Forma de aplicación</label>
    	</div>
    	<div class="col-md-2">
    		<label>Momento de aplicación</label>
    	</div>
    </div>
    <?php foreach ($arr_p11_f as $r=>$arr_det){?>
    <div class="row">
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpCheckbox('p11Fr'.$r.'c1',$arr_det['tipo']);?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpNum('p11Fr'.$r.'c2',1);?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpNum('p11Fr'.$r.'c3',1);?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p11Fr'.$r.'c4', 'p11FrNc4');?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p11Fr'.$r.'c5', 'p11FrNc5');?>
    	</div>
    </div>
    <?php if($r==10){?>
    <div id="<?php echo 'div_p11Fr'.$r.'c1_esp'?>">
    	<div class="row">
        	<div class="col-md-2">
        		<?php echo $controlador_obj->tag_campo->cmpTexto('p11Fr'.$r.'c1_esp');?>
        	</div>
        	<div class="col-md-4">
        		<label>Señalar concentración de N (el dato se ingresa como factor decimal. Si es 10%, se ha de escribir 0.10): </label>
        	</div>
        	<div class="col-md-2">
        		<?php echo $controlador_obj->tag_campo->cmpTexto('p11Fr'.$r.'c1_n');?>
        	</div>
        </div>
    </div>
    <?php }?>
    <?php }?>
    <p>Herbicidas</p>
    <div class="row">
    	<div class="col-md-2">
    		<label>Tipo de herbicida</label>
    	</div>
    	<div class="col-md-2">
    		<label>Cantidad aplicada</label>
    	</div>
    	<div class="col-md-2">
    		<label>Unidad de medida</label>
    	</div>
    	<div class="col-md-2">
    		<label>Superficie donde se aplicó (ha)</label>
    	</div>
    </div>
    <?php foreach ($arr_p11_h as $r=>$arr_det){?>
    <div class="row">
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpCheckbox('p11Hr'.$r.'c1',$arr_det['tipo']);?>
    		<?php if($r==6){?>
    		<div id="<?php echo 'div_p11Hr'.$r.'c1_esp'?>">
				<?php echo $controlador_obj->tag_campo->cmpTexto('p11Hr'.$r.'c1_esp');?>
			</div>
    		<?php }?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpNum('p11Hr'.$r.'c2',1);?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p11Hr'.$r.'c3', 'p11HrNc3');?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpNum('p11Hr'.$r.'c4',1);?>
    	</div>
    </div>
    <?php }?>
    <p>Insecticidas</p>
    <div class="row">
    	<div class="col-md-2">
    		<label>Tipo de insecticida</label>
    	</div>
    	<div class="col-md-2">
    		<label>Cantidad aplicada</label>
    	</div>
    	<div class="col-md-2">
    		<label>Unidad de medida</label>
    	</div>
    	<div class="col-md-2">
    		<label>Superficie donde se aplicó (ha)</label>
    	</div>
    </div>
    <?php foreach ($arr_p11_i as $r=>$arr_det){?>
    <div class="row">
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpCheckbox('p11Ir'.$r.'c1',$arr_det['tipo']);?>
    		<?php if($r==8){?>
    		<div id="<?php echo 'div_p11Ir'.$r.'c1_esp'?>">
				<?php echo $controlador_obj->tag_campo->cmpTexto('p11Ir'.$r.'c1_esp');?>
			</div>
    		<?php }?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpNum('p11Ir'.$r.'c2',1);?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p11Ir'.$r.'c3', 'p11IrNc3');?>
    	</div>
    	<div class="col-md-2">
    		<?php echo $controlador_obj->tag_campo->cmpNum('p11Ir'.$r.'c4',1);?>
    	</div>
    </div>
    <?php }?>
</div>
