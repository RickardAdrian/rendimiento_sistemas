<?php
	if(isset($terminar)){
		$monto=clear($monto_total);
		$id_user=clear($_SESSION['id_user']);
		
		$query=$mysqli->query("INSERT INTO compra (id_user,fecha,monto,estado) VALUES ('$id_user',NOW(),'$monto',0)");
		
		$sc=$mysqli->query("SELECT * FROM  compra WHERE id_user='$id_user' ORDER BY id DESC LIMIT 1");

		$rc=mysqli_fetch_array($sc);

		$ultima_compra=$rc['id'];

		$query2=mysqli->query("SELECT * FROM carrito WHERE id_user = $id_user");
		while($result2=mysqli_fetch_array($query2)){

			$sp=$mysqli->query("SELECT * FROM productos WHERE id = '".$result2['id_producto']."'");
			$rp=mysqli_fetch_array($sp);

			$monto=$rp['price'];

			$mysqli->query("INSERT INTO producto_compra (id_compra,id_producto,cantidad,monto) VALUES ('$ultima_compra','".$result2['id_producto']."','".$result2['cant']."','$monto')");
		}
		alert("Se ha finalizado la compra");
		redir("./");
	}
?>

<v-card>
<h1>Carrito de compras</h1>
<table style="border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;" >
	<tr >
		<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Nombre del producto</th>
		<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Cantidad</th>
		<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Precio por unidad</th>
		<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Precio Total</th>
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
			    </tr>
		<?php
	}

?>
</table>
<br>
<h2 class="text-xs-right" style="margin-right: 10% ;">Monto Total: <b><?=$monto_total?></b></h2>
<form method="post" action="">
	<input type="hidden" name="monto_total" value="<?=$monto_total?>"/>
	<v-btn class="teal white--text" type="submit" name="terminar">Terminar Compra</v-btn>
</form>
</v-card>


