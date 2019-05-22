<?php
						if (file_exists("modules/".$p.".php")) {
							include "modules/".$p.".php";
						}else{
							echo "<i>No se ha encontrado el modulo de <b>".$p."</b><br> <a href='./'>Regresar</a></i>";
						}
?>