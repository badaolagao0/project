<?php
    include_once("ketnoi.php");

    class modelCompany{
        function selectAllCompany() {
            $con;
            $p = new clsketnoi();
            if ($p -> ketnoiDB($con)){
                $string = "select * from loaitruyentranh";
                // Thực thi truy vấn, kết quả trả về là 1 table chứa toàn bộ dữ liệu bảng company
                $table = mysql_query($string);
                $p -> dongketnoi($con);
                return $table;
            } else {
                return false;
            }
        }
    }
?>