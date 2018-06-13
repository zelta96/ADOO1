<?php
//obtener datos
session_start();
include "cone.php";
$proyecto=$_POST['proyecto'];
$emp=$_POST['emp'];
echo "$proyecto";
//$consulta="SELECT id FROM cliente where Nombre ='$vl'";
$mysqi=conectar();
//encontrar a cliente por el id para tabla intermedia
$rep=$mysqi->query("SELECT * FROM empleados where usuario='$emp'");

if(!$rep){
	echo 'NO HAY REGISTROS DE DEV';
}
else{
	echo 'REGISTRO ENCONTRADO DE DEV';
	//header("location:interfazC.php");
}
while ($f1=mysqli_fetch_array($rep)) {
							$ide=$f1['id'];
						}
echo "$ide";
//$resultado1=mysqli_query($conexion,$consulta);
$conexion=mysqli_connect('localhost','root','','gestion');
//$insertar="INSERT INTO emp_proy (id_empl,id_proy) VALUES ('$proyecto','$proyecto')";

$resultado=$mysqi->query("INSERT INTO emp_proy(id_empl,id_proy) VALUES ('$ide','$proyecto')");

if(!$resultado){
	echo 'NO SE PUDO REGISTRAR';
}
else{
	echo 'REGISTRO EXITOSO';
	header("location:interfazpm.php");
}



mysqli_close($conexion);

?>