<?php
		$user=$_SESSION['id_user'];
		$monto=$mysqli->query("SELECT * FROM compra WHERE id_user= '$user'");
		while($result=mysqli_fetch_array($monto)){
				$monto=$result['monto'];
		}

		$correo=$mysqli->query("SELECT * FROM  users WHERE id_user ='$user'");
		while($result2=mysqli_fetch_array($correo)){
				$nombre=$result2[''];
				$email=$result2[''];
				$mensaje = "$nombre: \n La compra ha sido hecha";
		}
		mail($email,"Pastelería Ana",$mensaje);
?>