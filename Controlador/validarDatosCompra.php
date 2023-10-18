<?php
    include("../Modelo/BD.php");
    include ("carrito.php");
    
    function alert($msg) {
        echo "<script type='text/javascript'>alert('$msg');</script>";
    }
    $consulta="SELECT count(*) as total from formulariopago;";
    $resultado=mysqli_query($conexion,$consulta);
    $row= mysqli_fetch_assoc($resultado); 
    $cantidadRegistros = $row['total'];

    $formularioid = $cantidadRegistros + 1;

 
    switch($_POST['btcompra']){
        
        case 'PagarCE':

                // GUARDADO DE REGISTRO COMRA

                
                $id=$_SESSION['idprueba'];
                $telefono=trim($_POST['telefono']); 
                $dep=trim($_POST['dep']);
                $provincia=trim($_POST['prov']);
                $distrito=trim($_POST['distrito']);
                $direccion=trim($_POST['direccion']);

                
                $consulta="INSERT INTO formulariopago(
                idcliente,telefono,nrotarjeta,codSeguridad,nombreTitular,apellidoTitular,fechaVencimiento,
                fechaCompra,departamento,provincia,distrito,direccion,sTarjeta)
                VALUES ('$id','$telefono',null,null,null,null,null,CURRENT_TIMESTAMP(),'$dep','$provincia','$distrito','$direccion','no');";

                $resultado=mysqli_query($conexion,$consulta);

                //GUARDADO DE LOS CELULARES
                $formularioid = $cantidadRegistros + 1;
                 
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    $idCelularLista = $producto['ID'];
                    $consulta2="INSERT INTO listacelularform(idForm,idCelular)
                    VALUES ('$formularioid','$idCelularLista');";
                    $resultado=mysqli_query($conexion,$consulta2);

                } 
                
                if($resultado){
                  //  unset($_SESSION['CARRITO']);
                    alert("Pago exitoso :)");
                    header('Location: ../Vistas/mostrarBoleta.php');
                    
                    //include("../Vistas/indexSesion.php");
                }else{
                    alert("¡Ups! ha ocurrido un error");
                }


        break;
        case 'PagarTarjeta':

                $id=$_SESSION['idprueba'];
                $telefono=trim($_POST['telefono']);
                $nroTarjeta=md5(trim($_POST['numtarj']));
                $codseg=md5(trim($_POST['cod']));
                $fechaV=md5(date('Y-m-d',strtotime($_POST['fechav'])));
                $nombreti=md5(trim($_POST['nombtitular']));
                $apeti=md5(trim($_POST['apetitular']));
                $dep=trim($_POST['dep']);
                $provincia=trim($_POST['prov']);
                $distrito=trim($_POST['distrito']);
                $direccion=trim($_POST['direccion']);

                
                $consulta="INSERT INTO formulariopago(
                idcliente,telefono,nrotarjeta,codSeguridad,nombreTitular,apellidoTitular,fechaVencimiento,
                fechaCompra,departamento,provincia,distrito,direccion,sTarjeta)
                VALUES ('$id','$telefono','$nroTarjeta','$codseg','$nombreti','$apeti','$fechaV',
                CURRENT_TIMESTAMP(),'$dep','$provincia','$distrito','$direccion','si');";           
                
                $resultado=mysqli_query($conexion,$consulta);

                //GUARDADO DE LOS CELULARES
                $formularioid = $cantidadRegistros + 1;
                 
                foreach ($_SESSION['CARRITO'] as $indice => $producto) {
                    $idCelularLista = $producto['ID'];
                    $consulta2="INSERT INTO listacelularform(idForm,idCelular)
                    VALUES ('$formularioid','$idCelularLista');";
                    $resultado=mysqli_query($conexion,$consulta2);

                } 
                
                if($resultado){
                    //unset($_SESSION['CARRITO']);
                    alert("Pago exitoso :)");
                    header('Location: ../Vistas/mostrarBoleta.php');
                    

                }else{
                    alert("¡Ups! ha ocurrido un error");
                }
        break;
    }


