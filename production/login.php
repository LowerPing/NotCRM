<?php

ob_start();
session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Bootstrap -->
  <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="inc/islem.php" method="post">
            <h1>Giriş</h1>


            <div class="container">

              <!-- 
                
                <div>
                  <input type="text" class="form-control" placeholder="Adınız" name="ad" required="" />
                </div> -->
              <div>
                <input type="email" class="form-control" <?php
                if (isset($_COOKIE['email'])) { ?>
                  value="<?= $_COOKIE['email'] ?>" <?php } else { ?> placeholder="Email girin" <?php }

                ?>name="email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" <?php
                if (isset($_COOKIE['pass'])) { ?>
                  value="<?= $_COOKIE['pass'] ?>" <?php } else { ?> placeholder="Şifre girin" <?php }

                ?> name="password"
                  required="" />
              </div>

              <div class="mb-3 form-check" style="float:left">
                <input type="checkbox" class="form-check-input" <?= isset($_COOKIE['email']) ? "checked" : " " ?>
                  name="beni_hatirla">
                <label class="form-check-label">Beni Hatırla</label>
              </div>
              <br>
              <br>

              <div>
                <button type="submit" class="btn btn-default submit" name="kullanici_giris">Giriş Yap</button>
              </div>



            </div>

          </form>

          <div class="clearfix"></div>

          <div class="separator">
            <p class="change_link">Hesabın yok mu ? <i class="fa fa-arrow-right"></i>
              <a href="register.php" class="to_register"> Kayıt Ol </a>
            </p>

            <div class="clearfix"></div>
            <br />

            <div>
              <h1><i class="fa fa-check">Ekrem Baydar | Tarafından özel olarak hazırlanmıştır.</i></h1>
            </div>

          </div>

        </section>
      </div>
    </div>
  </div>
</body>

</html>