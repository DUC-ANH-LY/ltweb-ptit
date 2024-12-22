<?php
session_start();
if (!isset($_SESSION["Admin"])) {
    header("location:login.php");
}
?>
<?php
require_once('dbhelp.php');

$s_ten = '';

if (!empty($_POST)) {
    $s_ID = '';
    if (isset($_POST['ten'])) {
        $s_ten = $_POST['ten'];
    }
    if (isset($_POST['id'])) {
        $s_ID = $_POST['id'];
    }

    $s_ten    = str_replace('\'', '\\\'', $s_ten);

    if ($s_ID != '') {
        //update
        $sql = "UPDATE danh_muc SET ten = '$s_ten'" . "WHERE id = " . $s_ID;
    } else {
        //insert
        $sql = " INSERT INTO danh_muc (ten) VALUES ('$s_ten')";
    }
    execute($sql);
    header('Location: qldm.php');
    // die();
}

$ID = '';
if (isset($_GET['ID'])) {
    $ID          = $_GET['ID'];
    $sql         = 'SELECT * FROM danh_muc WHERE id = ' . $ID;
    $List = executeResult($sql);

    if ($List != null && count($List) > 0) {
        $std         = $List[0];
        $s_ten     = $std['ten'];
    } else {
        $ID = '';
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
            <li class="active"><a href="qldm.php"><em class="fa label-default">&nbsp;</em> Danh sách danh mục</a></li>
            <li><a href="qlhd.php"><em class="fa label-default">&nbsp;</em> Danh sách hóa đơn</a></li>
            <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Đăng xuất</a></li>
        </ul>
    </div><!--/.sidebar-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="admin.php">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active"><?= isset($_GET['ID']) ? "Sửa" : "Thêm"; ?> THÔNG TIN DANH MỤC </li>
            </ol>
        </div><!--/.row-->

        <div class="container">
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><b><?= isset($_GET['ID']) ? "Sửa" : "Thêm"; ?> Danh mục </b></h1>
                    </div>
                </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="ten">Tên Categories</label>
                            <input type="number" name="id" value="<?= $ID ?>" style="display: none;">

                            <input required="true" type="text" class="form-control" id="ten" name="ten" value="<?= $s_ten ?>">
                        </div>
                        <button class="btn btn-success">Lưu</button>
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