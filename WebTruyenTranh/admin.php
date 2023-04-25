<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Quản lý</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/plyr.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<style>
li {
    font-family: "Oswald", sans-serif;
    font-weight: 500;
    font-size: larger;
}

.section-title h4:after,
.section-title h5:after {
    display: none;
}

.header-new {
    position: absolute;
    left: 0;
    top: 102px;
    color: #fff;
    font-family: 'Oswald', sans-serif;
    font-size: 28px;
    font-weight: 500;
}
</style>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./index.html">
                            <img src="img/logo.png" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="header__nav">
                        <nav class="header__menu mobile-menu">
                            <ul>
                                <li><a href="index.php">Trang chủ</a></li>
                                <li class='active'><a href="admin.php">Quản lý</a></li>
                                <li><a href="#">Truyện tranh <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="#">Doraemon</a></li>
                                        <li><a href="#">Conan</a></li>
                                        <li><a href="#">Dragon ball</a></li>
                                        <li><a href="#">One piece</a></li>
                                        <li><a href="#">Shin</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="header__right">
                        <a href="#"><span class="icon_profile"></span></a>
                    </div>
                </div>
            </div>
            <div id="mobile-menu-wrap"></div>
        </div>
    </header>
    <!-- Header End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title" style='display: inline-block'>
                                    <h2> <a class='btn btn-primary' href="admin.php?mCom">Quản lý loại truyện</a></h2>
                                </div>
                                <!-- class="section-title" -->
                                <div class="section-title" style='display: inline-block'>
                                    <h2> <a class='btn btn-primary' href="admin.php?mPro">Quản lý truyện tranh</a></h2>
                                </div>
                            </div>
                            <!-- <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="input-group">
                                    <div class="form-outline">
                                        <input id="search-input" type="search" id="form1" class="form-control"
                                            placeholder='Tìm kiếm' />
                                    </div>
                                    <button style='margin-left: -3px;;' id="search-button" type="button"
                                        class="btn btn-primary">
                                        <i class="icon_search"></i>
                                    </button>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="row">
                        <?php
                            if (isset($_REQUEST['mCom'])) {
                                include_once("View/vCompany.php");
                                vAdCompany();
                            } elseif (isset($_REQUEST['mPro'])){
                                include_once("View/vProduct.php");
                                $p = new ViewProduct();
                                $p -> displayAdminProduct();
                            } elseif (isset($_REQUEST['mAddPro'])){
                                include_once("View/vAddProduct.php");
                            } elseif (isset($_REQUEST['DelProd'])){
                                include_once("View/avDelPro.php");
                            } elseif (isset($_REQUEST['UpdProd'])){
                                include_once("View/avUpdPro.php");
                            } else{
                                echo "<h2 style='color: #fff; font-weight: 600;'>TRANG DÀNH CHO ADMIN</h2>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!-- Product Section End -->

    <!-- Footer Section Begin -->
    <footer class="footer">
        <div class="page-up">
            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer__logo">
                        <a href="./index.html"><img src="img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer__nav">
                        <ul>
                            <li class="active"><a href="index.php">Trang chủ</a></li>
                            <li><a href="#">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Nguồn &copy;<script>
                        document.write(new Date().getFullYear());
                        </script> Đã đăng ký bản quyền | Mẫu được tạo bởi <i class="fa fa-heart"
                            aria-hidden="true"></i><a href="https://colorlib.com" target="_blank"> <br> Đoàn Quốc
                            Huy</a>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>

                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->

    <!-- Search model Begin -->
    <!-- <div class="search-model">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-switch"><i class="icon_close"></i></div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Search here.....">
            </form>
        </div>
    </div> -->
    <!-- Search model end -->

    <!-- Js Plugins -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/player.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/mixitup.min.js"></script>
    <script src="js/jquery.slicknav.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/main.js"></script>


</body>

</html>