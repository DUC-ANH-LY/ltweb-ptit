<?php
session_start();
if (!isset($_SESSION["Admin"])) {
    header("location:login.php");
}
?>
<?php
require_once('dbhelp.php');

$s_danh_muc = $s_image_path = $s_ten = $s_gia_ban = $s_so_luong = $s_mo_ta = $s_gia_mua = $s_nha_cung_cap = '';

if (!empty($_POST)) {
    $s_ID = '';
    if (isset($_POST['ten'])) {
        $s_ten = $_POST['ten'];
    }
    if (isset($_POST['mo_ta'])) {
        $s_mo_ta = $_POST['mo_ta'];
    }
    if (isset($_POST['danh_muc'])) {
        $s_danh_muc = $_POST['danh_muc'];
    }
    if (isset($_POST['gia_mua'])) {
        $s_gia_mua = $_POST['gia_mua'];
    }

    if (isset($_POST['gia_ban'])) {
        $s_gia_ban = $_POST['gia_ban'];
    }

    if (isset($_POST['so_luong'])) {
        $s_so_luong = $_POST['so_luong'];
    }
    if (isset($_POST['nha_cung_cap'])) {
        $s_nha_cung_cap = $_POST['nha_cung_cap'];
    }

    if (isset($_POST['id'])) {
        $s_ID = $_POST['id'];
    }
    // Get reference to uploaded image
    $image_file = $_FILES["image"];
    $image_path = "";
    // Exit if no file uploaded
    if (isset($image_file)) {
        // Exit if is not a valid image file
        if ($image_file["tmp_name"] != '') {
            $image_path = "/images/" . $image_file["name"];

            // Move the temp image file to the images/ directory
            move_uploaded_file(
                // Temp image location
                $image_file["tmp_name"],

                // New image location
                __DIR__ . $image_path
            );
        }
    }

    $s_ten    = str_replace('\'', '\\\'', $s_ten);
    $s_gia_ban      = str_replace('\'', '\\\'', $s_gia_ban);
    $s_so_luong    = str_replace('\'', '\\\'', $s_so_luong);
    $s_ID       = str_replace('\'', '\\\'', $s_ID);
    $s_gia_mua    = str_replace('\'', '\\\'', $s_gia_mua);
    $s_nha_cung_cap      = str_replace('\'', '\\\'', $s_nha_cung_cap);
    $s_mo_ta   = str_replace('\'', '\\\'', $s_mo_ta);
    $s_image_path   = str_replace('\'', '\\\'', $image_path);

    if ($s_ID != '') {
        //update
        $str = ($s_image_path == '') ?  "" :  ",image = '$s_image_path' ";
        $sql = "UPDATE san_pham SET ten = '$s_ten', mo_ta = '$s_mo_ta', gia_mua = '$s_gia_mua', gia_ban = '$s_gia_ban', so_luong = '$s_so_luong', nha_cung_cap_id = '$s_nha_cung_cap', danh_muc_id = '$s_danh_muc' " .  $str . "WHERE id = " . $s_ID;
    } else {
        //insert
        $sql = "INSERT INTO san_pham (ten,mo_ta,gia_mua, gia_ban, so_luong,nha_cung_cap_id,danh_muc_id,image) VALUES ('$s_ten','$s_mo_ta', '$s_gia_mua', '$s_gia_ban', '$s_so_luong','$s_nha_cung_cap','$s_danh_muc','$s_image_path')";
    }


    execute($sql);
    header('Location: qlsp.php');
    // die();
}

