<?php
require_once 'header.php';

$sayibul=$baglanti->prepare("SELECT * FROM  urun where kategori_id=:kategori_id and urun_durum=:urun_durum");
                    $sayibul->execute(array(
                      'kategori_id'=>$_GET['kategori_id'],
                      'urun_durum'=>1

                    ));

$urunsayisi=$sayibul->rowCount();
$kac=8;

$sayfa=$_GET['sayfa'];
$sayfa1=($sayfa*$kac)-$kac;

  $urun=$baglanti->prepare("SELECT * FROM  urun where kategori_id=:kategori_id and urun_durum=:urun_durum order by urun_id ASC limit $sayfa1, $kac");
                    $urun->execute(array(
                      'kategori_id'=>$_GET['kategori_id'],
                      'urun_durum'=>1

                    ));

                    $sayfasayisi=ceil($urunsayisi/$kac);
?>
        <title>BookStore</title>   
            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <!-- Begin Li's Banner Area -->
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                    <div class="toolbar-amount">
                                        <span>Gösteriliyor 1 to 9</span>
                                    </div>
                                </div>
                                <!-- product-select-box start -->
                                <div class="product-select-box">
                                    <div class="product-short">
                                        <p>Sırala:</p>
                                        <select class="nice-select">
                                            <option value="sales">İsme Göre (A - Z)</option>
                                            <option value="sales">İsme Göre (Z - A)</option>
                                            <option value="rating">Fiyata Göre - Artan</option>
                                            <option value="date">Fiyata Göre - Azalan</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                               
 <?php  
               
                    while ($urunal=$urun->fetch(PDO::FETCH_ASSOC)) { 
$urunsayisi=$urun->rowCount();

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
                                            <div class="col-lg-6 col-md-6">
                                                <ul class="pagination-box">
                                                    <li><a href="?sayfa=<?php echo $sayfa-1 ?>" class="Previous"><i class="fa fa-chevron-left"></i> Geri</a>
                                                    </li>

                                                    <?php $i=1; 
                                                    while($i<=$sayfasayisi) { ?>

                                                    <li class="<?php if($i==$sayfa){echo "active";} ?>"><a href="?sayfa=<?php echo $i ?>"><?php echo $i ?></a></li>
                                                   <?php $i++; } ?>
                                                    <li>
                                                      <a href="?sayfa=<?php echo $sayfa+1 ?>" class="Next"> İleri <i class="fa fa-chevron-right"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->
            <?php 
            require_once 'footer.php'
        ?>