<?php require_once 'header.php'; 



if ($var==0) { 
 #kullanÄ±cÄ± yoksa
 
    Header("Location: giris?durum=girisyap");
}

?>

   <title>Kullanıcı Bilgileri</title>   
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="Admin/islem/islem.php" method="post" >
                                <div class="login-form">
                                    <h4 class="login-title">Kullanıcı bilgileri <?php if (@$_GET['yuklenme']=="basarisiz") { ?>
                                 <i style="color:red">    Hata bulundu</i>
                                <?php     }elseif (@$_GET['yuklenme']=="basarili") { ?>
                                <i style="color:green">    Başarılı</i>
                              <?php  } ?></h4>
<input type="hidden" name="kullaniciid" value="<?php echo $kullanicial['kullanici_id'] ?>">
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <input type="hidden" name="kullaniciid" value="<?php echo $kullanicial['kullanici_id'] ?>">
                                            <label>Kullanıcı ad soyad*</label>
                                            <input value="<?php echo $kullanicial['kullanici_adsoyad'] ?>" name="adsoyad" required="" class="mb-0" type="text" placeholder="Ad-Soyad giriniz.">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Email</label>
                                            <input value="<?php echo $kullanicial['kullanici_mail'] ?>" name="email" required="" class="mb-0" type="text" placeholder="E-mail giriniz.">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Adres</label>
                                            <input value="<?php echo $kullanicial['kullanici_adres'] ?>" name="adres" required="" class="mb-0" type="text" placeholder="Adres giriniz.">
                                        </div>
                                         <div class="col-12 mb-20">
                                            <label>Şehir</label>
                                            <input value="<?php echo $kullanicial['kullanici_il'] ?>" name="sehir" required="" class="mb-0" type="text" placeholder="Şehir giriniz.">
                                        </div>
                                            <div class="col-12 mb-20">
                                            <label>İlçe</label>
                                            <input  value="<?php echo $kullanicial['kullanici_ilce'] ?>" name="ilce" required="" class="mb-0" type="text" placeholder="İlçe giriniz.">
                                        </div>
                                          <div class="col-12 mb-20">
                                            <label>Telefon</label>
                                            <input value="<?php echo $kullanicial['kullanici_telno'] ?>" name="telefon" required="" class="mb-0" type="text" placeholder="Telefon giriniz.">
                                        </div>

                                        <div class="col-md-12">
                                            <button name="kullaniciduzenle" class="register-button mt-0">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                    </div>  <a href="cikis"><button style="float:right" class="btn btn-info"><i class="fa fa-sign-out"></i>Çıkış Yap</button></a>
                </div> 
            </div>
          <?php require_once 'footer.php'; ?>