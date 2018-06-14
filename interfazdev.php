<?php
session_start();
$var_session=$_SESSION['usuario'];
$ide=$_SESSION['id'];

if($var_session==null||$var_session=''){
	echo "ACCESO DENEGADO";
	die();
}





?>

<html>
<style type="text/css">
#global {
	height: 400px;
	width: 400px;
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
	function mensaje1(ev){
		document.getElementById("i").style.display="block";
		document.getElementById("form1").style.display="none";
		document.getElementById("bienv").style.display="none";

	}
	function mensaje2(ev){
		document.getElementById("form1").style.display="block";
		document.getElementById("bienv").style.display="none";
		document.getElementById("i").style.display="none";
		
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
		<form id=form1  style="display: none;"  action="registroproyecto.php" method="POST">
		<div class="container" >
		<p>Proyectos asignados al empleado:</p>
		<br><br>
		<div id="global">
<?php
          			include 'cone.php';
          			$mysqi=conectar();
          			$res2=$mysqi->query("SELECT * FROM emp_proy WHERE id_empl='$ide'");
					while($r2=mysqli_fetch_array($res2)){
					$idp=$r2['id_proy'];
                    $rec=$mysqi->query("SELECT * FROM proyecto WHERE Id='$idp'");
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
					}							
				?>
		</div></div> 
	</form> 
	<div id="i" style="display: none;">
    <p><?php echo $ide?>Información del empleado. </p> <br>Bienvenido: <?php echo $_SESSION['usuario']?> <br> Nombre: <?php echo $_SESSION['nombre']?> <br> Apellidos: <?php echo $_SESSION['apellidos']?> <br> Edad: <?php echo $_SESSION['edad']?><br>Direccion: <?php echo $_SESSION['direccion']?><br>Sexo: <?php echo $_SESSION['sexo']?><br></div>

		<p id="bienv" style="display: block;"><br><br><br><br><br><br><br>Sé Bienvenido a este espacio de gestión para tus proyectos. Eres un Delveloper<br><br><br>Selecciona una de las opciones de la izquierda para continuar.</p>
	</article>
	</section>

</body>
</html>