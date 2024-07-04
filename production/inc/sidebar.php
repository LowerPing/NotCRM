<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0; margin:15px 0px 0px 0px">
                        <a href="./index.php">
                            <img src="../production/images/logo.png" alt="Prosense logo" height="55">
                        </a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">

                            <span>Hoşgeldin</span>

                            <br>

                            <?php if ($kullaniciceksession['kullanici_yetki'] == 5) { ?>

                                <h2>
                                    <i class="fa fa-star"></i>
                                    <?= $kullaniciceksession['kullanici_ad'] ?>
                                </h2>

                            <?php } else { ?>
                                <h2>
                                    <?= $kullaniciceksession['kullanici_ad'] ?>
                                </h2>
                            <?php } ?>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <div class="menu_section">
                            <h3>General</h3>
                            <ul class="nav side-menu">
                                <li><a><i class="fa fa-home"></i> Not Ayarları <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="index.php">Anasayfa</a></li>
                                        <li><a href="../production/gaspercentage.php">Gaz Ve Değerleri</a></li>
                                        <!--   <li><a href="../production/allcompany.php">Tüm Firmalar</a></li>
                                        <li><a href="../production/addcompany.php">Firma Ekle</a></li> -->
                                        <!-- <li><a href="../production/products.php">Ürünler</a></li> -->
                                    </ul>






                                    <!--   <li><a><i class="fa fa-table"></i> Tables <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="tables.html">Tables</a></li>
                                        <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span
                                            class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="chartjs.html">Chart JS</a></li>
                                        <li><a href="chartjs2.html">Chart JS2</a></li>
                                        <li><a href="morisjs.html">Moris JS</a></li>
                                        <li><a href="echarts.html">ECharts</a></li>
                                        <li><a href="other_charts.html">Other Charts</a></li>
                                    </ul>
                                </li>
                                <li><a><i class="fa fa-clone"></i>Layouts <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu">
                                        <li><a href="fixed_sidebar.html">Fixed Sidebar</a></li>
                                        <li><a href="fixed_footer.html">Fixed Footer</a></li>
                                    </ul>
                                </li> -->

                                    <?php if ($kullaniciceksession['kullanici_yetki'] >= 5) { ?>

                                    <li><a><i class="fa fa-user"></i>Kullanıcı ekle / Admin <span
                                                class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="tables.php">Kullanıcılar</a></li>
                                            <li><a href="./kullaniciekleozel.php">Kullanıcı Ekle</a></li>
                                        </ul>
                                    </li>

                                    <li>

                                        <a class="" style="margin:auto; text-align:center" target="blank"
                                            href="https://www.prosense.com.tr/gazlar?lang=TR">
                                            <i style="float:left" class="fa fa-angle-double-right"></i> Prosense | Gazlar <!-- <span
                                                class="fa fa-chevron-down"></span> --></a>

                                    </li>


                                <?php } ?>
                            </ul>
                        </div>

                    </div>

                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <!--        <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>-->
                <!-- /menu footer buttons -->
            </div>
        </div>