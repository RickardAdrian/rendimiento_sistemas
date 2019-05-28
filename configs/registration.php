<?php 
  if (isset($_POST['enviar'])) {
  	$username = clear($username);
    $password = clear($password);
    $name = clear($name);
    $mail = clear($mail);
    $role = clear($role);
    $pago = clear($pago);
    $CardHolder=clear($CardHolder);
    $CardNumber=clear($CardNumber);
    $CVV=clear($CVV);

    $query1 = "SELECT * FROM users WHERE username='$username' AND mail='$mail'";
    $result = $mysqli->query($query1);

  	if (mysqli_num_rows($result) > 0) {
  	  alert("El usuario y/o correo ya ha sido tomado, ingresa uno nuevo");
  	}else{
           $t9 = microtime(true);
           $results = $mysqli->query("INSERT INTO users (username, pago, mail, password, role, name, CardHolder, CardNumber, CVV) VALUES ('$username','$pago', '$mail', '$password', '$role', '$name', '$CardHolder', '$CardNumber', '$CVV')");
           alert ("Registrado con exito!");
           $q = $mysqli->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

           $r = mysqli_fetch_array($q);
           $_SESSION['id_user'] = $r['id_user'];
           $t10 = microtime(true);
           $tiempofi5 = $t10 - $t9;
           $tiempo = clear($tiempofi5);

           $mysqli ->query("INSERT INTO transacciones (fecha,tiempo, tipo_transaccion) VALUES (NOW(),'$tiempofi5','Registro')");
  	}
  }
?>

  
