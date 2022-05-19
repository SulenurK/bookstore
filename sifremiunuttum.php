<?php require_once 'header.php'; ?>
   <title>Şifremi Unuttum</title>   
            <!-- Begin Login Content Area -->
            <div class="page-section mb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-xs-12 col-lg-6 mb-30">
                            <!-- Login Form s-->
                            <form action="sifremiunuttummail.php" method="post" >
                                <div class="login-form">
                                     <h4 class="login-title">Giriş Yap <?php if (@$_GET['durum']=="hata") { ?>
                                 <i style="color:red">    Kullanıcı adı ya da şifre hatalı.</i>
                               <?php     } ?>

<?php if (@$_GET['durum']=="gulegule") { ?>
                                 <i style="color: lightblue;">   Yine Bekleriz</i>
                               <?php     } ?>

<?php if (@$_GET['durum']=="girisyap") { ?>
                                 <i style="color:#FF6347">Lütfen giriş yapınız.</i>
                               <?php     } ?>
                           </h4>

                                    <div class="row">
                                        <div class="col-md-12 col-12 mb-20">
                                            <label>Kullanıcı Adı</label>
                                            <input name="kadi" required="" class="mb-0" type="text" placeholder="Kullanıcı adınızı giriniz.">
                                        </div>
                                        <div class="col-md-12">
                                            <button name="sifremiunuttum" class="register-button mt-0">GÖNDER</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
          <?php require_once 'footer.php'; ?>