<?php 
    headerTienda($data); 
?>
<br><br><br>

<div class="jumbotron text-center">
  <h1 class="display-5">¡Gracias por tu compra!</h1>
  <p class="lead">Tu pedido fue procesado con éxito.</p>
  <p>Nro.Orden: <strong><?= $data['orden']; ?></strong></p>

  <?php 
    if(!empty($data['transaccion'])){
  ?>
  <p>Transacción <strong><?= $data['transaccion']; ?></strong></p>

  <?php } else {  ?>
  <hr class="my-4">
  <p>Para concretar el pago realice una <kbd class="font-weight-bold">TRANSFERENCIA</kbd> ó <kbd class="font-weight-bold">PAGO MOVIL</kbd> utilizando los siguientes datos:</p><br>
  <p>Banco Provincial 0108 0105 0092 0028 2028</p>
  <p>A nombre de: <p>Nestor Enrique Ramirez</p>Cédula de identidad: <p>V.- 16.581.374</p></p>
  <p>Celular: <p>0426-570-76-77</p></p><br>
  <p class="alert bg-danger text-white font-weight-bold">NOTA IMPORTANTE: Cuando pague por favor envié el numero de refencia por SMS ó capture al Whatsapp (0426-570-76-77)</p>
  
<?php } ?>

<hr class="my-4">
  <p>Puedes ver el estado de tu pedido en la sección pedidos utilizando tu usuario y contraseña.</p>
  <br>
  <a class="btn btn-primary btn-lg" href="<?= base_url(); ?>" role="button">Continuar</a>
</div>

<?php footerTienda($data); ?>