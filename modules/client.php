<?php
	
if(isset($enviar)){
	$username = clear($username);
	$password = clear($password);
	$q = $mysqli->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");
	if(mysqli_num_rows($q)>0){
		$r = mysqli_fetch_array($q);
		$_SESSION['id_user'] = $r['id_user'];
		if(isset($return)){
			$q = $mysqli->query("UPDATE users SET username='$username', password='$password', name='$name',mail='$mail',mail='$mail'");
		}
		else{

		}
	}else{
		
	}
}
if(isset($_SESSION['id_user'])){ // si hay una sesion iniciada
	?>
	<center>
		<form method="post" action="">
			<div class="login">
				<v-card >
<v-card-title class="teal"><label><h2 class="white--text"><i class="fa fa-key"></i> Actualizar datos</h2></label></v-card-title>
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
						
							<div class="form-group">
								<v-btn class="teal white--text" name="enviar" type="submit"><i class="fa fa-sign-in"></i> Cambiar</v-btn>
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

