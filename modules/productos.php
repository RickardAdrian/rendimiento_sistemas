<?php
check_user("productos");

if(isset($agregar) && isset($cant)){
	$idp=clear($agregar);
	$cant=clear($cant);
	$id_user=clear($_SESSION['id_user']);
	$query=$mysqli->query("SELECT * FROM inventario ORDER BY id_art ASC");
	$result=mysqli_fetch_array($query);
	$v=$mysqli->query("SELECT * FROM carrito WHERE id_user ='id_user' AND id_art='$idp'");
	$cantidad_bd=clear($result['cantidad']);
	if($cant>$cantidad_bd){
		alert("No se ha podido agregar al carrito, la cantidad es mayor que la existente");
		redir("?p=productos");
	}
	else{
		$query=$mysqli->query("UPDATE inventario SET cantidad=cantidad-$cant WHERE id_art=$idp");

		if(mysqli_num_rows($v)>0){
			$query=$mysqli->query("UPDATE carrito SET cant=cant + $cant WHERE id_user='$id_user' AND id_producto = '$idp'");
		}else{
			$query=$mysqli->query("INSERT INTO carrito (id_user,id_art,cant) VALUES ($id_user,$idp,$cant)");
		}

		alert("Se ha agregado al carrito");
		redir("?p=productos");
	}
}

$query=$mysqli->query("SELECT * FROM inventario ORDER BY id_art ASC");
while($result=mysqli_fetch_array($query)){
	if($result['cantidad']==0){

	}
	else{
		?>

		<div class="inventario" style="display: inline-block;">
				<v-container>
					 <v-layout>
							<v-card>
								<v-card-title class="">
										<span class="headline"><?=$result['articulo']?></span>
									</v-card-title>
								</b>
								<!-- <img src=".././images/<?=$result['imagen']?>"/> -->
								
								<div> <b>$<?=$result['precio']?></b></h2><br> <b>Cantidad: </b><?=$result['cantidad']?></div>
								<v-card-actions>
									 <v-btn onclick="agregar_carro('<?=$result['id_art']?>');">Comprar</v-btn>
								</v-card-actions>
							</v-card>
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