<?php 
    headerAdmin($data);
    getModal('modalMensaje',$data);
?>
  <main class="app-content">    
      <div class="app-title">
        <div class="">
            <h1 class="ltext-105 cl2 p-t-19 p-b-43 font-weight-bold"><i class="fas fa-envelope"></i> <?= $data['page_title']; ?></h1>
            <p class="stext-113 cl3 p-r-40 p-b-11"><?= FRASE ?></p>            
        </div>

      </div>
        <div class="row">
            <div class="col-md-12">
              <div class="tile">
                <div class="tile-body">
                  <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="tableContactos_admin">
                      <thead>
                        <tr class="stext-113 cl2">
                          <th>ID</th>
                          <th>Nombre</th>
                          <th>Email</th>
                          <th>Fecha</th>
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
    