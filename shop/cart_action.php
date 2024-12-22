<?php


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

if (isset($_POST['updateData'])) {
    // die(var_dump($_SESSION['cart']));
    $counts = json_decode($_POST['updateData']);
    foreach ($counts as $count) {
        $_SESSION['cart'][$count[0]]['count'] = $count[1];
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
