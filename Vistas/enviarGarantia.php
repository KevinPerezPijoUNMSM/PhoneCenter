<?php
session_start();
$user = $_SESSION['usuario'];
include("../Modelo/BD.php");

$mensaje="";
if(isset($_POST['enviar'])){
    if(!empty($_POST['idCliente']) && !empty($_POST['celu']) && !empty($_POST['descripcion'])){

    
    $v1 = $_POST['idCliente'];
    $v2 = $_POST['celu'];
    $v3 = $_POST['descripcion'];

    $sql = "INSERT INTO garantia (idCliente, idCel, descripcion, fecha) ";
            $sql .= "VALUES ('$v1', '$v2', '$v3', CURRENT_TIMESTAMP() )";
            if (mysqli_query($conexion, $sql)) {
            $mensaje = "Envio exitoso!";
            header('Location: resumenGarantia.php');
            } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
            }
            
    }
    else{
        $mensaje = "Rellene todos los campos!";
    }
   
}

$result = mysqli_query ( $conexion, "select * from cliente where usuario='$user'");
$extra = mysqli_fetch_array($result);


$idC = $extra['idcliente'];
$compras = mysqli_query ( $conexion, "select * from formulariopago where idcliente=$idC");
$num_resultados = mysqli_num_rows($compras);

$arrayCelulares = array();
$arrayCelFecha = array();

$todosCelulares = mysqli_query ( $conexion, "select * from celular");
$num_resultados3 =  mysqli_num_rows($todosCelulares);
$cont=0;
for ($i=0; $i <$num_resultados; $i++) {
    
    $compra = mysqli_fetch_array($compras);
    $idform = $compra['idForm'];
    $celComprados = mysqli_query ( $conexion, "select * from listacelularform where idForm=$idform");
    $num_resultados2 = mysqli_num_rows($celComprados);
    for ($j=0; $j <$num_resultados2; $j++) {
        $celComprado = mysqli_fetch_array($celComprados);
        $idCel = $celComprado['idCelular'];
        $cels = mysqli_query ( $conexion, "select * from celular where idcel=$idCel");
        $cel = mysqli_fetch_array($cels);
        $arrayCelulares[$cont]=array($celComprado['idCelular'],$compra['fechaCompra'],$cel['garantía'],$cel['descripcion']);
        $cont++;

        
    }
}
$keys = array_keys($arrayCelulares);



date_default_timezone_set("America/Lima");
$fechaActual=date("Y-m-d");

function calcularTiempo($fini,$ffin){
    $d1 = date_create($fini);
    $d2 = date_create($ffin);
    print_r("hola");
    $intervalo = date_diff($d1,$d2);

    $tiempo = array();

    foreach($intervalo as $valor){
        $tiempo[] = $valor;
    }



    return $tiempo[0]*360+$tiempo[1]*30+$tiempo[2];
}

?>
<!DOCTYPE html>
<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<head>
	<title>Solicitar garantía</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/EstiloRegistrarCliente.css">
    <link rel="stylesheet" href="../css/EstiloPago.css"  />
</head>
<body style="background-color:#8ae9ec">
    <form action="enviarGarantia.php" method="post">
    	<h1>SOLICITE SU GARANTÍA</h1>

        <h2>Datos Personales</h2>
        <input  name="idCliente" type="hidden" placeholder="idCliente" value="<?php echo $extra['idcliente'];?>">
        
        
        <br>
        <div class="cc-info">
                <div>
                    <label>Nombres</label>
                    <input type="text" name="nombre" disabled placeholder="Nombre completo" value="<?php echo $extra['nombre'];?>">
                </div>
                <div>
                    <label>Apellidos:</label> <br>
                    <input type="text" name="apellido" disabled placeholder="Apellido completo" value="<?php echo $extra['apellido'];?>">
                </div>
            </div>







        
        
        <label>DNI: </label>
        <input type="text" name="dni" value="<?php echo $extra['dni'];?>" disabled placeholder="Introduzca su DNI" pattern="[0-9]{8}" title="Debe de ingresar 8 números" />
        <h2>Sobre mi celular</h2>
        <label for="Razita" class="ssssform-label">Selecciona tu celular a revisar</label>
                    <div class="select">
                        <Select name = "celu" id="celu">
                            <option selected disabled>Seleccione un celular</option>
                            <?php for($i=0; $i <count($arrayCelulares); $i++){
                                
                                $fechaC = $arrayCelulares[$i][1];
                                $garantia = $arrayCelulares[$i][2];

                                
                                $fechaC=substr($fechaC,0,10);
                                
                                $garantia=substr($garantia,0,1)*360;

                                $tiempo = calcularTiempo($fechaC,$fechaActual);
                                    $resto  = ($garantia-$tiempo);
                                    if($resto>0){
                                    $descrip = $arrayCelulares[$i][3];
                                    $idCelular = $arrayCelulares[$i][0];
                            ?>
                            <option value = <?php echo $idCelular ?>><?php echo $descrip."(Quedan ".$resto." dias de garantia)"; ?></option>
                            <?php 
                                      
                                    }    
                            }?>
                            
                            
                        </Select>
                    </div>
        <label>Descripción: </label>
        <br>
    	<!--<input type="text" name="descripcion" placeholder="Descripcion">-->
        <textarea name="descripcion" class="ancho-largo"  placeholder=""></textarea>

        
        
       
    	<input type="submit" name="enviar" value="Enviar">
        <?php if(!empty($mensaje)){ ?>
                    <p style="display: block;
                            color: #073a74;
                            font-weight: 500;
                            font-size: 25px;
                            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
                            position: relative;"><?= $mensaje?></p>
                    <?php } ?>
        <br /><br />
        <a href="indexSesion.php">VOLVER</a>
    </form>
</body>
</html>