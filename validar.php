<?php
$usuemail=$_POST['usuemail'];
$usupassword=$_POST['usupassword'];

include('db.php');

$consulta="SELECT*FROM usuarios where usuemail='$usuemail' and usupassword='$usupassword'";
$resultado=mysqli_query($conexion,$consulta);
if($guardado=$filas=mysqli_fetch_array($resultado)){
    $nombre=$guardado["usunombre"];
    $apellido=$guardado["usuapellido"];
    $email=$guardado["usuemail"];
    $contraseña=$guardado["usupassword"];
    $usuid=$guardado["id"];
    session_start();
    $_SESSION['email']=$email;
    $_SESSION['nombre']=$nombre;
    $_SESSION['apellido']=$apellido;
    $_SESSION["contraseña"]=$contraseña;
    $_SESSION["usuid"]=$usuid;
    header("location:home.php");
}else{
    ?>
    <?php
    include("login!.html");
}
mysqli_free_result($resultado);
mysqli_close($conexion);