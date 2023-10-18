<?php

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

 error_reporting(0);
 include("../Modelo/BD.php");

if(isset($_POST['register'])){
    if( strlen($_POST['nombre'])>=1 && strlen($_POST['apellido'])>=1 && 
        strlen($_POST['email'])>=1 &&  strlen($_POST['contra'])>=1  &&  
        strlen($_POST['usuario'])>=1 &&  strlen($_POST['dni'])>=1 ){

            $nombre=trim($_POST['nombre']);
            $apellido=trim($_POST['apellido']);
            $dni=trim($_POST['dni']);
            $email=trim($_POST['email']);
            $usuario=trim($_POST['usuario']);
            $contra=md5(trim($_POST['contra']));
            $publicidad=trim($_POST['publicidad']);

            if($_POST['publicidad']<>"on"){
                $publicidad="off";
            }

            $verificardni=mysqli_query($conexion,"select * from cliente where dni='$dni'");
            if(mysqli_num_rows($verificardni)>0){
                alert("El DNI ingresado ya esta registrado");
                include("../Vistas/RegistrarCliente.html");

            }else{
                $consulta="INSERT INTO cliente(nombre, apellido, email,usuario,contraseña,publicidad,dni) VALUES ('$nombre','$apellido','$email','$usuario','$contra','$publicidad','$dni')";
   
                $resultado=mysqli_query($conexion,$consulta);
                if($resultado){
                    alert("Registro exitoso :)");
                    include("../Vistas/login.html");
                }else{
                    alert("¡Ups! ha ocurrido un error");
                    include("../Vistas/RegistrarCliente.html");
                }
            }

    }else{
        alert("¡Por favor, complete los campos!");
        include("../Vistas/RegistrarCliente.html");
    }       
}
?>