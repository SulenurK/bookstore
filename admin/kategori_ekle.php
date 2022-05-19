<?php require_once 'header.php'; 
require_once 'sidebar.php';


?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <div class="card card-primary col-md-12">
              <div class="card-header">
                <h3 class="card-title">Kategoriler</h3>         </div> 
<?php 

if (@$_GET['yuklenme']=="basarili") { ?>
<h6 style="color:green">Değişiklikler Kaydedildi</h6>
<?php }
elseif(@$_GET['yuklenme']=="basarisiz"){ ?>
<h6 style="color:red">Değişiklikler kaydedilemedi</h6><?php }
elseif(@$_GET['yuklenme']=="kategorivar"){ ?>
<h6 style="color:red">Bu kategori kayıtlı</h6>
<?php }
                 ?>

              <!-- /.card-header -->
              <!-- form start -->
              <form action="islem/islem.php" method="POST" >
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori adı</label>
                    <input name="katadi" type="text" class="form-control"  placeholder="Lütfen kategori adını giriniz.">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kategori sıra</label>
                    <input name="sira" type="text" class="form-control"  placeholder="Lütfen kategori sıra giriniz.">
                  </div>
                  <div class="form-group">
                  <label>Kategori Durum</label>
                  <select name="durum" class="form-control select2" style="width: 100%;">
                    <option value="1" selected="selected">Aktif</option>
                    <option value="0">Pasif</option>
                  </select>
                </div>
                </div>
                <div class="card-footer">
                  <button name="kategorikaydet" type="submit" class="btn btn-primary">Kaydet</button>
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