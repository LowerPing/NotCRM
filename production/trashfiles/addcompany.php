<?php

include "inc/header.php";

include "inc/sidebar.php";

include "inc/navbar.php";




?>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Firma Ekle <small></small></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i
                    class="fa fa-wrench"></i></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Settings 1</a>
                  </li>
                  <li><a href="#">Settings 2</a>
                  </li>
                </ul>
              </li> -->
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />

                <form action="inc/islem.php" method="post" class="form-horizontal form-label-left">


                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Firma ismi : </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" placeholder="Firma ismi giriniz"
                                name="page_name" required>

                        </div>

                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">İlgilenecek Personel
                            :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-6 col-sm-6 col-xs-12" name="page_yetkili" id="">
                                <?php


                                $kullanicisor = $db->prepare("SELECT * FROM kullanici");

                                $kullanicisor->execute();


                                while ($kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>



                                    <option class="form-group" value="<?= $kullanicicek['kullanici_ad'] ?>">
                                        <?= $kullanicicek['kullanici_ad'] ?>
                                    </option>


                                <?php }

                                ?>



                            </select>

                        </div>
                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">1. Firma yetkilisi Ad
                            Soyad :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text"
                                placeholder="Firma yetkilisinin adı soyadı" name="page_musteribir" required>

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Firma yetkilisi Tel 1
                            :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" placeholder="Yetkili tel giriniz"
                                name="page_yetkilitel" required>

                        </div>

                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">İlgilenecek Personel
                            :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <select class="form-control col-md-6 col-sm-6 col-xs-12" name="page_yetkiliiki" id="">

                                <option selected class="form-group">Boş</option>

                                <?php


                                $kullanicisor = $db->prepare("SELECT * FROM kullanici");

                                $kullanicisor->execute();


                                while ($kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>



                                    <option class="form-group" value="<?= $kullanicicek['kullanici_ad'] ?>">
                                        <?= $kullanicicek['kullanici_ad'] ?>
                                    </option>


                                <?php }

                                ?>



                            </select>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">2. Firma yetkilisi
                            adı soyadı
                            :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text"
                                placeholder="Firma yetkilisinin adı soyadı" name="page_musteriiki">

                        </div>




                    </div>
                    <div class="form-group">
                        <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Firma yetkilisi Tel 2
                            :
                        </label>

                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input class="form-control col-md-7 col-xs-12" type="text" placeholder="Yetkili tel giriniz"
                                name="page_yetkiliikitel">

                        </div>

                    </div>







                    <div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            <button type="submit" name="siteekle" class="btn btn-success siteEkle">Ekle</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>