<?php
session_start();
require_once 'baglanti.php';

if (isset($_POST['ayarlarikaydet'])) {



	$duzenle=$baglanti->prepare("UPDATE ayarlar SET 



		baslik=:baslik,
		aciklama=:aciklama,
		anahtar=:anahtar

		WHERE id=1

		");


	$update=$duzenle->execute(array(

		'baslik'=>$_POST['baslik'],
		'aciklama'=>$_POST['aciklama'],
		'anahtar'=>$_POST['anahtar']

	));


if ($update) {
	header("Location:../settings.php?yuklenme=basarili");}
else{header("Location:../settings.php?yuklenme=basarisiz");}

}

if (isset($_POST['iletişimkaydet'])) {

	$duzenle=$baglanti->prepare("UPDATE ayarlar SET 

		telefon=:telefon,
		email=:email,
		adres=:adres,
		mesai=:mesai

		WHERE id=1

		");


	$update=$duzenle->execute(array(

		'telefon'=>$_POST['telefon'],
		'email'=>$_POST['email'],
		'adres'=>$_POST['adres'],
		'mesai'=>$_POST['mesai']


	));


if ($update) {
	header("Location:../iletisim.php?yuklenme=basarili");}
else{header("Location:../iletisim.php?yuklenme=basarisiz");}
}

if (isset($_POST['sosyalmedyakaydet'])) {

	$duzenle=$baglanti->prepare("UPDATE ayarlar SET 

		facebook=:facebook,
		instagram=:instagram,
		twitter=:twitter

		WHERE id=1

		");


	$update=$duzenle->execute(array(

		'facebook'=>$_POST['facebook'],
		'instagram'=>$_POST['instagram'],
		'twitter'=>$_POST['twitter']

	));


if ($update) {
	header("Location:../iletisim.php?yuklenme=basarili");}
else{header("Location:../iletisim.php?yuklenme=basarisiz");}


}

if (isset($_POST['logokaydet'])) {

  

	$uploads_dir='../resimler/logo';
	@$tmp_name= $_FILES['logo'] ["tmp_name"];
	@$name= $_FILES['logo'] ["name"];


	$sayi=rand(1,1000000);
	$sayi2=rand(1,100000);
	$sayi3=rand(10000, 20000000);


	$sayilar=$sayi.$sayi2.$sayi3;
	$imgpath=$sayilar.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");


	$duzenle=$baglanti->prepare("UPDATE ayarlar SET 

		logo=:logo

		WHERE id=1

		");

	$update=$duzenle->execute(array(

		'logo'=>$imgpath


	));
	if ($update) {

		$resimsil=$_POST['eskilogo'];
		unlink("../resimler/logo/$resimsil");


		header("Location:../settings.php?yuklenme=basarili");
	}
	else{
		header("Location:../settings.php?yuklenme=basarisiz");
	}

}

if (isset($_POST['hakkimizdakaydet'])) {

	if ($_FILES['resim']   ["size"]>0) {

		$uploads_dir='../resimler/hakkimizda';
		@$tmp_name= $_FILES['resim'] ["tmp_name"];
		@$name= $_FILES['resim'] ["name"];

		$sayi=rand(1,1000000);
		$sayi2=rand(1,100000);
		$sayi3=rand(10000, 20000000);

		$sayilar=$sayi.$sayi2.$sayi3;
		$imgpath=$sayilar.$name;

		@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
		$duzenle=$baglanti->prepare("UPDATE hakkimizda SET 

			hakkimizda_baslik=:hakkimizda_baslik,
			hakkimizda_detay=:hakkimizda_detay,
			hakkimizda_resim=:hakkimizda_resim

			WHERE hakkimizda_id=1

			");

		$update=$duzenle->execute(array(

			'hakkimizda_baslik'=>$_POST['baslik'],
			'hakkimizda_detay'=>$_POST['detay'],
			'hakkimizda_resim'=>$imgpath

		));
		if ($update) {
			$resimsil=$_POST['eskiresim'];
			unlink("../resimler/hakkimizda/$resimsil");
			header("Location:../hakkimizda.php?yuklenme=basarili");
		}
		else{
			header("Location:../hakkimizda.php?yuklenme=basarisiz");
		}

	}
	else{
		$duzenle=$baglanti->prepare("UPDATE hakkimizda SET 



			hakkimizda_baslik=:hakkimizda_baslik,
			hakkimizda_detay=:hakkimizda_detay
						
			WHERE hakkimizda_id=1

			");

		$update=$duzenle->execute(array(

			'hakkimizda_baslik'=>$_POST['baslik'],
			'hakkimizda_detay'=>$_POST['detay']
			
		));
		if ($update) {

			header("Location:../hakkimizda.php?yuklenme=basarili");
		}
		else{
			header("Location:../hakkimizda.php?yuklenme=basarisiz");
		}
	}
}

if (isset($_POST['girisyap'])) {

	$kadi=htmlspecialchars($_POST['kadi']);
	$sifre=htmlspecialchars($_POST['sifre']);
	$guclusifre=md5($sifre);


	$kullanicisor=$baglanti->prepare("SELECT * from kullanici where kullanici_adi=:kullanici_adi and kullanici_sifre=:kullanici_sifre"  );
	$kullanicisor->execute(array(
		'kullanici_adi'=>$kadi,
		'kullanici_sifre'=>$guclusifre
		
	));


	$var=$kullanicisor->rowCount();

	if ($var >0) {
		echo $_SESSION['girisbelgesi']=$kadi;
		header("Location:../index?durum=hosgeldin");
	}
	else{
		header("Location:../login?durum=hata");
	}

}

if (isset($_POST['uyekaydet'])) {

	$kadi=htmlspecialchars($_POST['kadi']);
	$sifre=htmlspecialchars($_POST['sifre']);
	$adsoyad=htmlspecialchars($_POST['adsoyad']);
	$guclusifre=md5($sifre);


	$kullanicisor=$baglanti->prepare("SELECT * from kullanici where kullanici_adi=:kullanici_adi and kullanici_yetki=:kullanici_yetki ");
	$kullanicisor->execute(array(
		'kullanici_adi'=>$kadi,
		'kullanici_yetki'=>2

	));

	$var=$kullanicisor->rowCount();
	if ($var >0) {
		Header("Location:../uyeler_ekle?yuklenme=kullanicivar");
	}
	else{

		$kullanicikaydet=$baglanti->prepare("INSERT into kullanici SET 

			kullanici_adi=:kullanici_adi,
			kullanici_sifre=:kullanici_sifre,
			kullanici_adsoyad=:kullanici_adsoyad,
			kullanici_yetki=:kullanici_yetki
			");

		$insert=$kullanicikaydet->execute(array(
			'kullanici_adi'=>$kadi,
			'kullanici_sifre'=>$guclusifre,
			'kullanici_adsoyad'=>$adsoyad,
			'kullanici_yetki'=>2,

		));
		if ($insert) {

			header("Location:../uyeler?yuklenme=basarili");
		}
		else{
			header("Location:../uyeler?yuklenme=basarisiz");
		}


	}

}

if(isset($_GET['kullanicisil'])){
$kullanicisil=$baglanti->prepare("DELETE FROM kullanici where kullanici_id=:kullanici_id");
$kullanicisil->execute(array(
'kullanici_id'=>$_GET['id']
));

if($kullanicisil){
header("Location:../uyeler?durum=basarili");
}
else{
	header("Location:../uyeler?durum=hata");
}
}

if (isset($_POST['kategorikaydet'])) {
	$kategorikaydet=$baglanti->prepare("INSERT into kategori SET 

			kategori_adi=:kategori_adi,
			kategori_sira=:kategori_sira,
			kategori_durum=:kategori_durum
			");

		$insert=$kategorikaydet->execute(array(
			'kategori_adi'=>$_POST['katadi'],
			'kategori_sira'=>$_POST['sira'],
			'kategori_durum'=>$_POST['durum']

		));
		if ($insert) {

			header("Location:../kategori?yuklenme=basarili");
		}
		else{
			header("Location:../kategori?yuklenme=basarisiz");
		}

}

if (isset($_POST['kategoriduzenle'])) {
	$kat=$_POST['katid'];

	$duzenle=$baglanti->prepare("UPDATE kategori SET 


		kategori_adi=:kategori_adi,
		kategori_sira=:kategori_sira,
		kategori_durum=:kategori_durum

		WHERE kategori_id=$kat

		");

	$update=$duzenle->execute(array(

		'kategori_adi'=>$_POST['katadi'],
		'kategori_sira'=>$_POST['sira'],
		'kategori_durum'=>$_POST['durum']


	));
	if ($update) {

		header("Location:../kategori.php?yuklenme=basarili");
	}
	else{
		header("Location:../kategori.php?yuklenme=basarisiz");
	}

}




if (isset($_GET['kategorisil'])) {


	$kategorisil=$baglanti->prepare("DELETE from  kategori where kategori_id=:kategori_id ");

	$kategorisil->execute(array(
		'kategori_id'=>$_GET['id']


	));

	if ($kategorisil) {
		Header("Location:../kategori?yuklenme=basarili");
	}
	else{
		Header("Location:../kategori?yuklenme=hata");
	}
}


if (isset($_POST['sliderkaydet'])) {
	
	$uploads_dir='../resimler/slider';
	@$tmp_name= $_FILES['slideresim'] ["tmp_name"];
	@$name= $_FILES['slideresim'] ["name"];

	$sayi=rand(1,1000000);
	$sayi2=rand(1,100000);
	$sayi3=rand(10000, 20000000);


	$sayilar=$sayi.$sayi2.$sayi3;
	$imgpath=$sayilar.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
	$sliderkaydet=$baglanti->prepare("INSERT into slider SET 

		slider_baslik=:slider_baslik,
		slider_aciklama=:slider_aciklama,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_buton=:slider_buton,
		slider_durum=:slider_durum,
		slider_banner=:slider_banner,
		slider_resim=:slider_resim

		");

	$insert=$sliderkaydet->execute(array(
		'slider_baslik'=>$_POST['sliderbaslik'],
		'slider_aciklama'=>$_POST['slideraciklama'],
		'slider_sira'=>$_POST['slidersira'],
		'slider_link'=>$_POST['sliderlink'],
		'slider_buton'=>$_POST['sliderbuton'],
		'slider_durum'=>$_POST['sliderdurum'],
		'slider_banner'=>$_POST['sliderbanner'],
		'slider_resim'=>$imgpath

	));
	if ($insert) {

		header("Location:../slider?yuklenme=basarili");
	}
	else{
		header("Location:../slider?yuklenme=basarisiz");
	}

}

if (isset($_POST['sliderduzenle'])) {
    
    $sliderid=$_POST['id'];

    if ($_FILES['slideresim']   ["size"]>0) {
    $uploads_dir='../resimler/slider';
	@$tmp_name= $_FILES['slideresim'] ["tmp_name"];
	@$name= $_FILES['slideresim'] ["name"];

	$sayi=rand(1,1000000);
	$sayi2=rand(1,100000);
	$sayi3=rand(10000, 20000000);


	$sayilar=$sayi.$sayi2.$sayi3;
	$imgpath=$sayilar.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

	$duzenle=$baglanti->prepare("UPDATE slider SET 


		slider_baslik=:slider_baslik,
		slider_aciklama=:slider_aciklama,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_buton=:slider_buton,
		slider_durum=:slider_durum,
		slider_banner=:slider_banner,
		slider_resim=:slider_resim

		WHERE slider_id=$sliderid

		");

	$update=$duzenle->execute(array(

		'slider_baslik'=>$_POST['sliderbaslik'],
		'slider_aciklama'=>$_POST['slideraciklama'],
		'slider_sira'=>$_POST['slidersira'],
		'slider_link'=>$_POST['sliderlink'],
		'slider_buton'=>$_POST['sliderbuton'],
		'slider_durum'=>$_POST['sliderdurum'],
		'slider_banner'=>$_POST['sliderbanner'],
		'slider_resim'=>$imgpath


	));
	if ($update) {

		$resimsil=$_POST['eskiresim'];
		unlink("../resimler/slider/$resimsil");

		header("Location:../slider.php?yuklenme=basarili");
	}
	else{
		header("Location:../slider.php?yuklenme=basarisiz");
	}
}

else{
	$duzenle=$baglanti->prepare("UPDATE slider SET 


		slider_baslik=:slider_baslik,
		slider_aciklama=:slider_aciklama,
		slider_sira=:slider_sira,
		slider_link=:slider_link,
		slider_buton=:slider_buton,
		slider_durum=:slider_durum,
		slider_banner=:slider_banner

		WHERE slider_id=$sliderid

		");

	$update=$duzenle->execute(array(

		'slider_baslik'=>$_POST['sliderbaslik'],
		'slider_aciklama'=>$_POST['slideraciklama'],
		'slider_sira'=>$_POST['slidersira'],
		'slider_link'=>$_POST['sliderlink'],
		'slider_buton'=>$_POST['sliderbuton'],
		'slider_durum'=>$_POST['sliderdurum'],
		'slider_banner'=>$_POST['sliderbanner']


	));
	if ($update) {

		header("Location:../slider.php?yuklenme=basarili");
	}
	else{
		header("Location:../slider.php?yuklenme=basarisiz");
}
}
}

if (isset($_POST['slidersil'])) {


	$slidersil=$baglanti->prepare("DELETE from  slider where slider_id=:slider_id ");

	$slidersil->execute(array(
		'slider_id'=>$_POST['id']

	));

	if ($slidersil) {

		$resimsil=$_POST['resim'];
		unlink("../resimler/slider/$resimsil");

		Header("Location:../slider?yuklenme=basarili");
	}
	else{
		Header("Location:../slider?yuklenme=hata");
	}
}

if (isset($_POST['urunkaydet'])) {

$yonlendir=$_POST['katsid'];
	$uploads_dir='../resimler/urun';
	@$tmp_name= $_FILES['urunresim'] ["tmp_name"];
	@$name= $_FILES['urunresim'] ["name"];


	$sayi=rand(1,1000000);
	$sayi2=rand(1,100000);
	$sayi3=rand(10000, 20000000);


	$sayilar=$sayi.$sayi2.$sayi3;
	$imgpath=$sayilar.$name;

	@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");
	$urunkaydet=$baglanti->prepare("INSERT into urun SET 

		kategori_id=:kategori_id,
		urun_baslik=:urun_baslik,
		urun_adi=:urun_adi,
		urun_yazar=:urun_yazar,
		urun_sira=:urun_sira,
		urun_adet=:urun_adet,
		urun_fiyat=:urun_fiyat,
		urun_etiket=:urun_etiket,
		urun_durum=:urun_durum,
		onecikan=:onecikan,
		urun_resim=:urun_resim

		");

	$insert=$urunkaydet->execute(array(

		'kategori_id'=>$_POST['urunkategori'],
		'urun_baslik'=>$_POST['urunbaslik'],
		'urun_adi'=>$_POST['urunadi'],
		'urun_yazar'=>$_POST['urunyazar'],
		'urun_sira'=>$_POST['urunsira'],
		'urun_adet'=>$_POST['urunadet'],
		'urun_fiyat'=>$_POST['urunfiyat'],
		'urun_etiket'=>$_POST['urunanahtar'],
		'urun_durum'=>$_POST['urundurum'],
		'onecikan'=>$_POST['urunonecikar'],
		'urun_resim'=>$imgpath

	));
	if ($insert) {

		header("Location:../urun?katid=$yonlendir&yuklenme=basarili");
	}
	else{
		header("Location:../urun?katid=$yonlendir&yuklenme=basarisiz");
	}

}

if (isset($_POST['urunduzenle'])) {
	$yonlendir=$_POST['katsid'];

	$urunid=$_POST['id'];

	if ($_FILES['urunresim']   ["size"]>0) {

		$uploads_dir='../resimler/urun';
		@$tmp_name= $_FILES['urunresim'] ["tmp_name"];
		@$name= $_FILES['urunresim'] ["name"];



		$sayi=rand(1,1000000);
		$sayi2=rand(1,100000);
		$sayi3=rand(10000, 20000000);


		$sayilar=$sayi.$sayi2.$sayi3;
		$imgpath=$sayilar.$name;


		@move_uploaded_file($tmp_name, "$uploads_dir/$sayilar$name");

		$urunduzenle=$baglanti->prepare("UPDATE urun SET 

		kategori_id=:kategori_id,
		urun_baslik=:urun_baslik,
		urun_adi=:urun_adi,
		urun_yazar=:urun_yazar,
		urun_sira=:urun_sira,
		urun_adet=:urun_adet,
		urun_fiyat=:urun_fiyat,
		urun_etiket=:urun_etiket,
		urun_durum=:urun_durum,
		onecikan=:onecikan,
		urun_resim=:urun_resim

		WHERE urun_id=$urunid

			");

		$update=$urunduzenle->execute(array(

		
		'kategori_id'=>$_POST['urunkategori'],
		'urun_baslik'=>$_POST['urunbaslik'],
		'urun_adi'=>$_POST['urunadi'],
		'urun_yazar'=>$_POST['urunyazar'],
		'urun_sira'=>$_POST['urunsira'],
		'urun_adet'=>$_POST['urunadet'],
		'urun_fiyat'=>$_POST['urunfiyat'],
		'urun_etiket'=>$_POST['urunanahtar'],
		'urun_durum'=>$_POST['urundurum'],
		'onecikan'=>$_POST['urunonecikar'],
		'urun_resim'=>$imgpath


		));
		if ($update) {

			$resimsil=$_POST['eskiresim'];
			unlink("../resimler/urun/$resimsil");

			
		header("Location:../urun?katid=$yonlendir&yuklenme=basarili");
	}
		else{
		header("Location:../urun?katid=$yonlendir&yuklenme=basarisiz");
		}

	}
	
	else{

		$urunduzenle=$baglanti->prepare("UPDATE urun SET 

		kategori_id=:kategori_id,
		urun_baslik=:urun_baslik,
		urun_adi=:urun_adi,
		urun_yazar=:urun_yazar,
		urun_sira=:urun_sira,
		urun_adet=:urun_adet,
		urun_fiyat=:urun_fiyat,
		urun_etiket=:urun_etiket,
		urun_durum=:urun_durum,
		onecikan=:onecikan

		WHERE urun_id=$urunid

			");

		$update=$urunduzenle->execute(array(

		'kategori_id'=>$_POST['urunkategori'],
		'urun_baslik'=>$_POST['urunbaslik'],
		'urun_adi'=>$_POST['urunadi'],
		'urun_yazar'=>$_POST['urunyazar'],
		'urun_sira'=>$_POST['urunsira'],
		'urun_adet'=>$_POST['urunadet'],
		'urun_fiyat'=>$_POST['urunfiyat'],
		'urun_etiket'=>$_POST['urunanahtar'],
		'urun_durum'=>$_POST['urundurum'],
		'onecikan'=>$_POST['urunonecikar']

		));
		if ($update) {
			header("Location:../urun?katid=$yonlendir&yuklenme=basarili");
		}
		else{
		header("Location:../urun?katid=$yonlendir&yuklenme=basarisiz");
		}

	}
}


if (isset($_POST['urunsil'])) {
	$yonlendir=$_POST['katsid'];

	$urunsil=$baglanti->prepare("DELETE from  urun where urun_id=:urun_id ");

	$urunsil->execute(array(
	'urun_id'=>$_POST['id']

	));

	if ($urunsil) {

		$resimsil=$_POST['resim'];
		unlink("../resimler/urun/$resimsil");
		header("Location:../urun?katid=$yonlendir&yuklenme=basarili");
	}
	else{
			header("Location:../urun?katid=$yonlendir&yuklenme=basarisiz");
	}
}

if (isset($_POST['kullaniciduzenle'])) {
		$id=$_POST['kullaniciid'];
	$duzenle=$baglanti->prepare("UPDATE kullanici SET 

		kullanici_adi=:kullanici_adi,	
		kullanici_adsoyad=:kullanici_adsoyad,
		kullanici_mail=:kullanici_mail,
		kullanici_adres=:kullanici_adres,
		kullanici_il=:kullanici_il,
		kullanici_ilce=:kullanici_ilce,
		kullanici_telno=:kullanici_telno

		WHERE kullanici_id=$id

		");


	$update=$duzenle->execute(array(

		'kullanici_adi'=>$_POST['adi'],
		'kullanici_adsoyad'=>$_POST['adsoyad'],
		'kullanici_mail'=>$_POST['email'],
		'kullanici_adres'=>$_POST['adres'],
		'kullanici_il'=>$_POST['sehir'],
		'kullanici_ilce'=>$_POST['ilce'],
		'kullanici_telno'=>$_POST['telefon']
		
	));


if ($update) {
	header("Location:../uyeler?yuklenme=basarili");}
else{header("Location:../uyeler?yuklenme=basarisiz");}


}

if (isset($_POST['yorumkaydet'])) {
	$gelenurl=$_SERVER['HTTP_REFERER'];

		$yorumkaydet=$baglanti->prepare("INSERT into yorum SET 

			yorum_detay=:yorum_detay,
			urun_id=:urun_id,
			yorum_onay=:yorum_onay,
			kullanici_id=:kullanici_id
			");

		$insert=$yorumkaydet->execute(array(
			'yorum_detay'=>$_POST['yorum'],
			'kullanici_id'=>$_POST['kullaniciid'],
			'urun_id'=>$_POST['urunid'],
			'yorum_onay'=>0

		));
		if ($insert) {

			header("Location:.gelenurl?yuklenme=basarili");
		}
		else{
			header("Location:$gelenurl?yuklenme=basarisiz");
		}

}

if (isset($_POST['yorumonayla'])) {

	$yorumid=$_POST['yorumid'];
	
	$duzenle=$baglanti->prepare("UPDATE yorum SET 

		yorum_onay=:yorum_onay
		
		WHERE yorum_id=$yorumid
		");

	$update=$duzenle->execute(array(

		'yorum_onay'=>1

	));
	if ($update) {

		header("Location:../yorumlar.php?yuklenme=basarili");
	}
	else{
		header("Location:../yorumlar.php?yuklenme=basarisiz");
	}

}




if(isset($_GET['yorumsil'])){
$yorumsil=$baglanti->prepare("DELETE FROM yorum where yorum_id=:yorum_id");
$yorumsil->execute(array(
'yorum_id'=>$_GET['id']
));

if($yorumsil){
header("Location:../yorumlar?durum=basarili");
}
else{
	header("Location:../yorumlar?durum=hata");
}
}


if (isset($_GET['siparisonayla'])) {

	$siparisid=$_GET['id'];
	
	$duzenle=$baglanti->prepare("UPDATE siparisler SET 

		siparis_onay=:siparis_onay
		
		WHERE siparis_id=$siparisid
		");

	$update=$duzenle->execute(array(

		'siparis_onay'=>1

	));
	if ($update) {

		header("Location:../siparisler.php?yuklenme=basarili");
	}
	else{
		header("Location:../siparisler.php?yuklenme=basarisiz");
	}

}

if(isset($_GET['siparisreddet'])){

	$siparisid=$_GET['id'];
	
	$duzenle=$baglanti->prepare("UPDATE siparisler SET 

		siparis_onay=:siparis_onay
		
		WHERE siparis_id=$siparisid
		");

	$update=$duzenle->execute(array(

		'siparis_onay'=>2

	));

	if($update){
		header("Location:../siparisler.php?durum=basarili");
		}
	else{
		header("Location:../siparisler.php?durum=hata");
		}
}

if (isset($_GET['abonesil'])) {


	$abonesil=$baglanti->prepare("DELETE from  abone where abone_id=:abone_id ");

	$abonesil->execute(array(
		'abone_id'=>$_GET['id']


	));

	if ($abonesil) {
		Header("Location:../abone?yuklenme=basarili");
	}
	else{
		Header("Location:../abone?yuklenme=hata");
	}
}

?>