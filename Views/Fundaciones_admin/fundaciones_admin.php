<?php 
    headerAdmin($data); 
    getModal('modalFundaciones',$data);

?>
    <main class="app-content">
      <div class="app-title">
        <div>
            <h1 class="ltext-105 cl2 p-t-19 p-b-43 font-weight-bold"><i class="fa fa-wine-glass-alt"></i> <?= $data['page_title']; ?></h1>
            <p class="stext-113 cl3 p-r-40 p-b-11"><?= FRASE ?></p>
        </div>
              <?php if($_SESSION['permisosMod']['w']){ ?>
                <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nueva institución</button>
              <?php } ?> 
      </div>

        <div class="row">
            <div class="col-md-12">
               <!-- <?= dep($data) ?>  -->
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableFundaciones">
                      <thead>
                        <tr class="stext-113 cl2">
                          <th>Nro.</th>
                          <th>Nombre</th>
                          <th>RIF ó C.I.</th>
                          <th>Premio</th>
                          <th>Dirección</th>
                          <th>Estado</th>
                          <th>Opciones</th>
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
    