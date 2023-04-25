<?php
include('Controller/cProduct.php');
$p = new controlProduct();
$res = $p -> DelProduct($_REQUEST['DelProd']);
// echo header('refresh:0 ; url= admin.php');
if ($res) {
    echo "<script>alert('Xóa dữ liệu thành công')</script>";
} else {
    echo "<script>alert('Xóa dữ liệu không thành công')</script>";
}
// echo header('refresh:0; url=admin.php?mPro');
?>