<?php 
 include "../Controlador/carrito.php";
 include("../Modelo/BD.php");

if(isset($_POST['registrar'])){
    /*$nombre=$_POST['nombre'];
    $apellidos=$_POST['apellidos'];
    $dni=$_POST['dni'];
    $telefono=$_POST['telefono'];
    $email=$_POST['email'];
    $departamento=$_POST['departamento'];
    $provincia=$_POST['provincia'];
    $distrito=$_POST['distrito'];
    $direccion=$_POST['direccion'];
    $modelo=$_POST['modelo'];
    $precio=$_POST['precio'];
    $codigo=$_POST['codigo'];
    $fecha=$_POST['fecha'];
    $montoTotal=$_POST['montoTotal'];*/

    
    /*$consulta="INSERT INTO boleta(nombre,apellidos,dni,telefono,email,departamento,provincia,distrito,direccion,modelo,precio,codigo,fecha,montoTotal)
     VALUES ('$nombre','$apellidos','$dni','$telefono','$email','$departamento','$provincia','$distrito','$direccion','$modelo','$precio','$codigo','$fecha','$montoTotal')";
    $resultado=mysqli_query($conexion,$consulta);*/
    unset($_SESSION['CARRITO']);

    header('Location: ../Vistas/indexSesion.php');
}
    
?>