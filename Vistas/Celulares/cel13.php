<?php 
include("../../Modelo/BD.php");
include("../../Controlador/carrito.php");

    $sqlcel="select * from celular where idcel='13'";
    $result=mysqli_query($conexion,$sqlcel);
    $extra=mysqli_fetch_array($result);


?>
<title>Phone Center |</title>
<link href="../../css/boot1.css" rel='stylesheet' type='text/css' />
<link href="../../css/boot2.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../../css/lineas.css" rel='stylesheet' type='text/css' />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<script src="../../js/jquery.min.js"></script>
<script type="text/javascript">
        $(document).ready(function() {
            $(".dropdown img.flag").addClass("flagvisibility");

            $(".dropdown dt a").click(function() {
                $(".dropdown dd ul").toggle();
            });
                        
            $(".dropdown dd ul li a").click(function() {
                var text = $(this).html();
                $(".dropdown dt a span").html(text);
                $(".dropdown dd ul").hide();
                $("#result").html("Selected value is: " + getSelectedValue("sample"));
            });
                        
            function getSelectedValue(id) {
                return $("#" + id).find("dt a span.value").html();
            }

            $(document).bind('click', function(e) {
                var $clicked = $(e.target);
                if (! $clicked.parents().hasClass("dropdown"))
                    $(".dropdown dd ul").hide();
            });


            $("#flagSwitcher").click(function() {
                $(".dropdown img.flag").toggleClass("flagvisibility");
            });
        });
     </script>
     <!----details-product-slider--->
				<!-- Include the Etalage files -->
					<link rel="stylesheet" href="../../css/etalage.css">
					<script src="../../js/jquery.etalage.min.js"></script>
				<!-- Include the Etalage files -->
				<script>
						jQuery(document).ready(function($){
			
							$('#etalage').etalage({
								thumb_image_width: 300,
								thumb_image_height: 400,
								
								show_hint: true,
								click_callback: function(image_anchor, instance_id){
									alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
								}
							});
							// This is for the dropdown list example:
							$('.dropdownlist').change(function(){
								etalage_show( $(this).find('option:selected').attr('class') );
							});

					});
                    </script>


 <body>
	 <!--Aqui va la cabecera:-->
     <div class="main">
      <div class="shop_top">
		<div class="container">
			<div class="row">
				<div class="col-md-9 single_left">
				   <div class="single_image">
					     <ul id="etalage">
							<li>
								
									<img class="etalage_thumb_image" src="../../assets/img/celulares/android/sansung/(1).jpg" />
									<img class="etalage_source_image" src="../../assets/img/celulares/android/sansung/(1).jpg" />
							
							</li>

						</ul>
					    </div>
				        <!-- end product_slider -->
				        <div class="single_right">
						    <h3 class="my-3"><?php echo $extra['descripcion']?></h3>
							<p>El Samsung Galaxy Note 10+ marca la décima generación de la serie flagship de Samsung y es el modelo más poderoso de la serie Note 10. El Galaxy Note 10+ llega con una pantalla Dynamic AMOLED de 6.8 pulgadas a resolución QHD+ con 12GB de memoria RAM y 256GB o 512GB de almacenamiento interno expandible, el Galaxy Note 10+ tiene una cámara cuádruple de 12 MP + 12 MP + 16 MP + ToF VGA en su posterior, mientras que al frente su cámara selfie es de 10 MP de gran angular y autofoco, incrustada en la pantalla perforada.</p>
							<div class="btn_form">
							   
							</div>

							<div class="social_buttons">
								
								<button type="button" class="btn1 btn1-default1 btn1-twitter" onclick="">
					              <i class="icon-twitter"></i> Tweet
					            </button>
					            <button type="button" class="btn1 btn1-default1 btn1-facebook" onclick="">
					              <i class="icon-facebook"></i> Facebook
					            </button>
					        </div>
				        </div>
				        <div class="clear"> </div>
				</div>
				<div class="col-md-3">
				  <div class="box-info-product">
					<p class="price2">Precio: S/<?php echo $extra['precio']?></h5></p>
					       <form action="" method="post">
								
								<input type="hidden" name="descripcion" id="descripcion" value="<?php echo $extra['descripcion']; ?>"><br>
								<input type="hidden" name="modelo" id="modelo" value="<?php echo $extra['modelo']; ?>"><br>
								<input type="hidden" name="precio" id="precio" value="<?php echo $extra['precio']; ?>"><br>
								<input type="hidden" name="idCel" id="idCel" value="<?php echo $extra['idcel']; ?>"><br>
								<input type="hidden" name="imagen" id="imagen" value="../assets/img/celulares/android/sansung/(1).jpg"><br>

								<button type="submit" name="btnp1" value="Agregar" class="exclusive">
								
									<span>
										<h5>Añadir al carrito</h5>
									</span>
								</button>
							</form>
							<center><button type="button" class="" >
								<a href="../MostrarCarrito.php">Ver Carrito</a>
									
							</button></center>
							<center><a href="../product.html">Volver</a></center>
				   </div>
			   </div>
			</div>		
			<div class="desc" >
			<div style='float:center;margin:0px auto;width:170px;'><h2 style="font-weight:bold;">DESCRIPCIÓN</h2> </div>
			<style type="text/css">
				table,th,td{
					border:1px gray solid
				}
				th,td{
					padding:10px
				}
				td{
					text-align:left
				}
				table{
					
					margin: 0px auto;
				}
			</style>
			     <table style= "width: 50%">
					 <tr>
				            <td><h5><b>PROCESADOR</b> </h5></td><td><h5><?php echo $extra['procesador']?></h5></td>
							<hr>
				    </tr>
					<tr>
					        <td><h5><b>RAM</b></h5></td><td><h5><?php echo $extra['ram']?></h5></td>
					</tr>
					<tr>
					        <td><h5><b>CÁMARA</b></h5></td><td><h5><?php echo $extra['camara']?></h5></td>
					</tr>
					<tr>
					        <td><h5><b>CAPACIDAD</b></h5></td><td><h5><?php echo $extra['capacidad']?></h5></td>
					</tr>
					<tr>		
					        <td><h5><b>TAMAÑO DE LA PANTALLA</b></h5></td><td><h5><?php echo $extra['tampantalla']?></h5></td>
					</tr>
					<tr>	
					        <td><h5><b>COLOR</b></h5></td><td><h5><?php echo $extra['color']?></h5></td>
					</tr>
					<tr>
					       <td><h5><b>SISTEMA OPERATIVO</b></h5></td><td><h5><?php echo $extra['sistemaoperativo']?></h5></td>
					</tr>
					<tr>		
					        <td><h5><b>MODELO</b></h5></td><td><h5><?php echo $extra['modelo']?></h5></td>
					</tr>
					<tr>
					        <td><h5><b>GARANTÍA</b></h5></td><td><h5><?php echo $extra['garantía']?></h5></td>
					</tr>
					<tr>
					        <td><h5><b>BLUETOOH Y WIFI</b></h5></td><td><h5><?php echo $extra['bluywi']?></h5></td>
					</tr>
		    	</table>
			</div>
			<div class="row">
				<h4 class="m_11" style="font-weight:bold;">Algunos celulares parecidos</h4>
				<div class="col-md-4">
					<img src="../../assets/img/otro10.jpg" class="img-responsive" alt=""/> 
					<div class="shop_desc"><a href="cel10.php">
						</a><h3><a href="cel10.php"></a><a href="cel10.php">Redmi Note 10 Pro</a></h3>
						<p>Xiaomi </p>
						<span class="actual">S/1390.00</span><br>
						<ul class="buttons">
						
							<li class="shop_btn"><a href="cel10.php">Ver más</a></li>
							<div class="clear"> </div>
					    </ul>
				    </div>
				</div>
				<div class="col-md-4 product1">
					<img src="../../assets/img/8.jpg" class="img-responsive" alt=""/> 
					<div class="shop_desc"><a href="cel11.php">
						</a><h3><a href="cel11.php"></a><a href="cel11.php">Iphone 12 pro</a></h3>
						<p>Appel </p>
						<span class="actual">$12.00</span><br>
						<ul class="buttons">
							
							<li class="shop_btn"><a href="cel11.php">Ver más</a></li>
							<div class="clear"> </div>
					    </ul>
				    </div>
				</div>
				<div class="col-md-4">
					<img src="../../assets/img/otro9.jpg" class="img-responsive" alt=""/> 
					<div class="shop_desc"><a href="cel9.php">
						</a><h3><a href="cel9.phpl"></a><a href="cel9.php">Nokia Lumia 930</a></h3>
						<p>Microsoft </p>
						<span class="actual">$3.599.00</span><br>
						<ul class="buttons">
							
							<li class="shop_btn"><a href="cel9.php">Ver más</a></li>
							<div class="clear"> </div>
					    </ul>
				    </div>
				</div>
			</div>	
	     </div>
	   </div>
	  </div>
	<!--Aqui va lo de abajo-->
</body>	
<script>
    $(document).ready(function(){
        $("#descripcion").click(function(){
            $("#descripcion").prop("disabled",true);
        });

        $("#capacidad").click(function(){
            $("#capacidad").prop("disabled",true);
        });

        $("#ram").click(function(){
            $("#ram").prop("disabled",true);
        });

        $("#procesador").click(function(){
            $("#procesador").prop("disabled",true);
        });
        $("#camara").click(function(){
            $("#camara").prop("disabled",true);
        });
        $("#precio").click(function(){
            $("#precio").prop("disabled",true);
        });
        $("#tampantalla").click(function(){
            $("#tampantalla").prop("disabled",true);
        });
        $("#color").click(function(){
            $("#color").prop("disabled",true);
        });
        $("#sistemaoperativo").click(function(){
            $("sistemaoperativo").prop("disabled",true);
        });
        $("#modelo").click(function(){
            $("#modelo").prop("disabled",true);
        });
        $("#garantia").click(function(){
            $("#garantia").prop("disabled",true);
        });
        $("#bluywi").click(function(){
            $("#bluywi").prop("disabled",true);
        });

    });

</script>

</body>
</html>