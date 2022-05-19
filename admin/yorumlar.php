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
                <h3 class="card-title">Yorum Tablosu</h3>

                <div class="card-tools">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                    <div class="input-group-append">
                      <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                    </div>
                  </div>
                </div>
              </div>

              <!-- /.card-header -->
             
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      
                      <th>Yorum Zaman</th>
                      <th>Yorum Detay</th>
                      <th>Ürün ID</th>
                      <th>Kullanıcı ID</th>
                      <th>Yorum Numara</th>
                       <th>Onay Durumu</th>
                      <th>Onayla</th>
                      <th>Sil</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                   
                  <?php  
                  $yorum=$baglanti->prepare("SELECT * FROM  yorum  order by yorum_id ASC");
                  $yorum->execute();
                  while ($yorumal=$yorum->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td><?php echo $yorumal['yorum_zaman'] ?></td>
                      <td><?php echo $yorumal['yorum_detay'] ?></td>
                      <td><?php echo $yorumal['urun_id'] ?></td>
                      <td><?php echo $yorumal['kullanici_id'] ?></td>
                      
                    <form action="islem/islem.php" method="post">
                      <input type="hidden" name="yorumid" value="<?php echo $yorumal['yorum_id'] ?>">
                      <td><button <?php if($yorumal['yorum_onay']==1){
                        echo "disabled";
                      } ?> name="yorumonayla" type="submit" class="btn btn-info">Onayla</button></td>

                    </form>
                      <td><a href="islem/islem.php?yorumsil&id=<?php echo $yorumal['yorum_id'] ?>"><button name="yorumsil" type="submit" class="btn btn-danger">Sil</button></a></td>
                      
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