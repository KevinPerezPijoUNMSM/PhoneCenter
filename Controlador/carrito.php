<?php
//include('validar.php');
session_start();
//session_unset();


$mess = "";

if(isset($_POST['btnp1'])){
    
    switch( $_POST ['btnp1']){
        case 'Agregar':
            if($_POST['idCel']){
                $ID = $_POST['idCel'];
                $MARCA = $_POST['descripcion'];
                $MODELO = $_POST['modelo'];
                $PRECIO = $_POST['precio'];
                $imagen = $_POST['imagen'];         //  SE AGREGO
                $mess = "Ok ID correcto".$ID;
            }else{
                $mess = "Fallo ".$ID."<br/>";
            }

            if (!(isset($_SESSION['CARRITO']))){
                
                $producto = array(
                    'ID'=> $ID,
                    'MARCA'=> $MARCA,
                    'MODELO'=> $MODELO,
                    'PRECIO'=> $PRECIO,
                    'IMAGEN'=> $imagen         //  SE AGREGO
                );
    
                $_SESSION['CARRITO'][0]= $producto; 
                echo "<script>alert('Producto agregado correctamente')</script>";
            }else{
                $idProductos = array_column($_SESSION['CARRITO'],"ID");
                if(in_array($ID,$idProductos)){
                    echo "<script>alert('El producto ya ha sido agregado..')</script>";        
                }else{
                    $numprod = count($_SESSION['CARRITO']);
                    $producto = array(
                    'ID'=> $ID,
                    'MARCA'=> $MARCA,
                    'MODELO'=> $MODELO,
                    'PRECIO'=> $PRECIO,
                    'IMAGEN'=> $imagen         //  SE AGREGO
                );

                $_SESSION['CARRITO'][$numprod]= $producto; 
                echo "<script>alert('Producto agregado correctamente')</script>";
               // header("location:/../Vistas/IndexSesion.php");
                //$mess = print_r($_SESSION,true);
                }
                
            }
            

        break;
        case 'Eliminar':
            if(is_numeric($_POST['idCelular'])){
                $ID=$_POST['idCelular'];
                foreach($_SESSION['CARRITO'] as $indice=>$producto){
                    if($producto['ID']== $ID){
                        
                        unset($_SESSION['CARRITO'][$indice]);
                        $_SESSION['CARRITO']=array_values($_SESSION["CARRITO"]); // ordenar el elemento eliminado
                    }
                }    
                header("location:../Vistas/MostrarCarrito.php");            
            }
            break;

        

    }
    

}
?>