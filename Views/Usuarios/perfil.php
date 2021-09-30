<?php 
  headerAdmin($data); 
  getModal('modalPerfil',$data);
?>
    <main class="app-content">
      <div class="row user">
        <div class="col-md-12">
          <div class="profile">
            <div class="row align-items-center info">
              <div>
                <!-- <img class="user-img" src="<?= media();?>/images/foto_nestor.jpg"> -->
                <h4><?= $_SESSION['userData']['nombres'].' '.$_SESSION['userData']['apellidos']  ?></h4>
                <p><?= $_SESSION['userData']['nombrerol'] ?></p>
              </div>
            </div>
            <div class="cover-image"></div>
          </div>
        </div>

        <div class="col-md-12">
          <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
              <div class="timeline-post">
                <div class="post-media">
                  <div class="content">
                    <h5>Datos Personales <button class="btn btn-sm btn-info" type="button" onclick="openModalPerfil();"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button> </h5>
                  </div>
                </div>

                <table class="table table-borderer">
                  <tbody>
                    <tr>
                      <td style="width: 150px;">Identificacion: </td>
                      <td> <?= $_SESSION['userData']['identificacion']; ?> </td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Nombres: </td>
                      <td> <?= $_SESSION['userData']['nombres']; ?> </td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Apellidos: </td>
                      <td> <?= $_SESSION['userData']['apellidos']; ?> </td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Telefono: </td>
                      <td> <?= $_SESSION['userData']['telefono']; ?> </td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Email (Usuario): </td>
                      <td> <?= $_SESSION['userData']['email_user']; ?> </td>
                    </tr>
                    <tr>
                      <td style="width: 150px;">Dirección: </td>
                      <td> <?= $_SESSION['userData']['direccion']; ?> </td>
                    </tr>                    
                  </tbody>
                </table>

              </div>
            </div>

          </div>
        </div>
      </div>
    </main>
<?php footerAdmin($data); ?>