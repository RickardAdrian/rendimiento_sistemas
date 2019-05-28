<?php
	
	$host_mysql ="localhost";
	$user_mysql ="root";
	$pass_mysql="";
	$db_mysql="bd_pasteleria";
	$mysqli=mysqli_connect($host_mysql , $user_mysql, $pass_mysql, $db_mysql);
	
	function connect(){
		$host_mysql ="localhost";
		$user_mysql ="root";
		$pass_mysql="";
		$db_mysql="bd_pasteleria";
		$mysqli=mysqli_connect($host_mysql , $user_mysql, $pass_mysql, $db_mysql);
		return $mysqli;
	}

	function clear($var){
		htmlspecialchars($var);
		return $var;
	}

	function check_login(){
		if(isset($_SESSION['id'])){
			redir("./");
		}
	}

	function check_user($url){

		if(!isset($_SESSION['id_user'])){
			redir("?p=login&return=$url");
		}
		else{

		}
	}

	function name_user($id_user){
		$mysqli=connect();
		$query=$mysqli->query("SELECT * FROM users where id_user='$id_user'");
		$result=mysqli_fetch_array($query);
		return $result['username'];
	}

	function role_($id_user){
		$mysqli=connect();
		$query=$mysqli->query("SELECT * FROM users WHERE id_user='$id_user'");
		$result=mysqli_fetch_array($query);
		return $result['role'];
	}

	function redir($var){
		?>
		<script type="text/javascript">
			window.location="<?=$var?>";
		</script>
		<?php
		die();
	}

	function alert($var){
		?>
			<script type="text/javascript">
				alert("<?=$var?>");
			</script>
		<?php
	}

?>