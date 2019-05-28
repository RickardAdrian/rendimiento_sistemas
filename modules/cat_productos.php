<?php
	include "admin.php"
?>

<script src="js/jspdf.js"></script>
<script src="js/pdfFromHTML.js"></script>
<script src="js/excelFromHTML.js"></script>

<v-card class="pa-2">
	<div id="HTMLtoPDF">
	<h1>Catalogo de productos</h1>
	<table id="tabla" style="border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;" >
		<tr >
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">ID</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Articulo</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">SKU</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Precio</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Cantidad existente</th>
		</tr>
		<?php
			$query=$mysqli->query("SELECT * FROM inventario ");
			while($result=mysqli_fetch_array($query)){
		?>
			<tr>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['id_art']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['articulo']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['SKU']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['precio']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['cantidad']?></td>
			</tr>
		<?php
			}
		?>
	</table>
	</div>

<v-btn class="teal white--text" onclick="exportTableToExcel('tabla', 'productos')">
	Exportar a Excel
</v-btn>
<v-btn class="teal white--text" onclick="HTMLtoPDF('productos')">
	Exportar a PDF
</v-btn>
</v-card>
