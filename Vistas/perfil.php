<?php
//seguridad de sesion
session_start();
include("../Modelo/BD.php");
$user=$_SESSION['usuario'];
if(!isset($user)){
    header("location:index.html");
}

$sql="select * from cliente where usuario='$user'";
$result=mysqli_query($conexion,$sql);
$extraer=mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<head>
	<title>Registrar usuario</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/EstiloRegistrarCliente.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body style="background-color:#8ae9ec">
    <form action="registrar.php" method="post">
    	<h1>Perfil</h1>
        <h2>User: <?php  echo $extraer['usuario'] ?></h2>
        <label>Nombre: </label>
    	<input type="text" id="nombre" value="<?php echo $extraer['nombre'] ?>">
        <label>Apellido: </label>
    	<input type="text" id="apellido" value="<?php echo $extraer['apellido'] ?>">
        <label>DNI: </label>
        <input type="text" id="dni" value="<?php echo $extraer['dni'] ?>">
        <label>Correo: </label>
    	<input type="email" id="email" value="<?php echo $extraer['email'] ?>">
        <br /><br /><br />
        <a href="indexSesion.php">VOLVER</a>
    </form>

<script>
    $(document).ready(function(){
        $("#nombre").click(function(){
            $("#nombre").prop("disabled",true);
        });

        $("#apellido").click(function(){
            $("#apellido").prop("disabled",true);
        });

        $("#dni").click(function(){
            $("#dni").prop("disabled",true);
        });

        $("#email").click(function(){
            $("#email").prop("disabled",true);
        });

    });

</script>

</body>
</html>