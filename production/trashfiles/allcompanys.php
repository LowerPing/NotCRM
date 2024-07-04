<?php

include "inc/header.php";

include "inc/sidebar.php";

include "inc/navbar.php";




?>

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
                                    <a href="inc/islem.php?pagesil=ok&id=<?= $pagecek['id'] ?>"
                                        class="btn btn-danger sil_butonu" style="padding:6px">Sil</a>
                                </td>

                            </tr>

                        <?php } ?>

                    </tbody>
                </table>


            </div>
        </div>
    </div>
</div>