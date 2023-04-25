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

.form-del {
    margin: auto;
    width: 100%;
}

.form-del input {
    width: 90%;
}
</style>
<?php
include_once('Controller/cProduct.php');
    $p = new controlProduct();
    $tblProduct = $p -> getAllProductByID($_REQUEST["UpdProd"]);  
    while ($row = mysql_fetch_assoc($tblProduct)) {
        $matruyen = $row['MaTruyen'];
        $loaitruyen = $row['MaLoaiTruyen'];
        $ten = $row['TieuDe'];
        $tacgia = $row['TacGia'];
        $nxb = $row['NhaXuatBan'];
        $anh = $row["Anh"];
        $gia = $row['GiaBan'];
        $cty = $row["MaLoaiTruyen"];
    }
    
    // Lấy giá trị mới
    if (isset($_REQUEST['btnsubmit'])) {
        $nten = $_REQUEST['txtTenSP'];
        $ntacgia = $_REQUEST['txtTacgia'];
        $nnxb = $_REQUEST['txtNxbSP'];
        $nanh = $_FILES['ffile'];
        $ngia = $_REQUEST['txtGiaSP'];
        $ncty = $_REQUEST['cboCty'];
        // echo '<h1 style="color: #fff">hello: '.$ntacgia.'</h1>';
 
        if (!empty($nanh['name'])){
            $kq = $p -> UpdProduct($matruyen,$ncty, $nten, $ntacgia, $nnxb, $nanh, $ngia);
            if ($kq ==1 ) {
                echo "<script>alert('Cập nhật dữ liệu thành công')</script>";
            } elseif ($kq==0){
                echo "<script>alert('Thêm dữ liệu không thành công')</script>";
            }elseif ($k1==-1){
                echo "<script>alert('Hình ảnh khong dung dinh dang')</script>";
            }elseif ($k1==-2){
                echo "<script>alert('Kich thuoc anh qua lon')</script>";
            }else {
                echo "<script>alert('Khong the upload anh')</script>";
            }
        } else {
            $res = $p -> UpdProductNoImg($matruyen,$ncty, $nten, $ntacgia, $nnxb, $ngia);
            if ($res) {
                echo "<script>alert('Cập nhật liệu thành công')</script>"; 
            } else {

                echo "<script>alert('Cập nhật thất bại!')</script>";
            }
        }
    }
    // echo header('refresh:0; url="admin.php?mPro"');
?>

<body>
    <form class='form-del' action="#" method='post' enctype="multipart/form-data">
        <a href="admin.php?mPro" class='btn btn-secondary' style='position: absolute;top: 125px;left: 30px;'>Quay
            lại</a>
        <table style="width: 80%; margin: auto; text-align: left" class='table table-info'>
            <h2 class='h-form'>SỬA SẢN PHẨM</h2>
            <tr>
                <td>Tiêu đề</td>
                <td>
                    <input type="text" name="txtTenSP" value="<?php echo $ten?>">
                </td>
            </tr>
            <tr>
                <td>Tác giả</td>
                <td>
                    <input type="text" name="txtTacgia" value="<?php echo $tacgia?>">
                </td>
            </tr>
            <tr>
                <td>Nhà xuất bản</td>
                <td>
                    <input type="text" name="txtNxbSP" value="<?php echo $nxb?>">
                </td>
            </tr>
            <tr>
                <td>Đổi ảnh bìa</td>
                <td>
                    <input type="file" name="ffile">
                </td>
            </tr>
            <tr>
                <td>Ảnh bìa hiện tại</td>
                <td>
                    <?php echo "<image style='width: 160px; height=130px;' src='img/".$anh."'/>"?>
                </td>
            </tr>
            <tr>
                <td>Giá sản phẩm</td>
                <td>
                    <input type="number" name="txtGiaSP" value="<?php echo $gia?>">
                </td>
            </tr>

            <tr>
                <td>Công ty cung cấp</td>
                <td>
                    <select name="cboCty">
                        <?php
                            include("Controller/cCompany.php");
                            $comp = new controlCompany();
                            $table = $comp -> getAllCompany();
                            if (mysql_num_rows($table)) {
                                while ($row = mysql_fetch_assoc($table)){
                                    if ($row['MaLoaiTruyen'] == $loaitruyen) {
                                            echo "<option value= '".$row["MaLoaiTruyen"]."' selected>".$row["TieuDe"]."</option>";
                                    } else {
                                        echo "<option value= '".$row["MaLoaiTruyen"]."'>".$row["TieuDe"]."</option>";
                                    }
                                }
                            }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input style='width: fit-content;' type="submit" name="btnsubmit" value="Cập nhật"
                        class='btn btn-success'>
                    <input style='width: fit-content;' type="reset" value="Nhập lại" class='btn btn-danger'>
                </td>
            </tr>
        </table>
    </form>
</body>

</html>