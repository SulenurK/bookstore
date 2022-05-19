<?php
require_once 'header.php'; 
?>
   <title>Hakkımızda</title> 
            <!-- Header Area End Here -->
            <!-- about wrapper start -->
            <div class="about-us-wrapper pt-60 pb-40">
                <div class="container">
                    <div class="row">
                        <!-- About Text Start -->
                        <div class="col-lg-6 order-last order-lg-first">
                            <div class="about-text-wrap">
                                <h2><span><?php echo $hakkimizdaal['hakkimizda_baslik'] ?></span></h2>
                                <p><?php echo $hakkimizdaal['hakkimizda_detay'] ?></p>
                            </div>
                        </div>
                        <!-- About Text End -->
                        <!-- About Image Start -->
                        <div class="col-lg-5 col-md-10">
                            <div class="about-image-wrap">
                                <img class="img-full" src="admin/resimler/hakkimizda/<?php echo $hakkimizdaal['hakkimizda_resim'] ?>" alt="About Us" />
                            </div>
                        </div>
                        <!-- About Image End -->
                    </div>
                </div>
            </div>
            <!-- about wrapper end -->
            <!-- Begin Footer Area -->

<?php
require_once 'footer.php'; 
?>