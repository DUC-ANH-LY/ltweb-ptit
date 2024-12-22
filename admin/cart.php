<?php
require_once('dbhelp.php');
session_start();


if (isset($_POST['san_pham'])) {
    $id = $_POST['san_pham'];
    $sql = 'select * from san_pham where id = ' . $id;
    $product = executeResult($sql);
    if ($product != null && count($product) > 0) {
        $item = $product[0];
        if (isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['count'] += 1;
        } else {
            $item['count'] = 1;
            $_SESSION['cart'][$id] = $item;
        }
        $_SESSION['count'] = count($_SESSION['cart']);
    }
}

if (isset($_POST['xoa'])) {
    $id = $_POST['xoa'];
    $sql = 'select * from san_pham where id = ' . $id;
    $product = executeResult($sql);
    if ($product != null && count($product) > 0) {
        $item = $product[0];
        if (isset($_SESSION['cart'][$id])) {
            unset($_SESSION['cart'][$id]);
        }
    }
}


if (isset($_POST['thanh_toan'])) {
    if (!isset($_SESSION['user'])) {
        header('Location: login.php');
    } else {
        if (isset($_SESSION['cart'])) {
            // Tạo hóa đơn
            $hoa_don = "INSERT INTO `hoa_don` (`id`, `ten_khach_hang`, `ngay_mua`, `mo_ta`, `tong_tien`) VALUES (NULL, '" . $_SESSION['user'] . "','" . date('Y-m-d h:i:sa') . "', NULL, NULL)";
            $hoa_don_id = execute($hoa_don);
            $tong_tien = 0;
            foreach ($_SESSION['cart'] as $item) {
                $tong_tien += ($item['count'] * $item['gia_ban']);
                $sql = "INSERT INTO `sanpham_hoadon` (`id`, `san_pham_id`, `hoa_don_id`, `so_luong`, `gia_ban`) VALUES (NULL, '" . $item['id'] . "', '" . $hoa_don_id . "', '" . $item['count'] . "', '" . $item['gia_ban'] . "')";
                $product = execute($sql);
            }
            $cap_nhat_hoa_don = "UPDATE `hoa_don` SET `mo_ta` = 'Khách mua hàng', `tong_tien` = '" . $tong_tien . "' WHERE `hoa_don`.`id` =" . $hoa_don_id;
            execute($cap_nhat_hoa_don);
            unset($_SESSION['cart']);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Ptit Shop</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles1.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="#page-top">PTIT SHOP</a>
            <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                Menu
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="index.php">Trang chủ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="contact.php">Liên hệ</a></li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="cart.php">Giỏ hàng
                            <i class="fas fa-shopping-cart">
                            </i>
                            <span><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0  ?></span>
                        </a></li>
                    <?php
                    if (isset($_SESSION['user'])) {
                        echo  '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="logout.php">Đăng xuất</a></li> ';
                    } else {
                        echo  '<li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-2 rounded js-scroll-trigger" href="login.php">Đăng nhập</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <section class="page-section" id="contact">
        <br>
        <br>
        <br>
        <!-- Contact Section Heading-->
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Giỏ hàng</h2>
        <!-- Icon Divider-->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Contact Section Form-->
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <?php
                if (isset($_SESSION['status'])) {
                    if ($_SESSION['status'] == 'Thành công') {
                        echo '<div class="alert alert-success" role="alert">
            Thành công
        </div>';
                    } else {
                        echo '<div class="alert alert-danger" role="alert">
            Không thành công
        </div>';
                    }
                    unset($_SESSION['status']);
                }
                ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Số lượng </th>
                            <th scope="col">Giá bán</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                            // print_r($_SESSION['cart']);
                            $total = 0;
                            $i = 1;
                            foreach ($_SESSION['cart'] as $item) {
                                $total += $item['count'] * $item['gia_ban'];
                                echo '<tr>
                                <th scope="row">' . $i . '</th>
                                <td>' . $item['ten'] . '</td>
                                <td>' . $item['count'] . '</td>
                                <td>' . currency_format($item['gia_ban']) . '</td>
                                <td><form method="POST"> <input type="hidden" name="xoa" value="' . $item['id'] . '">
                        <button type="submit" class="btn btn-danger">Xóa</a>
                        </form></td>
                            </tr>';
                                $i += 1;
                            }
                            echo '
                                <tr class="total">
                                    <th scope="row">Tổng</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>' .  currency_format($total) . '</td>
                                </tr>';
                        } else {
                            echo '<tr>
                                <td colspan="5">Không có sản phẩm nào trong giỏ hàng</td>
                                </tr>';
                        }
                        ?>

                    </tbody>
                </table>
                <br />
                <?php
                if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
                    echo '<form method="POST"><input type="hidden" name="thanh_toan"><button class="btn btn-primary btn-xl float-right" type="submit">Thanh toán</button></form>';
                }

                ?>

            </div>
        </div>
        </div>
        </div>
    </section>

    <!-- Footer-->
    <footer class="footer text-center">
        <div class="container">
            <div class="row">
                <!-- Footer Location-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Địa chỉ </h4>
                    <p class="lead mb-0">
                        Km10, Đường Nguyễn Trãi
                        <br />
                        Q.Hà Đông, Hà Nội
                    </p>
                </div>
                <!-- Footer Social Icons-->
                <div class="col-lg-4 mb-5 mb-lg-0">
                    <h4 class="text-uppercase mb-4">Các mạng xã hội</h4>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-linkedin-in"></i></a>
                    <a class="btn btn-outline-light btn-social mx-1" href="#!"><i class="fab fa-fw fa-dribbble"></i></a>
                </div>
                <!-- Footer About Text-->
                <div class="col-lg-4">
                    <h4 class="text-uppercase mb-4">Giới thiệu về PTIT SHOP</h4>
                    <p class="lead mb-0">
                        Shop chuyên cung cấp các sản phẩm hoàng gia PTIT
                    </p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes)-->
    <div class="scroll-to-top d-lg-none position-fixed">
        <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top"><i class="fa fa-chevron-up"></i></a>
    </div>
    <!-- Portfolio Modals-->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
    <!-- Third party plugin JS-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

</html>