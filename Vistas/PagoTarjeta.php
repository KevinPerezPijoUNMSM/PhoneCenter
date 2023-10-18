<?php
include "../Controlador/carrito.php";
include "../Modelo/BD.php";
//include "validarDatosCompra.php";

/*$user=$_SESSION['usuario'];
if(!isset($user)){
    header("location:index.html");
}

$sql="select * from cliente where usuario='$user'";
$result=mysqli_query($conexion,$sql);
$extraer=mysqli_fetch_array($result);*/
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
    <link rel="stylesheet" href="../css/EstiloPago.css" />
    
    <link rel="shortcut icon" href="/assets/icons/iconoPago.png">
    <title>Formulario Pago</title>
</head>

<body>
<?php if(!empty($_SESSION['idprueba'])){
        $id = $_SESSION['idprueba'];
        $sql="select *from cliente where idcliente = $id";
        $result=mysqli_query($conexion,$sql);
        $resultado=mysqli_fetch_array($result);        
        ?>
    <div class="container">
    <form action="../Controlador/validarDatosCompra.php" method="post">
            <legend>
                <h1 class="main_heading">Formulario de Pago</h1>
            </legend>
            <hr />
            <h2>Informacion Personal</h2>
            <br>
            <div class="cc-info">
                <div>
                    <p><label>Nombres</label></p>
                    <input type="text" name="nombre" disabled placeholder="Nombre" value="<?php echo $resultado['nombre'];?>" />
                </div>
                <div>
                    <label>Apellidos:</label>
                    <input type="text" name="apellidos" disabled placeholder="Apellidos "  value="<?php echo $resultado['apellido'];?>"/>
                </div>
            </div>
            <!--<fieldset>
          <legend>Gender</legend>
  
          <p>
            Male <input type="radio" name="gender" id="male" required>
            Female <input type="radio" name="gender" id="female" required>
          </p>
        </fieldset>
        -->

            <div class="cc-info">
                <div>
                    <label>DNI:</label>
                    <input type="number" required name="dni" disabled placeholder="70398667" value="<?php echo $resultado['dni'];?>" />
                </div>
                <div>
                    <label>Telefono:</label>
                    <input type="text"  name="telefono"  required  placeholder="969854935"  pattern="[0-9]{9}" title="Debe de ingresar 9 números"/>
                </div>
            </div>

            <label> Email:</label>

            <input type="email" name="email" id="email" disabled placeholder="email@gmail.com" value="<?php echo $resultado['email'];?>" />
            </p>

            <legend>
                <h2>Información Tarjeta</h2>
            </legend>
            <hr />

            <div class="cc-info">
                <div>
                    <label>Número de Tarjeta: </label>
                    <input type="text" name="numtarj"  required placeholder="Nro Tarjeta" pattern="[0-9]{16}" title="Debe de ingresar 16 digitos"/>
                </div>
                <div>
                    <label>Código: </label>
                    <input type="text" name="cod"  required placeholder="Código" pattern="[0-9]{3}" title="Debe de ingresar 3 digitos"/>
                </div>
            </div>

            <label>Fecha de Vencimento:</label>
            <input type="date" name="fechav" required placeholder="Nro Tarjeta" />
            
            
                
            <div class="cc-info">
                <div>
                    <label>Nombre del titular: </label>
                    <input type="text" name="nombtitular" required placeholder="Nombre" />
                </div>
                <div>
                    <label>Apellidos del titular: </label>
                    <input type="text" name="apetitular" required placeholder="Apellidos" />
                </div>
            </div>
            


            <br><br>
            <h2>Envio</h2>
            <div class="cc-info">
                <div>
                    <p><label>Departamento:</label></p>
                    <input type="text" name="dep" required placeholder="Lima" />
                </div>
                <div>
                    <p><label>Provincia:</label></p>
                    <input type="text" name="prov" required placeholder="Lima" />
                </div>
                <div>
                    <p><label>Distrito:</label></p>
                    <input type="text" name="distrito" required placeholder="San Juan de Lurigancho" />
                </div>
            </div>
            <label>Dirección:</label>
            <input type="text" name="direccion" required placeholder=" Av. Urb." />
            
            
    </div>



    <br><br>

    <center><button class="btn btn-primary" name="btcompra" value="PagarTarjeta" type="submit">Realizar
            pedido</button></center>
    <br>
    <center><a href="product.html" class="btn btn-out btn-success btn-square btn-main mt-2"
            data-abc="true">Cancelar</a></center>
    </form>

    <?php } ?> 

</body>

</html>