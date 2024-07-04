<?php include "inc/header.php" ?>

<?php include "inc/sidebar.php" ?>

<?php include "inc/navbar.php" ?>

<?php
$sql = $db->prepare("SELECT * FROM gasdetectors");

$sql->execute();

?>


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Gaz ve Değerleri <small>Gazların bilgilerine ve özelliklerine ulaşabilirsiniz.</small></h3>
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
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <table class="table">
                            <thead>

                                <tr>
                                    <th>Gaz</th>
                                    <th>Sensör Türü</th>
                                    <th>LEL (%)</th>

                                </tr>
                                
                            </thead>
                            <tbody>

                                <?php while ($gasdetectorsget = $sql->fetch(PDO::FETCH_ASSOC)) { ?>

                                    <tr>
                                        <td><?= $gasdetectorsget['gas_name'] ?></td>
                                        <td><?= $gasdetectorsget['sensor_type'] ?></td>
                                        <td style="color:red"><?= $gasdetectorsget['lel_percentage'] ?></td>
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