<?php

include "inc/header.php";

include "inc/sidebar.php";

include "inc/navbar.php";


$say = 0;




?>


<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->

  <div class="col-md-12 col-sm-12 col-xs-12">
    <div class="row">
      <!-- Start to do list -->
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Yapılacaklar!<small>
              </small></h2>




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

            <div class="">

              <form action="inc/islem.php" method="post">


                <ul class="to_do">
                  <?php


                  $say = 0;

                  $notsor = $db->prepare("SELECT * FROM notlar ORDER BY not_yapildi, not_date desc");

                  $notsor->execute();

                  while ($notcek = $notsor->fetch(PDO::FETCH_ASSOC)) {
                    $say++;


                    $yapankisi = $notcek['not_yapankisi'];


                    $yapansor = $db->prepare("SELECT * FROM kullanici where kullanici_id=:id");

                    $yapansor->execute(

                      [

                        'id' => $yapankisi


                      ]

                    );

                    $kullanicicek = $yapansor->fetch(PDO::FETCH_ASSOC);


                    $parent = $notcek['not_parent'];


                    $pagesor = $db->prepare("SELECT * FROM pages where id=:page_id");

                    $pagesor->execute(

                      [


                        'page_id' => $parent


                      ]

                    );

                    $pagescek = $pagesor->fetch(PDO::FETCH_ASSOC);


                    ?>




                    <li>
                      <?php if ($notcek['not_yapildi'] >= 1) { ?>
                        <p>
                          <input type="hidden" name="test[]" disabled value="<?= $notcek['not_id'] ?>">


                          <span style="color:green">

                            Firma Adı :
                          </span>


                          <?php if (!empty($pagescek['page_name'])) { ?>



                            <span style="/* text-decoration: line-through; */color:green">
                              <?= $pagescek['page_name'] ?>
                            </span>





                          <?php } else { ?>



                            <span style="color:green">
                              Firma Silinmiş
                            </span>



                          <?php } ?>

                          <br>


                          <?php if (!empty($notcek['not_date'])) { ?>
                            <span style=" color:green">
                              Teslim Tarihi :


                              <?= $notcek['not_date'] ?>
                            </span>


                          <?php } else { ?>


                            <span style=" color:green;  ">
                              Teslim Tarihi :


                            </span>

                            <span style=" color:green;/*  text-decoration: line-through;  */">

                              Tarih yok

                            </span>

                          <?php } ?>

                          <br>

                          <?php if (!(empty($notcek['not_kisi']))) { ?>

                            <span style="color:green">
                              Telefon Numarası :
                            </span>
                            <span style="/* text-decoration: line-through; */color:green">

                              <?= $notcek['not_kisi'] ?>
                            </span>
                            <br>
                          <?php } else { ?>

                            <span style="color:green">
                              Telefon Numarası :
                            </span>


                            <span style="/* text-decoration: line-through; */color:green">
                              Bulunmamaktadır
                            </span>
                            <br>
                          <?php } ?>



                          <span style="color:green">
                            Not Ad :
                          </span>


                          <span style="/* text-decoration: line-through; */ color:green">
                            <?= $notcek['not_name'] ?>
                          </span>

                          <a href="inc/islem.php?notsil=ok&id=<?= $notcek['not_id'] ?>" style="float:right;"
                            class="btn btn-danger btn-sm ">Sil</a>

                          <!-- <button style="float:right" type="button" class="btn btn-primary btn-sm right">Sıra :
                            <?= $notcek['not_sira'] ?>
                          </button> -->


                          <button style="float:right;padding:8px" type="button"
                            class="btn btn-primary  btn-sm right fa fa-check ">
                          </button>

                          <?php if (empty($kullanicicek['kullanici_ad'])) { ?>
                            <button style="float:right; width:160px" type="button" class="btn btn-primary btn-sm right">


                              Kullanıcı Bulunamadı

                            <?php } else {

                            if ($kullaniciceksession['kullanici_yetki'] == 5) {

                              ?>


                                <button style="float:right" type="button" class="btn btn-primary btn-sm right">

                                  <span class="button-primary" style="margin-right:10px; text-align:center; float:right">

                                    İşaretlendi ->

                                    <?= $kullanicicek['kullanici_ad'] ?>

                                  </span></button>


                              <?php }

                          } ?>



                            <br>
                            <span style="color:green">
                              Not Açıklama :
                            </span>

                            <span style="/* text-decoration: line-through; */ color:green">


                              <?= $notcek['not_description'] ?>
                            </span>
                        </p>

                      <?php } else { ?>
                        <p>
                          <input type="checkbox" name="test[]" class="flat" value="<?= $notcek['not_id'] ?>">
                          <br>
                          Firma Adı :
                          <?php if (!empty($pagescek['page_name'])) { ?>

                            <span style="color:green">

                              <?= $pagescek['page_name'] ?>
                            </span>
                          <?php } else {
                            echo "<span style=\" color:red; \">Site Silinmiş</span>";
                          } ?>
                          <br>

                          <?php if (!empty($notcek['not_date'])) { ?>
                            Teslim Tarihi :
                            <span style=" color:green">


                              <?= $notcek['not_date'] ?>
                            </span>


                          <?php } else { ?>

                            Teslim Tarihi :
                            <span style=" color:red">

                              Tarih yok
                            </span>

                          <?php } ?>


                          <br>
                          <?php if (!empty($notcek['not_kisi'])) { ?>
                            Telefon Numarası :
                            <span style=" color:green">

                              <?= $notcek['not_kisi'] ?>
                            </span>


                          <?php } else { ?>

                            Telefon Numarası :
                            <span style=" color:red">

                              Numara Yok
                            </span>

                          <?php } ?>




                          <br>
                          Not Ad :
                          <span style=" color:green">

                            <?= $notcek['not_name'] ?>
                          </span>

                          <span style="margin:auto">

                            <a href="inc/islem.php?notsil=ok&id=<?= $notcek['not_id'] ?>" style="float:right; margin:auto"
                              class="btn btn-danger btn-sm">Sil</a>
                          </span>

                          <!--    <button style="float:right" type="button" class="btn btn-primary btn-sm right">Sıra :
                            <?= $notcek['not_sira'] ?>
                          </button> -->
                          <br>
                          Not Açıklama :
                          <span style=" color:green">

                            <?= $notcek['not_description'] ?>
                          </span>
                        </p>
                      <?php } ?>


                    </li>


                  <?php }

                  ?>





                </ul>


                <br><br>

                <input type="hidden" name="not_yapankisi" id="" value="<?= $kullaniciceksession['kullanici_id'] ?>">

                <button type="submit" class="btn btn-success" name="notyapildi" style="float:right">Yapıldı</button>


                <?php


                if ($kullaniciceksession['kullanici_yetki'] == 5) { ?>



                  <!-- Modal başlangıç -->
                  <!-- Button trigger modal -->
                  <button type="button" style="float:right;" class="btn btn-danger" data-toggle="modal"
                    data-target="#exampleModal">
                    Hepsini sil
                  </button>

                  <!-- Modal -->
                  <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <h3>Tüm notları silmek istediğinizden emin misiniz ?</h3>

                          <br>

                          <h5> Onayla butonuna tıklarsanız tüm notlar silinecek.</h5>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-primary" data-dismiss="modal">Kapat</button>
                          <button type="submit" name="tumnotlarsil" class="btn btn-danger">Onayla</button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Modal bitiş -->

                  <?php

                }


                ?>



              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End to do list -->
    </div>





    <?php /* if ($kullaniciceksession['kullanici_yetki'] >= 5) {  */ ?>


    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Not Ekle <small>Not sayısı :
                <?= $say ?>
              </small></h2>
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


              <?php

              $kullanicisor = $db->prepare("SELECT * FROM kullanici");
              $kullanicisor->execute();


              ?>

              <!-- <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Kullanıcı Seçin : <span
                      class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-12 col-xs-12">


                    <select class="form-control col-md-6 col-sm-6 col-xs-6" name="option_kul_id" id="">

                      <?php while ($kullanicicekiki = $kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>


                        <option value="<?= $kullanicicekiki['kullanici_id'] ?>">

                          <?= $kullanicicekiki['kullanici_ad'] ?>
                        </option>
                      <?php } ?>

                    </select>
                  </div>
                </div>-->
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Firma Seçin : <span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-12 col-xs-12">


                  <select class="form-control col-md-6 col-sm-6 col-xs-6" name="option_kul_id" id="">


                    <?php



                    $pagesor = $db->prepare("SELECT * FROM pages");
                    $pagesor->execute();

                    while ($pagecek = $pagesor->fetch(PDO::FETCH_ASSOC)) { ?>



                      <option value="<?= $pagecek['id'] ?>">

                        <?= $pagecek['page_name'] ?>
                      </option>


                      <?php

                    } ?>




                  </select>
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Not Adı <span
                    class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">


                  <input type="text" id="first-name" placeholder="Not adı giriniz" required="required"
                    class="form-control col-md-7 col-xs-12" name="not_name">


                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Telefon Numarası <span
                    class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">


                  <input type="text" id="first-name" placeholder="Telefon numarası giriniz" required="required"
                    class="form-control col-md-7 col-xs-12" name="not_kisi">


                </div>
              </div>



              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Not Açıklama:<span class="required">*</span>
                </label>
                <div class="col-md-6 col-sm-12 col-xs-12">


                  <textarea class="form-control col-md-7 col-xs-12" placeholder="Not Açıklama giriniz" rows="9" required
                    name="not_description"></textarea>


                </div>
              </div>


              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Teslim Tarihi <span class="required"></span>
                </label>
                <div class="col-md-6 col-sm-6 col-xs-12">


                  <input name="not_date" class="date-picker form-control col-md-7 col-xs-12"
                    placeholder="Teslim tarihi giriniz" type="date">


                </div>
              </div>

              <input type="hidden" name="not_kullanici" value="<?= $kullaniciceksession['kullanici_id'] ?>" id="">

              <!--  <div class="form-group">
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Sıra : </label>
                <div class="col-md-6 col-sm-6 col-xs-12">


                  <input class="form-control col-md-2 col-xs-2" type="number" placeholder="Not sırasını seçiniz."
                    name="not_sira">


                </div>
               </div> -->
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="not_ekle" class="btn btn-success notEkle">Ekle</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    <?php /*  } */ ?>


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
                  <input class="form-control col-md-7 col-xs-12" type="text" placeholder="Firma yetkilisinin adı soyadı"
                    name="page_musteribir" required>

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
                  <input class="form-control col-md-7 col-xs-12" type="text" placeholder="Firma yetkilisinin adı soyadı"
                    name="page_musteriiki">

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



    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Firmalar <small></small></h2>
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

            <table class="table">
              <thead>

                <tr>
                  <th>#</th>
                  <th>Ad</th>
                  <th>1. Satış Elemanı</th>
                  <th>2. Satış Elemanı</th>


                  <th>1. Firma yetkilisi</th>
                  <th>1. Firma yetkilisi tel</th>

                  <th>2. Firma yetkilisi</th>
                  <th>2. Firma yetkilisi tel</th>
                  <th>İşlemler</th>

                </tr>
              </thead>
              <tbody>

                <?php $pagesor = $db->prepare("SELECT * FROM pages ORDER BY id ASC");

                $pagesor->execute();

                while ($pagecek = $pagesor->fetch(PDO::FETCH_ASSOC)) { ?>


                  <tr>
                    <th scope="row">
                      <?= $pagecek['id'] ?>
                    </th>
                    <td>
                      <?= $pagecek['page_name'] ?>
                    </td>

                    <td>
                      <?= $pagecek['page_yetkili'] ?>
                    </td>


                    <td>
                      <?= $pagecek['page_yetkiliiki'] ?>
                    </td>





                    <td>
                      <?= $pagecek['page_musteribir'] ?>
                    </td>

                    <td>
                      <?= $pagecek['page_yetkilitel'] ?>
                    </td>


                    <td>
                      <?= $pagecek['page_musteriiki'] ?>
                    </td>
                    <td>
                      <?= $pagecek['page_yetkiliikitel'] ?>
                    </td>



                    <td>
                      <a href="inc/islem.php?pagesil=ok&id=<?= $pagecek['id'] ?>" class="btn btn-danger sil_butonu"
                        style="padding:6px">Sil</a>
                    </td>

                  </tr>

                <?php } ?>

              </tbody>
            </table>


          </div>
        </div>
      </div>
    </div>
  </div>


  <script>
    $(document).ready(function () {

      $(".sil_butonu").click(function () {

        swal("İşlem", "Silme işleminiz başarı ile gerçekleştirildi", "success");
        // Sayfa yenilendiğinde çerez oluşturun ve değer olarak "true" atayın

        document.cookie = "showAlert=true";
      });

      // Sayfa yüklendiğinde çerezleri kontrol edin
      if (document.cookie.indexOf("showAlert=true") !== -1) {
        // Eğer çerez varsa, mesajı gösterin ve çerezi temizleyin
        swal("İşlem", "Silme işleminiz başarı ile gerçekleştirildi", "success");
        document.cookie = "showAlert=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "showAlert=false";

      }


      $(".siteEkle").click(function () {

        swal("İşlem", "Site ekleme işleminiz başarı ile gerçekleştirildi", "success");
        // Sayfa yenilendiğinde çerez oluşturun ve değer olarak "true" atayın

        document.cookie = "siteEkle=true";
      });

      // Sayfa yüklendiğinde çerezleri kontrol edin
      if (document.cookie.indexOf("siteEkle=true") !== -1) {
        // Eğer çerez varsa, mesajı gösterin ve çerezi temizleyin
        swal("İşlem", "Site ekleme işleminiz başarı ile gerçekleştirildi", "success");
        document.cookie = "siteEkle=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "siteEkle=false";

      }



      $(".notEkle").click(function () {

        swal("İşlem", "Not ekleme işleminiz başarı ile gerçekleştirildi", "success");
        // Sayfa yenilendiğinde çerez oluşturun ve değer olarak "true" atayın

        document.cookie = "notEkle=true";
      });

      // Sayfa yüklendiğinde çerezleri kontrol edin
      if (document.cookie.indexOf("notEkle=true") !== -1) {
        // Eğer çerez varsa, mesajı gösterin ve çerezi temizleyin
        swal("İşlem", "Not ekleme işleminiz başarı ile gerçekleştirildi", "success");
        document.cookie = "notEkle=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
        document.cookie = "notEkle=false";

      }


    });
  </script>



  <!-- /page content -->

  <?php include 'inc/footer.php'; ?>