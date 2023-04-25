<?php
include_once("ketnoi.php");
class modelProduct{
    function selectAllProduct(){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "select * from truyentranh";
            $table = mysql_query($string);
            $p -> dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function selectAllProductByCompany($comp){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "select * from truyentranh where maloaitruyen = ".$comp;
            $table = mysql_query($string);  
            $p -> dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function selectAllProductByName($ten){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "select * from truyentranh where TieuDe like N'%".$ten."%'";
            $table = mysql_query($string);  
            $p -> dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function selectAllProductByPrice($min,$max){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "select * from truyentranh where GiaBan between ".$min." and ".$max;
            $table = mysql_query($string);  
            $p -> dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }


    function insertProduct($maloai, $tieude, $tacgia, $nxb, $anh, $gia){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "insert into truyentranh(Maloaitruyen, Tieude, Tacgia, Nhaxuatban, Anh, Giaban) values";
            $string .= "(".$maloai.",N'".$tieude."',N'".$tacgia."',N'".$nxb."','".$anh."',".$gia.")";
            $kq = mysql_query($string);
            $p -> dongketnoi($con);
            return $kq;
        } else {
            return false;
        }
    }

    function deleteProduct($MaTruyen){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "delete from truyentranh where MaTruyen = $MaTruyen";
            $kq = mysql_query($string);
            $p -> dongketnoi($con);
            return $kq;
        } else {
            return false;
        }
    }

    function selectProductByID($ma){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "select * from truyentranh where MaTruyen = ".$ma;
            $table = mysql_query($string);  
            $p -> dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }

    function updateProduct($matruyen,$maloai, $tieude, $tacgia, $nxb, $anh, $gia){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "UPDATE truyentranh SET MaLoaiTruyen = $maloai,TieuDe = N'$tieude',TacGia = N'$tacgia',NhaXuatBan = N'$nxb',Anh = N'$anh',GiaBan = $gia WHERE MaTruyen = $matruyen;";
            $kq = mysql_query($string);
            $p -> dongketnoi($con);
            return $kq;
        } else {
            return false;
        }
    }

    function updateProductNoImg($matruyen,$maloai, $tieude, $tacgia, $nxb, $gia){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "UPDATE truyentranh SET MaLoaiTruyen = $maloai,TieuDe = N'$tieude',TacGia = N'$tacgia',NhaXuatBan = N'$nxb', GiaBan = $gia WHERE MaTruyen = $matruyen;";
            $kq = mysql_query($string);
            $p -> dongketnoi($con);
            return $kq;
        } else {
            return false;
        }
    }

    function selectAllProductPage($limit, $count){
        $con;
        $p = new clsketnoi();
        if ($p -> ketnoiDB($con)){
            $string = "select * from product order by ProdID desc limit $limit, $count";
            $table = mysql_query($string);
            $p -> dongketnoi($con);
            return $table;
        } else {
            return false;
        }
    }
}
?>