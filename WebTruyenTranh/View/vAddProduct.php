<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.h-form {
    color: #fff;
    font-weight: 700;
    text-align: center;
    margin-bottom: 5px;
}

.form-add {
    margin: auto;
}
</style>
<?php
include_once('Controller/cProduct.php');
if (isset($_REQUEST['btnsubmit'])){
    $ten = $_REQUEST['txtTenSP'];
    $tacgia = $_REQUEST['txtTacgiaSP'];
    $nxb = $_REQUEST['txtNxbSP'];
    $file = $_FILES["ffile"];
    $gia = $_REQUEST['txtGiaSP'];
    $cty = $_REQUEST["cboCty"];

    $p = new controlProduct();
    $kq = $p -> addProduct($cty, $ten, $tacgia, $nxb, $file, $gia);
    if ($kq ==1 ) {
        echo "<script>alert('Thêm dữ liệu thành công')</script>";
    } elseif ($kq==0){
        echo "<script>alert('Thêm dữ liệu không thành công')</script>";
    }elseif ($k1==-1){
        echo "<script>alert('Hình ảnh khong dung dinh dang')</script>";
    }elseif ($k1==-2){
        echo "<script>alert('Kich thuoc anh qua lon')</script>";
    }else {
        echo "<script>alert('Khong the upload anh')</script>";
    }
    
}
    // echo header('refresh: 0; url=admin.php');
?>

<body>
    <form class='form-add' action="#" method='post' enctype="multipart/form-data">
        <a href="admin.php?mPro" class='btn btn-secondary' style='position: absolute;top: 125px;left: 30px;'>Quay
            lại</a>
        <table style="margin: auto; text-align: left" class='table table-info'>
            <h2 class='h-form'>THÊM SẢN PHẨM</h2>
            <tr>
                <td>Tiêu đề</td>
                <td>
                    <input type="text" name="txtTenSP" require>
                </td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td>
                    <input type="text" name="txtTacgiaSP" require>
                </td>
            </tr>
            <tr>
                <td>Nhà xuất bản</td>
                <td>
                    <input type="text" name="txtNxbSP" require>
                </td>
            </tr>
            <tr>
                <td>Hình ảnh</td>
                <td>
                    <input type="file" name="ffile" require>
                </td>
            </tr>
            <tr>
                <td>Giá truyện</td>
                <td>
                    <input type="number" name="txtGiaSP" require>
                </td>
            </tr>
            <tr>
                <td>Loại truyện</td>
                <td>
                    <select name="cboCty">
                        <?php
                            include("Controller/cCompany.php");
                            $comp = new controlCompany();
                            $table = $comp -> getAllCompany();
                            if (mysql_num_rows($table)) {
                                while ($row = mysql_fetch_assoc($table)){
                                    echo "<option value= '".$row["MaLoaiTruyen"]."'>".$row["TieuDe"]."</option>";
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="btnsubmit" value="Thêm" class='btn btn-success'>
                    <input type="reset" value="Nhập lại" class='btn btn-danger'>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>