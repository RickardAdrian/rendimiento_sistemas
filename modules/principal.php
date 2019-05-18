<!DOCTYPE html>
<html>
<head>
	<title>Pagina Principal</title>
</head>
<body>
	
	<v-card>
	 <v-parallax
    height="350"
    src=".\images\front.jpg"
  >
	  	    <v-layout
	      align-center
	      column
	      justify-center
	    >
	      <h1 class="black--text display-2 font-weight-thin mb-3">Pastelerias Ana</h1>
	    </v-layout>
	  </v-parallax>
	</v-card>

	<v-container grid-list-md text-xs-center>
		<v-layout row wrap>
			<v-flex xs12>
				<v-card>
					<v-card-text class="teal">
						<div class="headline"><span class="white--text">Pasteles</span></div>
					</v-card-text>
				</v-card>
			</v-flex>
		</v-layout>
	</v-container>

	<v-container grid-list-md>
		<v-layout>
		<v-flex xs12>
			<v-card>
		        <v-img
		          class="white--text"
		          height="200px"
		          src=".\images\pastel-chocolate.jpg"
		        >
		        </v-img>
		        <v-card-title class="teal">
		          <div>
		            <span class="white--text">Pasteles variados</span><br>
		          </div>
		        </v-card-title>
	      	</v-card>
		</v-flex>
		<v-flex xs12>
			<v-card>
		        <v-img
		          class="white--text"
		          height="200px"
		          src=".\images\pastel-frutas.jpg"
		        >
		        </v-img>
		        <v-card-title class="teal">
		          <div>
		            <span class="white--text">Pasteles Light</span><br>
		          </div>
		        </v-card-title>
	      	</v-card>
		</v-flex>
		<v-flex xs12>
			<v-card>
		        <v-img
		          class="white--text"
		          height="200px"
		          src=".\images\reposteria.jpg"
		        >
		        </v-img>
		        <v-card-title class="teal">
		          <div>
		            <span class="white--text">Reposteria fina</span><br>
		          </div>
		        </v-card-title>
	      	</v-card>
		</v-flex>
	</v-layout>
	</v-container>

<v-container grid-list-md>
		<v-layout>
			<v-flex>
				<v-card>
					 <v-card-title class="teal">
		          <div>
		            <span class="white--text headline">Información</span><br>
		          </div>
		        </v-card-title>
		        <v-card-text >
           <v-container grid-list-md text-xs-center>
           	<v-layout row wrap>
	           	<v-flex xs4>
	           		<span class="headline"> Sobre Nosotros</span>
	           		<v-divider></v-divider>
	           		<div class="grey--text text-sm-left">
	           			Sobre nosotros
	           			<br>
	           			Acerca de nosotros
	           			<br>
	           			Como comprar
	           			<br>
	           			Información
	           			<br>
	           			Plazos de entrega
	           			<br>
	           			Sucursales
	           		</div>
	           	</v-flex>
	           	<v-flex xs4>
	           		<span class="headline"> Politicas</span>
	           		<v-divider></v-divider>
	           		<div class="grey--text text-sm-left">
	           			Politicas
	           			<br>
	           			Aviso de privacidad
	           			<br>
	           			Envios y Devoluciones
	           		</div>
	           	</v-flex>
	           	<v-flex xs4>
	           		<span class="headline"> Servicio al cliente</span>
	           		<v-divider></v-divider>
	           		<div class="grey--text text-sm-left">
	           			Servicio al cliente
	           			<br>
	           			Contacto
	           			<br>
	           			<b>Correo:</b> Info@AnaPasteleria.com.mx
	           			<br>
	           			<b>Tel</b>: 81111111111
	           			<br>
	           			<b>Atención telefonica:</b> de 8 a.m. a 8 p.m.
	           			<br>
	           			<b>Horarios:</b> de 9 a.m a 8 p.m.

	           		</div>
	           	</v-flex>
           </v-layout>
           </v-container>
          </v-card-text>
				</v-card>
			</v-flex>
		</v-layout>
	</v-container>

</body>
</html>

<script>
  export default {
    data: () => ({
    })
  }
</script>