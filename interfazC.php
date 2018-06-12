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
	function mensaje(ev,num){
		if(num == 0){
		 document.getElementById("form1").style.visibility="visible";
		 document.getElementById("form2").style.visibility="hidden";
		}
		else{
		 document.getElementById("form1").style.visibility="hidden";
		 document.getElementById("form2").style.visibility="visible";

		}
		 

	}

	function mensaje3(ev){
		document.getElementById('prueba').innerHTML='';
		document.getElementById('prueba').innerHTML='<p>Reportes.</p>';
	}
		}
</script> 
</head>
<body id="cuerpo">
	<ul class="ca-menu">
	<li onclick="mensaje(event,0)" id="opcion1">
		<a href="#">
			<span class="ca-icon">I</span>
			<div class="ca-content">
				<h2 class="ca-main">Generar proyecto</h2>
				<h3 class="ca-sub">Ver tu información completa</h3>
			</div>
		</a>
	</li>
	<li onclick="mensaje(event,1)" id="opcion2">
		<a href="#">
			<span class="ca-icon">P</span>
			<div class="ca-content">
				<h2 class="ca-main">Ver proyectos</h2>
				<h3 class="ca-sub">Clic aquí para ver los proyectos</h3>
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
	<form id=form1  style="visibility: hidden;"  action="registroproyecto.php" method="POST">
		<div class="container" id="formulario">
      <input placeholder="Nombre del proyecto" type="text" id="usuario" name="usuario" required>
    
      <input placeholder="Descipcion" id="des" name="des" type="text" required>
   
      <input placeholder="Empresa" id="emp" name="emp" type="text" required>


      <button type="submit"  id="contact-submit">Registrar Proyecto</button>
		</div> 
	</form> 
</section>
<section class="info">
	<form id=form2  style="visibility: visible;"  action="registroproyecto.php" method="POST">
		<div class="container" id="formulario2">
      <div>
        <?php
          include 'cone.php';
          $mysqi=conectar();
          $rec=$mysqi->query("SELECT * FROM cliente where Nombre='$var_session'");
          while ($f1=mysqli_fetch_array($rec)) {
							$id=$f1['id'];
						}
          $ref=$mysqi->query("SELECT * FROM cliente_proyecto where id_usuario='$id'");
          //$re=$mysqi->query("SELECT * FROM proyecto where id='$ref'");
          while ($f=mysqli_fetch_array($ref)) {
        ?>


      <div class="producto">
        <center>
          <span><?php echo $f['id_proyecto'];?></span><br>
        </center>
      </div>
      <?php
      }
      ?>
      </div>
		</div> 
	</form> 
</section>

</body>
</html>