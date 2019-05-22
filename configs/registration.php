<?php 
  if (isset($_POST['enviar'])) {
  	$username = clear($username);
    $password = clear($password);
    $name = clear($name);
    $mail = clear($mail);
    $role = clear($role);

    $query1 = "SELECT * FROM users WHERE username='$username' AND mail='$mail'";
    $result = $mysqli->query($query1);

  	if (mysqli_num_rows($result) > 0) {
  	  alert("El usuario y/o correo ya ha sido tomado, ingresa uno nuevo");
  	}else{
           $results = $mysqli->query("INSERT INTO users (username, mail, password, role, name) 
                VALUES ('$username', '$mail', '$password', '$role', '$name')");
           alert ("Registrado con exito!");
           $q = $mysqli->query("SELECT * FROM users WHERE username = '$username' AND password = '$password'");

           $r = mysqli_fetch_array($q);
           $_SESSION['id_user'] = $r['id_user'];
  	}
  }
?>

  
