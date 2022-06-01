<?php include 'header.php';

require_once 'sidebar.php';

$kullanici=$baglanti->prepare("SELECT * FROM  kullanici where kullanici_id=:kullanici_id");
$kullanici->execute(array(

'kullanici_id'=>$_GET['id']
));
$kullanicial=$kullanici->fetch(PDO::FETCH_ASSOC);
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
    
 
<div class="card card-primary col-md-12">
              <div class="card-header">
                <h3 class="card-title">Kullanıcılar </h3>         </div> <?php 

if (@$_GET['yuklenme']=="basarili") { ?>
<h6 style="color:green">Değişiklikler Kaydedildi</h6>
<?php }
elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
<h6 style="color:red">Değişiklikler kaydedilemedi</h6><?php }
elseif(@$_GET['yuklenme']=="kullanicivar"){ ?>
<h6 style="color:red">Bu kullanıcı kayıtlı</h6>
              <?php }   ?>
     
              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data" >
                <div class="card-body">
                 
              
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kullanıcı Adı</label>
                    <input value="<?php echo $kullanicial['kullanici_adi'] ?>"  name="adi" type="text" class="form-control"  placeholder="Kullanıcı adını giriniz.">
                  </div>
             <input type="hidden" name="kullaniciid" value="<?php echo $kullanicial['kullanici_id'] ?>">
                       <div class="form-group">
                    <label for="exampleInputPassword1">Kullanıcı AdSoyad</label>
                    <input value="<?php echo $kullanicial['kullanici_adsoyad'] ?>" name="adsoyad" type="text" class="form-control"  placeholder="Kullanici AdSoyadı giriniz.">
                  </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Kullanıcı Adres</label>
                    <input value="<?php echo $kullanicial['kullanici_adres'] ?>" name="adres" type="text" class="form-control"  placeholder="Kullanıcı adresini giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kullanıcı İl</label>
                    <input value="<?php echo $kullanicial['kullanici_il'] ?>" name="sehir" type="text" class="form-control"  placeholder="Kullanıcı ilini giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kullanıcı İlçe</label>
                    <input value="<?php echo $kullanicial['kullanici_ilce'] ?>" name="ilce" type="text" class="form-control"  placeholder="Kullanıcı ilçe giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kullanıcı Telefon Numarası</label>
                    <input value="<?php echo $kullanicial['kullanici_telno'] ?>" name="telefon" type="text" class="form-control"  placeholder="Kullanıcı telefon numarasını giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Kullanıcı EMail</label>
                    <input value="<?php echo $kullanicial['kullanici_mail'] ?>" name="email" type="text" class="form-control"  placeholder="Kullanıcı e-mail adresini giriniz.">
                  </div>

                <div class="card-footer">
                  <button name="kullaniciduzenle" type="submit" class="btn btn-primary">Kaydet</button>
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
 <?php require_once 'footer.php'; ?>