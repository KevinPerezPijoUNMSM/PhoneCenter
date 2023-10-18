<?php
 	include("../Modelo/BD.php");
	 error_reporting(0);
	
	function alert($msg) {
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}

	if(isset($_POST["boton"])){
		
		$usuario=$_POST['usuario'];
		$contrase�a=md5($_POST['contra']);
		session_start();

		$_SESSION['usuario']=$usuario;

		$sql="select *from cliente where usuario = '$usuario'";
		$result=mysqli_query($conexion,$sql);
		$resultado=mysqli_fetch_array($result); 
		
		$_SESSION['idprueba']=$resultado['idcliente'];

		$consulta="SELECT*FROM cliente where usuario='$usuario' and contraseña='$contrase�a'";
		$resultado=mysqli_query($conexion,$consulta);
		$fila=mysqli_num_rows($resultado);
		if($fila){
		header("location:../Vistas/indexSesion.php");
		}else{
			
		alert("No se encontro registro");
		//header("location:../Vistas/login.html");
		include("../Vistas/login.html");
		}
	}
?>