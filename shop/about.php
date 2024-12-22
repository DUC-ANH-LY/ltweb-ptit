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
  <base href="" />
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

    <?php
    require_once('header.php');
    ?>

    <div class="content">
      <div class="container">
        <div class="thickline"></div>
      </div>


      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1 class="text-center">Electro store xin chào quý khách!!!</h1>
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
  <script>
    $("#product-tabs a").click(function(e) {
      e.preventDefault();
      $(this).tab("show");
    });
  </script>
  <!-- script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script -->
  <script src="js/jquery.min.js"></script>
  <script>
    window.jQuery ||
      document.write('<script src="js/jquery.min.js"><\/script>');
  </script>
  <!-- script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script -->
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>