<style>
.error {
    color: #FF0000;
}
</style>
<?php
include_once('Controller/cNV.php');

// lấy giá trị cũ
$p = new controlNV();
// $none = "";
// $idNhanVien = $_REQUEST["UpdNVSelf"];
// if ($_REQUEST["UpdNV"]){
//     $tblKH = $p->getAllNVByID($_REQUEST["UpdNV"]);
// } else {
//     $tblKH = $p->getAllNVByID($_REQUEST["UpdNVSelf"]);
//     $idNhanVien = $_REQUEST["UpdNVSelf"];
//     $none = "d-none";
// }
    $tblKH = $p->getAllNVByID($idNhanVien);
while ($row = mysqli_fetch_assoc($tblKH)) {
    $pName = $row['HoTen'];
    $pYear = $row['NgaySinh'];
    $Email = $row['Email'];
    $sdt = $row['SoDienThoai'];
}

// hàm làm sạch dữ liệu đầu vào
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
$nameErr="";
$YearErr ="";
$emailErr ="";
$sdtErr ="";
if (isset($_REQUEST['btnsubmit'])) {
//    ten nhan vien
    $nvName = test_input($_POST["tennv"]);
    if (empty($_POST["tennv"])) {
        $nameErr = "Vui lòng điền tên nhân viên";
    } elseif (!preg_match('/[a-zA-Z0-9\s]*/', $nvName)) {
        $nameErr = "Gồm chữ và khoảng trắng! VD: 'Nguyen Van A'";
    } else {
        $chkName = true;
    }

//    ngay sinh
    $ngaysinh = test_input($_POST["ngaysinh"]);
    if (empty($_POST["ngaysinh"])) {
        $YearErr = "Vui lòng điền ngày sinh";
    } else {
        $chkYear = true;
    }

//    email
    $email = test_input($_POST["email"]);
    if (empty($_POST["email"])) {
        $emailErr = "Vui lòng điền email";
    } else {
        $chkEmail = true;
    }

//    sdt
    $sdt = test_input($_POST["sdt"]);
    if (empty($_POST["sdt"])) {
        $sdtErr = "Vui lòng điền số điện thoại";
    } else {
        $chkSdt = true;
    }

    if ($chkName && $chkYear && $chkEmail && $chkSdt) {
        $p = new controlNV();
        $result = $p->updNVSelf($idNhanVien, $nvName, $ngaysinh, $email, $sdt);
        if ($result == 1) {
            echo "<script>alert('Cập nhật thành công')</script>";
            echo '<script> window.location = "'.$location.'"; </script>';
        } else {
            echo "<script>alert('Cập nhật thất bại')</script>";
        }
    } else {
        echo "<script>alert('Dữ liệu cập nhật chưa hợp lệ')</script>";
    }
}
?>

<body>
    <form class='form-group' action="#" method='post' enctype="multipart/form-data">
        <fieldset>
            <legend>
                <?php if ($_SESSION['TaiKhoan']){
                    echo '<h2>CẬP NHẬT TÀI KHOẢN</h2>';
                } else {
                    echo '<h2>QUẢN LÝ NHÂN VIÊN</h2>';
                }
                ?>
            </legend>
            <?php if (!$_SESSION['TaiKhoan']){
                echo '<div class="form-group row">
                    <div class="col-md-4 control-label">
                        <button type="button" class="btn btn-secondary" onclick="quay_lai_trang_truoc()">Quay lại</button>
                    </div>
                    <div class="col-md-4">
                        <h2 class="form-title">Cập Nhật Nhân Viên</h2>
                    </div>
                </div>';
            }
                ?>

            <!--       Ho ten nhan vien -->
            <div class="form-group row">
                <label class="col-md-4 control-label">Họ tên <span class="error">*</span></label>
                <div class="col-md-4">
                    <input type="text" name="tennv" class="form-control input-md" placeholder="Họ tên nhân viên"
                        value="<?php echo $pName ?>">
                    <span class="error"><?php echo $nameErr; ?></span>
                </div>
            </div>

            <!--        Ngay sinh-->
            <div class="form-group row">
                <label class="col-md-4 control-label">Ngày sinh <span class="error">*</span></label>
                <div class="col-md-4">
                    <input type="date" name="ngaysinh" class="form-control input-md" placeholder="Ngày sinh"
                        value="<?php echo $pYear ?>">
                    <span class="error"><?php echo $YearErr; ?></span>
                </div>
            </div>

            <!--        Email-->
            <div class="form-group row">
                <label class="col-md-4 control-label">Email <span class="error">*</span></label>
                <div class="col-md-4">
                    <input type="email" name="email" class="form-control input-md" placeholder="Email"
                        value="<?php echo $Email ?>">
                    <span class="error"><?php echo $emailErr; ?></span>
                </div>
            </div>
            <!--        So dien thoai-->
            <div class="form-group row">
                <label class="col-md-4 control-label">Số điện thoại <span class="error">*</span></label>
                <div class="col-md-4">
                    <input type="number" name="sdt" class="form-control input-md" placeholder="Số điện thoại"
                        value="<?php echo $sdt ?>">
                    <span class="error"><?php echo $sdtErr; ?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="submit" name="btnsubmit" value="Lưu" class=' btn btn-success'>
                    <input type="reset" value="Nhập lại" class='btn btn-danger'>
                </div>
            </div>
        </fieldset>
    </form>
</body>
<script>
function quay_lai_trang_truoc() {
    history.back();
}
</script>