$ID = '';
if (isset($_GET['ID'])) {
    $ID          = $_GET['ID'];
    $sql         = 'SELECT * FROM san_pham WHERE id = ' . $ID;
    $List = executeResult($sql);

    if ($List != null && count($List) > 0) {
        $std         = $List[0];
        $s_ten     = $std['ten'];
        $s_mo_ta    = $std['mo_ta'];
        $s_gia_mua     = $std['gia_mua'];
        $s_gia_ban       = $std['gia_ban'];
        $s_danh_muc       = $std['danh_muc_id'];
        $s_so_luong     = $std['so_luong'];
        $s_nha_cung_cap       = $std['nha_cung_cap_id'];
        $s_image_path     = $std['image'];
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

    <link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
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
            <li class="active"><a href="qlsp.php"><em class="fa label-default">&nbsp;</em> Danh sách sản phẩm</a></li>
            <li><a href="qldm.php"><em class="fa label-default">&nbsp;</em> Danh sách danh mục</a></li>
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
                <li class="active"><?= isset($_GET['ID']) ? "Sửa" : "Thêm"; ?> thông tin sản phẩm </li>
            </ol>
        </div><!--/.row-->

        <div class="container">
            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"><b><?= isset($_GET['ID']) ? "Sửa" : "Thêm"; ?> SẢN PHẨM </b></h1>
                    </div>
                </div>
                <div class="panel-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="ten">Tên sản phẩm</label>
                            <input type="number" name="id" value="<?= $ID ?>" style="display: none;">

                            <input required="true" type="text" class="form-control" id="ten" name="ten" value="<?= $s_ten ?>">
                        </div>
                        <div class="form-group">
                            <label for="mo_ta">Mô tả</label>
                            <input type="text" class="form-control" id="mo_ta" name="mo_ta" value="<?= $s_mo_ta ?>">
                        </div>
                        <div class="form-group">
                            <label for="email">Nhà cung cấp</label>
                            <br>
                            <br>
                            <?php
                            $res = executeResult("SELECT * FROM nha_cung_cap");
                            // var_dump($res);
                            ?>
                            <select class="form-select" name="nha_cung_cap" required>
                                <option value="" selected>Chọn nhà cung cấp</option>
                                <?php
                                foreach ($res as $item) {
                                    if ($s_nha_cung_cap == $item['id']) {
                                        echo '<option value="' . $item['id'] . '" selected>' . $item['ten'] . '</option>';
                                    } else {
                                        echo '<option value="' . $item['id'] . '">' . $item['ten'] . '</option>';
                                    }
                                }

                                ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="danh_muc">Categories</label>
                            <br>
                            <br>
                            <?php
                            $res = executeResult("SELECT * FROM danh_muc");
                            ?>
                            <select name="danh_muc" id="danh_muc">
                                <?php
                                foreach ($res as $item) {
                                    if ($s_danh_muc == $item['id']) {
                                        echo '<option value="' . $item['id'] . '" selected>' . $item['ten'] . '</option>';
                                    } else {
                                        echo '<option value="' . $item['id'] . '">' . $item['ten'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="gia_mua">Giá mua</label>
                            <input type="text" class="form-control" id="gia_mua" name="gia_mua" value="<?= $s_gia_mua ?>">
                        </div>
                        <div class="form-group">
                            <label for="gia_ban">Giá bán</label>
                            <input type="text" class="form-control" id="gia_ban" name="gia_ban" value="<?= $s_gia_ban ?>">
                        </div>
                        <div class="form-group">
                            <label for="so_luong">Số lượng</label>
                            <input type="text" class="form-control" id="so_luong" name="so_luong" value="<?= $s_so_luong ?>">
                        </div>
                        <div class="form-group">
                            <label for="nha_cung_cap">Ảnh</label>
                            <input type="file" name="image" id="image" onchange="readURL(this);">
                            <img id="blah" src="<?php echo $s_image_path != '' ? '.' . $s_image_path : '#' ?>"
                                alt="your image" accept="image/png, image/gif, image/jpeg" style="<?php
                                                                                                    if ($s_image_path == '') echo "display:none;";
                                                                                                    ?>width:50%; margin-top:20px;" />
                        </div>
                        <button class="btn btn-success">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
</body>
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>
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