<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>BookStore Giriş</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body style="background-color: darkgrey;" class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>BookStore</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
<?php
if(@$_GET['durum']=="hata"){ ?>
  <p style="color:red;" class="login-box-msg">Kullanıcı adı ya da sifre hatalı</p>
<?php }
elseif(@$_GET['durum']=="gulegule"){ ?>
  <p style="color:black;" class="login-box-msg">Yine Bekleriz</p>
<?php }
else{ ?>
<p class="login-box-msg">Lütfen giriş bilgilerini giriniz.</p>
<?php }

?>
      

      <form action="islem/islem.php" method="post">
        <div class="input-group mb-3">
          <input name="kadi" type="text" class="form-control" placeholder="Kullanıcı adı">
          <div class="input-group-append">
            <div class="input-group-text">
              <span style="color: grey;" class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="sifre" type="password" class="form-control" placeholder="Şifre">
          <div class="input-group-append">
            <div class="input-group-text">
              <span style="color: grey;" class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Beni hatırla
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button name="girisyap" type="submit" class="btn btn-primary btn-block">Giriş yap</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</body>
</html>
