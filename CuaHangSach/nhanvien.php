<?php
    session_start();
    $idNhanVien = $_SESSION['id'] ?? "";
    $usName = $_SESSION['ten'] ?? "";  
    $_SESSION['TaiKhoan'] = false;
    if (!$_SESSION['login'] || $_SESSION['type'] != 'LNV02' || $_SESSION['TrangThai'] != 1){
            echo '<script>alert("Bạn không được phép truy cập")</script>';
            session_destroy();
            echo '<script>window.location = "index.php";</script>';
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhân viên</title>
    <link rel="stylesheet" href="../CuaHangSach/css/responAdmin.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/popupDonDatHang.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>

<style>
.btn-adj {
    border: 2px solid #ccc;
    color: #000;
}

.btn-adj:hover {
    /* background-color: #cccccc47; */
    opacity: 0.8;
    color: #000;
}

.btn-search {
    margin-left: -3px;
    WIDTH: 28px;
    height: 28px;
    border: none;
    background-color: #ccc;
    border-top-right-radius: 3px;
    border-bottom-right-radius: 3px;
    color: #00000073;
    border: 1px solid;
    border-left: 0;
}

.btn-search:hover {
    color: #00000096;
}

.form-group {
    margin-bottom: 15px;
}

.hov:hover {
    transition: 0.2s linear;
    font-weight: bold;
}
</style>

<body>
    <?php include_once("View/headerAdmin.php"); ?>
    <div class="menu-toggle">
        <div class="hamburger">
            <span></span>
        </div>
    </div>

    <div class="app">
        <aside class="sidebar" style='margin: 0;'>
            <h2>Menu</h2>
            <nav class="menu" id="menu">
                <a href="nhanvien.php?UpdNVSelf=<?php echo $idNhanVien;?>" class="menu-item pd-t">Tài khoản</a>
                <a href="nhanvien.php?pagedondathang=1" class="menu-item pd-t">Tiếp nhận đơn hàng</a>
                <a href="nhanvien.php?thongkedoanhthu" class="menu-item pd-t">Thống kê doanh thu</a>
                <a href="nhanvien.php?mknv=<?php echo $idNhanVien;?>" class="menu-item pd-t">Đổi mật khẩu</a>
                <a href="nhanvien.php?dx" class="menu-item pd-t">Đăng xuất</a>
            </nav>
        </aside>

        <main class="content" style='background-color: rgb(230, 230, 230);'>
            <?php   
                    if (isset($_REQUEST['pagedondathang'])){ // view đơn đặt hàng
                        include_once('View/Module/vDonDatHang.php');  
                    } elseif (isset($_REQUEST['doitrangthaidonhang'])) { // view Đổi trạng thái đơn hàng
                        include_once('View/Module/vDoiTrangThaiDonHang.php');
                    }elseif (isset($_REQUEST['UpdNVSelf'])) { // cập nhật nhân viên Self
                        $_SESSION['TaiKhoan'] = true;
                        $location = 'nhanvien.php?UpdNVSelf';
                        include_once('View/NhanVien/vUpdNVSelf.php');
                    } elseif (isset($_REQUEST['thongkedoanhthu'])) { // view Thống kê doanh thu
                        include_once('View/Module/vThongKeDoanhThu.php');
                        $p = new viewThongKeDoanhThu();
                        $startDT = isset($_POST['startDT']) ? $_POST['startDT'] : null;
                        $endDT = isset($_POST['endDT']) ? $_POST['endDT'] : null;
                        $startS = isset($_POST['startS']) ? $_POST['startS'] : null;
                        $endS = isset($_POST['endS']) ? $_POST['endS'] : null;
                        $p->viewAllThongKeDoanhThu($startDT, $endDT, $startS, $endS);
                    } elseif(isset($_REQUEST['mknv'])){
                        include_once('View/Module/vDoiMatKhauNhanVien.php');
                    } elseif(isset($_REQUEST['dx'])){
                        session_destroy();
                        echo '<script> window.location = "index.php"; </script>';
                    } else {
                        echo '<script> window.location = "nhanvien.php?pagedondathang=1"; </script>';
                    }
            ?>
        </main>
    </div>

    <script>
    const menu_toggle = document.querySelector('.menu-toggle');
    const sidebar = document.querySelector('.sidebar');

    menu_toggle.addEventListener('click', () => {
        menu_toggle.classList.toggle('is-active');
        sidebar.classList.toggle('is-active');
    });
    </script>
    <?php include_once("View/footer.php"); ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
    <script src='./js/popup.js'></script>
    <script type="text/javascript">
    $(document).ready(function() {
        //jquery for toggle sub menus
        $('.sub-btn').click(function() {
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
        });

        //jquery for expand and collapse the sidebar
        $('.menu-btn').click(function() {
            $('.side-bar').addClass('active');
            $('.menu-btn').css("visibility", "hidden");
        });

        $('.close-btn').click(function() {
            $('.side-bar').removeClass('active');
            $('.menu-btn').css("visibility", "visible");
        });
    });
    </script>
</body>

</html>