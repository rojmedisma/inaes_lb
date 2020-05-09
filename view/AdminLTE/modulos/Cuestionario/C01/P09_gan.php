<label class="text-light-blue">9.1. Ganadería</label>
<p>Si produce ganado en pie, carne y/o leche, por favor señale</p>
<div class="row">
	<div class="col-md-3">
		<label>Especie y tipo</label>
	</div>
	<div class="col-md-2">
		<label>¿Cuántas cabezas en promedio en el año?</label>
	</div>
	<div class="col-md-2">
		<label>¿Cuál es su peso promedio?</label>
	</div>
	<div class="col-md-3">
		<label>Método de manejo de excretas</label>
	</div>
	<div class="col-md-2">
		<label>Porcentaje de las excretas en cada método de manejo</label>
	</div>
</div>
<?php for($r=1; $r<=10; $r++){?>
<div class="row">
	<div class="col-md-3">
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p9Gr'.$r.'c1', 'cat_especie_pec');?>
		<div id="<?php echo 'div_p9Gr'.$r.'c1_esp'; ?>" style="display:none"><?php echo $controlador_obj->tag_campo->cmpTexto('p9Gr'.$r.'c1_esp');?></div>
	</div>
	<div class="col-md-2">
		<?php echo $controlador_obj->tag_campo->cmpNum('p9Gr'.$r.'c2', 0);?>
	</div>
	<div class="col-md-2">
		<?php echo $controlador_obj->tag_campo->cmpNum('p9Gr'.$r.'c3', 1);?>
	</div>
	<div class="col-md-3">
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p9Gr'.$r.'c4', 'p9GrNc4');?>
		<div id="<?php echo 'div_p9Gr'.$r.'c4_esp'; ?>" style="display:none"><?php echo $controlador_obj->tag_campo->cmpTexto('p9Gr'.$r.'c4_esp');?></div>
		<?php echo $controlador_obj->tag_campo->cmpSelectDeSubCat('p9Gr'.$r.'c5', 'p9GrNc4');?>
		<div id="<?php echo 'div_p9Gr'.$r.'c5_esp'; ?>" style="display:none"><?php echo $controlador_obj->tag_campo->cmpTexto('p9Gr'.$r.'c5_esp');?></div>
	</div>
	<div class="col-md-2">
		<?php echo $controlador_obj->tag_campo->cmpNum('p9Gr'.$r.'c6', 2);?>
		<?php echo $controlador_obj->tag_campo->cmpNum('p9Gr'.$r.'c7', 2);?>
	</div>
</div>
<?php }?>