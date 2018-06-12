<?php
session_start();
$var_session=$_SESSION['usuario'];
if($var_session==null||$var_session=''){
	echo "ACCESO DENEGADO";
	die();
}
?>

<html>
<head>
	<meta charset="utf-8">
		<link rel="stylesheet" href="estilosdev.css">
<script>
	function modificar(){
		//document.getElementById('prueba').innerHTML='<form id="contact" onSubmit="return validar()" action="registrar.php" method="POST"><h3>MODIFICA TUS DATOS</h3><input placeholder="Usuario" type="text" id="usuario" name="usuario" required><input placeholder="Correo electrónico" id="correo" name="correo" type="email" required><input placeholder="Contraseña" id="password" name="password" type="password" required><input type="password" placeholder="Confirma tu contraseña" name="password2" id="confirm_password" required><input placeholder="Dirección" id="direccion" name="direccion" type="text" onclick="validar()" required><input placeholder="Ingresa tu número de teléfono" id="telefono" name="telefono" type="tel" required><a>Tipo de empleado:</a><input type="radio" id="dev" name="tipoempleado" value="1"><label for="dev">Developer</label><input type="radio" id="pm" name="tipoempleado" value="2"> <label for="pm">Project Manager</label> <input placeholder="Nombre" id="nombre" name="nombre" type="text" required> <input placeholder="Apellidos" id="apellidos" name="apellidos" type="text" required> <input placeholder="Edad" id="edad" name="edad" type="text" required> <a>Sexo:</a> <input type="radio" id="mascul" name="sexo" value="male"> <label for="mascul">Hombre</label><input type="radio" id="feme"name="sexo" value="female"><label for="feme">Mujer</label><button type="submit"  id="contact-submit">Modificar</button></form>';
	}
	function mensaje1(ev){
		document.getElementById('prueba').innerHTML='';
document.getElementById('prueba').innerHTML='<p>Información del empleado. </p> <br>Bienvenido: <?php echo $_SESSION['usuario']?> <br> Nombre: <?php echo $_SESSION['nombre']?> <br> Apellidos: <?php echo $_SESSION['apellidos']?> <br> Edad: <?php echo $_SESSION['edad']?><br>Direccion: <?php echo $_SESSION['direccion']?><br>Sexo: <?php echo $_SESSION['sexo']?><br><input type="button" value="Modificar datos" onclick="modificar()">';

	}
	function mensaje2(ev){
		document.getElementById('prueba').innerHTML='';
				document.getElementById('prueba').innerHTML='<p>Ver proyectos.</p>';
	}
	function mensaje3(ev){
		document.getElementById('prueba').innerHTML='';
				document.getElementById('prueba').innerHTML='<p>Reportes.</p>';
	}
</script> 
</head>
<body id="cuerpo">
	<ul class="ca-menu">
	<li onclick="mensaje1(event)" id="opcion1">
		<a href="#">
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
		<a href="cerrar.php">
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
		<p><br><br><br><br><br><br><br>Sé Bienvenido a este espacio de gestión para tus proyectos. Eres un Delveloper<br><br><br>Selecciona una de las opciones de la izquierda para continuar.</p>
	</article>
	</section>

</body>
</html>