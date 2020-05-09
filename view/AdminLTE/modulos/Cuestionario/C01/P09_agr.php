<label class="text-light-blue">9.2. Agricultura</label>
<p>Por favor señale</p>
<div class="row">
	<div class="col-md-3">
		<label>Cultivo sembrado</label>
	</div>
	<div class="col-md-2">
		<label>Producción anual (t)</label>
	</div>
	<div class="col-md-3">
		<label>Método por el que se manejan los residuos de cultivos o los rastrojos</label>
	</div>
	<div class="col-md-2">
		<label>Porcentaje de los rastrojos en cada método de manejo</label>
	</div>
</div>
<?php for($r=1; $r<=5; $r++){?>
<div class="row">
	<div class="col-md-3">
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p9Ar'.$r.'c1', 'cat_cultivo');?>
		<div id="<?php echo 'div_p9Ar'.$r.'c1_esp'; ?>" style="display:none"><?php echo $controlador_obj->tag_campo->cmpTexto('p9Ar'.$r.'c1_esp');?></div>
	</div>
	<div class="col-md-2">
		<?php echo $controlador_obj->tag_campo->cmpNum('p9Ar'.$r.'c2', 1);?>
	</div>
	<div class="col-md-3">
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p9Ar'.$r.'c3', 'p9ArNc3');?>
		<div id="<?php echo 'div_p9Ar'.$r.'c3_esp'; ?>" style="display:none"><?php echo $controlador_obj->tag_campo->cmpTexto('p9Ar'.$r.'c3_esp');?></div>
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p9Ar'.$r.'c4', 'p9ArNc3');?>
		<div id="<?php echo 'div_p9Ar'.$r.'c4_esp'; ?>" style="display:none"><?php echo $controlador_obj->tag_campo->cmpTexto('p9Ar'.$r.'c4_esp');?></div>
	</div>
	<div class="col-md-2">
		<?php echo $controlador_obj->tag_campo->cmpNum('p9Ar'.$r.'c5', 2);?>
		<?php echo $controlador_obj->tag_campo->cmpNum('p9Ar'.$r.'c6', 2);?>
	</div>
</div>
<?php }?>