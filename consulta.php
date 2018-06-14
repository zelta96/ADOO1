<?php
session_start();

?>

<html>
<style type="text/css">
#global {
	height: 300px;
	width: 300px;
	border: 1px solid #ddd;
	background: #f1f1f1;
	overflow-y: scroll;
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
	<?php

		$conexion = new mysqli('localhost','jluishx1_root','root');

		if($conexion == false)
		{
			die('Connection fail :'.$conexion->connect_error);
		}
		mostrar ="";

		$conexion->select_db('jluishx1_moviles');

		if(isset($_POST['Registrar']))
		{
			$Nombre = $_POST['Nombre'];
			$Apellidos = $_POST['Apellidos'];
			$Telefono = $_POST['Telefono'];
			$Correo = $_POST['Correo'];
			/*IMAGEN*/

			$namefile=$_FILES['image']['name'];
			$cd=$_FILES['image']['tmp_name'];
			$ruta = 'imagenes/' . $_FILES['image']['name'];
			$destino='imagenes/'.$namefile;
			$resultado = move_uploaded_file($_FILES['image']['tmp_name'],$ruta);

		if($Nombre == "" || $Apellidos == "" || $Telefono == "" || $Correo == "" || $resultado==""){
	
			echo "<script lenguage = 'javascript' type='text/javascript'>";
			echo "alert('Uno o mas campos estan vacios');";
			echo "</script> ";
		}
		else
		{

	 	if($Nombre == "")
		{
			echo "<script lenguage = 'javascript' type='text/javascript'>";
			echo "alert('Ingrese su nombre');";
			echo "</script> ";
		}
		else if($Apellidos == "")
		{
			echo "<script lenguage = 'javascript' type='text/javascript'>";
			echo "alert('Ingrese sus apellidos');";
			echo "</script> ";
		}
		else if($Telefono == "")
		{
			echo "<script lenguage = 'javascript' type='text/javascript'>";
			echo "alert('Ingrese su numero telefonico');";
			echo "</script> ";
		}
		else if($Correo == "")
		{
			echo "<script lenguage = 'javascript' type='text/javascript'>";
			echo "alert('Ingrese su correo');";
			echo "</script> ";
		}
		else if (empty($resultado)){
	    	echo "<script lenguage = 'javascript' type='text/javascript'>";
			echo "alert('Error al subir el archivo');";
			echo "</script> ";
		 }

		else
		{	
			$conexion->query("INSERT INTO usuario (Nombre,Apellidos,Telefono,Correo,Foto,Ubicacion_foto) values ('$Nombre','Apellidos','$Telefono','$Correo','$namefile','$destino')");
			echo "<script lenguage = 'javascript' type='text/javascript'>";
			echo "alert('Registro Exitoso');";
			echo "</script> ";

			$Nombre = "";
			$Apellidos = "";
			$Telefono = "";
			$Correo = "";
   			echo "<script lenguage = 'javascript' type='text/javascript'>";
			echo  "window.location = 'registro.php';";
			echo "</script> ";
	
		}

}

	}

?>
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
			<label>Nombre</label><br>
			<input class="boxes" type="text" name="Nombre" /> <br>
			<label>Apellidos</label><br>
			<input class="boxes" type="text" name="Apellidos"> <br>
			<label>Telefono</label><br>
			<input class="boxes" type="text" name="Telefono"> <br>
			<label>Correo</label><br>
			<input class="boxes" type="text" name="Correo"> <br>
			<input class="botones" name="Registrar" value="Registrar" type="submit" />
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