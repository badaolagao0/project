<?php
    include_once("Model/mProduct.php");
    class controlProduct{
        function getAllProduct(){
            $p = new modelProduct();
            $tblProduct = $p -> SelectAllProduct();
            if (!$tblProduct){
                return false;
            } else {
                if (mysql_num_rows($tblProduct)>0) {
                    return $tblProduct;
                } else {
                    return 0;
                }
            }
        } 

        function getAllProductByCompany($comp){
            $p = new modelProduct();
            $tblProduct = $p -> SelectAllProductByCompany($comp);
            if (!$tblProduct){
                return false;
            } else {
                if (mysql_num_rows($tblProduct)>0) {
                    return $tblProduct;
                } else {
                    return 0;
                }
            }
        } 

        function getAllProductByName($ten){
            $p = new modelProduct();
            $tblProduct = $p -> selectAllProductByName($ten);
            if (!$tblProduct){
                return false;
            } else {
                if (mysql_num_rows($tblProduct)>0) {
                    return $tblProduct;
                } else {
                    return 0;
                }
            }
        } 
        
        function getAllProductByPrice($min,$max){
            $p = new modelProduct();
            $tblProduct = $p -> selectAllProductByPrice($min,$max);
            if (!$tblProduct){
                return false;
            } else {
                if (mysql_num_rows($tblProduct)>0) {
                    return $tblProduct;
                } else {
                    return 0;
                }
            }
        } 
        
        function getAllProductByID($ma){
            $p = new modelProduct();
            $tblProduct = $p -> selectProductByID($ma);
            if (!$tblProduct){
                return false;
            } else {
                if (mysql_num_rows($tblProduct)>0) {
                    return $tblProduct;
                } else {
                    return 0;
                }
            }
        } 



        function addProduct($maloai, $tieude, $tacgia, $nxb, $anh, $gia){
            // $loaianh = $anh['type'];
            // $kichthuoc = $anh["size"];
            $tenanh = $anh['name'];
            if ($anh['type'] == 'image/jpg' || $anh['type'] == 'image/png' || $anh['type'] == 'image/jpeg'){
                if ($anh['size'] <= 2*1024*1024){
                    if (move_uploaded_file($anh['tmp_name'],"img/".$tenanh)){
                        $p = new modelProduct();
                        $ins = $p -> insertProduct($maloai, $tieude, $tacgia, $nxb, $tenanh, $gia);
                        if ($ins) {
                            return 1;
                        } else {
                            return 0; // Không thể insert
                        }
                    } else {
                        return -3; // không thể upload
                    }
                } else {
                    return -2; // Kích thước quá lớn
                }
            } else {
                return -1; // Không đúng loại file
            }
        }
        
        function UpdProduct($matruyen,$maloai, $tieude, $tacgia, $nxb, $anh, $gia){
                $tenanh = $anh['name'];
                if ($anh['type'] == 'image/jpg' || $anh['type'] == 'image/png' || $anh['type'] == 'image/jpeg'){
                    if ($anh['size'] <= 2*1024*1024){
                        if (move_uploaded_file($anh['tmp_name'],"img/".$tenanh)){
                            $p = new modelProduct();
                            $res = $p -> updateProduct($matruyen,$maloai, $tieude, $tacgia, $nxb, $tenanh, $gia);
                            if ($res) {
                                return 1;
                            } else {
                                return 0; // Không thể insert
                            }
                        } else {
                            return -3; // không thể upload
                        }
                    } else {
                        return -2; // Kích thước quá lớn
                    }
                } else {
                    return -1; // Không đúng loại file
                }
            
        } 

        function UpdProductNoImg($matruyen,$maloai, $tieude, $tacgia, $nxb, $gia){
            $p = new modelProduct();
            $res = $p -> updateProductNoImg($matruyen,$maloai, $tieude, $tacgia, $nxb, $gia);
            return $res;
    } 

        function DelProduct($ma){
            $p = new modelProduct();
            $res = $p -> deleteProduct($ma);
            return $res;
        } 

    }
?>