<?php
	include "admin.php";
?>

<script src="js/jspdf.js"></script>
<script src="js/pdfFromHTML.js"></script>
<script src="js/excelFromHTML.js"></script>

<v-card class="pa-2">
<div id="HTMLtoPDF">
	<h1>Transacciones</h1>
	<table id="tabla" style="border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;" >
		<tr >
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">ID</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Fecha</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Tiempo</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Tipo de transaccion</th>
	
		</tr>
		<?php
			$query=$mysqli->query("SELECT * FROM transacciones");
			while($result=mysqli_fetch_array($query)){
		?>
			<tr>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['id_trans']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['fecha']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['tiempo']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['tipo_transaccion']?></td>
	
			</tr>
		<?php
			}
		?>
	</table>
</div>

<v-btn  class="teal white--text" value="export" onclick="exportTableToExcel('tabla', 'Transacciones')">
	Exportar a Excel
</v-btn>
<v-btn class="teal white--text" onclick="HTMLtoPDF('Transacciones')">
	Exportar a PDF
</v-btn>

</v-card>


