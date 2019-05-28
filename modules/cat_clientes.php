<?php
	include "admin.php"
?>

<script src="js/jspdf.js"></script>
<script src="js/pdfFromHTML.js"></script>
<script src="js/excelFromHTML.js"></script>

<v-card class="pa-2">
<div id="HTMLtoPDF">
	<h1>Catalogo de clientes</h1>
	<table id="tabla" style="border: 1px solid #ddd; text-align: left; border-collapse: collapse; width: 100%;" >
		<tr >
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">ID</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Usuario</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Nombre</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Correo</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Tipo de pago</th>
			<th style="border: 1px solid #ddd; text-align: left; padding: 15px;">Rol</th>
		</tr>
		<?php
			$query=$mysqli->query("SELECT * FROM users");
			while($result=mysqli_fetch_array($query)){
		?>
			<tr>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['id_user']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['username']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['name']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['mail']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['pago']?></td>
				<td style="border: 1px solid #ddd; text-align: left; padding: 15px;"><?=$result['role']?></td>
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


