<?php include 'header.php';

require_once 'sidebar.php';


 

$slider=$baglanti->prepare("SELECT * FROM  slider where slider_id=:slider_id");
$slider->execute(array(

'slider_id'=>$_GET['id']
));
$slideral=$slider->fetch(PDO::FETCH_ASSOC);


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">

      <div class="row">





        <div class="card card-primary col-md-12">
          <div class="card-header">
            <h3 class="card-title">Sliderler </h3>         </div> <?php 

            if (@$_GET['yuklenme']=="basarili") { ?>
              <h6 style="color:green">Değişiklikler Kaydedildi</h6>
            <?php }

            elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
              <h6 style="color:red">Değişiklikler Kaydedilemedi</h6><?php }
              elseif(@$_GET['yuklenme']=="kullanicivar"){ ?>
                <h6 style="color:red">Bu slider kayıtlı</h6>


              <?php }   ?>

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data" >
                <div class="card-body">

  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Resim</label>
                    <input  name="slideresim" type="file" class="form-control"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Slider Başlık</label>
                    <input value="<?php echo $slideral['slider_baslik'] ?>"  name="sliderbaslik" type="text" class="form-control"  placeholder="LÃ¼tfen  kullanÄ±cÄ± adÄ±nÄ± giriniz.">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Açıklama</label>
                    <input  value="<?php echo $slideral['slider_aciklama'] ?>"  name="slideraciklama" type="text" class="form-control"  placeholder="LÃ¼tfen ÅŸifrenizi giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Sıra</label>
                    <input value="<?php echo $slideral['slider_sira'] ?>"  name="slidersira" type="text" class="form-control"  placeholder="LÃ¼tfen ÅŸifrenizi giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Link</label>
                    <input value="<?php echo $slideral['slider_link'] ?>"  name="sliderlink" type="text" class="form-control"  placeholder="LÃ¼tfen ÅŸifrenizi giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Slider Buton Adı</label>
                    <input value="<?php echo $slideral['slider_buton'] ?>"  name="sliderbuton" type="text" class="form-control"  placeholder="LÃ¼tfen ÅŸifrenizi giriniz.">
                  </div>
             
             
               
                  <div class="form-group">
                    <label>Slider Durum</label>
                    <select name="sliderdurum" class="form-control select2" style="width: 100%;">
                      <option <?php if ($slideral['slider_durum']=="1") {
                        echo "selected";
                      } ?> value="1" selected="selected">Aktif</option>
                      <option <?php if ($slideral['slider_durum']=="0") {
                      echo "selected";
                      } ?> value="0">Pasif</option>

                    </select>
                  </div>

<input type="hidden" name="id" value="<?php echo $slideral['slider_id'] ?>">
<input type="hidden" name="eskiresim" value="<?php echo $slideral['slider_resim'] ?>">
  
                  <div class="form-group">
                    <label>Slider Banner</label>
                    <select name="sliderbanner" class="form-control select2" style="width: 100%;">
                      <option <?php if ($slideral['slider_banner']=="1") {
                            echo "selected";
                      } ?> value="1" selected="selected">Slider yap</option>
                      <option <?php if ($slideral['slider_banner']=="0") {
                               echo "selected";
                      } ?> value="0">Banner yap</option>

                    </select>
                  </div>
                  <div class="card-footer">
                    <button name="sliderduzenle" type="submit" class="btn btn-primary">Kaydet</button>
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