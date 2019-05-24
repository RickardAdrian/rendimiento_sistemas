<?php
	check_user('carrito');

	if(isset($eliminar) && isset($cantidad)){
		$eliminar = clear($eliminar);
		$cantidad = clear($cantidad);
		echo "<script>console.log({$eliminar})</script>";
		echo "<script>console.log({$cantidad})</script>";
		$mysqli -> query("UPDATE inventario SET cantidad = cantidad + '$cantidad' WHERE id_art = '$eliminar'");
		$mysqli -> query("DELETE FROM carrito WHERE id_art = '$eliminar'");
		redir("?p=carrito");
	}

	if(isset($id_art) && isset($modificar) && isset($value)){

		$id_art = clear($id_art);
		$modificar = clear($modificar);
		$value= clear($value);

		$query=$mysqli->query("SELECT * FROM inventario WHERE id_art ='$id_art'");
		$old_result=mysqli_fetch_array($query);
		$old_cant=$old_result['cantidad'];
		if($modificar>$old_cant){
			alert("La cantidad que quieres agregar es mayor a la existente");
			redir("?p=carrito");
		}
		else{
			if($modificar > $value){
				$cantidad_restar_inv=$modificar-$value;
				$mysqli->query("UPDATE inventario SET cantidad = cantidad-'$cantidad_restar_inv' WHERE id_art = '$id_art'");
			}
			elseif($modificar < $value){
				$cantidad_sumar_inv=$value-$modificar;
				$mysqli->query("UPDATE inventario SET cantidad = cantidad+'$cantidad_sumar_inv' WHERE id_art = '$id_art'");
			}
			$mysqli->query("UPDATE carrito SET cant = '$modificar' WHERE id_art = '$id_art'");
			alert("Cantidad modificada");
			redir("?p=carrito");	
		}
		
	}
	
	if(isset($terminar)){
		$monto=clear($monto_total);
		$id_user=clear($_SESSION['id_user']);
		$year=date("Y");
		$month=date("m");
		$query=$mysqli->query("INSERT INTO compra (id_user,year,month,monto,estado) VALUES ('$id_user','$year','$month','$monto',0)");
		
		$sc=$mysqli->query("SELECT * FROM  compra WHERE id_user='$id_user' ORDER BY id DESC LIMIT 1");

		$rc=mysqli_fetch_array($sc);

		$ultima_compra=$rc['id'];

		$query2= $mysqli->query("SELECT * FROM carrito WHERE id_user = $id_user");
		while($result2=mysqli_fetch_array($query2)){

			$sp=$mysqli->query("SELECT * FROM inventario WHERE id_art = '".$result2['id_art']."'");
			$rp=mysqli_fetch_array($sp);

			$monto=$rp['precio'];

			$mysqli->query("INSERT INTO productos_compra (id_compra,id_producto,cantidad,monto) VALUES ('$ultima_compra','".$result2['id_art']."','".$result2['cant']."','$monto')");
			$query3 = $mysqli -> query("DELETE FROM carrito WHERE id_user= $id_user");
		}
		alert("Se ha finalizado la compra");
		redir("./");
	}
?>