<?php include 'header.php';

require_once 'sidebar.php';

$kategori=$baglanti->prepare("SELECT * FROM  kategori where kategori_id=:kategori_id");
$kategori->execute(array(

'kategori_id'=>$_GET['id']
));
$kategorial=$kategori->fetch(PDO::FETCH_ASSOC);
 ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">

    <section class="content">
      <div class="container-fluid">
       
        <div class="row">
    
 
<div class="card card-primary col-md-12">
              <div class="card-header">
                <h3 class="card-title">Kategoriler </h3>         </div> <?php 

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
                    <label for="exampleInputEmail1">Kategori adı</label>
                    <input value="<?php echo $kategorial['kategori_adi'] ?>"  name="katadi" type="text" class="form-control"  placeholder="Kategori adını giriniz.">
                  </div>
             <input type="hidden" name="katid" value="<?php echo $kategorial['kategori_id'] ?>">
                       <div class="form-group">
                    <label for="exampleInputPassword1">Kategori sırası</label>
                    <input value="<?php echo $kategorial['kategori_sira'] ?>" name="sira" type="text" class="form-control"  placeholder="Kategori sırasını giriniz.">
                  </div>
                  <div class="form-group">
                  <label>Kategori durum</label>
                  <select name="durum" class="form-control select2" style="width: 100%;">
                    <option value="1" <?php if ($kategorial['kategori_durum']=="1") { echo 'selected';
                   
                    } ?>>Aktif</option>
                    <option value="0" <?php if ($kategorial['kategori_durum']=="0") { echo 'selected';
                   
                    } ?>>Pasif</option>
                   
                  </select>
                </div>

                <div class="card-footer">
                  <button name="kategoriduzenle" type="submit" class="btn btn-primary">Kaydet</button>
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