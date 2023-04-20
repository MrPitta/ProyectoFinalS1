<?php
include("db.php");

$consulta="SELECT id FROM avisos ORDER BY id DESC LIMIT 1;";
$resultado= mysqli_query($conexion,$consulta);  
if($row = mysqli_fetch_array($resultado)){
$aviids=$row["id"];
$aviidn=intval("aviids");
$aviid=$aviidn;

}

    $targetDir = "img2/";
    $allowTypes = array('jpg', 'png', 'jpeg', 'gif');
    $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';
    $fileNames = array_filter($_FILES['files']['name']);
    if (!empty($fileNames)) {
        foreach ($_FILES['files']['name'] as $key => $val) {
            // File upload path 
            $fileName = basename($_FILES['files']['name'][$key]);
            $targetFilePath = $targetDir . $c . $fileName;
            // Check whether file type is valid 
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
            if (in_array($fileType, $allowTypes)) {
                // Upload file to server 
                if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                    // Image db insert sql 
                    $insertValuesSQL .= "('" . $fileName . "', NOW()),";
                } else {
                    $errorUpload .= $_FILES['files']['name'][$key] . ' | ';
                }
            } else {
                $errorUploadType .= $_FILES['files']['name'][$key] . ' | ';
            }

            $query = "insert into avisos_fotos(aviurl,avisos_id) values(?,?)";
            $stmt = $conexion->prepare($query);
            $stmt->bind_param("si", $targetFilePath, $aviid);
            $stmt->execute();
        }

        $conexion->close();
        // Error message 
        $errorUpload = !empty($errorUpload) ? 'Upload Error: ' . trim($errorUpload, ' | ') : '';
        $errorUploadType = !empty($errorUploadType) ? 'File Type Error: ' . trim($errorUploadType, ' | ') : '';
        $errorMsg = !empty($errorUpload) ? '<br/>' . $errorUpload . '<br/>' . $errorUploadType : '<br/>' . $errorUploadType;
    } else {
        $statusMsg = 'Please select a file to upload.';
    }
        if($resultado){
        }else{
            ?>
        <?php
        include("subiraviso!.php");
        }





?>