<?php require_once 'header.php'; 
require_once 'sidebar.php'?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
             <?php 

if (@$_GET['yuklenme']=="basarili") { ?>
<h6 style="color:green">Değişiklikler Kaydedildi</h6>
<?php }
elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
<h6 style="color:red">Değişiklikler kaydedilemedi</h6><?php }
elseif(@$_GET['yuklenme']=="kullanicivar"){ ?>
<h6 style="color:red">Bu kullanıcı kayıtlı</h6>
              <?php }   ?>
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Abone Tablosu</h3>
              </div>

              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Abone Email</th>
                      <th>Sil</th>
                     </tr>
                  </thead>
                  <tbody>
                   
                  <?php  
                  $abone=$baglanti->prepare("SELECT * FROM  abone");
                  $abone->execute();
                  while ($aboneal=$abone->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td><?php echo $aboneal['abone_email'] ?></td>
                     
                      </span></td>
                     
                      <td><a href="islem/islem.php?abonesil&id=<?php echo $aboneal['abone_id'] ?>"><button type="submit" class="btn btn-danger">Sil</button></a></td>
                    </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>