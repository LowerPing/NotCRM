<!DOCTYPE html>
<html lang="en">




<?php

include "inc/db.php";
session_start();

$session_mail = $_SESSION['kullanici'];


$kullanicisor = $db->prepare("SELECT * FROM kullanici WHERE kullanici_mail=:mail");

$kullanicisor->execute(["mail" => $session_mail]);


$kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC);



if ($kullanicicek['kullanici_yetki'] != 5) {

    header("Location:index.php?durum=underPermission");
    exit;

}



?>

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
        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">

                    <h1>Admin hesap oluşturma</h1>
                    <form action="inc/islem.php" method="POST">

                        <div>
                            <input type="text" class="form-control" placeholder="Adınız" name="ad" required="" />
                        </div>
                        <div>
                            <input type="email" class="form-control" placeholder="Email girin" name="email"
                                required="" />
                        </div>
                        <div>
                            <input type="password" class="form-control" placeholder="Şifre girin" name="passwordone"
                                required="" />
                        </div>

                        <div>
                            <input type="password" class="form-control" placeholder="Tekrar şifre girin"
                                name="passwordtwo" required="" />
                        </div>

                        <div>
                            <!-- <input type="text" class="form-control" placeholder="Yetki Girin 1 en düşük 5 en iyi"
                                name="kullanici_yetki" required="" /> -->
                            <select class="form-control" name="kullanici_yetki">
                                <option selected value="1">Standart Yetki (Çalışan)</option>
                                <option value="5">Tam Yetki (Admin)</option>
                            </select>
                        </div>
                        <br>
                        <br>

                        <div>
                            <button type="submit" name="adminhesapkayit" class="btn btn-default submit">Kayıt
                                Ol</button>
                        </div>

                    </form>




                    <div class="separator">

                        <?php

                        switch ($_GET['durum']) {


                            case "basarili":

                                ?>

                                <p style="color:green; font-size:16px">Kayıt Başarılı</p>

                                <?php


                                break;

                            case "basarisiz":


                                ?>

                                <p style="color:red; font-size:16px">Kayıt Başarısız bilgileri kontrol edip tekrar deneyin.
                                </p>

                                <?php

                                break;

                            case "varolankullanici":


                                ?>

                                <p style="color:grey; font-size:16px">Bu kullanıcı zaten kayıtlı.</p>

                                <?php

                                break;

                            case "farklisifre":


                                ?>

                                <p style="color:grey; font-size:16px">Şifreler eşleşmiyor.</p>

                                <?php

                                break;


                            default:



                                break;


                        }



                        ?>


                        <div class="clearfix"></div>

                        <div>
                            <label for="">Hesabın varsa </label>&nbsp;<a href="login.php"><button
                                    class="btn btn-light">Giriş
                                    Yap</button> </a>
                        </div>
                        <br />

                        <div>
                            <h1><i class="fa fa-check">Ekrem Baydar | Tarafından özel olarak hazırlanmıştır.</i>
                            </h1>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    </div>
</body>

</html>