<?php
//obtener datos
$usuario=$_POST['usuario'];
$correo=$_POST['correo'];
$password=$_POST['password'];
$direccion=$_POST['direccion'];
$telefono=$_POST['telefono'];
$tipoempleado=$_POST['tipoempleado'];
$nombre=$_POST['nombre'];
$apellidos=$_POST['apellidos'];
$edad=$_POST['edad'];
$sexo=$_POST['sexo'];
$conexion=mysqli_connect('localhost','root','','gestion');

$insertar="INSERT INTO empleados(usuario,correo,password,direccion,telefono,tipo,nombre,apellidos,edad,sexo) VALUES ('$usuario','$correo','$password','$direccion','$telefono','$tipoempleado','$nombre','$apellidos','$edad','$sexo')";

if(!$conexion){
	echo "ERROR AL CONECTAR";
}
else{
	echo $insertar;
}
$existe_usuario=mysqli_query($conexion,"SELECT usuario FROM empleados WHERE usuario='$usuario'");
if(mysqli_num_rows($existe_usuario)==0){
	echo "USUARIO VALIDO";
	
}
else{
	echo 'EL USUARIO YA EXISTE';
	header("location:registrofail.html");
	exit;
}
$existe_correo=mysqli_query($conexion,"SELECT correo FROM empleados WHERE correo='$correo'");


if(mysqli_num_rows($existe_correo)==0){
	echo "CORREO VALIDO";
}
else{
	echo 'EL CORREO YA EXISTE';
	header("location:registrofail.html");
	exit;
}

if($tipoempleado=="1"){
	$insertar2="INSERT INTO developers(usuario,proyecto) VALUES ('$usuario','no')";
}
else{
	$insertar2="INSERT INTO pm(usuario) VALUES ('$usuario')";
}


$resultado2=mysqli_query($conexion,$insertar2);
if(!$resultado2){
	echo 'NO SE PUDO REGISTRAR';
	header("location:registrofail.html");
}
else{
	echo 'REGISTRO EXITOSO';
	header("location:registrook.html");
}
//hacer la insercion de los datos
$resultado=mysqli_query($conexion,$insertar);
if(!$resultado){
	echo 'NO SE PUDO REGISTRAR';
}
else{
	echo 'REGISTRO EXITOSO';
}




mysqli_close($conexion);

?>