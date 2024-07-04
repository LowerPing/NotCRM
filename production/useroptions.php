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




if ($_GET['kullaniciduzenle'] == "ok") {


    $userid = $_GET['id'];



    $userask = $db->prepare("SELECT * FROM kullanici WHERE kullanici_id=:id");

    $userask->execute(["id" => $userid]);


    $useroptionsget = $userask->fetch(PDO::FETCH_ASSOC);



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

                        <h1>Kullanıcı düzenleme</h1>
                        <form action="inc/islem.php" method="POST">

                            <div>
                                <input type="text" class="form-control" value="<?= $useroptionsget['kullanici_ad'] ?>"
                                    name="kullanici_ad" required="" />
                            </div>
                            <div>
                                <input type="email" disabled class="form-control"
                                    value="<?= $useroptionsget['kullanici_mail'] ?>" required="" />
                            </div>

                            <div>

                                <?php

                                if ($useroptionsget['kullanici_yetki'] == 5) { ?>

                                    <select class="form-control" name="kullanici_yetki">
                                        <option value="1">Standart Yetki (Çalışan)</option>
                                        <option selected value="5">Tam Yetki (Admin)</option>
                                    </select>

                                <?php } else { ?>
                                    <select class="form-control" name="kullanici_yetki">
                                        <option selected value="1">Standart Yetki (Çalışan)</option>
                                        <option value="5">Tam Yetki (Admin)</option>
                                    </select>
                                <?php }

                                ?>



                            </div>

                            <input value="<?= $userid ?>" type="hidden" name="kullanici_id">

                            <br>
                            <br>

                            <div>
                                <button type="submit" name="useroptionschange" class="btn btn-default submit">Düzenle
                                </button>
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

<?php } else {
    header("Location:index.php");
    exit;

}
?>