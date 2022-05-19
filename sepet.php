<?php 
 require_once 'header.php'
?>
             <title>Sepetim</title>   
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
                                                <th class="li-product-remove">Kaldır</th>
                                                <th class="li-product-thumbnail">Resim</th>
                                                <th class="cart-product-name">Ürün</th>
                                                <th class="li-product-price">Fiyat</th>
                                                <th class="li-product-quantity">Adet</th>
                                                <th class="li-product-subtotal">Toplam</th>
                                            </tr>
                                        </thead>
                                        <tbody>

<?php 

foreach (@$_COOKIE['sepet'] as $key => $value) {


$urun=$baglanti->prepare("SELECT * FROM  urun where urun_id=:urun_id  order by urun_sira ASC");
$urun->execute(array(
  'urun_id'=>$key


));
$urunal=$urun->fetch(PDO::FETCH_ASSOC);


?>


                                            <tr>
                                                <td class="li-product-remove"><a href="islem?sepetsil&id=<?php echo $key ?>"><i class="fa fa-times"></i></a></td>

                                                <td class="li-product-thumbnail"><a href="#"><img width="100px" src="admin/resimler/urun/<?php echo $urunal['urun_resim'] ?>" alt="Li's Product Image"></a></td>
                                                <td class="li-product-name"><a href="#"><?php echo $urunal['urun_adi'] ?><br><br><?php echo $urunal['urun_yazar'] ?></a></td>
                                                <td class="li-product-price"><span class="amount"><?php echo $urunal['urun_fiyat'] ?>₺</span></td>
                                                <td class="quantity">
                                                    <label>Adet</label>
                                                    <div class="cart-plus-minus">
                                                        <input value="<?php echo $value ?>" class="cart-plus-minus-box" value="1" type="text">
                                                        <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount"><?php echo $value*$urunal['urun_fiyat'] ?>₺</span></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
<?php 
$kdv=$sepettoplam*0.18;
$toplamfiyat=$sepettoplam-$kdv

?>



                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                                <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Update cart" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <ul>
                                                 <li>Toplam Fiyat <span><?php echo $toplamfiyat ?>₺</span></li>
                                                  <li>KDV<span><?php echo $kdv ?>₺</span></li>
                                                <li>Sepet Toplam<span><?php echo $sepettoplam ?>₺</span></li>
                                                
                                            </ul>
                                            <a href="alisveris?toplamfiyat=<?php echo $sepettoplam ?>">Alışverişi Tamamla</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

          <?php 
require_once 'footer.php'
      ?>