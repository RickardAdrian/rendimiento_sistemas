<?php
	include "admin.php";
?>

	<center>
		<form method="post" action="">
			<div class="login">
				<v-card >
<v-card-title class="teal"><label><h2 class="white--text"> Agregar articulo</h2></label></v-card-title>
					 <v-container>
					 	<v-flex xs12 md12>
							Articulo
							<div class="form-group">
								<input  autocomplete="off" class="form-control" required style="width: 30%; border:1px solid black"  name="articulo"/>
							</div>
							<br>
							Precio
							<div class="form-group">
								<input type="text" autocomplete="off" class="form-control" required style=" width: 30%; border:1px solid black"  name="precio"/>
							</div>
							<br>
							Cantidad
							<div class="form-group">
								<input type="" autocomplete="off" class="form-control" required style="width: 30%; border:1px solid black"  name="cantidad"/>
							</div>
				
							<br>
						
							<div class="form-group">
								<v-btn class="teal white--text" name="enviar" type="submit"><i class="fa fa-sign-in"></i> Agregar</v-btn>
								<br>
							</div>
							
						</v-flex>
					 </v-container>
				</v-card>
			</div>
		</form>
	</center>

<?php
if(isset($enviar)){
	$articulo=clear($articulo);
	$precio=clear($precio);
	$cantidad=clear($cantidad);
	
	$q = $mysqli->query("INSERT INTO `inventario` (`articulo`, `precio`, `cantidad`) VALUES ('$articulo', '$precio', '$cantidad')");
	}
?>