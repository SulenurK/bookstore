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
                <h3 class="card-title">İletişim ayarları </h3>         </div> 
<?php 

if (@$_GET['yuklenme']=="basarili") { ?>
<h6 style="color:green">Değişiklikler Kaydedildi</h6>
<?php }
elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
<h6 style="color:red">Değişiklikler kaydedilemedi</h6><?php }

                 ?>

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Facebook</label>
                    <input value="<?php echo $ayaral['facebook'] ?>" name="facebook" type="text" class="form-control"  placeholder="Lütfen sitenizin facebook adresini giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Instagram</label>
                    <input value="<?php echo $ayaral['instagram'] ?>" name="instagram" type="text" class="form-control"  placeholder="Lütfen sitenizin instagram adresini giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Twitter</label>
                    <input value="<?php echo $ayaral['twitter'] ?>" name="twitter" type="text" class="form-control"  placeholder="Lütfen sitenizin twitter giriniz.">
                  </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="sosyalmedyakaydet" type="submit" class="btn btn-primary">Kaydet</button>
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