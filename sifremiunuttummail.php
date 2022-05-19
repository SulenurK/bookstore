<?php 

require_once 'admin/islem/baglanti.php';

if (isset($_POST['sifremiunuttum'])) {


$kadi=$_POST['kadi'];


 $kullanicisor=$baglanti->prepare("SELECT * from kullanici where kullanici_adi=:kullanici_adi  and kullanici_yetki=:kullanici_yetki ");
 $kullanicisor->execute(array(
'kullanici_adi'=>$kadi,
'kullanici_yetki'=>1
 ));
$kullanicial=$kullanicisor->fetch(PDO::FETCH_ASSOC);
$var=$kullanicisor->rowCount();

if ($var=="0") {
	echo "Kullanıcı bulunamadı";
}
else{
echo "Mail işlemleri başlatıldı";	

}

}

?>