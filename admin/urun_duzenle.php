<?php include 'header.php';

require_once 'sidebar.php';


$urun=$baglanti->prepare("SELECT * FROM  urun where urun_id=:urun_id");
$urun->execute(array(

'urun_id'=>$_GET['id']
));
$urunal=$urun->fetch(PDO::FETCH_ASSOC);

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <section class="content">
    <div class="container-fluid">

      <div class="row">

        <div class="card card-primary col-md-12">
          <div class="card-header">
            <h3 class="card-title">Ürünler </h3>         </div> <?php 

            if (@$_GET['yuklenme']=="basarili") { ?>
              <h6 style="color:green">Değişiklikler Kaydedildi.</h6>
            <?php } 

            elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
              <h6 style="color:red">Değişiklikler Kaydedilemedi.</h6><?php }
              elseif(@$_GET['yuklenme']=="kullanicivar"){ ?>
                <h6 style="color:red">(Bu kullanÄ±cÄ± kayÄ±tlÄ±)</h6>

              <?php }   ?>

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" enctype="multipart/form-data" >
                <div class="card-body">

                  <div class="form-group">
                    <label>Ürün Kategorisi</label>
                    <select name="urunkategori" class="form-control select2" style="width: 100%;">
              
  <?php  
  $katid=$urunal['kategori_id'];
                  $kategori=$baglanti->prepare("SELECT * FROM  kategori  order by kategori_id ASC");
                  $kategori->execute();
                  while ($kategorial=$kategori->fetch(PDO::FETCH_ASSOC)) { 

$kategoriid=$kategorial['kategori_id'];
#veritabanÄ±ndaki kategori

                    ?>
                      <option <?php if ($katid==$kategoriid) {
                        echo "selected";
                      } ?> value="<?php echo $kategoriid ?>"><?php echo $kategorial['kategori_adi'];  ?></option>
<?php } ?>
                    </select>
                  </div>


 <div class="form-group">
                    <label for="exampleInputEmail1">Ürün resim</label>
                 <img style="width: 200px" src="resimler/urun/<?php echo $urunal['urun_resim']; ?>">
                  </div>

  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Resmi</label>
                    <input  name="urunresim" type="file" class="form-control"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Başlığı</label>
                    <input  value="<?php echo $urunal['urun_baslik'] ?>" name="urunbaslik" type="text" class="form-control"  placeholder="LÃ¼tfen  kullanÄ±cÄ± adÄ±nÄ± giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Adı</label>
                    <input  value="<?php echo $urunal['urun_adi'] ?>" name="urunadi" type="text" class="form-control"  placeholder="LÃ¼tfen  kullanÄ±cÄ± adÄ±nÄ± giriniz.">
                  </div>
           <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
           <div class="form-group">
                    <label for="exampleInputPassword1">Yazar Adı</label>
                    <input  value="<?php echo $urunal['urun_yazar'] ?>" name="urunyazar" type="text" class="form-control"  placeholder="LÃ¼tfen ÅŸifrenizi giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Sıra</label>
                    <input  value="<?php echo $urunal['urun_sira'] ?>" name="urunsira" type="text" class="form-control"  placeholder="LÃ¼tfen ÅŸifrenizi giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Fiyat</label>
                    <input value="<?php echo $urunal['urun_fiyat'] ?>"  name="urunfiyat" type="text" class="form-control"  placeholder="LÃ¼tfen ÅŸifrenizi giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Adet</label>
                    <input value="<?php echo $urunal['urun_adet'] ?>"  name="urunadet" type="text" class="form-control"  placeholder="LÃ¼tfen ÅŸifrenizi giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürün Anahtar Kelime</label>
                    <input value="<?php echo $urunal['urun_etiket'] ?>"  name="urunanahtar" type="text" class="form-control"  placeholder="LÃ¼tfen ÅŸifrenizi giriniz.">
                  </div>
                  <div class="form-group">
                    <label>Ürün Durum</label>
                    <select name="urundurum" class="form-control select2" style="width: 100%;">
                      <option <?php if ($urunal['urun_durum']=="1") { echo "selected";  }?> value="1" selected="selected">Aktif</option>
                      <option <?php if ($urunal['urun_durum']=="0") {  echo "selected"; }?> value="0">Pasif</option>

                    </select>
                  </div>

<input type="hidden" name="id" value="<?php echo $urunal['urun_id'] ?>">
  
     <input type="hidden" name="eskiresim" value="<?php echo $urunal['urun_resim'] ?>">             <div class="form-group">
                    <label>Öne Çıkar</label>
                    <select name="urunonecikar" class="form-control select2" style="width: 100%;">
                      <option <?php if ($urunal['onecikan']=="1") {
                     echo "selected";
                      } ?> value="1" selected="selected">Öne Çıkar</option>
                      <option <?php if ($urunal['onecikan']=="0") {
                       echo "selected";
                      } ?> value="0">Öne Çıkarma</option>

                    </select>
                  </div>
                  <div class="card-footer">
                    <button name="urunduzenle" type="submit" class="btn btn-primary">Kaydet</button>
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