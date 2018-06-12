<?php
//obtener datos
$usuario=$_POST['usuario'];
$correo=$_POST['correo'];
$password=$_POST['password'];
$conexion=mysqli_connect('localhost','root','','gestion');

$insertar="INSERT INTO cliente(Nombre,RFC,Password) VALUES ('$usuario','$correo','$password')";

if(!$conexion){
	echo "ERROR AL CONECTAR";
}
else{
	echo $insertar;
}
$existe_usuario=mysqli_query($conexion,"SELECT Nombre FROM cliente WHERE Nombre='$usuario'");
if(mysqli_num_rows($existe_usuario)==0){
	echo "USUARIO VALIDO";
	
}
else{
	echo 'EL USUARIO YA EXISTE';
	header("location:registrofail.html");
	exit;
}
$existe_correo=mysqli_query($conexion,"SELECT RFC FROM cliente WHERE RFC='$correo'");


if(mysqli_num_rows($existe_correo)==0){
	echo "CORREO VALIDO";
}
else{
	echo 'EL CORREO YA EXISTE';
	header("location:registrofail.html");
	exit;
}

$resultado=mysqli_query($conexion,$insertar);
if(!$resultado){
	echo 'NO SE PUDO REGISTRAR';
}
else{
	echo 'REGISTRO EXITOSO';
	header("location:loginC.html");
}




mysqli_close($conexion);

?>