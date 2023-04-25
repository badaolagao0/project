<?php
    include_once('Controller/cProduct.php');
    class ViewProduct{
        function displayProduct(){
            $p = new controlProduct();
            if (isset($_REQUEST["comp"])){
                $cty = $_REQUEST["comp"];
                $tblProduct = $p -> getAllProductByCompany($cty);
            } else {
                if (isset($_REQUEST["comp"])){
                    $cty = $_REQUEST["comp"];
                    $tblProduct = $p -> getAllProductByCompany($cty);
                }else {
                    $tblProduct = $p -> getAllProduct();
                }
            }
            $this -> viewAllProduct($tblProduct);
        }
    
        function displayProductByName($ten){
            $p = new controlProduct();
            if (isset($_REQUEST["comp"])){
                $cty = $_REQUEST["comp"];
                $tblProduct = $p -> getAllProductByCompany($cty);
            } else {
                if (isset($_REQUEST["comp"])){
                    $cty = $_REQUEST["comp"];
                    $tblProduct = $p -> getAllProductByCompany($cty);
                }else {
                    $tblProduct = $p -> getAllProductByName($ten);
                }
            }
            $this -> viewAllProduct($tblProduct);
        }

        function displayProductByPrice($min,$max){
            $p = new controlProduct();
            if (isset($_REQUEST["comp"])){
                $cty = $_REQUEST["comp"];
                $tblProduct = $p -> getAllProductByCompany($cty);
            } else {
                if (isset($_REQUEST["comp"])){
                    $cty = $_REQUEST["comp"];
                    $tblProduct = $p -> getAllProductByCompany($cty);
                }else {
                    $tblProduct = $p -> getAllProductByPrice($min,$max);
                }
            }
            $this -> viewAllProduct($tblProduct);
        }

        function displayProductByID($ma){
            $p = new controlProduct();
            if (isset($_REQUEST["comp"])){
                $cty = $_REQUEST["comp"];
                $tblProduct = $p -> getAllProductByCompany($cty);
            } else {
                if (isset($_REQUEST["comp"])){
                    $cty = $_REQUEST["comp"];
                    $tblProduct = $p -> getAllProductByCompany($cty);
                }else {
                    $tblProduct = $p -> getAllProductByID($ma);
                }
            }
            $this -> viewAllProduct($tblProduct);
        }
        
        
        function viewAllProduct($tblProduct){
            if ($tblProduct) {
                if (mysql_num_rows($tblProduct) > 0){
                    $dem =0;
                    echo "<table style='width: 100%' >";
                    // duyệt từng dòng dữ liệu trong kết quả nhận được sau khi truy vấn
                    while ($row = mysql_fetch_assoc($tblProduct)) {
                        if ($dem==0) {
                            echo "<tr>";
                        }
                        echo '<td style="padding: 0px 15px">';
                        echo '<div class="product__item">';
                        echo '<div class="product__item__pic set-bg" data-setbg="img/'.$row['Anh'].'" style="background-size: contain;">';
                        echo '<div class="ep" style="left: 18px">18 / 18</div>';
                        echo '<div class="comment" style="left: 18px"><i class="fa fa-comments"></i> 11</div>';
                        echo '<div class="view" style="right: 18px"><i class="fa fa-eye"></i> 9141</div>';
                        echo '</div>';
                        echo '<div class="product__item__text">';
                        echo '<ul><li style="margin: 0px 3px;">Active</li><li style="margin: 0px 3px;">Movie</li></ul>';
                        echo '<h5><a href="#" style="color: #b7b7b7;">'.$row['TieuDe'].'</a></h5>';
                        echo '<span style="display: block; color: #fff; font-size: xx-large; font-weight: 700;; text-align: center">'.number_format($row["GiaBan"]).' VNĐ</span>';
                        echo '</div>';
                        echo '</div>';
                        echo "</td>";
                        $dem++;
                        if ($dem%3==0) {
                            echo "</tr>";
                            $dem =0;
                            echo "<tr>";
                        }
                    }
                    if ($dem > 0) {
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<h2 style='color: #fff'>0 result</h2>";
                }
            } else {
                echo "<h2 style='color: #fff'>Khong co gia tri</h2>";
            }
        }
    
        function displayAdminProduct(){
            // include("Controller/cCompany.php");
            // $p1 = new controlCompany();
            // $table = $p1 -> getAllCompany();
            $p = new controlProduct();
            $tblProduct = $p -> getAllProduct();
            echo '<h2 class="header-new">QUẢN LÝ SẢN PHẨM</h2>';
            echo "<a style='position: absolute;right: 0;top: 102px;' class='btn btn-info' href='admin.php?mAddPro'>Thêm sản phẩm</a>";
            if ($tblProduct) {
                if (mysql_num_rows($tblProduct) > 0){
                    echo "<table style='margin-top: 24px;' class='table table-secondary'>";
                    echo "<tr><th scope='col'>Mã truyện</th><th scope='col'>Loại truyện</th><th scope='col'>Tiêu Đề</th><th scope='col'>Tác giả</th><th scope='col'>Nhà xuất bản</th><th scope='col'>Ảnh bìa</th><th scope='col'>Giá bán</th><th scope='col'>Tùy chọn</th></tr>";
                    // duyệt từng dòng dữ liệu trong kết quả nhận được sau khi truy vấn
                    while ($row = mysql_fetch_assoc($tblProduct)) {
                        echo "<tr class='table-info'>";
                        echo '<td scope="row">';
                        echo $row['MaTruyen']."</td>";
                            // if (mysql_num_rows($table) > 0) {
                            //     echo "<td>";
                            //     while ($row2 = mysql_fetch_assoc($table)){
                            //         if ($row2['MaLoaiTruyen'] == $row['MaLoaiTruyen']) {
                            //                 echo $row2["TieuDe"];
                            //         }
                            //     }
                            //     echo "</td>";
                            // }
                        echo "<td>".$row['MaLoaiTruyen']."</td>";
                        echo "<td>".$row['TieuDe']."</td><td>".$row['TacGia']."</td><td>".$row['NhaXuatBan']."</td><td><image width: 50px; height=100px; src='img/".$row['Anh']."'/></td><td>".$row['GiaBan']."</td>"; 
                        echo "<td><a class='btn btn-warning' href='admin.php?UpdProd=".$row['MaTruyen']."'>Sửa</a>  
                        <a class='btn btn-danger' style='margin-top: 5px' href='admin.php?DelProd=".$row['MaTruyen']."
                        ' onclick='return confirm(\"Co chac la xoa khong\")'>Xóa</a> </td>";
                        echo "</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 result";
                }
            } else {
                echo "Khong co gia tri";
            }
        }
    
    }

    
?>