<?php 
headerAdmin($data); 

?>
<main class="app-content">    
  <div class="app-title">
    <div>
      <h1 class="ltext-105 cl2 p-t-19 p-b-43 font-weight-bold"><i class="fas fa-list-ul"></i> <?= $data['page_title']; ?></h1>
      <p class="stext-113 cl3 p-r-40 p-b-11"><?= FRASE ?></p>
    </div>
  </div>
  <div class="row">
    
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableReporte">
              <thead>
                <tr class="stext-113 cl2">
                  <th>ID</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cédula</th>
                  <th>Categoria</th>
                  <th>Nombre del producto</th>
                  <th>Fecha</th>
                  <th>Cupos</th>
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