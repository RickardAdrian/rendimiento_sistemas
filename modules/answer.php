<script src="js/jspdf.js"></script>
<script src="js/pdfFromHTML.js"></script>
<script src="js/excelFromHTML.js"></script>

<div id="HTMLtoPDF">
	<h1>Ventas</h1>
	<table id="tabla" style="border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;" >
		<tr >
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Año</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Mes</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Cliente</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Venta</th>

		</tr>
		<?php
			$query = $mysqli -> query("SELECT compra.id, users.name, compra.year, compra.month, compra.monto  FROM compra INNER JOIN users ON compra.id_user=users.id_user;");
			while($result=mysqli_fetch_array($query)){
		?>
			<tr>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['year']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['month']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['name']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['monto']?></td>

			</tr>
		<?php
			}
		?>
	</table>
</div>

<v-btn  class="teal white--text" value="export" onclick="exportTableToExcel('tabla', 'clientes')">
	Exportar a Excel
</v-btn>
<v-btn class="teal white--text" onclick="HTMLtoPDF('clientes')">
	Exportar a PDF
</v-btn>
</v-card>


