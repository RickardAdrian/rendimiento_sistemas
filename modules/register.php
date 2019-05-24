<?php
include "configs/registration.php";

if(isset($_SESSION['id_user'])){ // si hay una sesion iniciada
	?>
	<v-container>
				 <v-layout align-center justify-center row fill-height>
					<v-card>
						<v-card-title class="teal white--text"><h2>ATENCIÓN</h2></v-card-title>
						<div class="text-xs-center headline" style="margin:10% ">Ya haz iniciado sesión</div> 
							<a href="?p=productos">
								<v-btn class="teal white--text">Ir a la sección de productos</v-btn>
							</a>
							<br>
							<div class="text-xs-center">o tambien</div>
							<div class="text-xs-center">
								<a href="?p=salir">
									<v-btn class="red white--text">Salir</v-btn>
								</a>
							</div>
					</v-card>
				</v-layout>
	</v-container>
	<?php
}else{ // si no hay una sesion iniciada
	?>	
	<center>
		<form method="post" action="">
			<div class="login">
				<v-card >
					<v-card-title class="teal"><label><h2 class="white--text"><i class="fa fa-key"></i> Registro</h2></label></v-card-title>
					 <v-container>
					 	<v-flex xs12 md12>
					 		Usuario
							<div class="form-group">
								<input type="text" autocomplete="off" class="form-control" required style=" width: 30%; border:1px solid black " placeholder="Usuario" name="username"/>
							</div>
							<br>
							Contraseña
							<div class="form-group">
								<input type="password" autocomplete="off" class="form-control" required style="width: 30%; border:1px solid black" placeholder="Contraseña" name="password"/>
							</div>
							<br>
							Nombre
							<div class="form-group">
								<input type="text" autocomplete="off" class="form-control" required style=" width: 30%; border:1px solid black" placeholder="Nombre" name="name"/>
							</div>
							<br>
							Correo
							<div class="form-group">
								<input type="" autocomplete="off" class="form-control" required style="width: 30%; border:1px solid black" placeholder="Correo" name="mail"/>
							</div>
							<br>
							Rol de usuario
							<div class="form-group">
								<select name="role" autocomplete="off" required style="width: 30%; border:1px solid black">
									<option value="user">Usuario</option>
									<option value="shop">Proveedor</option>									
								</select>
							</div>
							<br>
							Metodo de pago
							<div class="form-group">
								<select name="pago" autocomplete="off" required style="width: 30%; border:1px solid black">
									<option value="debito">Debito</option>
									<option value="credito">Credito</option>
									<option value="efectivo">Efectivo</option>
									<option value="prepago">Prepago</option>									
								</select>
							</div>
							<br>
							<div class="form-group">
								<v-btn class="teal white--text" name="enviar" type="submit"><i class="fa fa-sign-in"></i> Registrarse</v-btn>
								<br>
							</div>
							
						</v-flex>
					 </v-container>
				</v-card>
			</div>
		</form>
	</center>

	<?php
}
?>
