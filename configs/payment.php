<?php
$cliente=$_SESSION['id_user'];

$monto1 = $mysqli -> query("SELECT * FROM compra WHERE id_user = '$cliente' ORDER BY month DESC limit 1");
$r1=mysqli_fetch_array($monto1);
    $monto = $r1['monto'];
    $query2 = $mysqli->query("SELECT * FROM users WHERE id_user = '$cliente'");
    $r2=mysqli_fetch_array($query2);
    $CardHolder=$r2['CardHolder'];
    $CardNumber = $r2['CardNumber'];
    $CVV = $r2['CVV'];
    ?>


<v-container>
    <v-layout align-center justify-center row fill-height>
        <v-card class="mb-5">
        <v-card-title class="teal white--text">Datos de la compra</v-card-title>
        <form method="POST" action="http://bankfcfm.herokuapp.com/transfer" target="_blank">
            <table>
                <tr>
                    <td><label ></label></td>
                    <td><input name="account_number" type="hidden" value="1123741323"></td>
                </tr>
                
                <tr>
                    <!-- Estos son los datos de la tarjeta del usuario que pagara -->
                    <td><label>Cardholder</label></td>
                    <td><input name="card_name"  type="hidden" value="<?=$CardHolder?>"><?=$CardHolder?></td>
                </tr>
                
                <tr>
                    <td><label>Card Number</label></td>
                    <td><input name="card_number"  type="hidden" value="<?=$CardNumber?>"><?=$CardNumber?></td>
                </tr>
                
                <tr>
                    <td><label>CVV</label></td>
                    <td><input name="cvv" type="hidden"  value="<?=$CVV?>"><?=$CVV?></td>
                </tr>
                
                <tr>
                    <td><label>Total Amount</label></td>
                    <td><input name="amount" type="hidden"  value="<?=$monto?>"><?=$monto?></td>
                </tr>
                
                <tr>
           
                    <td><label>Description</label></td>
                    <td><input name="description" type="hidden"  value="Pasteleria">Pasteleria</td>
                </tr>
                
                <tr>
                    <td><label></label>
                    <td><input name="transfer_type"   type="hidden" value="payment" ></input>
                </tr>
                <tr>
                    <td><label></label>
                    <td><v-btn class="orange" type="submit" value="Pay">Pagar</v-btn></td>
                </tr>
            </table>
        </form>
                        <a href="?p=principal">Volver a la pantalla principal</a>
        </v-card>
</v-layout>
</v-container>
<?php
?>