<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link rel="stylesheet" href="../Cua HangSach/css/styleNXB.css">
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">
</head>
<style>
.error {
    color: #FF0000 !important;
}

.item-container {
    background-color: #ccc6 !important;
    border: 1px solid #000 !important;
}

.item-label {
    color: #000 !important;
    font-size: 1.5rem !important;
}
</style>
<?php
    include_once('Controller/cModule.php');
    $p = new controlModule();
    $tbl = $p -> getAllBookByID($_REQUEST["UpdBook"]);  
    // lấy giá trị cũ
    $dem = 1;
    while ($row = mysqli_fetch_assoc($tbl)) {
        if ($dem != 1) {
            array_push($authorArr, $row['NgheDanh']);
            array_push($idDS, $row['MaDS']);
        } else {
            $id = $row['MaSach'];
            $idDS = array($row['MaDS']);
            $pName = $row['TieuDe'];
            $pPrice = $row['DonGia'];
            $pAmount = $row['SoLuong'];
            $pCategory = $row['MaLoai'];
            $pNxb = $row['MaNXB'];
            $authorArr = array($row['NgheDanh']);
            $pWareHouse = $row['MaKho'];
            $pImage = $row['HinhAnh'];
            $pYear = $row['NamSanXuat'];
            $pDescribe = $row['MoTa'];
            $pNote = $row['GhiChu'];
            $dem += 1;
        }
    }
    include_once('getInfo.php');
    // hàm làm sạch dữ liệu đầu vào
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    if (isset($_REQUEST['btnsubmit'])){

        // kiểm tra tiêu đề
        $name = test_input($_POST["name"]);
        if (empty($_POST["name"])) {
            $nameErr = "Vui lòng điền tiêu đề";
        } elseif (!preg_match('/[a-zA-Z0-9\s]*/',$name)){
            $nameErr = "Dữ liệu không hợp lệ!";
        } else {
            $chkName = true;
        }

        // kiểm tra giá
        $price = test_input($_POST["price"]);
        $priceI = (int)($price);
        if (empty($_POST["price"])) {
            $priceErr = "Vui lòng điền đơn giá";
        } elseif (!preg_match('/[0-9]+/',$price) || $priceI < 0){
            $priceErr = "Dữ liệu không hợp lệ!";
        } else {
            $chkPrice = true;
        }

        // Kiểm tra số lượng
        $amount = test_input($_POST["amount"]);
        $amountI = (int)($amount);
        $p -> tinhSoLuongTon();
        if (empty($_POST["amount"])) {
            $amountErr = "Vui lòng điền số lượng";
        } elseif (!preg_match('/[0-9]+/',$amount) || $amountI < 0){
            $amountErr = "Dữ liệu không hợp lệ!";
        } elseif ((checkSoLuongTrong() - $amountI) <= 0){
            $amountErr = "Sức chứa còn lại là: ".checkSoLuongTrong();
        } else {
            $chkAmount = true;
        }

        // Kiểm tra tác giả
        $author = $_POST["tacgia"];
         if (count($author) == 0) {
             $tacgiaErr = "Vui lòng chọn tác giả";
         } else {
             $chkAuthor = true;
         }
        
         // Kiểm tra năm sản xuất
        $Year = test_input($_POST["year"]);
        $getYear = date("Y");
        $yInput = (int)$Year;
        $currentYear = (int)$getYear;
        if (empty($_POST["year"])) {
            $yearErr = "Vui lòng điền năm sản xuất";
        } elseif (!preg_match("/^[0-9-' ]*$/",$Year) || ($yInput < 1500) || ($yInput > $currentYear)){
            $yearErr = "Dữ liệu không hợp lệ!";
        } else {
            $chkYear = true;
        }

        // Kiểm tra ảnh
        $anhMoi = $_FILES['imageI'];
        if (!empty($anhMoi['name'])) {
            if ($anhMoi['type'] == 'image/png' || $anhMoi['type']  == 'image/jpg'  || $anhMoi['type']  == 'image/jpeg'){
                if ($anhMoi['size'] <= 2*1024*1024) {
                    $chkImage = true;
                } else {
                    $imageErr = 'Kích thước ảnh quá lớn!';
                }
            } else {
                $imageErr = 'Ảnh không hợp lệ (png, jpg)';
            }
         } else {
            $chkImage = false;
         }

         // Cập nhật sách
         if ($chkName && $chkPrice && $chkAmount && $chkYear) {            
            $category = $_REQUEST['category'];
            $kho = $_REQUEST['kho'];  
            $describe = $_REQUEST['describe'];
            $note = $_REQUEST['note'];
            $nxb = $_REQUEST['nxb'];
            $category = $_REQUEST['category'];
            $kho = $_REQUEST['kho'];
            if ($chkImage) {
                $result = $p -> updBookHaveImage($id, $name, $anhMoi, $priceI, $amountI, $describe, $note, $yInput, $nxb, $category, $kho, $author, $idDS);
            } else {
                $result = $p -> updBookNoImage($id, $name, $priceI, $amountI, $describe, $note, $yInput, $nxb, $category, $kho, $author, $idDS);
            }
            if ($result==1) {
                echo "<script>alert('Cập nhật thành công')</script>";
                echo '<script>window.location = "admin.php?pagesach=1";</script>';
            } elseif ($result==0) {
                echo "<script>alert('Cập nhật thất bại')</script>";
            } else{
                echo "<script>alert('Lưu ảnh thất bại')</script>";
            }
        } else {
            echo "<script>alert('Dữ liệu chưa hợp lệ')</script>";
        }
    }
