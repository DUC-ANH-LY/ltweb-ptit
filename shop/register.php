<?php
require_once('../admin/dbhelp.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <meta name="author" content="" />
  <!-- base href="/app/public/themes/default/" -->
  <link rel="icon" href="../../favicon.ico" />

  <title>eshop</title>

  <!-- Bootstrap core CSS -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- link href="css/bootstrap.css" rel="stylesheet"-->
  <!-- link href="css/stylesheet.css" rel="stylesheet"-->
</head>

<body>
  <div class="page-container">
    <div id="top-nav" class="bg-light smaller-font-size text-muted">
      <nav class="navbar-expand-md container px-3">
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-toggle="collapse"
          data-target="#navbarsExampleDefault"
          aria-controls="navbarsExampleDefault"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link text-muted" href="#"><i class="la la-heart"></i>
                <span class="hidden-xs hidden-sm hidden-md">Yêu thích (0)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted" href="#"><i class="la la-shopping-cart"></i>
                <span class="hidden-xs hidden-sm hidden-md">Giỏ hàng</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-muted" href="#"><i class="la la-share"></i>
                <span class="hidden-xs hidden-sm hidden-md">Thanh toán</span></a>
            </li>
          </ul>

          <ul class="navbar-nav float-right">
            <li class="nav-item dropdown float-right">
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>

            <li class="nav-item dropdown float-right">
              <a
                class="nav-link dropdown-toggle text-muted"
                href="http://example.com"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"><i class="la la-flag"></i>&ensp;VN</a>
              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <header class="container mt-5">
      <div class="row">
        <div class="col-md-3">
          <a href="index.php" class="logo">
            <h1 class="text-dark">
              <i class="text-secondary la la-plug"></i><span>electr<span class="text-secondary">o.</span></span>
            </h1>
            <small class="text-dark">Shop điện tử uy tín</small>
          </a>
        </div>

        <div class="col-md-5">
          <form class="">
            <div
              class="input-group input-group-lg mb-3"
              id="search-box"
              data-component-category>
              <input
                type="text"
                class="form-control default-font-size"
                placeholder="Tìm kiếm sản phẩm"
                aria-label="Tìm kiếm sản phẩm" />

              <select
                class="custom-select input-group-append form-control-lg no-border-x default-font-size">
                <option selected="">Danh mục</option>
                <?php
                $products = executeResult('SELECT 
                 * from danh_muc');
                foreach ($products as $item) {
                  echo '<option value="' . $item['id'] . '">' . $item['ten'] . '</option>';
                }

                ?>
              </select>

              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="la la-search"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="col-md-4">
          <div
            class="dropdown float-right"
            id="mini-cart"
            data-component-cart>
            <a
              class="btn btn-link dropdown-toggle bg-faded p-0 chevron-big"
              href="https://example.com"
              id="dropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <i
                class="la la-shopping-cart d-inline-block"
                style="font-size: 45px"><span class="cart-items" data-total_items><?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0   ?></span></i>&ensp;
              <div class="d-inline-block text-dark">
                <span class="small d-block text-left">Giỏ hàng</span>
              </div>
            </a>

            <div
              class="dropdown-menu dropdown-menu-right"
              aria-labelledby="dropdownMenuLink">
              <div>
                <p>
                  <a
                    href="cart.php"><strong><i class="la la-shopping-cart"></i> View Cart</strong></a>&nbsp;&nbsp;&nbsp;<a
                    href="checkout.php"><strong><i class="la la-share ml-3"></i> Checkout</strong></a>
                </p>
              </div>
            </div>
          </div>

          <div
            class="dropdown float-right"
            id="mini-user"
            data-component-user>
            <a
              class="btn btn-link dropdown-toggle bg-faded p-0 chevron-big"
              href="https://example.com"
              id="dropdownMenuLink"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false">
              <i class="la la-user d-inline-block" style="font-size: 42px"></i>&ensp;

              <div class="d-inline-block text-dark" data-if="login">


                <?php
                if (isset($_SESSION['user'])) {
                  echo '<span class="small d-block text-left">Xin chào ' . $_SESSION['user'] . '!</span>
                ';
                } else {
                  echo '<span class="small d-block text-left">Xin chào sếp!</span>
                  <span class="font-weight-bold">
                    Đăng nhập/Đăng kí</span>';
                }

                ?>

              </div>
            </a>
            <?php
            if (!isset($_SESSION['user'])) {
              echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="register.php">Đăng kí</a>
              <a class="dropdown-item" href="login.php">Đăng nhập</a>
            </div>
';
            } else {
              echo '<div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <a class="dropdown-item" href="../admin/logout.php">Đăng xuất</a>
            </div>';
            }

            ?>

          </div>
        </div>
      </div>

      <nav class="navbar navbar-light bg-white rounded navbar-expand-md mt-4">
        <button
          class="navbar-toggler navbar-toggler-right"
          type="button"
          data-toggle="collapse"
          data-target="#containerNavbar"
          aria-controls="containerNavbar"
          aria-expanded="false"
          aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="containerNavbar">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown Categories-dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="http://example.com"

                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"><i class="la la-bars"></i>&ensp; Danh mục
                <i class="la la-angle-down float-right"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdown04">
                <?php
                $products = executeResult('SELECT 
                 * from danh_muc');
                foreach ($products as $item) {
                  echo '<a class="dropdown-item" href="category.php?id=' . $item['id'] . '">' . $item['ten'] . '</a>';
                }

                ?>
              </div>
            </li>

            <li class="nav-item active">
              <a class="nav-link" href="index.php">Trang chủ <span class="sr-only">(current)</span></a>
            </li>

            <li>
              <a
                class="nav-link"
                href="about.php">Về chúng tôi</a>
              <!-- <div class="dropdown-menu" aria-labelledby="dropdown04">
                <a class="dropdown-item" href="#">FAQ</a>
                <a class="dropdown-item" href="#">Our Story</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div> -->
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Liên hệ</a>
            </li>
          </ul>
        </div>
      </nav>
    </header>






    <div class="content">
      <div class="container">
        <div class="thickline"></div>
      </div>

      <div class="container mt-5">
        <div class="row">
          <div class="col-3"></div>
          <div class="col-6">
            <h3>Đăng kí</h3>
            <?php

            if (isset($_SESSION["thongbao"])) {
              echo $_SESSION["thongbao"];
              session_unset();
            } ?>
            <form method="post" action="../admin/register_submit.php">
              <div class="form-group row">
                <label for="inputEmail2" class="col-sm-3 col-form-label">Tên người dùng</label>
                <div class="col-sm-10">
                  <input
                    type="text"
                    name="username"
                    class="form-control"
                    id="inputEmail2"
                    placeholder="Email" />
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword2" class="col-sm-3 col-form-label">Mật khẩu</label>
                <div class="col-sm-10">
                  <input
                    type="password"
                    name="password"
                    class="form-control"
                    id="inputPassword2"
                    placeholder="Password" />
                </div>
              </div>
              <div class="form-group row">
                <label for="inputPassword3" class="col-sm-3 col-form-label">Nhập lại</label>
                <div class="col-sm-10">
                  <input
                    type="password"
                    name="repassword"
                    class="form-control"
                    id="inputPassword3"
                    placeholder="Password" />
                </div>
              </div>

              <div class="form-group row">
                <div class="col-sm-10">
                  <button type="submit" name="submit" class="btn btn-primary">
                    Tạo tài khoản
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <footer class="bg-faded text-muted py-5 mt-5">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <h5>KẾT NỐI VỚI ELECTRO</h5>
            <ul class="list-unstyled">

              <li><img src="./img/logo/facebook_icon_8543190720.svg" alt=""><img class="ml-2" src="./img/logo/youtube_icon_b492d61ba5.svg" alt=""><img class="ml-2" src="./img/logo/tiktok_icon_faabbeeb61.svg" alt=""><img class="ml-2" src="./img/logo/zalo_icon_8cbef61812.svg" alt=""></li>
              <li class="mt-3"><a href="#" class="font-weight-bold">Tư vấn mua hàng (Miễn phí)
                  1800.6601 (Nhánh 1)</a></li>
              <li class="font-weight-bold mt-3"><a href="#" class="font-weight-bold">Hỗ trợ kỹ thuật
                </a></li>
              <li class="font-weight-bold "><a href="#">1800.6601 (Nhánh 2)<a></li>
              <li class="font-weight-bold mt-3"><a href="#">Góp ý, khiếu nại</a>
              </li>
              <li class="font-weight-bold "><a href="#">1800.6616 (8h00 - 22h00)</a></li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h5>Chăm sóc khách hàng</h5>
            <ul class="list-unstyled">
              <li><a href="#">Liên hệ</a></li>
              <li><a href="#">Chính sách trả hàng</a></li>
              <li><a href="#">Địa chỉ google maps</a></li>
              <li><a href="#">Giới thiệu về công ty</a></li>
              <li><a href="#">Tin tức khuyến mại</a></li>
              <li><a href="#">Tra cứu hoá đơn điện tử</a></li>
              <li><a href="#">Tra cứu bảo hành</a></li>
              <li><a href="#">Câu hỏi thường gặp</a></li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h5>CHÍNH SÁCH</h5>
            <ul class="list-unstyled">
              <li><a href="#">Chính sách bảo hành</a></li>
              <li><a href="#">Chính sách đổi trả</a></li>
              <li><a href="#">Chính sách bảo mật</a></li>
              <li><a href="#">Chính sách trả góp</a></li>
              <li><a href="#">Chính sách khui hộp sản phẩm</a></li>
              <li><a href="#">Chính sách giao hàng & lắp đặt</a></li>
              <li><a href="#">Chính sách thu thập & xử lý dữ liệu cá nhân</a></li>
            </ul>
          </div>
          <div class="col-sm-3">
            <h5>Liên hệ</h5>
            <ul class="list-unstyled">
              <li class="mb-3"><a href="#">Địa chỉ</a></li>
              <!-- <li><a href="#">Lịch sử đặt hàng</a></li>
              <li><a href="#">Yêu thích</a></li> -->
              <li>
                <div style="max-width:100%;overflow:hidden;color:red;width:1000px;height:250px;">
                  <div id="embedded-map-display" style="height:100%; width:100%;max-width:100%;"><iframe style="height:100%;width:100%;border:0;" frameborder="0" src="https://www.google.com/maps/embed/v1/place?q=Đức+Thắng,+Bac+Tu+Liem,+Hanoi,+Vietnam&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8"></iframe></div><a class="embedded-map-code" href="https://www.bootstrapskins.com/themes" id="get-map-data">premium bootstrap themes</a>
                  <style>
                    #embedded-map-display img.text-marker {
                      max-width: none !important;
                      background: none !important;
                    }

                    img {
                      max-width: none
                    }
                  </style>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <p class="float-right">
          <a href="#">Trở về đầu trang</a>
        </p>
      </div>
    </footer>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script -->
  <script src="js/jquery.min.js"></script>
  <!-- script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script -->
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>