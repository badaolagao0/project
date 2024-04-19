<?php
    include_once('./Controller/cModule.php');
    if ($_SESSION['type'] == 'LNV01'){
        $temp2 = 'admin.php';
    } else {
        $temp2 = 'nhanvien.php';
    }
    $p = new controlModule();

    if (isset($_REQUEST['id'])) {
        $kq = $p -> doiTrangThaiDonHang($_REQUEST['id']);

        if ($kq == 1) {
            echo "<script>alert('Xác nhận đơn hàng thành công')</script>";
            echo '<script>window.location = "'.$temp2.'?pagedondathang=1";</script>';
        }
        echo "<script>alert('Xác nhận đơn hàng thất bại')</script>";
    } else {
        echo "<script>alert('Thiếu id')</script>";
        echo '<script>window.location = "'.$temp2.'?tiepnhandonhang";</script>';
    }
    
?>