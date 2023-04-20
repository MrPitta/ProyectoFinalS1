<?php
include("db.php");

if(isset($_POST['publicar'])){

    $avifecha=trim($_POST['avifecha']);
    $avititulo=trim($_POST['avititulo']);
    $avidescripcion=trim($_POST['avidescripcion']);
    $usuid=trim($_POST['usuid']);
        $consulta="INSERT INTO avisos(avifecha, avititulo, avidescripcion, usuarios_id) 
        VALUES ('$avifecha','$avititulo','$avidescripcion', '$usuid')";
        $resultado=mysqli_query($conexion,$consulta);
        if($resultado){
            header("location:subirfoto.php");
        }else{
            ?>
        <?php
        include("subiraviso!.php");
        }
}




?>