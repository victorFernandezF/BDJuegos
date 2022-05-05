                  <?php include_once("Config.php");
				  session_start(); ?>
                  <script>
				function mobileDisallowParentLinks(event) {
					const link = event.target;
					event.preventDefault();
					event.stopPropagation();

					const isMobile = window.innerWidth <= 600;

					if (!isMobile) {
						link.click();
					}
				}
			</script>
                  <?php $base = Config::$baseURL; ?>
			<ul class="nav">
				<li><a href="<?= $base; ?>index.php">Inicio</a></li>
				<?php if(isset($_SESSION['usuario'])){ ?>
				
				<li><a href="<?= $base; ?>descripcion.php?estado=Add" onclick="mobileDisallowParentLinks(event)">Añadir</a>
					<ul>
						<li><a href="<?= $base; ?>add/addgame.php">añadir Juego</a></li>				
					</ul>
				</li>
				<li><a href="<?= $base; ?>descripcion.php?estado=Edit" onclick="mobileDisallowParentLinks(event)">Modificar</a>
					<ul>
						<li><a href="<?= $base; ?>editfilter.php">modificar Juego</a></li>
					</ul>
				</li>
				<li><a href="<?= $base; ?>descripcion.php?estado=Delete" onclick="mobileDisallowParentLinks(event)">Eliminar</a>
					<ul>
						<li><a href="<?= $base; ?>delete/deletelist.php">eliminar Juego</a></li>
<!-- 						<li><a href="<?= $base; ?>edit/ask_match.php">modificar combate</a></li>
 -->						
					</ul>
				</li>
				<?php } ?>
				<li><a href="<?= $base; ?>descripcion.php?estado=View" onclick="mobileDisallowParentLinks(event)">ver</a>
					<ul>
						<li><a href="<?= $base; ?>ver.php">ver Juegos</a></li>
					</ul>
				</li>
				<li><a href="<?= $base; ?>descripcion.php?estado=View" onclick="mobileDisallowParentLinks(event)">USUARIOS</a>
					<ul>
						<?php if(!isset($_SESSION['usuario'])){ ?>
						<li><a href="<?= $base; ?>login/login_form.php">INICIAR SESION</a></li>
						<?php }else{ ?>
						<li><a href="<?= $base; ?>login/logout.php">CERRAR SESION</a></li>
						<?php }?>
				
			</ul>
