<?php
include '../Controlador/carrito.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/bootstrap2.min.css">
    <link rel="stylesheet" href="../css/Estilos.css">
    <link rel="stylesheet" href="../css/font2-awesome.min.css">
    <!--<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    -->
    <link rel="shortcut icon" href="/assets/icons/iconoCarrito.png">

    <title>Carrito de compras</title>
</head>

<body>


    <div>
        <center>
            <h1>Lista del Carrito</h1>
        </center>
    </div>
    <?php
    
    if (!empty($_SESSION['CARRITO'])) {
    ?>

        <div class="container-fluid">
            <div class="row">
                <aside class="col-lg-9">
                    <div class="card">
                        <div class="table-responsive">
                            <table class="table table-borderless table-shopping-cart">
                                <thead class="text-muted">
                                    <tr class="small text-uppercase">
                                        <th scope="col">Producto</th>
                                        <th scope="col" width="120">Precio</th>
                                        <th scope="col" class="text-right d-none d-md-block" width="200"></th>
                                    </tr>
                                </thead>



                                <tbody>
                                    <?php $total = 0 ?>
                                    <?php foreach ($_SESSION['CARRITO'] as $indice => $producto) { ?>
                                        <!--INCIO ROW-->
                                        <tr>
                                            <td>
                                                <figure class="itemside align-items-center">
                                                    <div class="aside"><img src="<?php echo $producto['IMAGEN']; ?>" class="img-sm"></div>
                                                    <figcaption class="info">
                                                        <label></label>
                                                        <p class="text-muted small">Modelo: <?php echo $producto['MODELO'] ?> <br> Brand: <?php echo $producto['MARCA'] ?></p>
                                                    </figcaption>
                                                </figure>

                                            </td>

                                            <!--<td>
                                            <select class="form-control">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                            </select>
                                        </td>
                                        -->
                                            <td>
                                                <div class="price-wrap">
                                                    <br>
                                                    <var class="price">$<?php echo $producto['PRECIO'] ?></var>
                                                </div>
                                            </td>

                                            <td class="text-right d-none d-md-block">
                                                <form action="../Controlador/carrito.php" method="post">
                                                    <input type="hidden" name="idCelular" value="<?php echo $producto['ID'] ?>">

                                                    <button class="btn btn-light" type="submit" name="btnp1" value="Eliminar">
                                                        <img src="../assets/icons/Eliminar.png" height="25px" width="25px">
                                                        Quitar
                                                    </button>
                                                </form>

                                                <!--<a href="" class="btn btn-light" data-abc="true"> Quitar</a>-->
                                            </td>


                                        </tr>
                                        <?php $total = $total + $producto['PRECIO']  ?>

                                    <?php } ?>
                                    <!-- FIN ROW-->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </aside>
                <aside class="col-lg-3">
                    <div class="card">
                        <div class="card-body">
                            <dl class="dlist-align">
                                <dt>Total price: &nbsp$</dt>
                                <dd class="text-right ml-3"><?php echo $total ?></dd>
                            </dl>
                            <a href="product.html" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Seguir Comprando</a>                
                            
                            <br><br>
                            <td>
                                <h6>Realizar Pago</h6>
                                <dt>Forma</dt>
                                <!--<select  name="pago" class="form-control">
                                    <option value="contraEntrega">ContraEntrega</option>
                                    <option value="tarjeta">Tarjeta</option>    
                                </select>
                                -->
                                <br>       
                                <a href="PagoTarjeta.php" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">Tarjeta</a>
                                <br><br>
                                <a href="PagoCE.php" class="btn btn-out btn-primary btn-square btn-main" data-abc="true">Contra Entrega</a>
                            </td>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    <?php } else { ?>
        <div class="alert alert-success" role="alert">
            No se han guardado porductos
        </div>

        <a href="product.html" class="btn btn-out btn-success btn-square btn-main mt-2" data-abc="true">Continuar Comprando</a>
    <?php } ?>

</body>

</html>