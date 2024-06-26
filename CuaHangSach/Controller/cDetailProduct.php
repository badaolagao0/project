<?php 
    include_once("Model/mDetailProduct.php");
    include_once('format.php');

    class ControlDetail{
        function getDetailProduct($maSach){
            $p = new modelDetail();
            $tbl = $p -> SelectDetailProduct($maSach);
            return $tbl;
        }

        // thêm sach vào giỏ hàng
        function addSachToGh($idSach, $idKh, $amount){
            $p = new modelDetail();
            $tbl = $p->selectAllGh();
            // kiểm tra khách hàng đã thêm sách đó vào giỏ hàng chưa
            $chkExist = false;
            if(mysqli_num_rows($tbl) > 0){
                while($row = mysqli_fetch_assoc($tbl)){
                    if ($row['MaKH']== $idKh && $row['MaSach']==$idSach){
                        $chkExist = true;
                        $idGh = $row['MaGioHang'];
                        $sl = $row['SoLuongMua'] + $amount;
                    } 
                } 
            }

            if ($chkExist) {
                $ins = $p -> updateSachToGh($idGh, $sl);
                if ($ins) {
                    return 1;
                } else {
                    return 0; // Khong the update
                }
            } else {
                if(mysqli_num_rows($tbl) > 0) {
                    mysqli_data_seek($tbl, mysqli_num_rows($tbl)-1);
                    $row = mysqli_fetch_assoc($tbl);
                    // print_r($row);
                    $so = preg_replace("/[^0-9]/", "", $row['MaGioHang']);
                    $ma = $so+1;
                    $identityVariable =  formatData('GH',$ma);
                    $ins = $p -> insertSachToGh($identityVariable, $idSach, $idKh, $amount);
                    if ($ins) {
                        return 1;
                    } else {
                        return 0; //Khong the insert
                    }
                } else {
                    $ins = $p -> insertSachToGh('GH01', $idSach, $idKh, $amount);
                    if ($ins) {
                        return 1;
                    } else {
                        return 0; //Khong the insert
                    }
                }
            }
        }
    }
?>