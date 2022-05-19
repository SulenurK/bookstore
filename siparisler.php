<?php 
 require_once 'header.php'
?>
             <title>Siparişler</title> 
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <?php if(@$_GET['durum']=="eklendi") { ?>
                                <b style="color:green">Ürününüz başarıyla eklendi</b>
                            <?php } ?>
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-thumbnail">Resim</th>
                                                <th class="cart-product-name">Ürün</th>
                                                <th class="li-product-price">Fiyat</th>
                                                <th class="li-product-quantity">Adet</th>
                                                 <th class="li-product-quantity">Zaman</th>
                                                <th class="li-product-subtotal">Toplam</th>
                                            </tr>
                                        </thead>
                                        <tbody>

<?php 

$siparis=$baglanti->prepare("SELECT * FROM  siparisler where kullanici_id=:kullanici_id");
$siparis->execute(array(
    'kullanici_id'=>$kullanicial['kullanici_id']
));

while($siparisal=$siparis->fetch(PDO::FETCH_ASSOC)){
    $alinanid= $siparisal['urun_id'];
    $urun=$baglanti->prepare("SELECT * FROM  urun where urun_id=:urun_id");
    $urun->execute(array(
        'urun_id'=>$alinanid
        ));
    $urunal=$urun->fetch(PDO::FETCH_ASSOC);
?>


                                            <tr>
                                                <td class="li-product-thumbnail"><a href="#"><img width="100px" src="admin/resimler/urun/<?php echo $urunal['urun_resim'] ?>" alt="Li's Product Image"></a></td>
                                                
                                                <td class="li-product-name"><a href="#"><?php echo $urunal['urun_adi'] ?><br><br><?php echo $urunal['urun_yazar'] ?></a></td>
                                                <td class="li-product-price"><span class="amount"><?php echo $siparisal['urun_fiyat'] ?>₺</span></td>
                                                
                                                <td class="quantity"><label><?php echo $siparisal['urun_adet'] ?></label></td>
                                                
                                                <td class="date"><span ><?php echo $siparisal['siparis_zaman'] ?></span></td>
<?php
$toplam=$siparisal['urun_adet']*$siparisal['urun_fiyat']
?>
                                                <td class="product-subtotal"><span class="amount"><?php echo $toplam ?> ₺</span></td>
                                            </tr>
                                        
                                        </tbody>

<?php } ?>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          <?php 
require_once 'footer.php'
      ?>