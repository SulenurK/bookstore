<?php 
 require_once 'header.php'
?>
             <title>Alışveriş Sepeti</title> 
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">

                            <?php if(@$_GET['durum']=="eklendi") { ?>
                                <b style="color:green">Ürününüz başarıyla eklendi</b>
                            <?php } ?>
                            <form action="islem" method="post">
                                <input type="hidden" name="toplamfiyat" value="<?php echo $_GET['toplamfiyat'] ?>">
                                <input type="hidden" name="kadi" value="<?php echo $kullanicial['kullanici_id'] ?>">

                                Toplam ödenecek tutar:<?php echo $_GET['toplamfiyat'] ?> ₺
                                     <div class="row">
                                    <div class="col-md-5 ml-auto">
                             <select name="odeme">
                                 
                                 <option value="1">Kapıda Ödeme</option>
                                 <option value="0">Kartla Ödeme</option>
                             </select>
                           
                                        <br><br>
                                           
                                            <button name="alisverisbitir" type="submit" class="btn btn-info">Alışverişi Tamamla></button>
                                        
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