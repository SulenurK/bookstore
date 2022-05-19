<?php require_once 'header.php';


$urun=$baglanti->prepare("SELECT * FROM  urun where urun_id=:urun_id  order by urun_sira ASC");
$urun->execute(array(
  'urun_id'=>$_GET['urun_id']


));
$urunal=$urun->fetch(PDO::FETCH_ASSOC);

$katsid=$urunal['kategori_id'];
?>


<title><?php echo $urunal['urun_adi'] ?></title>
  <meta name="keywords" content="<?php echo $urunal['urun_etiket'] ?>">
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
             <!-- Product Details Left -->
             <div class="product-details-left">
                <div class="product-details-thumbs slider-thumbs-1">
            <div class="img-responsive img-center"><img src="admin/resimler/urun/<?php echo $urunal['urun_resim'] ?>" alt="product image thumb"></div>
        </div>
    </div>
    <!--// Product Details Left -->
</div>
<div class="col-lg-7 col-md-6">
         
     <i style="color: green"><?php if($_GET['yuklenme']=='basarili'){ ?>
     yorum kaydedildi</i> <?php } elseif($_GET['yuklenme']=='basarisiz'){ ?>yorum kaydedilemedidi</i> <?php }
     ?>
    <div class="product-details-view-content sp-normal-content pt-60">
        <div class="product-info">

            <h2><?php echo $urunal['urun_adi'] ?></h2>


            <div class="price-box pt-20">
                <span class="new-price new-price-2"><?php echo $urunal['urun_fiyat'] ?>₺</span>
            </div>
            <div class="product-desc">
                <p>
                    <span><?php echo $urunal['urun_yazar'] ?>
                 </span>
            </p>
        </div>
        <div class="single-add-to-cart">
            <form action="islem" method="post" class="cart-quantity">
                <div class="quantity">
                    <label>Adet</label>
                    <div class="cart-plus-minus">
                        <input name="adet" class="cart-plus-minus-box" value="1" type="text">
                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                    </div>
                </div>
                <input type="hidden" name="urunid" value="<?php echo $urunal['urun_id'] ?>">
                <button name="sepeteekle" class="add-to-cart" type="submit">Sepete ekle</button>
            </form>
        </div>
    </div>
</div>
</div> 
</div>
</div>
</div>
<!-- content-wraper end -->
<!-- Begin Product Area -->
<!-- Product Area End Here -->
<!-- Begin Li's Laptop Product Area -->
<section class="product-area li-laptop-product pt-30 pb-50">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Benzer ürünler:</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">

                      <?php  
                      $urun=$baglanti->prepare("SELECT * FROM  urun where kategori_id=:kategori_id and urun_durum=:urun_durum order by urun_sira ASC");
                      $urun->execute(array(
                          'kategori_id'=>$katsid,
                          'urun_durum'=>1

                      ));
                      while ($urunal=$urun->fetch(PDO::FETCH_ASSOC)) { ?>


                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="urun-detay-<?=seolink($urunal['urun_baslik']).'-'.$urunal['urun_id'] ?>">
                                        <img src="admin/resimler/urun/<?php echo $urunal['urun_resim'] ?>" alt="Li's Product Image">
                                    </a>
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">

                                        <h4><a class="product_name" href="urun-detay-<?=seolink($urunal['urun_baslik']).'-'.$urunal['urun_id'] ?>"><?php echo $urunal['urun_adi'] ?></a></h4>
                                        <div class="price-box">
                                            <span class="new-price new-price-2"><?php echo $urunal['urun_fiyat'] ?></span>
                                        </div>
                                    </div>
                                            <div class="add-actions">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="urun-detay-<?=seolink($urunal['urun_adi']).'-'.$urunal['urun_id'] ?>">Detaya git</a></li>


                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>

                            <?php } ?>

                        </div>
                    </div>
                </div>
                <!-- Li's Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Li's Laptop Product Area End Here -->
 <?php require_once 'footer.php'; ?>