<?php
session_start();
$var_session=$_SESSION['usuario'];
if($var_session==null||$var_session=''){
	echo "ACCESO DENEGADO";
	die();
}
?>

<html>
<style type="text/css">
#global {
	height: 300px;
	width: 300px;
	border: 2px solid #ddd;
	background: #f1f1f1;
	overflow-y: scroll;
	border-color: blue;
}
#mensajes {
	height: auto;
}
.texto {
	padding:4px;
	background:#fff;
}
</style>
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="estilosdev.css">
	<script>
	
	function mensaje(ev,num){
		if(num == 0){
		 document.getElementById("form1").style.display="block";
		 document.getElementById("form2").style.display="none";
		}
		else{
		 document.getElementById("form1").style.display="none";
		 document.getElementById("form2").style.display="block";
		}
	}

	function mensaje3(ev){
		document.getElementById('prueba').innerHTML='';
		document.getElementById('prueba').innerHTML='<p>Reportes.</p>';
	}
		
	</script> 
</head>
<body id="cuerpo">
	<ul class="ca-menu">
	<li onclick="mensaje(event,0)" id="opcion1">
		<a href="#">
			<span class="ca-icon">I</span>
			<div class="ca-content">
				<h2 class="ca-main">Informacion</h2>
				<h3 class="ca-sub">Ver tu información completa</h3>
			</div>
		</a>
	</li>
	<li onclick="mensaje(event,1)" id="opcion2">
		<a href="#">
			<span class="ca-icon">P</span>
			<div class="ca-content">
				<h2 class="ca-main">Generar Carga Proyectos</h2>
				<h3 class="ca-sub">Clic aquí para ver los proyectos</h3>
			</div>
		</a>
	</li>
	<li onclick="mensaje(event,2)" id="opcion3">
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
<section class="info" >
	<form id=form1  style="display: none;"  action="registroproyecto.php" method="POST">
		<div class="container" id="formulario">
			
			<?php
          			include 'cone.php';
          			$vl=$_SESSION['usuario'];
          			$mysqi=conectar();

					//encontrar a cliente por el id para tabla intermedia
					$rec=$mysqi->query("SELECT * FROM proyecto");
					while ($f1=mysqli_fetch_array($rec)) {

							
				?>
				<center>
					<span><a>ID Proyecto:</a> <?php echo $f1['Id'];?></span><br>
          			<span><a>Nombre Proyecto Registro:</a> <?php echo $f1['Nombre'];?></span><br>
          			<span><a>Descipcion:</a> <?php echo $f1['Descripcion'];?></span><br>
          			<span><a>Empresa:</a> <?php echo $f1['Empresa'];?></span><br>
        		</center>
        		<br><br><br>
				<?php
					}
				?>

		</div> 
	</form> 
	<form id=form2  style="display: none;" action="generarcarga.php" method="POST">
		<div id="global">
				 <?php
          			$mysqi=conectar();

					//encontrar a cliente por el id para tabla intermedia
					$rec=$mysqi->query("SELECT * FROM proyecto");
					while ($f1=mysqli_fetch_array($rec)) {

							
				?>
				<center>
					<span><a>ID Proyecto:</a> <?php echo $f1['Id'];?></span><br>
          			<span><a>Nombre Proyecto Registro:</a> <?php echo $f1['Nombre'];?></span><br>
          			<span><a>Descipcion:</a> <?php echo $f1['Descripcion'];?></span><br>
          			<span><a>Empresa:</a> <?php echo $f1['Empresa'];?></span><br>
        		</center>
        		<br><br><br>
				<?php
					}
				?>
			
		</div>

		<div id="global">
			<div>
				 <?php
					//encontrar a cliente por el id para tabla intermedia
					$rec=$mysqi->query("SELECT * FROM empleados where tipo=1");
					while ($f1=mysqli_fetch_array($rec)) {

							
				?>
				<center>
          			<span><a>Nombre Empleado:</a> <?php echo $f1['nombre'];?></span><br>
          			<span><a>Apellido Empleado:</a> <?php echo $f1['apellidos'];?></span><br>
          			<span><a>Usuario:</a> <?php echo $f1['usuario'];?></span><br>
        		</center>
        		<br><br><br>
				<?php
					}
				?>

			</div>			
		</div>
		<div class="container" id="formulario">
    			<input placeholder="Codigo del proyecto" type="text" id="proyecto" name="proyecto" required><br><br>   
      			<input placeholder="Usuario empleado" id="emp" name="emp" type="text" required><br><br>   
      			<button type="submit"  id="contact-submit">Confirmar Cargas</button>
			</div> 
	</form> 

</section>

</body>
</html>