<?php require_once 'header.php'; 
require_once 'sidebar.php'?>
 <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Üyeler Tablosu</h3>         </div>
              <!-- /.card-header -->
              <a href="uyeler_ekle"><button type="submit" class="btn btn-success">Yeni Kullanıcı Ekle</button></a>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Kullanıcı Numara</th>
                      <th>Kullanıcı Adı</th>
                      <th>Kayıt Tarihi</th>
                      <th>Yetki</th>
                      <th>Ad-Soyad</th>
                      <th>İl</th>
                      <th>İlçe</th>
                      <th>Telefon</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  <?php  
                  $kullanici=$baglanti->prepare("SELECT * FROM  kullanici  order by kullanici_id ASC");
                  $kullanici->execute();
                  while ($kullanicial=$kullanici->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td><?php echo $kullanicial['kullanici_id'] ?></td>
                      <td><?php echo $kullanicial['kullanici_adi'] ?></td>
                      <td><?php echo $kullanicial['kullanici_zaman'] ?></td>
                      <td><span class="tag tag-success">
                        <?php if ($kullanicial['kullanici_yetki']=="2") {
                          echo "Admin kullanıcısı";
                        }elseif($kullanicial['kullanici_yetki']=="1"){
                          echo "Normal kullanıcı";
                        } ?>
                        
                      </span></td>
                      <td><?php echo $kullanicial['kullanici_adsoyad'] ?></td>
                      <td><?php echo $kullanicial['kullanici_il'] ?></td>
                      <td><?php echo $kullanicial['kullanici_ilce'] ?></td>
                      <td><?php echo $kullanicial['kullanici_telno'] ?></td>
                      <td><a href="uyeler_duzenle?id=<?php echo $kullanicial['kullanici_id'] ?>"><button type="submit" class="btn btn-info">Düzenle</button></a></td>
                      <td><a href="islem/islem.php?kullanicisil&id=<?php echo $kullanicial['kullanici_id'] ?>"><button type="submit" class="btn btn-danger">Sil</button></a></td>
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