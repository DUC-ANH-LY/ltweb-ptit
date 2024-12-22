<?php


header('Location: ' . 'shop');
require_once('dbhelp.php');
session_start();


if (isset($_POST['san_pham'])) {
    // die(var_dump($_GET));
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
                            <span><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0   ?></span>
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
    <!-- Masthead-->
    <header class="masthead bg-info  text-white text-center">
        <div class="container d-flex align-items-center flex-column">
            <!-- Masthead Avatar Image-->
            <img class="masthead-avatar mb-5" src="./images/download.jpg" alt="" />
            <!-- Masthead Heading-->
            <h1 class="masthead-heading text-uppercase mb-0">PTIT SHOP</h1>
            <br>
            <!-- <h1>BƯU CHÍNH VIỄN THÔNG</h1> -->
            <!-- Icon Divider-->
            <div class="divider-custom divider-light">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                <div class="divider-custom-line"></div>
            </div>
            <!-- Masthead Subheading-->
            <!-- <p class="masthead-subheading font-weight-light mb-0">Posts and Telecommunications Institute of Technology</p> -->
        </div>
    </header>


    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="..." class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <div class="container mt-5">
        <div class="row row-cols-md-3 g-5">

            <?php
            $products = executeResult('select * from san_pham');
            foreach ($products as $item) {
                $ncc = null;
                if (isset($item['nha_cung_cap_id']) && $item['nha_cung_cap_id'] != '') {
                    $ncc = executeResult('select * from nha_cung_cap where id = ' . $item['nha_cung_cap_id']);
                    // die(var_dump($ncc));
                }
                echo '<div class="col">
                <div class="card">
                    <img src=".' . $item['image'] . '" class="card-img-top" height="300px !important" alt="anh_san_pham">
                    <div class="card-body">
                        <h5 class="card-title">' . 'Tên sản phẩm: ' . $item['ten'] . '</h5>
                        <p class="card-text">' . 'Mô tả: ' . $item['mo_ta'] . '</p>
                        <p class="card-text">' . 'Giá bán: ' . currency_format($item['gia_ban']) . '</p>
                        <p class="card-text">' . 'Tên nhà cung cấp: ' . (isset($ncc[0]) ? ($ncc[0]['ten']) : "Không tìm thấy") . '</p>
                        <form method="POST"> <input type="hidden"name="san_pham" value="' . $item['id'] . '">
                        <button type="submit" class="btn btn-primary"  >Thêm vào giỏ</a>
                        </form>
                    </div>
                </div>
            </div>';
            }
            ?>



        </div>
    </div>





    <!-- Portfolio Section-->

    <section class="page-section" id="contact">
        <div class="container">

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
    <!-- Contact form JS-->
    <script src="assets/mail/jqBootstrapValidation.js"></script>
    <script src="assets/mail/contact_me.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
</body>

<script>
    // document.cookie = "username=John Doe; expires=Thu, 18 Dec 2024 12:00:00 UTC";
    // document.cookie = "username=John Doe";
</script>

</html>