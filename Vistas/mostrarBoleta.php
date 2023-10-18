<?php
include "../Controlador/carrito.php";
include "../Modelo/BD.php";


$user=$_SESSION['usuario'];
if(!isset($user)){
    header("location:index.html");
}





$sql="select * from cliente where usuario='$user'";
$result=mysqli_query($conexion,$sql);
$extraer=mysqli_fetch_array($result);

$sql="SELECT * FROM formulariopago ORDER BY idForm DESC";
$result2=mysqli_query($conexion,$sql);
$extraer2=mysqli_fetch_array($result2);

$departamento = $extraer2['departamento'];
$provincia = $extraer2['provincia'];
$distrito = $extraer2['distrito'];
$direccion = $extraer2['direccion'];


$aleatorio = rand(1000000, 9999999);
$codBoleta = $aleatorio.$extraer2['idForm'];
$fechaBoleta = $extraer2['fechaCompra'];


?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/EstiloPago.css"  />
    <link rel="shortcut icon" href="../assets/icons/iconoPago.png">
    <title>Boleta</title>
</head>

<body>

    <?php 
        if(!empty($extraer['idcliente'])){
        //$id = $_SESSION['idprueba'];
       // $sql="select *from cliente where idcliente = $id";
        //$result=mysqli_query($conexion,$sql);
        //$resultado=mysqli_fetch_array($result);        
        ?>
    <div class="container">
        <form action="../Controlador/registrarBoleta.php" method="post">
            <legend>
                <h1 class="main_heading">Boleta</h1>
            </legend>
            <hr />
            <h2>Informacion Personal</h2>
            <br>
            <div class="cc-info">
                <div>
                    <p><label>Nombres</label></p>
                    <input type="text" name="nombre"  disabled placeholder="Nombre" value="<?php echo $extraer['nombre'];?>" />
                </div>
                <div>
                    <label>Apellidos:</label>
                    <input type="text" name="apellidos" disabled placeholder="Apellidos "  value="<?php echo $extraer['apellido'];?>"/>
                </div>
            </div>


            <div class="cc-info">
                <div>
                    <label>DNI:</label>
                    <input type="number" name="dni" disabled placeholder="70398667" value="<?php echo $extraer['dni'];?>" />
                </div>
                <div>
                    <label>Telefono:</label>
                    <input type="text"  name="telefono"  disabled value="<?php echo $extraer2['telefono'];?>"  />
                   
                </div>
            </div>

            <label> Email:</label>

            <input type="email" name="email" id="email" disabled placeholder="email@gmail.com" value="<?php echo $extraer['email'];?>" />
            </p>

            <h2>Dirección</h2>
            <br>

            
            <div class="cc-info">
                <div>
                    <p><label>Departamento:</label></p>
                    <input type="text" name="departamento" disabled value="<?php echo $departamento?>" required placeholder="Lima" />
                </div>
                <div>
                    <p><label>Provincia:</label></p>
                    <input type="text" name="provincia" disabled value="<?php echo $provincia?>"required placeholder="Lima" />
                </div>
                <div>
                    <p><label>Distrito:</label></p>
                    <input type="text" name="distrito" disabled value="<?php echo $distrito?>"required placeholder="San Juan de Lurigancho" />
                </div>
            </div>
            <label>Dirección:</label>
            <input type="text" name="direccion" disabled value="<?php echo $direccion?>"required placeholder=" Av. Urb." />


            <br><br>
            <h2>Datos del celular</h2>
            <br>
            <?php 
            $montototal=0;
            foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                $modelo = $producto['MODELO'];
                $precio = $producto['PRECIO'];?>
            <div class="cc-info">
                <div>
                    <p><label>Modelo</label></p>
                    <input type="text" name="modelo" disabled placeholder="Modelo" value="<?php echo $modelo; ?>" />
                </div>
                <div>
                    <label>Precio:</label>
                    <input type="text" name="precio" disabled placeholder="Precio"  value="<?php echo "S/. ".$precio;?>"/>
                </div>
            </div>
            <?php $montototal=$montototal+$precio;}?>
            <br><br>
            <h2>Compra</h2>
            <br>

            <div class="cc-info">
                <div>
                    <label>Código de compra:</label>
                    <input type="text"  name="codigo" value ="<?php echo $codBoleta?>" disabled   />
                </div>
                <div>
                    <label>Fecha de compra:</label>
                    <input type="text"  name="fecha"  value="<?php echo $fechaBoleta?>" disabled  placeholder=""   />
                   
                </div>
            </div>

            <label> Monto total:</label>


            <input type="email" name="montoTotal" id="email" disabled  value="<?php echo "S/. ".$montototal?>" />

            
            <div class="content-dest">
                            <center><p> compra exitosa
                             </p></center>
                        </div>

            <center><button class="btn btn-primary" name="registrar" value="registrar" type="submit">Terminar compra</button></center>
            <br>

        </form>
    </div>
    <?php } ?> 
</body>

</html>