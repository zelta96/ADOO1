<?php
//obtener datos
$correo=$_POST['correo'];
$password=$_POST['password'];

//CONEXION A BASE
$conexion=mysqli_connect("localhost","root","","gestion");

$resultado=mysqli_query($conexion,"SELECT * FROM empleados WHERE correo='$correo' and password='$password'");
$res=mysqli_query($conexion,"SELECT * FROM empleados WHERE correo='$correo' and password='$password'");
while($r=mysqli_fetch_array($res)){
	$id=$r['id'];
$usuario=$r['usuario'];
$direccion=$r['direccion'];
$telefono=$r['telefono'];
$tipoempleado=$r['tipo'];
$nombre=$r['nombre'];
$apellidos=$r['apellidos'];
$edad=$r['edad'];
$sexo=$r['sexo'];
}





$filas=mysqli_num_rows($resultado);

if($filas>0){
	session_start();
	$_SESSION['id']=$id;
	$_SESSION['usuario']=$usuario;
	$_SESSION['direccion']=$direccion;
	$_SESSION['telefono']=$telefono;
	$_SESSION['tipoempleado']=$tipoempleado;
	$_SESSION['nombre']=$nombre;
	$_SESSION['apellidos']=$apellidos;
	$_SESSION['edad']=$edad;
	$_SESSION['sexo']=$sexo;
	if($_SESSION['tipoempleado']==1){
	header("location:interfazdev.php");}
	elseif($_SESSION['tipoempleado']==2){
	header("location:interfazpm.php");
	}
}
else{
	echo "No se pudo autentificar";
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>