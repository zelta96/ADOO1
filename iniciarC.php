<?php
//obtener datos
$correo=$_POST['correo'];
$password=$_POST['password'];

//CONEXION A BASE
$conexion=mysqli_connect("localhost","root","","gestion");

$resultado=mysqli_query($conexion,"SELECT * FROM cliente WHERE RFC='$correo' and password='$password'");
$res=mysqli_query($conexion,"SELECT * FROM cliente WHERE RFC='$correo' and password='$password'");
while($r=mysqli_fetch_array($res)){
$usuario=$r['Nombre'];
$direccion=$r['RFC'];
$id=$r['id'];
}

$filas=mysqli_num_rows($resultado);

if($filas>0){
	session_start();
	$_SESSION['usuario']=$usuario;
	$_SESSION['RFC']=$direccion;
	$_SESSION['id']=$id;	
	header("location:interfazC.php");
	
}
else{
	echo "No se pudo autentificar";
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>