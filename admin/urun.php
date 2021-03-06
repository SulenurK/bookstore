<?php include 'header.php';

require_once 'sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <?php 

        if (@$_GET['yuklenme']=="basarili") { ?>
          <h6 style="color:green">Değişiklikler Kaydedildi.</h6>
        <?php }
        elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
          <h6 style="color:red">Değişiklikler Kaydedilemedi.</h6><?php }
          ?>
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Ürün Tablosu</h3>

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
                  <a href="urun_ekle?katid=<?php echo $_GET['katid'] ?>"><button style="float:right" type="submit" class="btn btn-success">Yeni urun ekle</button></a>
                  <thead>
                    <tr>
                      <th>Ürün Resim</th>
                      <th>Ürün Başlık</th>
                      <th>Ürün Adı</th>
                      <th>Yazar Adı</th>
                      <th>Ürün Sıra</th>
                      <th>Ürün Durum </th>
                      <th>Ürün Fiyat</th>
                      <th>Ürün Adet</th>
                      <th>Düzenle</th>
                      <th>Sil</th>
                      <th></th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                    $urun=$baglanti->prepare("SELECT * FROM  urun where kategori_id=:kategori_id  order by urun_sira ASC");
                    $urun->execute(array(
                      'kategori_id'=>$_GET['katid']

                    ));
                    while ($urunal=$urun->fetch(PDO::FETCH_ASSOC)) { ?>
                      <tr>
                        <td><img style="width:250px" src="resimler/urun/<?php echo $urunal['urun_resim'] ?>"></td>
                        <td><?php echo $urunal['urun_baslik'] ?></td>
                        <td><?php echo $urunal['urun_adi'] ?></td>
                        <td><?php echo $urunal['urun_yazar'] ?></td>
                        <td><?php echo $urunal['urun_sira'] ?></td>
                        <td><?php echo $urunal['urun_durum'] ?></td>
                        <td><?php echo $urunal['urun_fiyat'] ?></td>
                        <td><?php echo $urunal['urun_adet'] ?></td>
                        <td><?php echo $urunal['urun_sira'] ?></td>
                        <td><a href="urun_duzenle?id=<?php echo $urunal['urun_id'] ?>&katid=<?php echo $urunal[
                      'kategori_id'] ?>"><button type="submit" class="btn btn-info">Düzenle</button></a></td>
                      <form action="islem/islem.php" method="post">
                           <input type="hidden" name="id" value="<?php echo $urunal['urun_id'] ?>">
                           <input type="hidden" name="resim" value="<?php echo $urunal['urun_resim'] ?>">
                           <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
                           <td><button name="urunsil" type="submit" class="btn btn-danger">Sil</button></td>
                      </form>
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