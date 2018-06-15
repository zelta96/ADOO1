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
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
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
	};

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
	<form id=form1  style="display: none;"  action="registroproyecto.php" method="POST">
		<div class="container" id="formulario">
      <input placeholder="Nombre del proyecto" type="text" id="usuario" name="usuario" required><br><br>
    
      <input placeholder="Descipcion" id="des" name="des" type="text" required><br><br>
   
      <input placeholder="Empresa" id="emp" name="emp" type="text" required><br><br>


      <button type="submit"  id="contact-submit">Registrar Proyecto</button>
		</div> 
	</form> 
	<form id=form2  style="display:none;"  action="registroproyecto.php" method="POST">
		<div class="container" id="formulario2">
      	<div>
       	 <?php
          include 'cone.php';
          $vl=$_SESSION['usuario'];
          $mysqi=conectar();

		//encontrar a cliente por el id para tabla intermedia
		$rec=$mysqi->query("SELECT * FROM cliente where RFC='$vl'");
		while ($f=mysqli_fetch_array($rec)) {
							$nombre=$f['Nombre'];
						
		?>
		<div class="Proyectoscliente">
        <center>
          <span><a>RFC:</a> <?php echo $f['Nombre'];?></span><br>
        </center>
      </div>
		<?php
		  }	
		  $id=$_SESSION['id'];			
           $ref=$mysqi->query("SELECT * FROM cliente_proyecto where id_cliente='$id'");
			while ($f=mysqli_fetch_array($ref)) {
							$id_cliente=$f['id_cliente'];
							$id_proyecto=$f['id_proyecto'];

							$rep=$mysqi->query("SELECT * FROM proyecto where Id='$id_proyecto'");
							while ($f1=mysqli_fetch_array($rep)) {
		?>

		<div class="Proyectoscliente">
        <center>
          <span><a>Clave Registro:</a> <?php echo $f['id_proyecto'];?></span><br>
          <span><a>Nombre Proyecto Registro:</a> <?php echo $f1['Nombre'];?></span><br>
          <span><a>Descipcion:</a> <?php echo $f1['Descripcion'];?></span><br>
          <span><a>Empresa:</a> <?php echo $f1['Empresa'];?></span><br>
        </center>
      </div>
      	<br><br><br>
		<?php					
						}
					}
        ?>
        


      <div class="producto">
        <center>
          <span><?php echo $f['id'];?></span><br>
        </center>
      </div>

      </div>
		</div> 
	</form> 
</section>

</body>
</html>