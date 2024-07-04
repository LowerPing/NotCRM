<?php include "inc/header.php" ?>

<?php include "inc/sidebar.php" ?>

<?php include "inc/navbar.php" ?>




<!-- page content -->
<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Kullanıcılar <small>Kullanıcı ve yetkilerini görebilirsiniz</small></h3>
      </div>

    </div>

    <div class="clearfix"></div>

    <div class="row">

      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <h2>Kullanıcılar <small></small></h2>
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
                  <th>Email</th>
                  <th>Yetki</th>
                  <th>İşlemler</th>

                </tr>
              </thead>
              <tbody>

                <?php $kullanicisor = $db->prepare("SELECT * FROM kullanici ORDER BY kullanici_id ASC");

                $kullanicisor->execute();

                while ($kullanicicek = $kullanicisor->fetch(PDO::FETCH_ASSOC)) { ?>


                  <tr>
                    <th scope="row">
                      <?= $kullanicicek['kullanici_id'] ?>
                    </th>
                    <td>
                      <?= $kullanicicek['kullanici_ad'] ?>
                    </td>
                    <td>
                      <?= $kullanicicek['kullanici_mail'] ?>
                    </td>
                    <td>
                      <?= $kullanicicek['kullanici_yetki'] ?>
                    </td>

                    <td>
                      <a href="useroptions.php?kullaniciduzenle=ok&id=<?= $kullanicicek['kullanici_id'] ?>"
                        class="btn btn-warning" style="padding:6px">Düzenle</a>

                      <a href="inc/islem.php?kullanicisil=ok&id=<?= $kullanicicek['kullanici_id'] ?>"
                        class="btn btn-danger" style="padding:6px">Sil</a>
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
</div>
<!-- /page content -->


<?php include 'inc/footer.php'; ?>