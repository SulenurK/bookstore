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
  $katid=$_GET['katid'];
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
                    <label for="exampleInputEmail1">Ürünler Resim</label>
                    <input  name="urunresim" type="file" class="form-control"  >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Başlık</label>
                    <input  name="urunbaslik" type="text" class="form-control"  placeholder="Lütfen ürün adını giriniz.">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Ürün Adı</label>
                    <input  name="urunadi" type="text" class="form-control"  placeholder="Lütfen ürün adını giriniz.">
                  </div>

          <div class="form-group">
                    <label for="exampleInputEmail1">Yazar Adı</label>
                    <input  name="urunyazar" type="text" class="form-control"  placeholder="Lütfer yazar adını giriniz.">
                    <input type="hidden" name="katsid" value="<?php echo $_GET['katid'] ?>">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürünler Sıra</label>
                    <input  name="urunsira" type="text" class="form-control"  placeholder="Lütfer ürün sırasını giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Ürünler fiyat</label>
                    <input  name="urunfiyat" type="text" class="form-control"  placeholder="Lütfen ürün fiyatını giriniz.">
                  </div>
                   <div class="form-group">
                    <label for="exampleInputPassword1">Ürünler adet</label>
                    <input  name="urunadet" type="text" class="form-control"  placeholder="Lütfen ürün adedini giriniz.">
                  </div>
                       <div class="form-group">
                    <label for="exampleInputPassword1">Ürünler anahtar kelime</label>
                    <input  name="urunanahtar" type="text" class="form-control"  placeholder="Lütfen anahtar kelimeleri giriniz.">
                  </div>
                  <div class="form-group">
                    <label>Ürünler durum</label>
                    <select name="urundurum" class="form-control select2" style="width: 100%;">
                      <option value="1" selected="selected">Aktif</option>
                      <option value="0">Pasif</option>

                    </select>
                  </div>
  
                  <div class="form-group">
                    <label>Öne Çıkar</label>
                    <select name="urunonecikar" class="form-control select2" style="width: 100%;">
                      <option value="1" selected="selected">Öne Çıkar</option>
                      <option value="0">Öne Çıkarma</option>

                    </select>
                  </div>
                  <div class="card-footer">
                    <button name="urunkaydet" type="submit" class="btn btn-primary">Kaydet</button>
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