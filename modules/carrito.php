<?php
include "configs/cart.php";

if(isset($_SESSION['id_user'])){
?>

<v-card>
<h1>Carrito de compras</h1>
<table style="border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;" >
	<tr >
		<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Nombre del producto</th>
		<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Cantidad</th>
		<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Precio por unidad</th>
		<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Precio Total</th>
		<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Modificar</th>
	</tr>
<?php
	$id_user=clear($_SESSION['id_user']);
	$query=$mysqli->query("SELECT * FROM carrito WHERE id_user='$id_user'");
	$monto_total=0;
	while($result=mysqli_fetch_array($query)){
		$query2=$mysqli->query("SELECT * FROM inventario WHERE id_art='".$result['id_art']."'");
		$result2=mysqli_fetch_array($query2);

		$nombre_prod=$result2['articulo'];
		$cantidad=$result['cant'];
		$precio_unidad=$result2['precio'];
		$precio_total=$cantidad*$precio_unidad;
		$monto_total=$monto_total+$precio_total;
		?>
			  	<tr>
			      <td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$nombre_prod?></td>
			      <td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$cantidad?></td>
			      <td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$precio_unidad?></td>
			      <td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$precio_total?></td>
			      <td style="border: 1px solid #ddd; text-align: left; "><a onclick="modificar('<?=$result['id_art']?>','<?=$result['cant']?>')" style="padding-left: 20%"><i class="fas fa-edit"></i></a><a href="?p=carrito&cantidad=<?=$cantidad?>&eliminar=<?=$result['id_art']?>" style="padding-left: 20%"><i class="fas fa-times"></i></a></td>
			    </tr>
		<?php
	}

?>
</table>
<br>
<h2 class="text-xs-right" style="margin-right: 10% ;">Monto Total: <b><?=$monto_total?></b></h2>
<form method="post" action="">
	<?php
	if($monto_total>0){
	?>
		<input type="hidden" name="monto_total" value="<?=$monto_total?>"/>
		<v-btn class="teal white--text" type="submit"  name="terminar" >Terminar Compra</v-btn>
	<?php
	}
	?>
</form>
</v-card>
<?php
}else{
?>
	<v-container>
				 <v-layout align-center justify-center row fill-height>
					<v-card>
						<v-card-title class="teal white--text"><h2>ATENCIÓN</h2></v-card-title>
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

<script type="text/javascript">
		
	function modificar(idc,value){
		var new_cant = prompt("¿Cual es la nueva cantidad?");

		if(new_cant>0){

			window.location="?p=carrito&id_art="+idc+"&modificar="+new_cant+"&value="+value;

		}

	}

</script>