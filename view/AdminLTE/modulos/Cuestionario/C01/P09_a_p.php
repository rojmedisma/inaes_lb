<label class="text-light-blue">9.3	Acuacultura y pesca</label>
<p>Por favor señale</p>
<div class="row">
	<div class="col-md-3">
		<label>Especie</label>
	</div>
	<div class="col-md-2">
		<label>Producción anual (t)</label>
	</div>
	<div class="col-md-2">
		<label>Cantidad de residuos producidos (t)</label>
	</div>
	<div class="col-md-3">
		<label>Método por el que se manejan los residuos del pescado</label>
	</div>
	<div class="col-md-2">
		<label>Porcentaje de los residuos en cada método de manejo</label>
	</div>
</div>
<?php for($r=1; $r<=5; $r++){?>
<div class="row">
	<div class="col-md-3">
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p9APr'.$r.'c1', 'cat_especie_ap');?>
		<div id="<?php echo 'div_p9APr'.$r.'c1_esp'; ?>" style="display:none"><?php echo $controlador_obj->tag_campo->cmpTexto('p9APr'.$r.'c1_esp');?></div>
	</div>
	<div class="col-md-2">
		<?php echo $controlador_obj->tag_campo->cmpNum('p9APr'.$r.'c2', 1);?>
	</div>
	<div class="col-md-2">
		<?php echo $controlador_obj->tag_campo->cmpNum('p9APr'.$r.'c3', 1);?>
	</div>
	<div class="col-md-3">
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p9APr'.$r.'c4', 'p9APrNc4');?>
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p9APr'.$r.'c5', 'p9APrNc4');?>
	</div>
	<div class="col-md-2">
		<?php echo $controlador_obj->tag_campo->cmpNum('p9APr'.$r.'c6', 2);?>
		<?php echo $controlador_obj->tag_campo->cmpNum('p9APr'.$r.'c7', 2);?>
	</div>
</div>
<?php }?>