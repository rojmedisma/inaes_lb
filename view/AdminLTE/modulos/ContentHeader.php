<!-- Content Header (Page header) -->
<section class="content-header">
	<h1><?php echo $controlador_obj->getTituloPagina(); ?></h1>
	<ol class="breadcrumb">
	<?php if($controlador_obj->getPaginaAnterior(1, 'titulo_pagina')!=""){ ?>
		<li><a href="<?php echo url_controlador($controlador_obj->getPaginaAnterior(1, 'controlador'), $controlador_obj->getPaginaAnterior(1, 'accion'), "", true);?>"><?php echo $controlador_obj->getPaginaAnterior(1, 'titulo_pagina'); ?></a></li>
	<?php }?>
	<?php if($controlador_obj->getPaginaAnterior(0, 'titulo_pagina')!=""){ ?>
		<li><a href="<?php echo url_controlador($controlador_obj->getPaginaAnterior(0, 'controlador'), $controlador_obj->getPaginaAnterior(0, 'accion'), "", true);?>"><?php echo $controlador_obj->getPaginaAnterior(0, 'titulo_pagina'); ?></a></li>
	<?php }?>
		<li class="active"><?php echo $controlador_obj->getTituloPagina(); ?></li>
	</ol>
</section>