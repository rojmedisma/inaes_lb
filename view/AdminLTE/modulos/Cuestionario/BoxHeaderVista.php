<div class="box-header with-border">
	<h3 class="box-title"><?php echo $controlador_obj->cat_cuestionario->get_val_campo('descripcion'); ?></h3>
	<div class="pull-right box-tools">
			<?php if($controlador_obj->getPermisoEscritura()){?>
    		<a href="<?php echo url_controlador('cuestionario','abrir') ?>"  class="btn btn-primary btn-sm"><i class="fa fa-fw fa-file-o"></i> Alta cuestionario</a>
    		<?php }?>
    		<?php if($controlador_obj->getPermisoExportar()){?>
    		<div class="btn-group">
            	<button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">
            		Exportar cuestionarios
            		<span class="caret"></span>
            		<span class="sr-only">Toggle Dropdown</span>
            	</button>
            	<ul class="dropdown-menu" role="menu">
            		<li><a href="<?php echo url_controlador('cuestionario','exportar', array("formato"=>"xls")) ?>">En formato Excel</a></li>
            		<li><a href="<?php echo url_controlador('cuestionario','exportar', array("formato"=>"csv")) ?>">En formato CSV</a></li>
            	</ul>
            </div>
            <?php }?>	
	</div>
</div>