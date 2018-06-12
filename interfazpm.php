<?php
session_start();

?>

<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" href="estilosdev.css">
</head>
<body id="cuerpo">
	<ul class="ca-menu">
	<li onclick="mensaje1(event)" id="opcion1">
		<a href="crearform.php">
			<span class="ca-icon">I</span>
			<div class="ca-content">
				<h2 class="ca-main">Informacion</h2>
				<h3 class="ca-sub">Ver tu información completa</h3>
			</div>
		</a>
	</li>
	<li onclick="mensaje2(event)" id="opcion2">
		<a href="#">
			<span class="ca-icon">P</span>
			<div class="ca-content">
				<h2 class="ca-main">Ver proyectos</h2>
				<h3 class="ca-sub">Clic aquí para ver los proyectos</h3>
			</div>
		</a>
	</li>
	<li onclick="mensaje3(event)" id="opcion3">
		<a href="#">
			<span class="ca-icon">R</span>
			<div class="ca-content">
				<h2 class="ca-main">Reportes</h2>
				<h3 class="ca-sub">Clic aquí para generar reporte</h3>
			</div>
		</a>
	</li>
	<li id="opcion3">
		<a href="login.html">
			<span class="ca-icon">C</span>
			<div class="ca-content">
				<h2 class="ca-main">Cerrar sesión</h2>
				<h3 class="ca-sub">Clic aquí para irte.</h3>
			</div>
		</a>
	</li>
</ul>
<section class="info">
	<article id="prueba"class="in">
		
	</article>
	</section>

</body>
</html>