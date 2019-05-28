<?php
for ($i=0; $i <30 ; $i++) { 

	$t9 = microtime(true);
	$t10 = microtime(true);
	$tiempofi5 = $t10 - $t9;
	$tiempo = clear($tiempofi5);
	$mysqli -> query("INSERT INTO transacciones (fecha,tiempo, tipo_transaccion) VALUES (NOW(),'$tiempofi5','Simulacion')");
}
?>