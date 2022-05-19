<?php require_once 'header.php'; 
if ($var==0) { 
 #Kullanıcı yoksa
    Header("Location: giris?durum=girisyap");
}

?>
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->

       <form action="islem.php" method="post" >
                                <div class="login-form">
                                    <h4 class="login-title">Şifremi değiştir <?php if (@$_GET['durum']=="ikisifreaynigir") { ?>
                                 <i style="color:red">    Şifreler aynı olmalı.</i>
                                <?php     } elseif (@$_GET['durum']=="sifrefarkli") { ?>
                                <i style="color:red">    Eski şifrenizi yanlış girdiniz.</i>
                  
      <?php     } elseif (@$_GET['durum']=="basarili") { ?>
                                <i style="color:green"> Şifre değişitirme başarılı.</i>
                    
                                    <?php     } elseif (@$_GET['durum']=="basarisiz") { ?>
                                <i style="color:red"> Şifre değişitirme başarısız.</i>
                              <?php  } ?>

                          </h4>
<input type="hidden" name="kullaniciid" value="<?php echo $kullanicial['kullanici_id'] ?>">
                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Eski Şifre*</label>
                                            <input  name="eskisifre" required="" class="mb-0" type="text" placeholder="Eski şifrenizi girin.">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Yeni Şifre</label>
                                            <input minlength="8" name="yenisifre" required="" class="mb-0" type="text" placeholder="Yeni şifrenizi giriniz.">
                                        </div>
                                        <div class="col-12 mb-20">
                                            <label>Yeni Şifre Tekrar</label>
                                            <input minlength="8" name="yenitekrar" required="" class="mb-0" type="text" placeholder="Yeni şifrenizi tekrar  giriniz.">
                                        </div>
                                       
                                       

                                        <div class="col-md-12">
                                            <button name="sifreduzenle" class="register-button mt-0">Kaydet</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                       
                    </div>  <a href="cikis"><button style="float:right" class="btn btn-info"><i class="fa fa-sign-out"></i>Çıkış yap</button></a>
                </div> 
            </div>
          <?php require_once 'footer.php'; ?>