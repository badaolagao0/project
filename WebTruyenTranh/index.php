<?php
session_start();
if (isset($_REQUEST['locgia'])){
        $_SESSION['selectedValues']= $_REQUEST['locgia'];
}
// session_destroy
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Anime Template">
    <meta name="keywords" content="Anime, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anime | Template</title>

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
.search-gia {
    position: absolute;
    top: 48px;
    left: 41px;
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
                                <li class="active"><a href="index.php">Trang chủ</a></li>
                                <li><a href="admin.php">Quản lý</a></li>
                                <li><a href="#">Truyện tranh <span class="arrow_carrot-down"></span></a>
                                    <ul class="dropdown">
                                        <li><a href="index.php?comp=1">Doraemon</a></li>
                                        <li><a href="index.php?comp=2">Conan</a></li>
                                        <li><a href="index.php?comp=3">Dragon ball</a></li>
                                        <li><a href="index.php?comp=4">One piece</a></li>
                                        <li><a href="index.php?comp=5">Shin</a></li>
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
                <div class="col-lg-3 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__view">
                            <div class="section-title">
                                <h5>Danh mục truyện</h5>
                            </div>
                        </div>
                        <div class="menu">
                            <?php
                            include_once("View/vCompany.php");  
                            vCompany();
                        ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="trending__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Xu hướng</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div>
                                    <!-- <div class="form-outline"> -->
                                    <form action="#" method="post">
                                        <input type="text" placeholder="Tìm kiếm" name="ten" />
                                        <button style='margin-bottom: 3px;' class="btn btn-primary" type='submit'>
                                            <i class="icon_search"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row search-gia">
                        <form action="#" method="post">
                            <!-- <select name="locgia">
                                <option value="0-39999">Từ 0 - 40,000 đ</option>
                                <option value="40000-80000">Từ 40,000 - 80.000 đ</option>
                                <option value="100000-1000000">Trên 100,000 đ</option>
                            </select> -->
                            <select name="locgia">
                                <option value="0-39999"
                                    <?php if (isset($_SESSION['selectedValues']) && $_SESSION['selectedValues']=='0-39999') echo 'selected';?>>
                                    Từ 0 - 40,000 đ</option>
                                <option value="40000-80000"
                                    <?php if (isset($_SESSION['selectedValues']) && $_SESSION['selectedValues']=='40000-80000') echo 'selected';?>>
                                    Từ 40,000 - 80.000 đ</option>
                                <option value="100000-1000000"
                                    <?php if (isset($_SESSION['selectedValues']) && $_SESSION['selectedValues']=='100000-1000000') echo 'selected';?>>
                                    Trên 100,000 đ</option>
                            </select>

                            <button style='height: 42px; position: absolute; right: -60px;' class="btn btn-primary"
                                type='submit'>
                                Lọc</button>
                        </form>
                    </div>
                    <div class="row">
                        <?php
                        include_once("View/vProduct.php");
                        $p = new ViewProduct();
                        if (isset($_REQUEST['ten'])) {
                                $p -> displayProductByName($_REQUEST['ten']);
                            }elseif (isset($_REQUEST['locgia'])) {
                                list($min,$max)=explode('-',$_REQUEST['locgia']);
                                $p -> displayProductByPrice($min,$max);
                            }else {
                                $p -> displayProduct();
                            }
                        ?>
                        <!-- list($min,$max)=explode('-',$_REQUEST['locgia']) -->
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
<?php
session_destroy();
?>