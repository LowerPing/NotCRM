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
                          <input type="hidden" name="test[]" disabled style="text-decoration:overline;"
                            value="<?= $notcek['not_id'] ?>">

                          Site Adı :


                          <?php if (!empty($pagescek['page_name'])) { ?>

                            <span style="text-decoration: line-through;color:red">
                              <?= $pagescek['page_name'] ?>
                            </span>

                          <?php } else { ?>



                            <span style="color:red">
                              Site Silinmiş
                            </span>



                          <?php } ?>


                          <br>

                          Teslim Tarihi :
                          <span style="text-decoration: line-through;color:red">
                            <?= $notcek['not_date'] ?>
                          </span>
                          <br>

                          Not Ad :
                          <span style="text-decoration: line-through; color:red">
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

                          <button style="float:right; width:160px" type="button" class="btn btn-primary btn-sm right">


                            <?php if (empty($kullanicicek['kullanici_ad'])) { ?>

                              Kullanıcı Bulunamadı

                            <?php } else { ?>
                              İşaretlendi ->
                              <span style="margin-left:10px">

                                <?= $kullanicicek['kullanici_ad'] ?>
                              </span>
                            <?php } ?>
                          </button>


                          <br>

                          Not Açıklama :
                          <span style="text-decoration: line-through;; color:red">

                            <?= $notcek['not_description'] ?>
                          </span>
                        </p>

                      <?php } else { ?>
                        <p>
                          <input type="checkbox" name="test[]" class="flat" value="<?= $notcek['not_id'] ?>">
                          <br>
                          Site Adı :
                          <?php if (!empty($pagescek['page_name'])) { ?>

                            <span style="color:green">

                              <?= $pagescek['page_name'] ?>
                            </span>
                          <?php } else {
                            echo "<span style=\" color:red; \">Site Silinmiş</span>";
                          } ?>
                          <br>
                          Teslim Tarihi :
                          <span style=" color:green">

                            <?= $notcek['not_date'] ?>
                          </span>
                          <br>
                          Not Ad :
                          <span style=" color:green">

                            <?= $notcek['not_name'] ?>
                          </span>

                          <a href="inc/islem.php?notsil=ok&id=<?= $notcek['not_id'] ?>" style="float:right;margin:auto;"
                            class="btn btn-danger btn-sm ">Sil</a>

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
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- End to do list -->
    </div>





    <?php /* if ($kullaniciceksession['kullanici_yetki'] >= 5) {  */?>


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
              $kullanicisor->execute(
              );


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
                <label class="control-label col-md-3 col-sm-3 col-xs-12">Site Seçin : <span class="required">*</span>
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

                    <?php } ?>




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
                  <button type="submit" name="not_ekle" class="btn btn-success">Ekle</button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>

    <?php /*  } */?>

    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Site Ekle <small></small></h2>
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
                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Site ismi : </label>

                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input class="form-control col-md-7 col-xs-12" type="text" placeholder="Site ismi giriniz"
                    name="page_name" required>
                </div>

              </div>





              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button type="submit" name="siteekle" class="btn btn-success">Ekle</button>
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
            <h2>Site Sil <small></small></h2>
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
                      <a href="inc/islem.php?pagesil=ok&id=<?= $pagecek['id'] ?>" class="btn btn-danger"
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

  <!-- /page content -->

  <?php include 'inc/footer.php'; ?>