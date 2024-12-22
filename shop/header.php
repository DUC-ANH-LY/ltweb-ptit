<header class="container mt-5">
    <div class="row">
        <div class="col-md-3">
            <a href="index.php" class="logo">
                <!-- img src="img/logo.png"-->
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
                        <!-- <span class="font-weight-bold" data-total>1200VND</span> -->
                    </div>
                </a>

                <div
                    class="dropdown-menu dropdown-menu-right"
                    aria-labelledby="dropdownMenuLink">
                    <!-- <table class="table table-sm table-striped">
                <tbody>
                  <tr>
                    <td class="text-center">
                      <a
                        href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=40"><img
                          src="http://opencart3100.givan.ro/image/cache/catalog/demo/iphone_1-47x47.jpg"
                          alt="iPhone"
                          title="iPhone"
                          class="img-thumbnail" /></a>
                    </td>
                    <td class="text-left">
                      <a
                        href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=40">iPhone</a>
                    </td>
                    <td class="text-right">x 1</td>
                    <td class="text-right">$123.20</td>
                    <td class="text-center">
                      <button
                        type="button"
                        onclick="cart.remove('1');"
                        data-toggle="tooltip"
                        title=""
                        class="btn btn-danger btn-sm"
                        data-original-title="Remove">
                        <i class="la la-times"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <a
                        href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=43"><img
                          src="http://opencart3100.givan.ro/image/cache/catalog/demo/macbook_1-47x47.jpg"
                          alt="MacBook"
                          title="MacBook"
                          class="img-thumbnail" /></a>
                    </td>
                    <td class="text-left">
                      <a
                        href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=43">MacBook</a>
                    </td>
                    <td class="text-right">x 1</td>
                    <td class="text-right">$602.00</td>
                    <td class="text-center">
                      <button
                        type="button"
                        onclick="cart.remove('2');"
                        data-toggle="tooltip"
                        title=""
                        class="btn btn-danger btn-sm"
                        data-original-title="Remove">
                        <i class="la la-times"></i>
                      </button>
                    </td>
                  </tr>
                  <tr>
                    <td class="text-center">
                      <a
                        href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=30"><img
                          src="http://opencart3100.givan.ro/image/cache/catalog/demo/canon_eos_5d_1-47x47.jpg"
                          alt="Canon EOS 5D"
                          title="Canon EOS 5D"
                          class="img-thumbnail" /></a>
                    </td>
                    <td class="text-left">
                      <a
                        href="http://opencart3100.givan.ro/index.php?route=product/product&amp;language=en-gb&amp;product_id=30">Canon EOS 5D</a>
                      <br />
                      - <small>Select Red</small>
                    </td>
                    <td class="text-right">x 1</td>
                    <td class="text-right">$98.00</td>
                    <td class="text-center">
                      <button
                        type="button"
                        onclick="cart.remove('3');"
                        data-toggle="tooltip"
                        title=""
                        class="btn btn-danger btn-sm"
                        data-original-title="Remove">
                        <i class="la la-times"></i>
                      </button>
                    </td>
                  </tr>
                </tbody>
              </table> -->

                    <div>
                        <!-- <table class="table table-sm table-bordered">
                  <tbody>
                    <tr>
                      <td class="text-right"><strong>Sub-Total</strong></td>
                      <td class="text-right">$681.00</td>
                    </tr>
                    <tr>
                      <td class="text-right">
                        <strong>Eco Tax (-2.00)</strong>
                      </td>
                      <td class="text-right">$6.00</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>VAT (20%)</strong></td>
                      <td class="text-right">$136.20</td>
                    </tr>
                    <tr>
                      <td class="text-right"><strong>Total</strong></td>
                      <td class="text-right">$823.20</td>
                    </tr>
                  </tbody>
                </table> -->
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

                <li class="nav-item dropdown">
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