<?php 
require_once 'header.php';
require_once 'admin/islem/baglanti.php';
$ayar=$baglanti->prepare("SELECT * FROM  ayarlar where id=1");
$ayar->execute();
$ayaral=$ayar->fetch(PDO::FETCH_ASSOC);

$hakkimizda=$baglanti->prepare("SELECT * FROM  hakkimizda where hakkimizda_id=1");
$hakkimizda->execute();
$hakkimizdaal=$hakkimizda->fetch(PDO::FETCH_ASSOC);
?>
            <title>BookStore İletişim</title>   
            <!-- Li's Breadcrumb Area End Here -->     
            <!-- Begin Contact Main Page Area -->
            <div class="contact-main-page mt-60 mb-40 mb-md-40 mb-sm-40 mb-xs-40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5 offset-lg-1 col-md-12 order-1 order-lg-2">
                            <div class="contact-page-side-content">
                                <h3 class="contact-page-title">İletişim</h3>
                                <p class="contact-page-message mb-25">Bize telefon ve e-mail ile 7/24 ulaşabilirsiniz.</p>
                                <div class="single-contact-block">
                                    <h4><i class="fa fa-fax"></i> Adres</h4>
                                    <p><?php echo $ayaral['adres'] ?></p>
                                </div>
                                <div class="single-contact-block">
                                    <h4><i class="fa fa-phone"></i> Telefon</h4>
                                    <p><?php echo $ayaral['telefon'] ?></p>
                                </div>
                                <div class="single-contact-block last-child">
                                    <h4><i class="fa fa-envelope-o"></i> E-mail</h4>
                                    <p><?php echo $ayaral['email'] ?></p>
                                 </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12 order-2 order-lg-1">
                            <div class="contact-form-content pt-sm-55 pt-xs-55">
                                <h3 class="contact-page-title">Bize Mesajınız Mı Var?</h3>
                                <div class="contact-form">
                                    <form  action="mail.php" method="post">
                                        <div class="form-group">
                                            <label>Adınız<span class="required">*</span></label>
                                            <input type="text" name="customerName"required>
                                        </div>
                                        <div class="form-group">
                                            <label>Mail Adresiniz<span class="required">*</span></label>
                                            <input type="email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Konu</label>
                                            <input type="text" name="konu">
                                        </div>
                                        <div class="form-group mb-30">
                                            <label>Mesajınız</label>
                                            <textarea name="mesaj"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" value="submit" id="submit" class="li-btn-3" name="mailgonder">Gönder</button>
                                        </div>
                                    </form>
                                </div>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Contact Main Page Area End Here -->
            <!-- Begin Footer Area -->
           <?php
require_once 'footer.php'
            ?>