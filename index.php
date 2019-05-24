<?php
	include "configs/config.php";
	include "configs/functions.php";
	include "configs/redirection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Pastelería</title>
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900|Material+Icons" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.min.css" rel="stylesheet">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
</head>
<body>
	<div id="app">
		<v-app>
			<v-toolbar dark color="teal">

				<v-toolbar-title class="white--text">Pasteleria Ana</v-toolbar-title>

				<v-spacer></v-spacer>
				<v-toolbar-items>
				      <v-btn flat href="?p=principal">Principal</v-btn>
				      <v-btn flat href="?p=productos">Productos</v-btn>
				      <v-btn flat href="?p=carrito">Carrito</v-btn>
				      <?php
				      if(empty($_SESSION['id_user'])){
				      ?>
				      	<v-btn flat href="?p=login">Sesión</v-btn>
				      <?php
				      }
					     if(isset($_SESSION['id_user'])){
					     	?>
					     		 <v-btn class="white black--text" href="?p=user"><?=name_user($_SESSION['id_user'])?></v-btn>
					     		 <v-btn flat href="?p=salir">Salir</v-btn>
				      		<?php
				      	}
				      ?>
				</v-toolbar-items>
			</v-toolbar>
			<v-content>
				<v-img src=".\images\back.jpg">
					<v-container>
						<?php
							include "configs/modules.php";
						?>
					</v-container>
				</v-img>
			</v-content>

			  <v-footer
			    dark
			    height="auto"
			  >
			    <v-card
			      class="flex"
			      flat
			      tile
			    >
			      <v-card-title class="teal">
			        <strong class="">Rendimiento de Sistemas </strong>
			        </v-btn>
			      </v-card-title>

			
			    </v-card>
			  </v-footer>
		</v-app>
	</div>
</body>
</html>

<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/vuetify/dist/vuetify.js"></script>
 <script>
   new Vue({ el: '#app', data: {hey: 'Sup'} })
 </script>