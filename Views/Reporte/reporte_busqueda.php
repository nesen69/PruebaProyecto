<?php 
headerAdmin($data); 
$busqueda="";
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
        <!-- <?php   dep($data['busquedaa']); ?> -->
        <div class="row justify-content-between mb-3">
            <div class="row ml-3" >
                <form action="<?= base_url(); ?>/reporte/export" method="post" id="formulario_x">         
                    <input type="hidden" id="test" name="test">
                </form>
                <form action="<?= base_url(); ?>/reporte/reporte_busqueda" method="GET" class="">
                    <input class="form-control" type="text" placeholder="Buscar..." aria-label="Search" name="busqueda" id="busqueda" value="<?php echo $busqueda;?>">                     
                </form>
            </div>
            <div class="row mr-3">
                <?php if(!empty($_SESSION['permisos'][1]['r'])){ ?>
                    <button class="dt-button buttons-excel buttons-html5 btn btn-success botonx " tabindex="0" aria-controls="" type="button" title="Exportar a Excel"><span><i class="fas fa-file-excel" aria-hidden="true"></i> Exportar</span></button>
                <?php } ?>
            </div>            
        </div> 
        <div class="tile-body">
          <div class="table-responsive " id="print">
            <table class="table table-hover table-bordered" id="tableReporte">
              <thead>
                <tr class="stext-113 cl2">
                  <th>ID</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cedula</th>
                  <th>Categoria</th>
                  <th>Nombre del producto</th>
                  <th>Fecha</th>
                  <th>Cupos</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                    $arrData = $data['arreglo'];
                    $lista = 1;
                    for ($i=0; $i <count($arrData); $i++) {
                    
                    $cont = 1;    
                        do{           
                ?>
                <tr>
                <td><?= $lista; ?></td>
                <td><?= $arrData[$i]['nombres'] ?></td>
                <td><?= $arrData[$i]['apellidos'] ?></td>
                <td><?= $arrData[$i]['identificacion'] ?></td>
                <td><?= $arrData[$i]['nombrecat'] ?></td>
                <td><?= $arrData[$i]['nombrepro'] ?></td>
                <td><?= $arrData[$i]['fecha'] ?></td>
                <td><?php 
                        if ($arrData[$i]['cantidad'] == 1) {
                            echo $cont;
                        }else{
                            echo $cont." de ".$arrData[$i]['cantidad'];
                        }
                    ?></td>
                </tr>
                <?php 
                        $lista++;
                        $cont++;
                        }while($arrData[$i]['cantidad'] >= $cont);
                } ?>

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>

<?php footerAdmin($data); ?>