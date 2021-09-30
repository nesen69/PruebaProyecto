<?php 
    headerAdmin($data); 
?>
    <div id="divModal"></div>
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1 class="ltext-105 cl2 p-t-19 p-b-43 font-weight-bold"><i class="fa fa-shopping-cart"></i> <?= $data['page_title']; ?></h1>
            <p class="stext-113 cl3 p-r-40 p-b-11"><?= FRASE ?></p>
        </div>

      </div>

        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tablePedidos">
                      <thead>
                        <tr class="stext-113 cl2">
                          <th>ID</th>
                          <th>Nombres</th>
                          <th>Ref. / Transacción</th>
                          <th>Fecha</th>
                          <th>Monto</th>
                          <th>Tipo pago</th>
                          <th>Estado</th>
                          <th>Acciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </main>
<?php footerAdmin($data); ?>
    