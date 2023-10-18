
<?php 
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

alert("ENVIO EXITOSO :)");
//include("../Vistas/indexSesion.php");
header("location:../Vistas/enviarGarantia.php");
?>