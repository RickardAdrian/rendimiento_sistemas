<?php
if(isset($_SESSION['id_user'])){
	if(role_($_SESSION['id_user'])=="admin"){
		include "roles/admin.php";
	} 
	else {
		include "roles/client.php";
	}
}
else{
?>
<v-container>
				 <v-layout align-center justify-center row fill-height>
					<v-card>
						<v-card-title class="teal white--text"><h2>ATENCIÓN!</h2></v-card-title>
						<div class="text-xs-center headline" style="margin:10% ">No haz iniciado sesión</div>
							<div class="text-xs-center"> 
								<a href="?p=login">
									<v-btn class="teal white--text">Iniciar Sesión</v-btn>
								</a>
							</div>
							<div class="text-xs-center">o tambien</div>
							<div class="text-xs-center">
								<a href="?p=register">
									<v-btn class="teal white--text">Registrarte</v-btn>
								</a>
							</div>
					</v-card>
				</v-layout>
	</v-container>
<?php
}
?>