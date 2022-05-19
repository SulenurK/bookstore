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
                <h3 class="card-title">Kategori Tablosu</h3>

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
              <a href="kategori_ekle"><button type="submit" class="btn btn-success">Yeni Kategori Ekle</button></a>
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Kategori Numara</th>
                      <th>Kategori Adı</th>
                      <th>Kategori Sıra</th>
                      <th>Kategori Durum</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                      <th>Ürünlere Git</th>
                    </tr>
                  </thead>
                  <tbody>
                   
                  <?php  
                  $kategori=$baglanti->prepare("SELECT * FROM  kategori  order by kategori_sira ASC");
                  $kategori->execute();
                  while ($kategorial=$kategori->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                      <td><?php echo $kategorial['kategori_id'] ?></td>
                      <td><?php echo $kategorial['kategori_adi'] ?></td>
                      <td><?php echo $kategorial['kategori_sira'] ?></td>
                      <td><span class="tag tag-success">
                        <?php if ($kategorial['kategori_durum']=="1") {
                          echo "Aktif";
                        }elseif($kategorial['kategori_durum']=="0"){
                          echo "Pasif";
                        } ?>
                        
                      </span></td>
                      <td><a href="kategori_duzenle?id=<?php echo $kategorial['kategori_id'] ?>"><button type="submit" class="btn btn-info">Düzenle</button></a></td>
                      <td><a href="islem/islem.php?kategorisil&id=<?php echo $kategorial['kategori_id'] ?>"><button type="submit" class="btn btn-danger">Sil</button></a></td>
                       <td><a href="urun.php?katid=<?php echo $kategorial['kategori_id'] ?>">
                        <button type="submit" class="btn btn-success">Git</button></a></td>
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