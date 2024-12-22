<?php
session_start();
if (!isset($_SESSION["Admin"])) {
    header("location:login.php");
}
?>

<?php
require_once('dbhelp.php');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý sinh viên</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span></button>
                <a class="navbar-brand" href="admin.php"><span>Quản Trị</span> SINH VIÊN </a>
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="admin.php">
                            <em class="fa fa-envelope"></em><span class="label label-danger">15</span>
                        </a>
                        <ul class="dropdown-menu dropdown-messages">
                            <li>
                                <div class="dropdown-messages-box"><a href="profile.php" class="pull-left">
                                        <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">3 phút trước</small>
                                        <a href="#"><strong>John Doe</strong> bình luận<strong> ảnh của bạn</strong>.</a>
                                        <br /><small class="text-muted">1:24 pm - 7/5/2020</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="dropdown-messages-box"><a href="#" class="pull-left">
                                        <img alt="image" class="img-circle" src="http://placehold.it/40/30a5ff/fff">
                                    </a>
                                    <div class="message-body"><small class="pull-right">1 giờ trước</small>
                                        <a href="#">Một tin nhắn mới từ <strong> Jane Doe</strong>.</a>
                                        <br /><small class="text-muted">12:27 pm - 7/05/2020</small>
                                    </div>
                                </div>
                            </li>
                            <li class="divider"></li>
                            <li>
                                <div class="all-button"><a href="#">
                                        <em class="fa fa-inbox"></em> <strong> Hòm thư </strong>
                                    </a></div>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                            <em class="fa fa-bell"></em><span class="label label-info">5</span>
                        </a>
                        <ul class="dropdown-menu dropdown-alerts">
                            <li><a href="admin.php">
                                    <div><em class="fa fa-envelope"></em> 1 Tin nhắn mới
                                        <span class="pull-right text-muted small"> 3 phút trước </span>
                                    </div>
                                </a></li>
                            <li class="divider"></li>
                            <li><a href="admin.php">
                                    <div><em class="fa fa-heart"></em> 12 lượt yêu thích mới
                                        <span class="pull-right text-muted small">4 phút trước </span>
                                    </div>
                                </a></li>
                            <li class="divider"></li>
                            <li><a href="admin.php">
                                    <div><em class="fa fa-user"></em> 5 lượt theo dõi mới
                                        <span class="pull-right text-muted small">4 phút trước </span>
                                    </div>
                                </a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div><!-- /.container-fluid -->
    </nav>

    <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
        <div class="profile-sidebar">
            <div class="profile-userpic">
                <img src="./images/download.jpg" class="img-responsive" alt="">
            </div>
            <div class="profile-usertitle">
                <div class="profile-usertitle-name">DarkQuy</div>
                <div class="profile-usertitle-status"><span class="indicator label-success"></span>Trực tuyến</div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="divider"></div>
        <form role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Tìm kiếm">
            </div>
        </form>

        <ul class="nav menu">
            <li class="active"><a href="charts.php"><em class="fa fa-bar-chart">&nbsp;</em> Thống kê </a></li>
            <li><a href="qlncc.php"><em class="fa label-default">&nbsp;</em> Danh sách nhà cung cấp</a></li>
            <li><a href="qlsp.php"><em class="fa label-default">&nbsp;</em> Danh sách sản phẩm</a></li>
            <li><a href="qldm.php"><em class="fa label-default">&nbsp;</em> Danh sách danh mục</a></li>
            <li><a href="qlncc.php"><em class="fa label-default">&nbsp;</em> Danh sách hóa đơn</a></li>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
        </ul>
    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="admin.php">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Biểu đồ</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Biểu đồ</h1>
            </div>
        </div><!--/.row-->

        <div class="row">
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <?php
                        $ncc = executeResult('select count(id) as count from nha_cung_cap');
                        ?>
                        <h3>Số nhà cung cấp</h3>
                        <div>
                            <h1><?= $ncc[0]['count'] ?></h1>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <?php
                        $ncc = executeResult('select count(id) as count from san_pham');
                        ?>
                        <h3>Số sản phẩm</h3>
                        <div>
                            <h1><?= $ncc[0]['count'] ?></h1>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h3>Tổng tiền mua hàng</h3>
                        <?php
                        $ncc = executeResult('SELECT SUM(gia_mua*so_luong) as s
FROM san_pham;');
                        ?>
                        <div>
                            <h1><?= currency_format($ncc[0]['s']) ?></h1>
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h3>Tổng tiền bán hàng</h3>
                        <?php
                        $ncc = executeResult('SELECT SUM(sanpham_hoadon.gia_ban*sanpham_hoadon.so_luong) as s
FROM sanpham_hoadon');
                        ?>
                        <div>
                            <h1><?= currency_format($ncc[0]['s']) ?></h1>
                        </div>
                    </div>
                </div>
            </div>

        </div><!--/.row-->
        <div class="col-md-10">
            <h3>Thống kê nhà cung cấp </h3>
            <canvas id="myChart"></canvas>
        </div>
        <div class="col-md-10">
            <h3>Thống kê hóa đơn</h3>
            <canvas id="myChart1"></canvas>
        </div>

    </div><!--/.row-->
    </div> <!--/.main-->


    <!-- <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    <?php
    $ncc = executeResult('select * from nha_cung_cap');
    $ncc_name = array_map(function ($nccc) {
        return $nccc["ten"];
    }, $ncc);
    $so_san_pham  = array_map(function ($nccc) {
        $ssp = executeResult('select count(*) as count from san_pham where nha_cung_cap_id = ' . $nccc['id']);
        return $ssp[0]["count"];
    }, $ncc);

    $doanh_thu = executeResult("SELECT 
    DATE_FORMAT(ngay_mua, '%m') AS thang,
    SUM(tong_tien) AS doanh_thu
FROM 
    hoa_don
GROUP BY 
    thang
ORDER BY 
    thang");

    // $thang  = array_map(function ($doanh_thuu) {
    //     return $doanh_thuu["thang"];
    // }, $doanh_thu);
    $doanh_thu_thang = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
    foreach ($doanh_thu as $doanh_thuu) {
        $doanh_thu_thang[(int)$doanh_thuu['thang'] - 1] = $doanh_thuu['doanh_thu'];
    }
    ?>
    <script>
        const ctx = document.getElementById('myChart');
        const ctx1 = document.getElementById('myChart1');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [<?php echo '"' . implode('","', $ncc_name) . '"' ?>],
                datasets: [{
                    label: 'Số sản phẩm',
                    data: [<?php echo '"' . implode('","', $so_san_pham) . '"' ?>],
                    // borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                        }
                    }
                }
            }
        });


        new Chart(ctx1, {
            type: "line",
            data: {
                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
                datasets: [{
                    label: 'Doanh thu theo tháng',
                    data: [<?php echo '"' . implode('","', $doanh_thu_thang) . '"' ?>],
                    borderColor: "blue",
                    fill: false
                }, ]
            },
            options: {
                legend: {
                    display: false
                }
            }
        });
    </script>

</body>

</html>