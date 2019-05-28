<?php
include "configs/products.php";

$query=$mysqli->query("SELECT * FROM inventario ORDER BY id_art ASC");
while($result=mysqli_fetch_array($query)){
	if($result['cantidad']==0){

	}
	else{
		?>

		<div class="inventario" style="display: inline-block; width: 33%">
				<v-container>
					 <v-layout justify-center>
					 	<v-flex >
							<v-card class="pa-2 ma-2" >
								<v-card-title class="">
										<span class="headline"><?=$result['articulo']?></span>
									</v-card-title>
								</b>
								<!-- <img src=".././images/<?=$result['imagen']?>"/> -->
								
								<div> <b>$<?=$result['precio']?></b></h2><br> <b>Cantidad existente: </b><?=$result['cantidad']?></div>
								<v-card-actions>
									 <v-btn class="orange" onclick="agregar_carro('<?=$result['id_art']?>');">Comprar</v-btn>
								</v-card-actions>
							</v-card>
						</v-flex>
					</v-layout>
				</v-container>
		</div>
		<?php
		}
	}
?>

<script type="text/javascript">
	function agregar_carro(idp){
		var cant= prompt("¿Que cantidad desea comprar?",1);
		if(cant.length>0){
			window.location="?p=productos&agregar="+idp+"&cant="+cant;
		}
	}
</script>