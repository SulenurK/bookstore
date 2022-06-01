<?php require_once 'header.php' ?>

<div class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Banner Area -->
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                       
<?php
if ($_POST['aranacakkelime']=="") {
?> <h5> <?php  echo "No Result Found" ?> </h5> <?php } 

else
{
$kelime = trim($_POST['aranacakkelime']);

$urun=$baglanti->prepare("SELECT * from urun where urun_adi like '%$kelime%' OR
    urun_baslik like '%$kelime%' or
    urun_yazar like '%$kelime%' or
    urun_etiket like '%$kelime%'
 order by urun_id");

$urun->execute(array());
$urunsayisi=$urun->rowCount();
?> 


    <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
 <?php    if($urunsayisi>0) {                                          
   
               
                    while ($urunal=$urun->fetch(PDO::FETCH_ASSOC)) { 

                        ?>

                                                <div class="col-lg-3 col-md-4 col-sm-6 mt-40">
                                                    <!-- single-product-wrap start -->
                                                    <div class="single-product-wrap">
                                                        <div class="product-image">
                                                            <a href="urun-detay-<?=seolink($urunal['urun_baslik']).'-'.$urunal['urun_id'] ?>">
                                                                <img src="admin/resimler/urun/<?php echo $urunal['urun_resim'] ?>" alt="Li's Product Image">
                                                            </a>
                                                            <span class="sticker">Yeni</span>
                                                        </div>
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                      <a href="urun-detay-<?=seolink($urunal['urun_baslik']).'-'.$urunal['urun_id'] ?>"><?php echo $urunal['urun_yazar'] ?></a>
                                                                    </h5>
                                                                    
                                                                </div>
                                                                <h4><a href="urun-detay-<?=seolink($urunal['urun_baslik']).'-'.$urunal['urun_id'] ?>"><?php echo $urunal['urun_adi'] ?></a></h4>
                                                                <div class="price-box">
                                                                    <span class="new-price"><?php echo $urunal['urun_fiyat'] ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="add-actions">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart active"><a href="urun-detay-<?=seolink($urunal['urun_baslik']).'-'.$urunal['urun_id'] ?>">Detaya Git</a></li>
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
                                   
                                    <div class="paginatoin-area">
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6">
                                                <p style="color: black;"><?php echo $urunsayisi ?> adet ürün bulundu.</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                            <?php 
}

else{
    ?> <h5> <?php  echo "No Result Found" ?> </h5> <?php 
}


}

 ?>
                                          

                        </div>
                    </div>
                </div>
            </div>

<?php require_once 'footer.php' ?>
