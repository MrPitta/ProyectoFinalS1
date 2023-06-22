<?php
include("bd/db.php");

if(isset($_POST['register'])){

        $usunombre=trim($_POST['usunombre']);
        $usuapellido=trim($_POST['usuapellido']);
        $usuemail=trim($_POST['usuemail']);
        $usupassword1=md5($_POST['usupassword1']);
        $usupassword2=md5($_POST['usupassword2']);
        if ($usupassword1 == $usupassword2){
            $consulta="INSERT INTO usuario(usuemail, usunombre, usuapellido,usupassword) 
            VALUES ('$usuemail','$usunombre','$usuapellido','$usupassword1')";
            $resultado=mysqli_query($conexion,$consulta);
            if($resultado){
                header("location:login.html");
            }else{
                ?>
            <?php
            include("register.html");
            }
        }else{
            include("register.html");
        }
    }

?>