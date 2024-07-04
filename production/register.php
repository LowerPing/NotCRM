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

        <div class="login_wrapper">
            <div class="animate form login_form">
                <section class="login_content">

                    <form action="inc/islem.php" method="POST">

                        <h1>Kayıt Ol</h1>

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
                            <button type="submit" name="kullanici_kayit" class="btn btn-default submit">Kayıt
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