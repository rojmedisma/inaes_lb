<!DOCTYPE html>
<html>
	<?php include_once 'modulos/Head.php'; ?>
	<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
	<body class="hold-transition skin-black layout-top-nav"  data-spy="scroll" data-target="#myScrollspy" data-offset="15">
		<?php include_once 'modulos/FrmCero.php'; ?>
		<div class="wrapper">
			<?php include_once 'modulos/Header.php'; ?>
			<!-- Full Width Column -->
			<div class="content-wrapper">
				<div class="container">
					<?php include_once 'modulos/ContentHeader.php'; ?>
					<section class="content">
						<div class="box box-solid">
							<div class="box-body">
								<div class="box-group" id="accordion">
									<div class="panel box box-primary">
										<div class="box-header with-border">
											<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#b_plataforma">
													Plataforma
												</a>
											</h4>
										</div>
										<div id="b_plataforma" class="panel-collapse collapse">
											<div class="box-body">
												<p>Se utiliza una plataforma de servidor web Apache con lenguaje PHP y sistema de base de datos MySQL. Para su instalación se utilizó XAMPP el cual incluye el servidor web y la base de datos.
												</p>
												<h3>Versiones:</h3>
												<ul>
													<li>PHP: 5.5.15
													</li>
													<li>MySQL: 5.6.20
													</li>
													<li>XAMPP: 1.8.3
													</li>
												</ul>
											</div>
										</div>
									</div>
									<div class="panel box box-primary">
										<div class="box-header with-border">
											<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#b_arq_des">
													Arquitectura de desarrollo
												</a>
											</h4>
										</div>
										<div id="b_arq_des" class="panel-collapse collapse">
											<div class="box-body">
												<p>El desarrollo de la aplicación está basado en la arquitectura de desarrollo llamada MVC (Modelo Vista Controlador).
												</p>
												<h3>Carpetas de código</h3>
												<h4>Carpeta "assets"</h4>
												<p>Está diseñada para contener distintos tipos de archivos, en donde se crean subcarpetas por cada tipo de archivo.
												</p>
												<p>Hasta el momento únicamente se tiene la subcarpeta "js".
												</p>
												<h4>Carpeta " assets/js"</h4>
												<p>Contiene los archivos en javascript desarrollados específicamente para la aplicación.
												</p>
												<p>Los archivos y su descripción son:</p>
												<ul>
													<li>CatUsuario.js: Funciones para la forma de Catálogo de usuario.
													</li>
													<li>Forma.js: Funciones generales para dar funcionalidad a los distintos tipos de campos dentro de un formulario con plantilla AdminLTE.
													</li>
													<li>FrmC01.js: Funciones para el bloqueo y ocultamiento de campos dentro del formulario.
													</li>
													<li>FrmC02.js: Funciones para el bloqueo y ocultamiento de campos dentro del formulario.
													</li>
													<li>FrmC03.js: Funciones para el bloqueo y ocultamiento de campos dentro del formulario.
													</li>
													<li>FrmC04.js: Funciones para el bloqueo y ocultamiento de campos dentro del formulario.
													</li>
													<li>Principal.js: Funciones generales.
													</li>
												</ul>
												<h4>Carpeta "controller"</h4>
												<p>Contiene archivos PHP con clases de tipo controlador</p>
												<h4>Carpeta "core"</h4>
												<p>Contiene archivos PHP, en donde se encuentran las clases para la conexión a la base de datos, declaración de variables globales, y clases que se usan como extensión para otras clases.
												</p>
												<h4>Carpeta "library"</h4>
												<p>Contiene librerías externas, como plantillas de diseño, librerías de javascript y jquery.
												</p>
												<h4>Carpeta "model"</h4>
												<p>Contiene archivos PHP con clases de tipo modelo.</p>
												<h4>Carpeta "view"</h4>
												<p>Contiene todas las formas o vistas diseñadas a partir de la plantilla de diseño.
												</p>
												<h4>Código PHP (Funciones y clases)</h4>
												<a class="btn btn-primary" style="margin-right: 5px;" href="javaScript:f_ir_a_otra_ventana('library/phpdoc/index.html')"><i class="fa fa-fw fa-file-code-o"></i> Ir a documentación de código fuente PHP</a>
											</div>
										</div>
									</div>
									<!-- Base de datos -->
									<div class="panel box box-primary">
										<div class="box-header with-border">
											<h4 class="box-title">
												<a data-toggle="collapse" data-parent="#accordion" href="#b_bd">
													Base de datos
												</a>
											</h4>
										</div>
										<div id="b_bd" class="panel-collapse collapse">
											<div class="box-body">
												<h3>Especificaciones</h3>
												<ul>
													<li>Nombre: siap_mml
													</li>
													<li>Cotejamiento: utf8_general_ci
													</li>
													<li>Motor de almacenamiento en tablas: InnoDB
													</li>
												</ul>
												<h3>Tablas</h3>
												<h4>Tabla: adjunto</h4>
												<p>Contiene el registro de los archivos que se suben a la plataforma como adjuntos.
												</p>
												<h4>Tabla: c00</h4>
												<p>Tabla de cuestionario. Es la tabla principal para todos los cuestionarios, esto significa que contiene los campos comunes de todos los registros de cuestionario.
												</p>
												<p>Los campos y su descripción son:</p>
												<ul>
													<li>cuestionario_id: Id llave
													</li>
													<li>cat_cuestionario_id: Id del catálogo de cuestionario al que pertenece
													</li>
													<li>cat_usuario_id: Id del usuario autor
													</li>
													<li>cat_estado_id: Id del catálogo de estado al que pertenece el usuario
													</li>
													<li>cat_cader_id: Id del catálogo de CADER al que pertence el usuario
													</li>
													<li>estatus_cuest: Estatus o situación actual del cuestionario
													</li>
													<li>creacion_fecha: Fecha de creación del registro
													</li>
													<li>creacion_hora: Hora de creación del registro
													</li>
													<li>modifica_fecha: Fecha de modificación del registro
													</li>
													<li>modifica_hora: Hora de modificación del registro
													</li>
													<li>borrar: Identificador de registro borrado
													</li>
												</ul>
												<h4>Tabla: c01t01</h4>
												<p>Tabla de cuestionario. Tabla 1 para el cuestionario "Cuestionario para productores". Los campos que contiene son parte del formulario.
												</p>
												<h4>Tabla: c01t02</h4>
												<p>Tabla de cuestionario. Tabla 2 para el cuestionario "Cuestionario para productores". Los campos que contiene son parte del formulario.
												</p>
												<h4>Tabla: c01t03</h4>
												<p>Tabla de cuestionario. Tabla 3 para el cuestionario "Cuestionario para productores". Los campos que contiene son parte del formulario.
												</p>
												<h4>Tabla: c01t04</h4>
												<p>Tabla de cuestionario. Tabla 4 para el cuestionario "Cuestionario para productores". Los campos que contiene son parte del formulario.
												</p>
												<h4>Tabla: c01t05</h4>
												<p>Tabla de cuestionario. Tabla 5 para el cuestionario "Cuestionario para productores". Los campos que contiene son parte del formulario.
												</p>
												<h4>Tabla: c02t01</h4>
												<p>Tabla de cuestionario. Tabla para el cuestionario "Cuestionario para gobiernos estatales". Los campos que contiene son parte del formulario.
												</p>
												<h4>Tabla: c03t01</h4>
												<p>Tabla de cuestionario. Tabla para el cuestionario "Cuestionario para gobiernos municipales". Los campos que contiene son parte del formulario.
												</p>
												<h4>Tabla: c04t01</h4>
												<p>Tabla de cuestionario. Tabla para el cuestionario "Módulo de indicadores sobre estudios especiales e información de instancias federales". Los campos que contiene son parte del formulario.
												</p>
												<h4>Tabla: cat_cader</h4>
												<p>Tabla de catálogo de CADER.</p>
												<p>Los campos y su descripción son:</p>
												<ul>
													<li>
														cat_cader_id: Id Llave
													</li>
													<li>
														cat_estado_id: Id llave de la tabla "cat_estado".
													</li>
													<li>
														cat_ddr_id: Ide llave de la tabla "cat_ddr".
													</li>
													<li>
														cader_cve: Id de dos dígitos, individual por cada "cat_estado_id" y "cat_ddr_id".
													</li>
													<li>
														Descripcion: Nombre del CADER
													</li>
												</ul>
												<h4>Tabla: cat_cuestionario</h4>
												<p>Tabla de catálogo de cuestionarios. Contiene los parámetros de configuración de cada cuestionario, el total de registros es la cantidad de cuestionarios en el sistema. El Id del cuestionarios se usa también como identificador en los nombres de tablas y formas dentro del código, ejemplo: con cat_cuestionario_id =1, su clave de identificiación es "c01".
												</p>
												<p>Los campos y su descripción:</p>
												<ul>
													<li>
														cat_cuestionario_id: Id llave
													</li>
													<li>
														descripcion: Nombre del cuestionario
													</li>
													<li>
														definición: Definición del cuestionario
													</li>
													<li>
														lista_tablas: Lista de los nombres de las tablas usadas para almacenar el formulario
													</li>
												</ul>
												<h4>Tabla: cat_estado</h4>
												<p>Tabla de catálogo de estados</p>
												<ul>
													<li>
														cat_estado_id: Id llave
													</li>
													<li>
														descripcion: Nombre del estado
													</li>
													<li>
														svg_id: Clave para identificarse en mapas AMChart
													</li>
												</ul>
												<h4>Tabla: cat_grupo</h4>
												<p>Tabla de catálogo de grupos. Contiene todos los registros de grupos que se van creando en el sistema.
												</p>
												<p>Los campos y su descripción son:</p>
												<ul>
													<li>
														cat_grupo_id: Id llave
													</li>
													<li>
														tit_corto: Título corto
													</li>
													<li>
														descripcion: Título largo descriptivo del grupo
													</li>
													<li>
														borrar: Identificador de registro borrado
													</li>
												</ul>
												<h4>Tabla: cat_mpo_cader</h4>
												<p>Tabla de catálogo de municipios por CADER. Contiene el catálogo CADER pero por municipio.
												</p>
												<p>Los campos y su descripción son:</p>
												<ul>
													<li>
														cat_mpo_cader_id: Id llave
													</li>
													<li>
														cat_municipio_id: Id llave de la tabla " cat_municipio".
													</li>
													<li>
														cat_municipio_desc: Nombre del municipio
													</li>
													<li>
														cat_cader_id: Id llave de la tabla "cat_cader"
													</li>
													<li>
														cat_cader_desc: Nombre del CADER
													</li>
												</ul>
												<h4>Tabla: cat_municipio</h4>
												<p>Tabla de catálogo de municipios.</p>
												<p>Los campos y su descripción son:</p>
												<ul>
													<li>
														cat_municipio_id: Id llave
													</li>
													<li>
														cat_estado_id: Id llave de la tabla "cat_estado"
													</li>
													<li>
														municipio_cve: Clave de municipio por cada estado
													</li>
													<li>
														cat_cader_id: Id llave de la tabla "cat_cader"
													</li>
													<li>
														descripcion: Nombre del municipio
													</li>
													<li>
														longitud: Coordenada de longitud
													</li>
													<li>
														latitud: Coordenada de latitud
													</li>
												</ul>
												<h4>Tabla: cat_permiso</h4>
												<p>Tabla de catálogo de permisos. Contiene todos los permisos que pueden ser aplicados mediante el catálogo de grupos.
												</p>
												<p>Los campos y su descripción son:</p>
												<ul>
													<li>
														cat_permiso_cve: Campo complementario del Id Llave
													</li>
													<li>
														tipo: Campo complementario del Id llave e identificador de tipo de permiso (Por el momento únicamente existe el "g" igual a "General".
													</li>
													<li>
														tit_corto: Título corto
													</li>
													<li>
														descripcion: Título descriptivo
													</li>
													<li>
														orden: Índice de orden
													</li>
												</ul>
												<h4>Tabla: cat_sub_cat</h4>
												<p>Tabla de catálogo de sub-catálogos. Son las opciones que se muestran en los campos de tipo "combo", en donde el "cat_nombre" es el identificador o sub-catálogo.
												</p>
												<ul>
													<li>
														cat_nombre: Parte del id llave junto con "opc_id", a su vez es el identificador de catálogo para cada grupo de opciones.
													</li>
													<li>
														opc_id: Parte del id llave junto con "cat_nombre", a su vez es el id por cada grupo de opciones dentro del menú de opciones.
													</li>
													<li>
														opc_descripcion: Nombre de la opción
													</li>
													<li>
														opc_desc_alias: Nombre alias que se desplegaría en el formulario pero no se almacenaría en la tabla.
													</li>
													<li>
														es_esp: Bandera que indica si la opción es de tipo "Otro epecificar" y así en código desplegar un campo de texto.
													</li>
													<li>
														json_atributos: En caso de ser necesario en este campo se almacenaría un arreglo de tipo json con más atributos para la opción.
													</li>
													<li>
														orden: Orden en cómo se van a desplegar las opciones dentro del menú
													</li>
												</ul>
												<h4>Tabla: cat_usuario</h4>
												<p>Tabla de Catálogo de usuario. Contiene el registro de usuarios que se van dando de alta.
												</p>
												<ul>
													<li>
														cat_usuario_id: Id llave.
													</li>
													<li>
														Usuario: Nombre de usuario.
													</li>
													<li>
														clave: Contraseña codificada.
													</li>
													<li>
														Nombre: Nombre del usuario.
													</li>
													<li>
														ap_paterno: Apellido paterno del usuario.
													</li>
													<li>
														ap_materno: Apellido materno del usuario.
													</li>
													<li>
														cat_estado_id: Id de la tabla "cat_estado".
													</li>
													<li>
														cat_cader_id: Id de la tabla "cat_cader".
													</li>
													<li>
														cat_municipio_id: Id de la tabla "cat_municipio"
													</li>
													<li>
														cat_grupo_id: Id de la tabla "cat_grupo"
													</li>
													<li>
														borrar: Bandera que indica si el registro está borrado.
													</li>
												</ul>
												<h4>Tabla: grupo</h4>
												<p>Tabla de grupos. Es la tabla que contiene la relación entre el catálogo de grupos y el catálogo de permisos, significa que contiene todos los permisos asignados a cada grupo creado.
												</p>
												<p>Los campos principales y su descripción son:</p>
												<ul>
													<li>
														cat_grupo_id: Id Llave
													</li>
													<li>
														cat_permiso_cve: Id del catálogo de permisos
													</li>
													<li>
														activo: Identificador de permiso activado
													</li>
												</ul>
												<h4>Tabla: ind_c01</h4>
												<p>Tabla de detalle de indicadores. Detalle de indicadores para el cuestionario "Cuestionario para productores". Contiene el detalle de indicadores calculados a nivel registro de cuestionario. Los campos que contiene son las variables usadas en el cálculo para cada indicador.
												</p>
												<h4>Tabla: ind_c02</h4>
												<p>Tabla de detalle de indicadores. Detalle de indicadores para el cuestionario "Cuestionario para gobiernos estatales". Contiene el detalle de indicadores calculados a nivel registro de cuestionario. Los campos que contiene son las variables usadas en el cálculo para cada indicador.
												</p>
												<h4>Tabla: ind_c03</h4>
												<p>Tabla de detalle de indicadores. Detalle de indicadores para el cuestionario "Cuestionario para gobiernos municipales". Contiene el detalle de indicadores calculados a nivel registro de cuestionario. Los campos que contiene son las variables usadas en el cálculo para cada indicador.
												</p>
												<h4>Tabla: ind_c04</h4>
												<p>Tabla de detalle de indicadores. Detalle de indicadores para el cuestionario "Módulo de indicadores sobre estudios especiales e información de instancias federales". Contiene el detalle de indicadores calculados a nivel registro de cuestionario. Los campos que contiene son las variables usadas en el cálculo para cada indicador.
												</p>
												<h4>Tabla: ind_var</h4>
												<p>Tabla de configuración de indicadores. Contiene los parámetros de configuración de todos los indicadores, además de las fórmulas para ejecutar el cálculo de consolidado de registros. Al ejecutarse el cálculo de indicadores tanto a nivel detalle como a nivel consolidado, en el código se hace uso de esta tabla para obtener las variables implicadas en el cálculo, así como para desplegar su resultado en una tabla categorizada. Dentro de la tabla, existen tres tipos de registros. El primer tipo contiene la identificación del indicador, dependiendo de las subcategorías en los títulos, son los registros de identificación ligados en forma de árbol mediante el campo "ind_var_padre_id", los cuales prácticamente indican el título y subtítulos, hasta llegar a los registros del segundo tipo. El segundo tipo de registros contiene el nombre de la variable del indicador y su fórmula query para calcular el consolidado. El tercer tipo de registros es el que contiene el nombre de la variable almacenada en la tabla de detalle de indicadores, en esta parte se pueden enlistar todas las variables implicadas en el cálculo.
												</p>
												<p>Los campos y su descripción son:</p>
												<ul>
													<li>
														ind_var_id: Id único
													</li>
													<li>
														ind_var_padre_id: Indica el Id del registro al que pertenece o se enraíza
													</li>
													<li>
														cat_cuestionario_id: Id del cuestionario al que pertenece el indicador
													</li>
													<li>
														variable_desc: Descripción de la variable del indicador
													</li>
													<li>
														variable: Nombre de la variable de indicador
													</li>
													<li>
														dato_tipo: Tipo da dato de la variable (double, int, txt)
													</li>
													<li>
														etiqueta: Clasificador de variables
													</li>
													<li>
														consolida_nivel: Nivel de cálculo para el consolidado, existen dos, el nivel 1 es el que contiene el cálculo final del indicador, el nivel 2 son cálculos secundarios, como el valor de la N.
													</li>
													<li>
														consolida_qry: Parte de la sentencia query a ejecutar para obtener el resultado consolidado de la variable del indicador.
													</li>
													<li>
														orden: Columna de orden para desplegar los indicadores
													</li>
													<li>
														borrar: Si tiene valor de uno, el registro no se considera.
													</li>
												</ul>
												<h4>Tabla: log</h4>
												<p>Tabla de registros de log. Contiene todos los registros que se generan al realizar ciertas acciones dentro del sistema, permite monitorear los accesos al mismo.
												</p>
												<p>Los campos y su descripción son:</p>
												<ul>
													<li>
														log_id: Id llave.
													</li>
													<li>
														Fecha: Fecha de creación.
													</li>
													<li>
														Hora: Hora de creación.
													</li>
													<li>
														cat_usuario_id: Id llave de la tabla "cat_usuario" e identifica el nombre del usuario firmado cuya acción realizada generó el registro.
													</li>
													<li>
														cmp_id_nom: Nombre del campo llave en el caso que se haya afectado alguna tabla.
													</li>
													<li>
														cmp_id_val: Valor del campo llave indicador con el campo "cmp_id_nom".
													</li>
													<li>
														evento: Nombre del evento o acción que generó el registro.
													</li>
													<li>
														estatus: Situación o identificación del tipo de prioridad del registro (Aviso, Error, Alerta, etc.).
													</li>
													<li>
														descripcion: Descripción de la razón que generó el registro.
													</li>
												</ul>
												<h3>Vistas</h3>
												<h4>Vista: v_grupo</h4>
												<p>Vista de detalle de grupos. Contiene la relación de la tabla grupo con las tablas catálogo de grupos y catálogo de permisos.
												</p>
												<h4>Vista: v_log</h4>
												<p>Vista de detalle de registros de log. Es la tabla de Log pero con información adicional del catálogo de usuarios.
												</p>
						
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>

							
					</section>
				</div>
				<!-- /.container -->
			</div>
			<!-- /.content-wrapper -->
			<?php include_once 'modulos/Footer.php'; ?>
		</div>
		<!-- ./wrapper -->
		<?php include_once 'modulos/Scripts.php'; ?>
	</body>
</html>