<?php
session_start();
if (!isset($_SESSION["Admin"])) {
    header("location:login.php");
}
?>
<?php
require_once('dbhelp.php');

$ten_khach_hang = $ngay_mua = $mo_ta = $tong_tien = '';
$ID = '';
if (isset($_GET['ID'])) {
    $ID          = $_GET['ID'];
    $sql         = 'SELECT * FROM hoa_don WHERE id = ' . $ID;
    $List = executeResult($sql);

    if ($List != null && count($List) > 0) {
        $std         = $List[0];
        $ten_khach_hang     = $std['ten_khach_hang'];
        $ngay_mua    = $std['ngay_mua'];
        $mo_ta     = $std['mo_ta'];
        $tong_tien       = $std['tong_tien'];
    }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý nhà cung cấp</title>
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
                <a class="navbar-brand" href="admin.php"><span>Quản Trị</span> NHÀ CUNG CẤP </a>
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
            <li><a href="charts.php"><em class="fa fa-bar-chart">&nbsp;</em> Thống kê </a></li>
            <li><a href="qlncc.php"><em class="fa label-default">&nbsp;</em> Danh sách nhà cung cấp</a></li>
            <li><a href="qlsp.php"><em class="fa label-default">&nbsp;</em> Danh sách sản phẩm</a></li>
            <li><a href="qldm.php"><em class="fa label-default">&nbsp;</em> Danh sách danh mục</a></li>
            <li class="active"><a href="qlncc.php"><em class="fa label-default">&nbsp;</em> Danh sách hóa đơn</a></li>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
        </ul>
    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="admin.php">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Xem chi tiết hóa đơn </li>
            </ol>
        </div><!--/.row-->

        <div class="container">
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><b>XEM CHI TIẾT HÓA ĐƠN</b></h1>
                    </div>
                </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="ten">Tên khách hàng</label>
                            <p><?= $ten_khach_hang ?></p>
                        </div>
                        <div class="form-group">
                            <label for="mo_ta">Mô tả</label>
                            <p><?= $mo_ta ?></p>
                        </div>
                        <div class="form-group">
                            <label for="mo_ta">Ngày mua</label>
                            <p><?= $ngay_mua ?></p>
                        </div>
                        <div class="form-group">
                            <label for="mo_ta">Tổng tiền</label>
                            <p><?= currency_format($tong_tien) ?></p>
                        </div>

                        <div class="form-group">
                            <label for="mo_ta">Sản phẩm</label>
                            <table class="table">
                        </div>

                        <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng </th>
                                <th scope="col">Giá bán</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $products = executeResult("select *,sanpham_hoadon.so_luong as 'so_luong_hoa_don' from sanpham_hoadon join san_pham on sanpham_hoadon.san_pham_id = san_pham.id where hoa_don_id = " . $ID);
                            $total = 0;
                            $i = 1;
                            foreach ($products as $item) {
                                echo '<tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $item['ten'] . '</td>
                                <td>' . $item['so_luong_hoa_don'] . '</td>
                                <td>' . currency_format($item['gia_ban']) . '</td>
                                ';
                                $i += 1;
                            }
                            echo '
                                <tr class="total">
                                    <th scope="row">Tổng</th>
                                    <td></td>
                                    <td></td>
                                    <td>' .  currency_format($tong_tien) . '</td>
                                </tr>';
                            ?>

                        </tbody>
                        </table>
                        <a class="btn btn-success" href="qlhd.php">Trở về</a>
                    </form>
                </div>
            </div>
        </div>
</body>
<script src="./js/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#blah').attr('src', e.target.result);
                $('#blah').show()
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

</html>