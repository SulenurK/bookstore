<?php require_once 'header.php'; 
require_once 'sidebar.php';


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page headAer) -->
    

    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="card card-primary col-md-12">
              <div class="card-header">
                <h3 class="card-title">Yeni kullanıcı ekle </h3>         </div> 
<?php 

if (@$_GET['yuklenme']=="basarili") { ?>
<h6 style="color:green">Değişiklikler Kaydedildi</h6>
<?php }
elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
<h6 style="color:red">Değişiklikler kaydedilemedi</h6><?php }
elseif(@$_GET['yuklenme']=="kullanicivar"){ ?>
<h6 style="color:red">Bu kullanıcı kayıtlı</h6>
<?php }
                 ?>

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kullanıcı adı</label>
                    <input name="kadi" type="text" class="form-control"  placeholder="Lütfen kullanıcı adını giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kullanıcı şifresi</label>
                    <input name="sifre" type="text" class="form-control"  placeholder="Lütfen şifrenizi giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kullanıcı ad soyad</label>
                    <input name="adsoyad" type="text" class="form-control"  placeholder="Lütfen adınızı ve soyadınızı giriniz.">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="uyekaydet" type="submit" class="btn btn-primary">Kaydet</button>
                </div>
              </form>

            </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php require_once 'footer.php' ?>