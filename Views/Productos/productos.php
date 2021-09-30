<?php 
headerAdmin($data); 
getModal('modalProductos',$data);
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1 class="ltext-105 cl2 p-t-19 p-b-43 font-weight-bold"><i class="fa fa-archive"></i> <?= $data['page_title']; ?></h1>
      <p class="stext-113 cl3 p-r-40 p-b-11"><?= FRASE ?></p>
    </div>
    <?php if($_SESSION['permisosMod']['w']){ ?>
      <button class="btn btn-primary" type="button" onclick="openModal();" ><i class="fas fa-plus-circle"></i> Nuevo producto</button>
    <?php } ?> 
        
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
                <table class="table table-hover table-bordered" id="tableProductos">
                  <thead>
                    <tr class="stext-113 cl2">
                      <th>ID</th>
                      <th>Nombre del producto</th>
                      <th>Fecha del sorteo</th>
                      <th>Código</th>
                      <th>Stock</th>
                      <th>Precios</th>
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
    