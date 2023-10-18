
<?php


include "../Controlador/carrito.php";
include "../Modelo/BD.php";


$user=$_SESSION['usuario'];
if(!isset($user)){
    header("location:index.html");
}


$sql="select * from cliente where usuario='$user'";
$result=mysqli_query($conexion,$sql);
$extra=mysqli_fetch_array($result);

$nombre = $extra['nombre'];
$apellidos = $extra['apellido'];
$dni = $extra['dni'];
$email = $extra['email'];
$usuario = $extra['usuario'];

$sql="SELECT * FROM garantia ORDER BY idgar DESC";
$result2=mysqli_query($conexion,$sql);
$extraer2=mysqli_fetch_array($result2);

$cel=$extraer2['idCel'];
$descripcion = $extraer2['descripcion'];
$fecha = $extraer2['fecha'];
$sql = "select * from celular where idcel='$cel'";
$result3=mysqli_query($conexion,$sql);
$extraer3=mysqli_fetch_array($result3);
$modelo = $extraer3['modelo'];
?>


<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<head>
	<title>Resumen garantía</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/EstiloRegistrarCliente.css">
    <link rel="stylesheet" href="../css/EstiloPago.css"  />
</head>
<body style="background-color:#8ae9ec">
    <form action="enviarGarantia.php" method="post">
    	<h1>Resumen garantía</h1>

        
        
        <div class="cc-info">
                <div>
                    <label>Nombres</label>
                    <input type="text" name="nombre" disabled placeholder="Nombre completo" value="<?php echo $nombre?>">
                </div>
                <div>
                    <label>Apellidos:</label> <br>
                    <input type="text" name="apellido" disabled placeholder="Apellido completo" value="<?php echo $apellidos;?>">
                </div>
            </div>

            <div class="cc-info">
                <div>
                    <label>DNI</label>
                    <input type="text" name="dni" disabled value="<?php echo $dni;?>" placeholder="Introduzca su DNI" pattern="[0-9]{8}" title="Debe de ingresar 8 números" />
                </div>
                <div>
                    <label>Fecha:</label> <br>
                    <input type="text" name="fecha" disabled placeholder="Fecha" value="<?php echo $fecha;?>">
                </div>
            </div> 
        
        
        <label>Celular: </label>
        <input type="text" name="modelo" disabled placeholder="Modelo" value="<?php echo $modelo;?>">
                    
        <label>Descripción: </label>
        <br>
    	<textarea name="descripcion" disabled class="ancho-largo" ><?php echo $descripcion;?></textarea>

 
        <div class="content-dest">
                            <center><p> Garantía Enviada Exitosamente 
                             </p></center>
                        </div>
       
    	
        
        <br /><br />
        <a href="indexSesion.php">VOLVER</a>
    </form>
</body>
</html>