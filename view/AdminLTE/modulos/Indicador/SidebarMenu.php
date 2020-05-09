<ul class="sidebar-menu">
	<li class="header">Seleccionar Entidad</li>
	<li class="<?php echo $controlador_obj->getEntidadIdInfo("nacional","99","activo")?>"><a href="<?php echo url_controlador("indicador","filtrar", array("entidad_tipo"=>"nacional","entidad_id"=>"99")) ?>"><i class="<?php echo $controlador_obj->getEntidadIdInfo("nacional","99","icono")?>"></i> <span>Nacional</span></a></li>
	<li class="<?php echo $controlador_obj->getEntidadTipoInfo("estatal","activo")?> treeview">
		<a href="#">
			<span>Estatal</span>
			<span class="pull-right-container">
			<i class="fa fa-angle-left pull-right"></i>
			</span>
		</a>
		<ul class="treeview-menu">
		<?php foreach ($controlador_obj->getArrCatEstado() as $cat_estado_id=>$arr_det){?>
			<li class="<?php echo $controlador_obj->getEntidadIdInfo("estatal",$cat_estado_id,"activo")?>">
				<a href="<?php echo url_controlador("indicador","filtrar", array("entidad_tipo"=>"estatal","entidad_id"=>$cat_estado_id)) ?>">
					<i class="<?php echo $controlador_obj->getEntidadIdInfo("estatal",$cat_estado_id,"icono")?>"></i> <span><?php echo $arr_det['descripcion']?></span>
				</a>
			</li>
		<?php }?>
		</ul>
	</li>
	<li class="<?php echo $controlador_obj->getEntidadTipoInfo("municipal","activo")?> treeview">
		<a href="#">
			<span>Municipal</span>
			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
		</a>
		<ul class="treeview-menu">
		<?php foreach ($controlador_obj->getArrCatEstado() as $cat_estado_id=>$arr_det){?>
		<?php if($controlador_obj->getEntidadTipo()=="municipal" && $cat_estado_id == $controlador_obj->getCatEstadoId()){?>
			<li class="active">
		<?php }else{?>
			<li >
		<?php }?>
		
				<a href="#">
					<span><?php echo $arr_det['descripcion']?></span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
				<?php foreach ($controlador_obj->getArrCatMpoDeEdo($cat_estado_id) as $cat_municipio_id=>$arr_det_mpo){?>
					<li class="<?php echo $controlador_obj->getEntidadIdInfo("municipal",$cat_municipio_id,"activo")?>">
						<a href="<?php echo url_controlador("indicador","filtrar", array("entidad_tipo"=>"municipal","entidad_id"=>$cat_municipio_id)) ?>" title="<?php echo $arr_det_mpo['descripcion']; ?>">
							<i class="<?php echo $controlador_obj->getEntidadIdInfo("municipal",$cat_municipio_id,"icono")?>"></i> <span><?php echo $arr_det_mpo['desc_corta']; ?></span>
						</a>
					</li>
				<?php }?>
				</ul>
			</li>
		<?php }?>
		</ul>
	</li>
	
	
	
	<li class="<?php echo $controlador_obj->getEntidadTipoInfo("de_cader","activo")?> treeview">
		<a href="#">
			<span>Por CADER</span>
			<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
		</a>
		<ul class="treeview-menu">
		<?php foreach ($controlador_obj->getArrCatEstado() as $cat_estado_id=>$arr_det){?>
		<?php if($controlador_obj->getEntidadTipo()=="de_cader" && $cat_estado_id == $controlador_obj->getCatEstadoId()){?>
			<li class="active">
		<?php }else{?>
			<li>
		<?php }?>
				<a href="#">
					<span><?php echo $arr_det['descripcion']?></span>
					<span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
				</a>
				<ul class="treeview-menu">
				<?php foreach ($controlador_obj->getArrCatCaderDeEdo($cat_estado_id) as $cat_cader_id=>$arr_det_cader){?>
					<li class="<?php echo $controlador_obj->getEntidadIdInfo("de_cader",$cat_cader_id,"activo")?>">
						<a href="<?php echo url_controlador("indicador","filtrar", array("entidad_tipo"=>"de_cader","entidad_id"=>$cat_cader_id)) ?>" title="<?php echo $arr_det_cader['descripcion']; ?>">
							<i class="<?php echo $controlador_obj->getEntidadIdInfo("de_cader",$cat_cader_id,"icono")?>"></i> <span><?php echo $arr_det_cader['desc_corta']; ?></span>
						</a>
					</li>
				<?php }?>
				</ul>
			</li>
		<?php }?>
		</ul>
	</li>
</ul>