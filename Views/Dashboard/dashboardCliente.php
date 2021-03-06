<?php headerAdmin($data); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1 class="ltext-105 cl2 p-t-19 p-b-43 font-weight-bold"><i class="fas fa-chart-pie"></i> <?= $data['page_title']; ?></h1>
          <p class="stext-113 cl3 p-r-40 p-b-11"><?= FRASE ?></p> 
        </div>
      </div>
      <div class="row">

    <?php if(!empty($_SESSION['permisos'][MUSUARIOS]['r'])){ ?>
      <div class="col-md-6 col-lg-3">
        <a href=" <?= base_url() ?>/usuarios " class="linkw">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h3 class="mtext-109 cl2 p-b-16">Usuarios</h3>
              <p><b> <?= $data['usuarios'] ?> </b></p>
            </div>
          </div>
        </a>
      </div>
    <?php } ?>
    <?php if(!empty($_SESSION['permisos'][MCLIENTES]['r'])){ ?>
      <div class="col-md-6 col-lg-3">
        <a href=" <?= base_url() ?>/clientes " class="linkw">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h3 class="mtext-109 cl2 p-b-16">Clientes</h3>
              <p><b><?= $data['clientes'] ?></b></p>
            </div>
          </div>
        </a>
      </div>
    <?php } ?>
    <?php if(!empty($_SESSION['permisos'][MPRODUCTOS]['r'])){ ?>
      <div class="col-md-6 col-lg-3">
        <a href=" <?= base_url() ?>/productos " class="linkw">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-archive fa-3x"></i>
            <div class="info">
              <h3 class="mtext-109 cl2 p-b-16">Productos</h3>
              <p><b><?= $data['productos'] ?></b></p>
            </div>
          </div>
        </a>
      </div>
    <?php } ?>
    <?php if(!empty($_SESSION['permisos'][MPEDIDOS]['r'])){ ?>
      <div class="col-md-6 col-lg-3">
        <a href=" <?= base_url() ?>/pedidos " class="linkw">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-shopping-cart fa-3x"></i>
            <div class="info">
              <h3 class="mtext-109 cl2 p-b-16">Pedidos</h3>
              <p><b><?= $data['pedidos'] ?></b></p>
            </div>
          </div>
        </a>
      </div>
    <?php } ?>
  </div>
      <div class="row">
        <?php if(!empty($_SESSION['permisos'][5]['r'])){ ?>
        <div class="col-md-6">
          <div class="tile">
            <h3 class="tile-title stext-113 cl2">Ultimos Pedidos</h3>
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th class="stext-113 cl2">#</th>
                  <th class="stext-113 cl2">Cliente</th>
                  <th class="stext-113 cl2">Estado</th>
                  <th class="stext-113 cl2 text-right">Monto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    if(count($data['lastOrders']) > 0 ){
                      foreach ($data['lastOrders'] as $pedido) {
                 ?>
                <tr>
                    <td class="stext-113 cl3"><?= $pedido['idpedido'] ?></td>
                    <td class="stext-113 cl3"><?= $pedido['nombre'] ?></td>
                    <td class="stext-113 cl3"><?= $pedido['status'] ?></td>
                    <td class="stext-113 cl3 text-right"><?= SMONEY." ".formatMoney($pedido['monto']) ?></td>
                    <th><a href=" <?= base_url() ?>/pedidos/orden/<?= $pedido['idpedido'] ?> " target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></th>
                  </tr>
                <?php } 
                  } ?>

              </tbody>
            </table>
          </div>
        </div>
        <?php } ?>

        <div class="col-md-6">
          <div class="tile">
            <div class="container-title">
              <h3 class="tile-title stext-113 cl2">??ltimos Productos Disponibles</h3>
              <table class="table table-striped table-sm">
              <thead>
                <tr>
                  <th class="stext-113 cl2">#</th>
                  <th class="stext-113 cl2">Producto</th>
                  <th class="stext-113 cl2">Monto</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    if(count($data['productosTen']) > 0 ){
                      foreach ($data['productosTen'] as $producto) {
                 ?>
                <tr>
                  <td class="stext-113 cl3"><?= $producto['idproducto'] ?></td>
                  <td class="stext-113 cl3"><?= $producto['nombre'] ?></td>
                  <td class="stext-113 cl3"><?= SMONEY. formatMoney($producto['precio']) ?></td>
                  <td class="stext-113 cl3"><a href="<?= base_url() ?>/tienda/producto/<?= $producto['idproducto'].'/'.$producto['ruta'] ?>" target="_blank"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                </tr>
                <?php } 
                  } ?>

              </tbody>
            </table>
              
            </div>
            
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="container-title">
              <h3 class="tile-title stext-113 cl2">Ventas por mes</h3>
              <div class="dflex">
                <input class="date-picker ventasMes" name="ventasMes" placeholder="Mes y A??o">
                <button type="button" class="btnVentasMes btn btn-info btn-sm" onclick="fntSearchVMes()"> <i class="fas fa-search"></i> </button>
              </div>
            </div>
            <div id="graficaMes"></div>
          </div>
        </div>
        
      </div>

    </main>
<?php footerAdmin($data); ?>

<script>

  Highcharts.chart('graficaMes', {
      chart: {
          type: 'line'
      },
      title: {
          text: 'Ventas de <?= $data['ventasMDia']['mes'].' del '.$data['ventasMDia']['anio'] ?>'
      },
      subtitle: {
          text: 'Total Ventas <?= SMONEY.'. '.formatMoney($data['ventasMDia']['total']) ?> '
      },
      xAxis: {
          categories: [
            <?php 
                foreach ($data['ventasMDia']['ventas'] as $dia) {
                  echo $dia['dia'].",";
                }
            ?>
          ]
      },
      yAxis: {
          title: {
              text: ''
          }
      },
      plotOptions: {
          line: {
              dataLabels: {
                  enabled: true
              },
              enableMouseTracking: false
          }
      },
      series: [{
          name: 'Dato',
          data: [
            <?php 
                foreach ($data['ventasMDia']['ventas'] as $dia) {
                  echo $dia['total'].",";
                }
            ?>
          ]
      }]
  });

</script>
    