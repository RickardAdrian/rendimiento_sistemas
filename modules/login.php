<?php
	
if(isset($enviar)){
	$username = clear($username);
	$password = clear($password);
	$t9 = microtime(true);
	$q = $mysqli->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
	if(mysqli_num_rows($q)>0){
		$r = mysqli_fetch_array($q);
		$_SESSION['id_user'] = $r['id_user'];
		$t10 = microtime(true);
		$tiempofi5 = $t10 - $t9;
		$tiempo = clear($tiempofi5);
		$mysqli ->query("INSERT INTO transacciones (fecha,tiempo, tipo_transaccion) VALUES (NOW(),'$tiempofi5','Inicio de Sesion')");
		if(isset($return)){
			redir("?p=productos");
		}
		else{
			redir("?p=login");	
		}
		
	}else{
		alert("Los datos no son validos");
		redir("?p=login");
	}

}
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
					<v-card-title class="teal"><label><h2 class="white--text"><i class="fa fa-key"></i> Iniciar Sesión</h2></label></v-card-title>
					 <v-container>
					 	<v-flex xs12 md12>
					 		Usuario
							<div class="form-group">
								<input type="text" autocomplete="off" class="form-control" required style="width: 30%;  border:1px solid black" placeholder="Usuario" name="username"/>
							</div>
							<br>
							Contraseña
							<div class="form-group">
								<input type="password" class="form-control" required style="width: 30%;  border:1px solid black" placeholder="Contraseña" name="password"/>
							</div>
							<br>
							<div class="form-group">
								<v-btn class="teal white--text" name="enviar" type="submit"><i class="fa fa-sign-in"></i> Ingresar</v-btn>
								<v-btn class="" name="Limpiar" type="reset"><i class="fa fa-sign-in"></i> Limpiar</v-btn>
							</div>
							<br>
							o tambien puedes registrarte
							<br>
							<v-btn class="teal white--text" href="?p=register">Registrarse</v-btn>
						</v-flex>
					 </v-container>
				</v-card>
			</div>
		</form>
	</center>

	<?php
}
?>




<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
