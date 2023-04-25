<?php
    include_once("Controller/cCompany.php");
    function vCompany(){
        // tạo đối tượng controller company
        $p = new controlCompany();
        // Gọi hàm lấy toàn bộ dữ liệu company
        $tblCompany = $p -> getAllCompany();
        if ($tblCompany) {
            // Kiểm tra kết quả nhận được có dữ liệu (bảng company có dữ liệu)
            if (mysql_num_rows($tblCompany) > 0){
                echo '<nav class="navbar">';
                echo '<ul class="navbar-nav">';
                echo "<li class='nav-item'><a style='font-family: \"Oswald\", sans-serif; font-weight: 500; font-size: larger;' class='nav-link' href='index.php'>Tất cả".$row["TieuDe"]."</a></li>";
                while ($row = mysql_fetch_assoc($tblCompany)){
                    echo "<li class='nav-item'><a style='font-family: \"Oswald\", sans-serif; font-weight: 500; font-size: larger;' class='nav-link' href='index.php?comp=".$row["MaLoaiTruyen"]."'>".$row["TieuDe"]."</a></li>";
                }
                echo '</ul>';
                echo '</nav>';
            } else {
                echo "0 result";
            }
        } else {
            echo "Error";
        }
    }

    function vAdCompany(){
        $p = new controlCompany();
        $tblCompany = $p -> getAllCompany();
        echo '<h2 class="header-new">QUẢN LÝ LOẠI TRUYỆN</h2>';
        if ($tblCompany) {
            // Kiểm tra kết quả nhận được có dữ liệu (bảng company có dữ liệu)
            if (mysql_num_rows($tblCompany) > 0){
                echo "<table style='margin-top: 24px' class='table table-secondary'>";
                echo "<tr style><th scope='col'>Mã loại truyện</th><th scope='col'>Tiêu Đề</th><th scope='col'>Nhóm tác giả</th><th scope='col'>Mô tả</th><th scope='col'>Thể loại</th></tr>";
                // duyệt từng dòng dữ liệu trong kết quả nhận được sau khi truy vấn
                while ($row = mysql_fetch_assoc($tblCompany)) {
                    echo "<tr class='table-info'>";
                    echo '<td scope="row">';
                    echo $row['MaLoaiTruyen']."</td><td>".$row['TieuDe']."</td><td>".$row['NhomTacGia']."</td><td>".$row['MoTa']."</td><td>".$row['TheLoai']."</td>"; 
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
?>