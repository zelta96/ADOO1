<?php
//obtener datos
session_start();
include "cone.php";
$usuario=$_POST['usuario'];
$des=$_POST['des'];
$emp=$_POST['emp'];
$conexion=mysqli_connect('localhost','root','','gestion');
//Registro del puro proyecto
$vl=$_SESSION['usuario'];
$insertar="INSERT INTO proyecto(Nombre,Descripcion,Empresa) VALUES ('$usuario','$des','$emp')";

if(!$conexion){
	echo "ERROR AL CONECTAR";
}
else{
	echo $insertar;
}

$resultado=mysqli_query($conexion,$insertar);
if(!$resultado){
	echo 'NO SE PUDO REGISTRAR';
}
else{
	echo 'REGISTRO EXITOSO';
}

//Registro del puro proyecto
//$consulta="SELECT id FROM cliente where Nombre ='$vl'";
$mysqi=conectar();
//encontrar a cliente por el id para tabla intermedia
$rec=$mysqi->query("SELECT * FROM cliente where RFC='$vl'");
echo "$vl";
if(!$rec){
	echo 'NO HAY REGISTROS';
}
else{
	echo 'REGISTRO CLIENTE ENCONTRADO';
	//header("location:interfazC.php");
}
while ($f=mysqli_fetch_array($rec)) {
							$nombre=$f['Nombre'];
						}

$rep=$mysqi->query("SELECT * FROM proyecto where Nombre='$usuario'");

if(!$rep){
	echo 'NO HAY REGISTROS DE proyecto';
}
else{
	echo 'REGISTRO ENCONTRADO DE PROYECTO';
	//header("location:interfazC.php");
}
while ($f1=mysqli_fetch_array($rep)) {
							$idp=$f1['Id'];
							$nombre=$f1['Nombre'];
						}

//$resultado1=mysqli_query($conexion,$consulta);
$id=$_SESSION['id'];
$insertar="INSERT INTO cliente_proyecto(id_proyecto,id_cliente) VALUES ('$idp','$id')";

$resultado2=mysqli_query($conexion,$insertar);

if(!$resultado2){
	echo 'NO SE PUDO REGISTRAR';
}
else{
	echo 'REGISTRO EXITOSO';
	header("location:interfazC.php");
}



mysqli_close($conexion);

?>