<?php
check_user("productos");
$query1=$mysqli->query("SELECT * FROM inventario ORDER BY id_art ASC");
$result=mysqli_fetch_array($query1);
if(isset($agregar) && isset($cant)){
	$idp=clear($agregar);
	$cant=clear($cant);
	$id_user=clear($_SESSION['id_user']);
	$query2=$mysqli->query("SELECT * FROM inventario WHERE id_art='$idp'");
	$result=mysqli_fetch_array($query2);
	// echo "<script>console.log({$result['id_art']})</script>";
	// echo "<script>console.log({$cantidad_bd})</script>";
	$cantidad_bd=clear($result['cantidad'])	;
	if($cant>$cantidad_bd){
		alert("No se ha podido agregar al carrito, la cantidad es mayor que la existente");
		redir("?p=productos");
	}
	else{
		echo "<script>console.log({$result['id_art']})</script>";
		echo "<script>console.log({$cant})</script>";
		echo "<script>console.log({$idp})</script>";
		$query=$mysqli->query("UPDATE inventario SET cantidad=cantidad-$cant WHERE id_art='$idp'");
		$v=$mysqli->query("SELECT * FROM carrito WHERE id_user ='$id_user' AND id_art='$idp'");
		if(mysqli_num_rows($v)>0){
		$query=$mysqli->query("UPDATE carrito SET cant=cant + $cant WHERE id_user='$id_user' AND id_art = '$idp'");
						
		}else{
			$query=$mysqli->query("INSERT INTO carrito (id_user,id_art,cant) VALUES ('$id_user','$idp','$cant')");
		}

		alert("Se ha agregado al carrito");
		redir("?p=productos");
	}
}
?>