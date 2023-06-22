<?php
include("bd/db.php");
<<<<<<< HEAD
<<<<<<< HEAD

=======
>>>>>>> 75c84333a49c5757432f793ce3cc296a15b32aa4
=======
>>>>>>> 75c84333a49c5757432f793ce3cc296a15b32aa4

if(isset($_POST['publicar'])){

    $avifecha=trim($_POST['avifecha']);
    $avititulo=trim($_POST['avititulo']);
    $avidescripcion=trim($_POST['avidescripcion']);
    $usuid=trim($_POST['usuid']);
        $consulta="INSERT INTO consulta(id, fecha, titulo, descripcion, usuario_id) 
        VALUES ('','$avifecha','$avititulo','$avidescripcion','$usuid')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            header("location:home.php");
        }else{
            ?>
        <?php
        include("subiraviso!.php");
        }
}




?>