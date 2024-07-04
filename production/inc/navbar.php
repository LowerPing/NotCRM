<!-- top navigation -->

<?php

$notsor = $db->prepare("SELECT not_yapildi FROM notlar where not_yapildi=:id");

$notsor->execute(['id' => 0]);

$notsor->fetch(PDO::FETCH_ASSOC);



?>


<div class="top_nav">
    <div class="nav_menu">
        <nav>
            <!-- <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
            </div> -->

            <ul class="nav navbar-nav navbar-right">
                <li class="">
                    <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        <img src="images/img.jpg" alt="">
                        <?= $kullaniciceksession['kullanici_ad'] ?>
                        <span class=" fa fa-angle-down"></span>
                    </a>
                    <ul class="dropdown-menu dropdown-usermenu pull-right">

                        <li><a href="inc/islem.php?guvenlicikis=ok"><i class="fa fa-sign-out pull-right"></i> Güvenli
                                Çıkış</a>
                        </li>

                    </ul>
                </li>

                <li role="presentation" class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-envelope-o"></i>
                        <span class="badge bg-green">
                            <?= $notsor->rowCount() ?>
                        </span>
                    </a>


                    <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                        <?php

                        $notlar = $db->prepare("SELECT * FROM notlar where not_yapildi=:id");

                        $notlar->execute(['id' => 0]);

                        while ($notgetir = $notlar->fetch(PDO::FETCH_ASSOC)) {


                            ?>
                            <li>
                                <a href="../production/index.php">
                                    <span>
                                        <span>
                                            Tarih:
                                            <?= $notgetir['not_date'] ?>
                                        </span>
                                    </span>

                                    <span class="message">
                                        Açıklama:
                                        <?= $notgetir['not_description'] ?>
                                    </span>
                                </a>
                            </li>

                        <?php } ?>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->