<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu</title>
    <link rel="stylesheet" href="./css/sidebarMenu.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleIndex.css">
    <link rel="stylesheet" href="css/sub.css">
    <style>
        .bg-color{
            background-color:white;
        }
        h4{
            font-weight: bold;
        }
    </style>
    
</head>
<!--  -->

<body>
    <!-- header -->
    <?php
            include_once("View/headerIndex.php"); 
     ?>

     <!-- nội dung phần giới thiệu -->
     <!-- <div class="container width-80 bg-color my-4 py-3 rounded">
        <div class="introduction-content">
            <h4>Chào mừng đến với BookShop - Nơi trải nghiệm văn hóa đọc sách</h4>
            <p>
                BookShop là địa điểm lý tưởng cho những người yêu sách, nơi bạn có thể khám phá và mua sắm trong một thế giới đầy màu sắc của tri thức và giải trí. Với mục tiêu tạo ra trải nghiệm đọc sách tuyệt vời nhất, chúng tôi tự hào giới thiệu đến bạn bộ sưu tập đa dạng với hàng ngàn tựa sách từ các thể loại khác nhau.
            </p>
            <h4>Khám Phá Thế Giới của Chúng Tôi</h4>
            <p>
                Tại BookShop, chúng tôi cung cấp một thư viện đa dạng của những tác phẩm nổi tiếng từ các tác giả hàng đầu trên thế giới. Từ tiểu thuyết, sách khoa học, đến sách nấu ăn và sách thiếu nhi, chúng tôi đảm bảo rằng mọi người đều có cơ hội tìm thấy những cuốn sách phù hợp với sở thích và mong muốn của họ.
            </p>
            <h4>Chất Lượng Đặt Lên Hàng Đầu</h4>
            <p>
                Tại BookShop, chúng tôi cam kết mang đến cho bạn những cuốn sách chất lượng nhất. Mỗi cuốn sách đều được chọn lọc cẩn thận để đảm bảo rằng bạn nhận được trải nghiệm đọc sách tuyệt vời nhất. Chúng tôi không chỉ là nơi bán sách, mà còn là điểm đến của những người đam mê văn hóa đọc sách.
            </p>
            <h4>Đặt Hàng Dễ Dàng, Giao Hàng Nhanh Chóng</h4>
            <p>
                Việc đặt sách trực tuyến chưa bao giờ dễ dàng như vậy. Với giao diện thân thiện và quy trình đặt hàng đơn giản, bạn chỉ cần vài bước để sở hữu những tác phẩm bạn mong muốn. Chúng tôi cam kết giao hàng nhanh chóng và đảm bảo an toàn cho sản phẩm của bạn.
            </p>
            <p class="note">❤ Hãy để BookShop là điểm đến đầu tiên của bạn trong thế giới của văn hóa đọc sách! ❤</p>
        </div>
     </div> -->

     <div class="container px-0">

         <div id="carouselExampleDark" class="carousel carousel-dark slide my-3" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <!-- <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button> -->
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="./image/anhbannergt2.png" class="d-block" style="width: 100%;height:70vh" alt="...">
                   
                    <!-- <div class="carousel-caption d-none d-md-block">
                        <h4>Chào mừng đến với BookShop - Nơi trải nghiệm văn hóa đọc sách</h4>
                        <p>BookShop là địa điểm lý tưởng cho những người yêu sách, nơi bạn có thể 
                            khám phá và mua sắm trong một thế giới đầy màu sắc của tri thức và giải trí. 
                            Với mục tiêu tạo ra trải nghiệm đọc sách tuyệt vời nhất. </p>
                    </div> -->
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                <img src="./image/anhbannergt.png" class="d-block" style="width: 100%;height:70vh" alt="...">
                <!-- <div class="carousel-caption d-none d-md-block">
                <h4>Chào mừng đến với BookShop - Nơi trải nghiệm văn hóa đọc sách</h4>
                    <p>chúng tôi tự hào giới thiệu đến bộ
                        sưu tập đa dạng với hàng ngàn tựa sách với thể loại khác nhau. Với mục tiêu tạo ra trải nghiệm đọc sách tuyệt vời, chúng tôi tự hào giới thiệu đến bạn bộ
                        sưu tập đa dạng với hàng ngàn tựa sách từ các thể loại khác nhau.</p>-->
                </div>
                
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
     </div>

    <main>
        <!-- Marketing messaging and featurettes
        ================================================== -->
        <!-- Wrap the rest of the page in another container to center all the content. -->

        <center>
            <div class="container marketing bg-color my-3 rounded">
            <h4 class="pt-3">Thành viên nhóm</h4>
    
                <!-- Three columns of text below the carousel -->
                <div class="row">
                    <div class="col-lg-4 mt-3">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill=""></rect>
                            <!-- Thay đổi đường link ảnh và kích thước ảnh dưới đây -->
                            <image href="./image/anhnguyetgt.jpg" width="140" height="140" />
                            <!-- Kết thúc thay đổi -->
                        </svg>

                        <h5 class="mt-3">Nguyễn Thị Thu Nguyệt</h5>
                        <span >Mssv: 20006891</span><br>
                       
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-3">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill=""></rect>
                            <!-- Thay đổi đường link ảnh và kích thước ảnh dưới đây -->
                            <image href="./image/anhhuygt.jpg" width="140" height="140" />
                            <!-- Kết thúc thay đổi -->
                        </svg>
    
                        <h5 class="mt-3">Đoàn Quốc Huy</h5>
                        <span >Mssv: 20026781</span><br>
                       
                    </div><!-- /.col-lg-4 -->
                    <div class="col-lg-4 mt-3">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill=""></rect>
                            <!-- Thay đổi đường link ảnh và kích thước ảnh dưới đây -->
                            <image href="./image/anhtuonggt.jpg" width="140" height="140" />
                            <!-- Kết thúc thay đổi -->
                        </svg>
    
                        <h5 class="mt-3">Nguyễn Chí Tường</h5>
                        <span >Mssv: 20004911</span><br>
                       
                    </div>
                    <div class="col-lg-4 mt-3">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill=""></rect>
                            <!-- Thay đổi đường link ảnh và kích thước ảnh dưới đây -->
                            <image href="./image/anhthugt.jpg" width="140" height="140" />
                            <!-- Kết thúc thay đổi -->
                        </svg>
    
                        <h5 class="mt-3">Phạm Thị Thanh Thư</h5>
                        <span >Mssv: 20017611</span><br>
                       
                    </div>
                    <div class="col-lg-4 mt-3">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill=""></rect>
                            <!-- Thay đổi đường link ảnh và kích thước ảnh dưới đây -->
                            <image href="./image/anhtuangt.jpg" width="140" height="140" />
                            <!-- Kết thúc thay đổi -->
                        </svg>
    
                        <h5 class="mt-3">Phạm Tuân</h5>
                        <span >Mssv: 20025201</span><br>
                       
                    </div>
                    <div class="col-lg-4 mt-3">
                        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <rect width="100%" height="100%" fill=""></rect>
                            <!-- Thay đổi đường link ảnh và kích thước ảnh dưới đây -->
                            <image href="./image/anhhunggt.jpg" width="140" height="140" />
                            <!-- Kết thúc thay đổi -->
                        </svg>
    
                        <h5 class="mt-3">Nguyễn Xuân Hùng</h5>
                        <span >Mssv: 20084391</span><br>
                       
                    </div>
                    <!-- /.col-lg-4 -->
                </div><!-- /.row -->
    
    
                <!-- START THE FEATURETTES -->
    
                <hr class="featurette-divider">
                <h4>Giới thiệu</h4>
                <!-- <h4>Khám Phá Thế Giới của Chúng Tôi</h4>
            <p>
                Tại BookShop, chúng tôi cung cấp một thư viện đa dạng của những tác phẩm nổi tiếng từ các tác giả hàng đầu trên thế giới. Từ tiểu thuyết, sách khoa học, đến sách nấu ăn và sách thiếu nhi, chúng tôi đảm bảo rằng mọi người đều có cơ hội tìm thấy những cuốn sách phù hợp với sở thích và mong muốn của họ.
            </p>
            <h4>Chất Lượng Đặt Lên Hàng Đầu</h4>
            <p>
                Tại BookShop, chúng tôi cam kết mang đến cho bạn những cuốn sách chất lượng nhất. Mỗi cuốn sách đều được chọn lọc cẩn thận để đảm bảo rằng bạn nhận được trải nghiệm đọc sách tuyệt vời nhất. Chúng tôi không chỉ là nơi bán sách, mà còn là điểm đến của những người đam mê văn hóa đọc sách.
            </p>
            <h4>Đặt Hàng Dễ Dàng, Giao Hàng Nhanh Chóng</h4>
            <p>
                Việc đặt sách trực tuyến chưa bao giờ dễ dàng như vậy. Với giao diện thân thiện và quy trình đặt hàng đơn giản, bạn chỉ cần vài bước để sở hữu những tác phẩm bạn mong muốn. Chúng tôi cam kết giao hàng nhanh chóng và đảm bảo an toàn cho sản phẩm của bạn.
            </p>
            <p class="note">❤ Hãy để BookShop là điểm đến đầu tiên của bạn trong thế giới của văn hóa đọc sách! ❤</p> -->
    
                <div class="row featurette  align-items-center">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Khám Phá Thế Giới của Chúng Tôi<span class="text-muted"></span></h2>
                    <p class="lead">Tại BookShop, chúng tôi cung cấp một thư viện đa dạng của những tác phẩm nổi tiếng
                         từ các tác giả hàng đầu trên thế giới. Từ tiểu thuyết, sách khoa học, đến sách nấu ăn và sách thiếu nhi, 
                         chúng tôi đảm bảo rằng mọi người đều có cơ hội tìm thấy những cuốn sách phù hợp với sở thích và mong muốn của họ.</p>
                </div>
                <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill=""></rect>
                    <!-- Thay đổi đường link ảnh và kích thước ảnh dưới đây -->
                    <image href="./image/anhdactrung1.jpg" width="500" height="500" />
                    <!-- Kết thúc thay đổi -->
                    <!-- <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text> -->
                </svg>

                </div>
                </div>
    
                <hr class="featurette-divider">
    
                <div class="row featurette  align-items-center">
                <div class="col-md-7 order-md-2">
                    <h2 class="featurette-heading">Chất Lượng Đặt Lên Hàng Đầu<span class="text-muted"></span></h2>
                    <p class="lead">Tại BookShop, chúng tôi cam kết mang đến cho bạn những cuốn sách chất lượng nhất. 
                        Mỗi cuốn sách đều được chọn lọc cẩn thận để đảm bảo rằng bạn nhận được trải nghiệm đọc sách tuyệt vời nhất. 
                        Chúng tôi không chỉ là nơi bán sách, mà còn là điểm đến của những người đam mê văn hóa đọc sách.</p>
                </div>
                <div class="col-md-5 order-md-1">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill=""></rect>
                    <!-- Thay đổi đường link ảnh và kích thước ảnh dưới đây -->
                    <image href="./image/anhdactrung2.jpg" width="500" height="500" />
                    <!-- Kết thúc thay đổi -->
                    <!-- <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text> -->
                </svg>
    
                </div>
                </div>
    
                <hr class="featurette-divider">
    
                <div class="row featurette  align-items-center">
                <div class="col-md-7">
                    <h2 class="featurette-heading">Đặt Hàng Dễ Dàng, Giao Hàng Nhanh Chóng<span class="text-muted"></span></h2>
                    <p class="lead">Việc đặt sách trực tuyến chưa bao giờ dễ dàng như vậy. Với giao diện thân thiện và quy trình đặt hàng
                         đơn giản, bạn chỉ cần vài bước để sở hữu những tác phẩm bạn mong muốn. Chúng tôi cam kết giao hàng nhanh chóng
                          và đảm bảo an toàn cho sản phẩm của bạn.</p>
                </div>
                <div class="col-md-5">
                <svg class="bd-placeholder-img bd-placeholder-img-lg featurette-image img-fluid mx-auto" width="500" height="500" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 500x500" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill=""></rect>
                    <!-- Thay đổi đường link ảnh và kích thước ảnh dưới đây -->
                    <image href="./image/anhdactrung3.jpg" width="500" height="500" />
                    <!-- Kết thúc thay đổi -->
                    <!-- <text x="50%" y="50%" fill="#aaa" dy=".3em">500x500</text> -->
                </svg>
    
                </div>
                </div>
    
                <hr class="featurette-divider">
    
                <!-- /END THE FEATURETTES -->
    
            </div><!-- /.container -->
        </center>


        <!-- FOOTER -->

    </main>


    <script src="/docs/5.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

      
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>
</html>