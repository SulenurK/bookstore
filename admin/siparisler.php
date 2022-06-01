<?php include 'header.php';

require_once 'sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <?php 

        if (@$_GET['yuklenme']=="basarili") { ?>
          <h6 style="color:green">Değişiklikler Kaydedildi</h6>
        <?php }
        elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
          <h6 style="color:red">Değişiklikler Kaydedilemedi</h6><?php }

          ?>

          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Siparis Tablosu</h3>
              </div>
              <!-- /.card-header -->   
              <div class="card-body table-responsive p-0">

                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Sipariş ID</th>
                      <th>Kullanıcı ID</th>
                      <th>Ürün ID</th>
                      <th>Siparis Zaman</th>
                      <th>Ürün Adet</th>
                      <th>Ürün Fiyat</th>
                      <th>Toplam Fiyat</th>
                      <th>Ödeme Türü</th>
                      <th>Onayla</th>
                      <th>Reddet</th>

                    </tr>
                  </thead>
                  <tbody>
                    <?php  
                   
                    $siparis=$baglanti->prepare("SELECT * FROM  siparisler  order by siparis_id DESC");
                   
                    $siparis->execute();
                   
                    while ($siparisal=$siparis->fetch(PDO::FETCH_ASSOC)) { ?>
                      <tr>
                         <td><?php echo $siparisal['siparis_id']?></td>
                        <td><?php echo $siparisal['kullanici_id']?></td>
                        <td><?php echo $siparisal['urun_id'] ?></td>
                        <td><?php echo $siparisal['siparis_zaman'] ?></td>
                        <td><?php echo $siparisal['urun_adet'] ?></td>
                         <td><?php echo $siparisal['urun_fiyat'] ?></td>
                          <td><?php echo $siparisal['toplam_fiyat'] ?></td>
                      <td><span class="tag tag-success">
                          <?php if ($siparisal['odeme_turu']=="1") {
                            echo "Kapıda Ödeme";
                          }elseif($siparisal['odeme_turu']=="0"){
                            echo "Kartla Ödeme";
                          } ?>

                        </span></td>
                        
                        <?php if($siparisal['siparis_onay']==0){

                         ?>

                        <td><a href="islem/islem?siparisonayla&id=<?php echo $siparisal['siparis_id'] ?>"><button type="submit" class="btn btn-info">Onayla</button></a></td>
                  
                        <td><a href="islem/islem?siparisreddet&id=<?php echo $siparisal['siparis_id'] ?>"><button type="submit" class="btn btn-danger">Reddet</button></a></td>
                     <?php  } ?>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once 'footer.php'; ?>