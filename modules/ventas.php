<?php
	include "admin.php"
?>

<div style="background-color: white;">
<form method="POST">

<v-layout row wrap >
<v-flex xs3 >
	Año: 

		<select name="year" autocomplete="off" required style=" border:1px solid black">
			<option value="2018">2018</option>
			<option value="2019">2019</option>
			<option value="2020">2020</option>
			<option value="2021">2021</option>									
		</select>	

</v-flex>
<v-flex xs3>
	Mes: 

		<select name="month" autocomplete="off" required style=" border:1px solid black">
			<option value="Todos">Todos</option>
			<option value="01">Enero</option>
			<option value="02">Febrero</option>
			<option value="03">Marzo</option>
			<option value="04">Abril</option>
			<option value="05">Mayo</option>
			<option value="06">Junio</option>
			<option value="07">Julio</option>
			<option value="08">Agosto</option>
			<option value="09">Septiembre</option>
			<option value="10">Octubre</option>
			<option value="11">Noviembre</option>
			<option value="12">Diciembre</option>
		</select>	
</v-flex>
<v-flex xs3>
	Cliente: 
		<select name="user" autocomplete="off" required style=" border:1px solid black">
			<option value="Todos">Todos</option>
		<?php
			$query=$mysqli->query("SELECT * FROM users ");
			while($result=mysqli_fetch_array($query)){
		?>
			<option value="'<?=$result['name']?>'"><?=$result['name']?></option>
		<?php
			}
		?>	
		</select>	
</v-flex>
<v-flex xs3>		
	Detallado: 
		<select name="detail" autocomplete="off" required style=" border:1px solid black">
			<option value="no">No</option>
			<option value="si">Si</option>
		</select>	

</v-flex>
</v-layout>
<v-btn class="teal white--text" name="submit" type="submit">Consultar</v-btn>
</form>
<div id="display">
	<?php
		include "answer.php";
	?>

</div>

<br>
	<!--Consulta no detallada-->



</div>