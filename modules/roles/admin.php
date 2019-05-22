	<v-container grid-list-md text-xs-center>
		<v-layout align-center justify-center row fill-height>
			<v-flex xs12>
			<v-card>
				<v-card-title class="teal white--text">
				<h2>Administración</h2>
				</v-card-title>
				

					    <v-tabs fixed-tabs
					    >
					      <v-tab
					      >
					       Catalogo de clientes
					      </v-tab>
					      <v-tab-item
					      >
					        <v-card flat>
					          <v-card-text>
					          	<?php
					          		include "submodules/cat_clientes.php";
					          	?>
					          </v-card-text>
					        </v-card>
					      </v-tab-item>
					    

					    
					      <v-tab
					      >
					       Catalogo de productos
					      </v-tab>
					      <v-tab-item
					      >
					        <v-card flat>
					          <v-card-text>
					          	<?php
					          		include "submodules/cat_productos.php";
					          	?>
					          </v-card-text>
					        </v-card>
					      </v-tab-item>

					 
					      <v-tab
					      >
					       Ventas
					      </v-tab>
					      <v-tab-item
					      >
					        <v-card flat>
					          <v-card-text>
					          	<?php
					          		include "submodules/ventas.php";
					          	?></v-card-text>
					        </v-card>
					      </v-tab-item>

					  
					      <v-tab
					      >
					       Movimientos de inventario
					      </v-tab>
					      <v-tab-item
					      >
					        <v-card flat>
					          <v-card-text>
					          	<?php
					          		include "submodules/mov_inv.php";
					          	?>
					          </v-card-text>
					        </v-card>
					      </v-tab-item>

					      <v-tab
					      >
					       Reportes
					      </v-tab>
					      <v-tab-item
					      >
					        <v-card flat>
					          <v-card-text>
					          	<?php
					          		include "submodules/reportes.php";
					          	?>
					          </v-card-text>
					        </v-card>
					      </v-tab-item>
					    </v-tabs>
			</v-card>
		</v-flex>
		</v-layout>
	</v-container>