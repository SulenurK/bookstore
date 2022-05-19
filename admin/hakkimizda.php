<?php include 'header.php';

require_once 'sidebar.php';

 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
    
 
<div class="card card-primary col-md-12">
              <div class="card-header">
                <h3 class="card-title">Hakkımızda ayarları </h3>         </div> <?php 

if (@$_GET['yuklenme']=="basarili") { ?>
<h6 style="color:green">Değişiklikler kaydedildi</h6>
<?php }
elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
<h6 style="color:red">Değişiklikler kaydedilemed</h6><?php }

                 ?>
     
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                        <div class="form-group">
                    <label for="exampleInputPassword1">Resim</label>
                    <img style="width:100px" src="resimler/hakkimizda/<?php echo $hakkimizdaal['hakkimizda_resim'] ?>">
                  </div>
                  <input type="hidden" name="eskiresim" value="<?php echo $hakkimizdaal['hakkimizda_resim'] ?>">
                       <div class="form-group">
                    <label for="exampleInputPassword1">Resim</label>
                    <input  name="resim" type="file" class="form-control"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hakkımızda başlık</label>
                    <input value="<?php echo $hakkimizdaal['hakkimizda_baslik'] ?>" name="baslik" type="text" class="form-control"  placeholder="Lütfen baslik giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Hakkımızda detay</label>
                    <input value="<?php echo $hakkimizdaal['hakkimizda_detay'] ?>" name="detay" type="text" class="form-control"  placeholder="Lütfen detay giriniz.">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button name="hakkimizdakaydet" type="submit" class="btn btn-primary">Kaydet</button>
                </div>
              </form>
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