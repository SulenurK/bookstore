<?php 
session_start();

 
require_once 'islem/baglanti.php';

 $kullanicisor=$baglanti->prepare("SELECT * from kullanici where kullanici_adi=:kullanici_adi and kullanici_yetki=:kullanici_yetki ");
 $kullanicisor->execute(array(
'kullanici_adi'=>$_SESSION['girisbelgesi'],
 
'kullanici_yetki'=>2
 ));


$var=$kullanicisor->rowCount();

if ($var==0) {
Header("Location:login?durum=izinsizgiris");
}



$ayar=$baglanti->prepare("SELECT * FROM  ayarlar where id=?");
$ayar->execute(array(1));
$ayaral=$ayar->fetch(PDO::FETCH_ASSOC);



$hakkimizda=$baglanti->prepare("SELECT * FROM  hakkimizda where hakkimizda_id=?");
$hakkimizda->execute(array(1));
$hakkimizdaal=$hakkimizda->fetch(PDO::FETCH_ASSOC);
?>




<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BookStore</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" type="text/css" href="dropzone.css">
  <script type="text/javascript" src="dropzone.js"></script>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->

    <!-- SEARCH FORM -->
    <!-- Right navbar links -->
    
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  