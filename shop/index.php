<?php
require_once('../admin/dbhelp.php');
session_start();
require_once('cart_action.php');


?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta
    name="viewport"
    content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <meta name="description" content="" />
  <!-- base href="/app/public/themes/default/" -->
  <base href="" />
  <link rel="icon" href="../../favicon.ico" />

  <title>Electro Shop</title>

  <!-- Bootstrap core CSS -->
  <link href="css/style.css" rel="stylesheet" />
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

          <ul class="navbar-nav float-right" data-component-currency>
            <li class="nav-item dropdown float-right">

              <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
              </div>
            </li>

            <li class="nav-item dropdown float-right" data-component-language>
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

    <?php
    require_once('header.php');
    ?>

    <div class="content">
      <div id="slider" class="carousel slide slider">
        <ol class="carousel-indicators">
          <li data-target="#slider" data-slide-to="0" class="active"></li>
          <li data-target="#slider" data-slide-to="1"></li>
          <li data-target="#slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="">
              <div
                class="carousel-caption d-none d-md-block text-left container">
                <div class="caption-text float-left col-md-4">
                  <h1 class="font-weight-bold">iMac Pro 2.</h1>
                  <p class="font-weight-normal pb-4">
                    Imac đẹp nhất thị trường<br />
                    hiển thị cực kì sắc nét
                  </p>
                  <p>
                    <a
                      class="btn btn-md btn-outline-primary font-weight-bold px-5 py-2"
                      href="#"
                      role="button">Mua ngay &ensp; <i class="la la-arrow-right"></i></a>
                  </p>
                </div>
                <img src="img/ipad.png" class="float-right col-md-8" />
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="second-slide bg-light"
              src="./img/ipad.png"
              alt="Second slide" />
            <div class="">
              <div class="carousel-caption d-none d-md-block container text-right">
                <h1>Surface Pro 5</h1>
                <p>
                  Surface Pro 2017 hay còn gọi là Surface Pro 5 là
                  <br>mẫu laptop cao cấp mới nhất của dòng Surface
                  <br>
                  Ra mắt vào giữa năm 2017
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#" role="button">Đọc thêm</a>
                </p>
              </div>
            </div>
          </div>
          <div class="carousel-item">
            <img
              class="third-slide bg-light"
              src="./img/ipad.png"
              alt="Third slide" />
            <div class="">
              <div
                class="carousel-caption d-none d-md-block text-right container">
                <h1>Surface Pro 5 Core</h1>
                <p style="margin-left:600px;">
                  Surface Pro 2017 hay còn gọi là Surface Pro 5
                  Hoàn hảo từ thiết kế, ngoại hình, màn hình và tính năng.
                </p>
                <p>
                  <a class="btn btn-lg btn-primary" href="#" role="button">Khám phá</a>
                </p>
              </div>
            </div>
          </div>
        </div>
        <a
          class="carousel-control-prev"
          href="#slider"
          role="button"
          data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a
          class="carousel-control-next"
          href="#slider"
          role="button"
          data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

      <!-- div class="container mb-5">
			<div class="row">
				<div class="col-md-4 banner p">
					<a href="">
						<img class="img-fluid" src="http://xezpro.nicoletthemes.com/image/cache/catalog/banner1-cr-390x180.png" alt="">
					</a>
				</div>
				<div class="col-md-4 banner">
					<a href="">
						<img class="img-fluid" src="http://xezpro.nicoletthemes.com/image/cache/catalog/banner2-cr-390x180.png" alt="">
					</a>
				</div>
				<div class="col-md-4 banner">
					<a href="">
						<img class="img-fluid" src="http://xezpro.nicoletthemes.com/image/cache/catalog/banner3-cr-390x180.png" alt="">
					</a>
				</div>
			</div>
		</div -->

      <div class="container products-tab-carousel">
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a
              class="nav-item nav-link active"
              id="nav-home-tab"
              data-toggle="tab"
              href="#nav-home"
              role="tab"
              aria-controls="nav-home"
              aria-selected="true">Sản phẩm nổi bật</a>
            <a
              class="nav-item nav-link"
              id="nav-profile-tab"
              data-toggle="tab"
              href="#nav-profile"
              role="tab"
              aria-controls="nav-profile"
              aria-selected="false">Sản phẩm bán chạy</a>
            <a
              class="nav-item nav-link"
              id="nav-contact-tab"
              data-toggle="tab"
              href="#nav-contact"
              role="tab"
              aria-controls="nav-contact"
              aria-selected="false">Sản phẩm mới nhất</a>
          </div>
        </nav>
        <div class="tab-content" id="nav-tabContent">
          <div
            class="tab-pane fade show active"
            id="nav-home"
            role="tabpanel"
            aria-labelledby="nav-home-tab">
            <section
              class="container products clearfix">
              <div class="owl-carousel owl-theme">


                <?php
                $products = executeResult('select * from san_pham');
                foreach ($products as $item) {
                  $ncc = null;
                  if (isset($item['nha_cung_cap_id']) && $item['nha_cung_cap_id'] != '') {
                    $ncc = executeResult('select * from nha_cung_cap where id = ' . $item['nha_cung_cap_id']);
                  }

                  //       echo '<div class="col">
                  //     <div class="card">
                  //         <img src=".' . $item['image'] . '" class="card-img-top" height="300px !important" alt="anh_san_pham">
                  //         <div class="card-body">
                  //             <h5 class="card-title">' . 'Tên sản phẩm: ' . $item['ten'] . '</h5>
                  //             <p class="card-text">' . 'Mô tả: ' . $item['mo_ta'] . '</p>
                  //             <p class="card-text">' . 'Giá bán: ' . currency_format($item['gia_ban']) . '</p>
                  //             <p class="card-text">' . 'Tên nhà cung cấp: ' . (isset($ncc[0]) ? ($ncc[0]['ten']) : "Không tìm thấy") . '</p>
                  //             <form method="POST"> <input type="hidden"name="san_pham" value="' . $item['id'] . '">
                  //             <button type="submit" class="btn btn-primary"  >Thêm vào giỏ</a>
                  //             </form>
                  //         </div>
                  //     </div>
                  // </div>';

                  echo '<div class="item" data-product>
                  <article class="product">
                    <a href="product.php?id=' . $item['id'] . '" data-url>
                      <img
                        src="../admin/' . $item['image'] . '"
                        class="img-fluid"
                        data-img />
                    </a>

                    <h3>
                      <a
                        href="product.php?id=' . $item['id'] . '"
                        data-product-url
                        data-name
                        data-url>' . $item['ten']  . '</a>
                    </h3>

                    <span class="description" data-product-description>
                      ' . $item['mo_ta'] . '
                    </span>

                    <div class="price-group">
                      <div class="old-price">
                        <span class="currency" data-product-currency></span>
                        <span data-product-price>' . currency_format($item['gia_ban'] * 120 / 100) . '</span>
                      </div>

                      <div class="price">
                        <span class="currency" data-product-currency>$</span>
                        <span data-product-price>' . currency_format($item['gia_ban']) . '</span>
                      </div>
                    </div>

                    <div class="btngroup">
                       <form method="POST"> <input type="hidden"name="san_pham" value="' . $item['id'] . '">
                        <button
                          type="submit"
                          class="btn btn-sm btn-secondary"
                          title="Thêm vào giỏ"
                         >
                          <i class="la la-shopping-cart"></i> Thêm vào giỏ
                        </button>
                      </form>

                      <button
                        type="button"
                        class="btn btn-sm btn-link"
                        title="Add to favorites"
                        data-product-fav-url>
                        <i class="la la-heart"></i>
                      </button>

                      <button
                        type="button"
                        class="btn btn-sm btn-link"
                        title="Add to compare"
                        data-product-compare-url>
                        <i class="la la-exchange"></i>
                      </button>
                    </div>
                  </article>
                </div>';
                }
                ?>
              </div>
              <!-- row -->
            </section>
            <!-- products -->
          </div>
          <div
            class="tab-pane fade"
            id="nav-profile"
            role="tabpanel"
            aria-labelledby="nav-profile-tab">
            <div class="tab-content" id="nav-tabContent">
              <div
                class="tab-pane fade show active"
                id="nav-home"
                role="tabpanel"
                aria-labelledby="nav-profile-tab">
                <section
                  class="container products clearfix">
                  <div class="owl-carousel owl-theme">


                    <?php

                    $products = executeResult('SELECT 
    p.*,
    COUNT(po.san_pham_id) AS total_sold
FROM 
    san_pham p
JOIN 
    sanpham_hoadon po ON p.id = po.san_pham_id
GROUP BY 
    p.id, p.ten
ORDER BY 
    total_sold DESC
LIMIT 5');
                    foreach ($products as $item) {
                      $ncc = null;
                      if (isset($item['nha_cung_cap_id']) && $item['nha_cung_cap_id'] != '') {
                        $ncc = executeResult('select * from nha_cung_cap where id = ' . $item['nha_cung_cap_id']);
                      }

                      echo '<div class="item" data-product>
                      <article class="product">
                        <a href="product.php?id=' . $item['id'] . '" data-url>
                          <img
                            src="../admin/' . $item['image'] . '"
                            class="img-fluid"
                            data-img />
                        </a>
    
                        <h3>
                          <a
                            href="product.php?id=' . $item['id'] . '"
                            data-product-url
                            data-name
                            data-url>' . $item['ten']  . '</a>
                        </h3>
    
                        <span class="description" data-product-description>
                          ' . $item['mo_ta'] . '
                        </span>
    
                        <div class="price-group">
                          <div class="old-price">
                            <span class="currency" data-product-currency></span>
                            <span data-product-price>' . currency_format($item['gia_ban'] * 120 / 100) . '</span>
                          </div>
    
                          <div class="price">
                            <span class="currency" data-product-currency>$</span>
                            <span data-product-price>' . currency_format($item['gia_ban']) . '</span>
                          </div>
                        </div>
    
                        <div class="btngroup">
                         <form method="POST"> <input type="hidden"name="san_pham" value="' . $item['id'] . '">
                        <button
                          type="submit"
                          class="btn btn-sm btn-secondary"
                          title="Thêm vào giỏ"
                         >
                          <i class="la la-shopping-cart"></i> Thêm vào giỏ
                        </button>
                      </form>
                          <button
                            type="button"
                            class="btn btn-sm btn-link"
                            title="Add to favorites"
                            data-product-fav-url>
                            <i class="la la-heart"></i>
                          </button>
    
                          <button
                            type="button"
                            class="btn btn-sm btn-link"
                            title="Add to compare"
                            data-product-compare-url>
                            <i class="la la-exchange"></i>
                          </button>
                        </div>
                      </article>
                    </div>';
                    }
                    ?>
                  </div>
                  <!-- row -->
                </section>
                <!-- products -->
              </div>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="nav-contact"
            role="tabpanel"
            aria-labelledby="nav-contact-tab">
            <section
              class="container products clearfix">
              <div class="owl-carousel owl-theme">


                <?php
                $products = executeResult('select * from san_pham order by id desc limit 5');
                foreach ($products as $item) {
                  $ncc = null;
                  if (isset($item['nha_cung_cap_id']) && $item['nha_cung_cap_id'] != '') {
                    $ncc = executeResult('select * from nha_cung_cap where id = ' . $item['nha_cung_cap_id']);
                  }


                  echo '<div class="item" data-product>
                  <article class="product">
                    <a href="product.php?id=' . $item['id'] . '" data-url>
                      <img
                        src="../admin/' . $item['image'] . '"
                        class="img-fluid"
                        data-img />
                    </a>

                    <h3>
                      <a
                        href="product.php?id=' . $item['id'] . '"
                        data-product-url
                        data-name
                        data-url>' . $item['ten']  . '</a>
                    </h3>

                    <span class="description" data-product-description>
                      ' . $item['mo_ta'] . '
                    </span>

                    <div class="price-group">
                      <div class="old-price">
                        <span class="currency" data-product-currency></span>
                        <span data-product-price>' . currency_format($item['gia_ban'] * 120 / 100) . '</span>
                      </div>

                      <div class="price">
                        <span class="currency" data-product-currency>$</span>
                        <span data-product-price>' . currency_format($item['gia_ban']) . '</span>
                      </div>
                    </div>

                    <div class="btngroup">
                    
                    <form method="POST"> <input type="hidden"name="san_pham" value="' . $item['id'] . '">
                        <button
                          type="submit"
                          class="btn btn-sm btn-secondary"
                          title="Thêm vào giỏ"
                         >
                          <i class="la la-shopping-cart"></i> Thêm vào giỏ
                        </button>
                      </form>

                      <button
                        type="button"
                        class="btn btn-sm btn-link"
                        title="Add to favorites"
                        data-product-fav-url>
                        <i class="la la-heart"></i>
                      </button>

                      <button
                        type="button"
                        class="btn btn-sm btn-link"
                        title="Add to compare"
                        data-product-compare-url>
                        <i class="la la-exchange"></i>
                      </button>
                    </div>
                  </article>
                </div>';
                }
                ?>
              </div>
              <!-- row -->
            </section>
          </div>
        </div>
      </div>

      <section id="parallax_1" class="module parallax white mb-3">
        <div>
          <div class="container">
            <h3>Shop điện tử Electro</h3>
            <p>
              Đặt niềm tin khách hàng lên trên hết<br />
              Cam kết hàng nhập khẩu chất lượng cao
            </p>
            <a
              href="/index.php?route=product/category&amp;path=20"
              class="btn btn-default">Mua ngay!</a>
          </div>
        </div>
      </section>

    </div>

    <?php require_once('footer.php') ?>
  </div>

  <div
    class="alert alert-light alert-dismissible fade alert-top"
    role="alert">
    <div class="container">
      <div class="message">Sản phẩm đã thêm vào giỏ hàng.</div>

      <button type="button" class="close" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
  </div>

  <script src="js/jquery.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>

  <script>
    $(".owl-carousel").owlCarousel({
      loop: true,
      navRewind: true,
      margin: 10,
      nav: true,
      dots: false,
      navText: [
        '<i class="la la-angle-left"></i>',
        '<i class="la la-angle-right"></i> ',
      ],
      responsive: {
        0: {
          items: 1,
        },
        600: {
          items: 3,
        },
        1000: {
          items: 5,
        },
      },
    });
  </script>
</body>

</html>