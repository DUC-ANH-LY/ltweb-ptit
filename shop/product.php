<?php

require_once('../admin/dbhelp.php');
session_start();
require_once('cart_action.php');


if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = 'select * from san_pham where id = ' . $id;
  $product = executeResult($sql);
  $ncc = null;
  $dm = null;
  if ($product != null) {
    if (isset($product[0]['nha_cung_cap_id']) && $product[0]['nha_cung_cap_id'] != '') {
      $ncc = executeResult('select * from nha_cung_cap where id = ' . $product[0]['nha_cung_cap_id']);
    }
    if (isset($product[0]['danh_muc_id']) && $product[0]['danh_muc_id'] != '') {
      $dm = executeResult('select * from danh_muc where id = ' . $product[0]['danh_muc_id']);
    }
  }
}


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
  <base href="" />
  <link rel="icon" href="../../favicon.ico" />

  <title>eshop</title>

  <!-- Bootstrap core CSS -->
  <link href="css/style.css" rel="stylesheet" />
  <link href="css/magnific-popup.css" rel="stylesheet" />
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

    <?php

    require_once('header.php');

    ?>



    <div class="content">
      <div class="container">
        <div class="thickline"></div>
      </div>

      <nav class="breadcrumb container">
        <a class="breadcrumb-item" href="index.php">Trang chủ</a>
        <a class="breadcrumb-item" href="#"><?= $dm[0]['ten'] ?></a>
      </nav>

      <article class="product-details container" data-component-product>
        <div class="row">
          <!-- gallery and tabs column -->

          <div class="col-md-8">
            <div class="zoom-gallery row">
              <ul class="list-unstyled product-gallery col-md-2">
                <li class="list-item">
                  <a href="img/products/1.jpg"><img src="img/products/1.jpg" class="img-fluid" /></a>
                </li>
                <li class="list-item">
                  <a href="img/products/2.jpg"><img src="img/products/2.jpg" class="img-fluid" /></a>
                </li>
                <li class="list-item">
                  <a href="img/products/3.jpg"><img src="img/products/3.jpg" class="img-fluid" /></a>
                </li>
              </ul>

              <div class="col-md-10">
                <a href="../admin<?= $product[0]['image'] ?>"><img src="../admin<?= $product[0]['image'] ?>" class="img-fluid" data-image /></a>
              </div>
            </div>
          </div>

          <!-- product name and Thêm vào giỏ -->

          <div class="col-md-4">
            <h1 class="product-heading" data-name><?= $product[0]['ten'] ?></h1>

            <!-- product attributes -->
            <ul class="list-unstyled text-muted">
              <li class="font-weight-bold">Nhà cung cấp: <span><?= $ncc[0]['ten'] ?></span></li>
              <li class="font-weight-bold">Số lượng: <span><?= $product[0]['so_luong']  ?></span></li>
              <li class="font-weight-bold">Danh mục: <span><?= $dm[0]['ten']  ?></span></li>
            </ul>

            <div class="old-price">
              <span class="currency" data-currency></span>
              <span data-price><?= currency_format($product[0]['gia_ban'] * 120 / 100) ?></span>
            </div>

            <div class="price h3">
              <span class="currency" data-currency></span>
              <span data-price><?= currency_format($product[0]['gia_ban']) ?></span>
            </div>

            <hr />



            <!-- <button type="button" class="btn btn-primary btn-block btn-icon">
              <i class="la la-cart-plus"></i> Thêm vào giỏ
            </button> -->

            <form method="POST"> <input type="hidden" name="san_pham" value="<?= $product[0]['id'] ?>">
              <button
                type="submit"
                class="btn btn-primary btn-block btn-icon"
                title="Thêm vào giỏ">
                <i class="la la-shopping-cart"></i> Thêm vào giỏ
                <!-- 
            <button
              type="button"
              class="btn btn-outline-secondary btn-block btn-icon">
              <i class="la la-shopping-cart"></i> Mua ngay
            </button> -->

                <div class="btn-group mt-3" role="group">
                  <button
                    type="button"
                    class="btn btn-link text-black-50 btn-sm"
                    title="Wishlist">
                    <i class="la la-heart"></i> Wishlist
                  </button>

                  <button
                    type="button"
                    class="btn btn-link text-black-50 btn-sm"
                    title="Compare">
                    <i class="la la-exchange"></i> Compare
                  </button>
                </div>
          </div>
        </div>

        <div class="product-tabs clearfix container" role="tabpanel">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
              <a
                class="nav-link active"
                id="home-tab"
                data-toggle="tab"
                href="#home"
                role="tab"
                aria-controls="home"
                aria-expanded="true">Mô tả</a>
            </li>
          </ul>
          <div class="tab-content" id="myTabContent">
            <div
              role="tabpanel"
              class="tab-pane fade active show"
              id="home"
              aria-labelledby="home-tab"
              aria-expanded="true"
              data-description>
              <p>
                <?= $product[0]['mo_ta'] ?>
              </p>
            </div>
            <div
              class="tab-pane fade"
              id="profile"
              role="tabpanel"
              aria-labelledby="profile-tab"
              aria-expanded="false">
              <p>
                Food truck fixie locavore, accusamus mcsweeney's marfa nulla
                single-origin coffee squid. Exercitation +1 labore velit, blog
                sartorial PBR leggings next level wes anderson artisan four
                loko farm-to-table craft beer twee. Qui photo booth
                letterpress, commodo enim craft beer mlkshk aliquip jean
                shorts ullamco ad vinyl cillum PBR. Homo nostrud organic,
                assumenda labore aesthetic magna delectus mollit. Keytar
                helvetica VHS salvia yr, vero magna velit sapiente labore
                stumptown. Vegan fanny pack odio cillum wes anderson 8-bit,
                sustainable jean shorts beard ut DIY ethical culpa terry
                richardson biodiesel. Art party scenester stumptown, tumblr
                butcher vero sint qui sapiente accusamus tattooed echo park.
              </p>
            </div>
            <div
              class="tab-pane fade"
              id="dropdown1"
              role="tabpanel"
              aria-labelledby="dropdown1-tab">
              <p>
                Etsy mixtape wayfarers, ethical wes anderson tofu before they
                sold out mcsweeney's organic lomo retro fanny pack lo-fi
                farm-to-table readymade. Messenger bag gentrify pitchfork
                tattooed craft beer, iphone skateboard locavore carles etsy
                salvia banksy hoodie helvetica. DIY synth PBR banksy irony.
                Leggings gentrify squid 8-bit cred pitchfork. Williamsburg
                banh mi whatever gluten-free, carles pitchfork biodiesel fixie
                etsy retro mlkshk vice blog. Scenester cred you probably
                haven't heard of them, vinyl craft beer blog stumptown.
                Pitchfork sustainable tofu synth chambray yr.
              </p>
            </div>
            <div
              class="tab-pane fade"
              id="dropdown2"
              role="tabpanel"
              aria-labelledby="dropdown2-tab">
              <p>
                Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                art party before they sold out master cleanse gluten-free
                squid scenester freegan cosby sweater. Fanny pack portland
                seitan DIY, art party locavore wolf cliche high life echo park
                Austin. Cred vinyl keffiyeh DIY salvia PBR, banh mi before
                they sold out farm-to-table VHS viral locavore cosby sweater.
                Lomo wolf viral, mustache readymade thundercats keffiyeh craft
                beer marfa ethical. Wolf salvia freegan, sartorial keffiyeh
                echo park vegan.
              </p>
            </div>
          </div>
        </div>
      </article>
      <!-- product-details -->

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
    </div>

    <?php
    require_once('footer.php');

    ?>
  </div>

  <!-- Bootstrap core JavaScript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <!-- script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script -->
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>

  <script>
    $("#product-tabs a").click(function(e) {
      e.preventDefault();
      $(this).tab("show");
    });

    $(document).ready(function() {
      $(".zoom-gallery").magnificPopup({
        delegate: "a",
        type: "image",
        closeOnContentClick: false,
        closeBtnInside: false,
        mainClass: "mfp-with-zoom mfp-img-mobile",
        image: {
          verticalFit: true,
          titleSrc: function(item) {
            return (
              item.el.attr("title") +
              ' &middot; <a class="image-source-link" href="' +
              item.el.attr("data-source") +
              '" target="_blank">image source</a>'
            );
          },
        },
        gallery: {
          enabled: true,
        },
        zoom: {
          enabled: true,
          duration: 300, // don't foget to change the duration also in CSS
          opener: function(element) {
            return element.find("img");
          },
        },
      });
    });

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

  <style>
    .image-source-link {
      color: #98c3d1;
    }

    .mfp-with-zoom .mfp-container,
    .mfp-with-zoom.mfp-bg {
      opacity: 0;
      -webkit-backface-visibility: hidden;
      /* ideally, transition speed should match zoom duration */
      -webkit-transition: all 0.3s ease-out;
      -moz-transition: all 0.3s ease-out;
      -o-transition: all 0.3s ease-out;
      transition: all 0.3s ease-out;
    }

    .mfp-with-zoom.mfp-ready .mfp-container {
      opacity: 1;
    }

    .mfp-with-zoom.mfp-ready.mfp-bg {
      opacity: 0.8;
    }

    .mfp-with-zoom.mfp-removing .mfp-container,
    .mfp-with-zoom.mfp-removing.mfp-bg {
      opacity: 0;
    }
  </style>
</body>

</html>