?>

<body>
    <form class='form-group' action="#" method='post' enctype="multipart/form-data">
        <fieldset>
            <legend>
                <h2>QUẢN LÝ SÁCH</h2>
            </legend>
            <div class="form-group row">
                <div class="col-md-4 control-label">
                    <button type="button" class="btn btn-secondary" onclick="quay_lai_trang_truoc()">Quay lại</button>
                </div>
                <div class="col-md-4">
                    <h2 class='form-title'>Thông Tin Sách</h2>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Tiêu đề:</label>
                <div class="col-md-4">
                    <input id="name" name="name" placeholder="Nhập tiêu đề" value='<?php echo $pName;?>'
                        class="form-control input-md" type="text">
                </div>
                <div class="col-md-4">
                    <span class="error">* <?php echo $nameErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Đơn giá:</label>
                <div class="col-md-4">
                    <input id="price" name="price" placeholder="Nhập giá bán" value='<?php echo $pPrice;?>'
                        class="form-control input-md" type="text">
                </div>
                <div class="col-md-4">
                    <span class="error"><span style='color: #000;'>.000đ</span> * <?php echo $priceErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Số lượng:</label>
                <div class="col-md-4">
                    <input id="amount" name="amount" placeholder="Nhập số lượng" value='<?php echo $pAmount;?>'
                        class="form-control input-md" type="text">
                </div>
                <div class="col-md-4">
                    <span class="error">* <?php echo $amountErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Năm sản xuất:</label>
                <div class="col-md-4">
                    <input id="year" name="year" placeholder="Nhập năm sản xuất" value='<?php echo $pYear;?>'
                        class="form-control input-md" type="text">
                </div>
                <div class="col-md-4">
                    <span class="error">* <?php echo $yearErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Thể loại:</label>
                <div class="col-md-4">
                    <select name="category">
                        <?php
                        $p = new controlModule();
                        $tbl = $p -> getAllLoaiSach();
                        if ($tbl) {
                            if (mysqli_num_rows($tbl) > 0){
                                while ($row =  mysqli_fetch_assoc($tbl)){
                                    if ($row['MaLoai'] == $pCategory) {
                                        echo "<option value='".$row['MaLoai']."'selected>".$row['TenLoai']."</option>";
                                    } else {
                                        echo "<option value='".$row['MaLoai']."'>".$row['TenLoai']."</option>";
                                    }
                                    // echo "<option value='".$row['MaLoai']."'>".$row['TenLoai']."</option>";
                                }
                            }
                        } else {
                            echo 'Không có thể loại!';
                        }
                    ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <span class="error">* <?php echo $categoryErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Nhà xuất bản:</label>
                <div class="col-md-4">
                    <select name="nxb">
                        <?php
                        include_once('Controller/cNXB.php');
                        $p = new controlNXB();
                        $tbl = $p -> getAllNXB();
                        if ($tbl) {
                            if (mysqli_num_rows($tbl) > 0){
                                while ($row =  mysqli_fetch_assoc($tbl)){
                                    if ($row['MaNXB'] == $pNxb) {
                                        echo "<option value='".$row['MaNXB']."'selected>".$row['TenNXB']."</option>";
                                    } else {
                                        echo "<option value='".$row['MaNXB']."'>".$row['TenNXB']."</option>";
                                    }
                                    // echo "<option value='".$row['MaNXB']."'>".$row['TenNXB']."</option>";
                                }
                            }
                        } else {
                            echo 'Không có nhà xuất bản!';
                        }
                    ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <span class="error">* <?php echo $nxbErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Tác giả:</label>
                <div class="col-md-4">
                    <select name="tacgia[]" multiple="multiple" id='countries'>
                        <?php
                        $p = new controlModule();
                        $tbl = $p -> getAllTacGia();
                        if ($tbl) {
                            if (mysqli_num_rows($tbl) > 0){
                                while ($row =  mysqli_fetch_assoc($tbl)){
                                    if (in_array($row['NgheDanh'], $authorArr)){
                                        echo "<option value='".$row['MaTacGia']."'selected>".$row['NgheDanh']."</option>";
                                    } else {
                                        echo "<option value='".$row['MaTacGia']."'>".$row['NgheDanh']."</option>";
                                    }
                                }
                            }
                        } else {
                            echo 'Không có tác giả!';
                        }
                    ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <span class="error">* <?php echo $tacgiaErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Kho:</label>
                <div class="col-md-4">
                    <select name="kho">
                        <?php
                        $p = new controlModule();
                        $tbl = $p -> getAllKho();
                        if ($tbl) {
                            if (mysqli_num_rows($tbl) > 0){
                                while ($row =  mysqli_fetch_assoc($tbl)){
                                    if ($row['MaKho'] == $pWareHouse) {
                                        echo "<option value='".$row['MaKho']."'selected>".$row['TenKho']."</option>";
                                    } else {
                                        echo "<option value='".$row['MaKho']."'>".$row['TenKho']."</option>";
                                    }
                                    // echo "<option value='".$row['MaKho']."'>".$row['TenKho']."</option>";
                                }
                            } 
                        } else {
                            echo 'Không có kho!';
                        }
                    ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <span class="error">* <?php echo $categoryErr;?></span>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Hình ảnh:</label>
                <div class="col-md-4">
                    <input name="imageI" class="input-md" type="file">
                </div>
                <div class="col-md-4">
                    <span class="error">*</span>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <img style='width: 10rem; height: 10rem;' src='image/<?php echo $pImage?>' />
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Mô tả:</label>
                <div class="col-md-4">
                    <textarea name="describe" id="" cols="41" rows="5"><?php echo $pDescribe;?></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label">Ghi chú:</label>
                <div class="col-md-4">
                    <input id="note" name="note" value='<?php echo $pNote;?>' placeholder="Nhập ghi chú"
                        class="form-control input-md" type="text">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-md-4 control-label"></label>
                <div class="col-md-4">
                    <input type="submit" name="btnsubmit" value="Cật nhật" class=' btn btn-success'>
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
<script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@2.0.0/dist/js/multi-select-tag.js"></script>
<script>
new MultiSelectTag('countries') // id
</script>

</html>