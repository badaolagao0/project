<?php
    include_once("Controller/cCart.php");
    $p = new ControlCart();
    $ma = $_SESSION['id'] ;
    $tbl = $p->GetThongTinVanChuyen($ma);
    echo '<table>';
    if(mysqli_num_rows($tbl)>0){
        echo '<tr>';
        echo '<td>';
        echo '<input type="checkbox"  style="margin-right:3px" id="cityCheckbox" onclick="toggleCheckbox(\'cityCheckbox\')">';
        echo '<label for="cityCheckbox"> Chọn địa chỉ cũ:</label>';
        echo '</td>';
        echo '<td>';
        echo '<select name="NoiGiao" id="city" disabled>';
        mysqli_data_seek($tbl, 0);
        while ($row = mysqli_fetch_assoc($tbl)) {
            echo '<option value="' . $row['NoiGiao'] . '">' . $row['NoiGiao'] . '</option>';
        }
        echo '</select>';
        echo '</td>';
        echo '</tr>';
    } else {
        echo '<tr>';
        echo '<td>';
        echo '<input type="checkbox"  style="margin-right:3px" id="cityCheckbox" onclick="toggleCheckbox(\'cityCheckbox\')">';
        echo '<label for="cityCheckbox"> Chọn địa chỉ cũ:</label>';
        echo '</td>';
        echo '<td>';
        echo '<select name="NoiGiao"  id="city" disabled>';
        echo '<option value="" >Không</option>';
        echo '</select>';
        echo '</td>';
        echo '</tr>';
        $tbl = $p -> GetThongTinVanChuyenNew($ma);
    }
    mysqli_data_seek($tbl, 0);
    $row = mysqli_fetch_assoc($tbl);
    echo '<tr>';
    echo '<td>';
    echo '<input type="checkbox" style="margin-right:3px" id="textInputCheckbox" onclick="toggleCheckbox(\'textInputCheckbox\')">';
    echo '<label for="textInputCheckbox"> Chọn địa chỉ mới:</label>';
    echo '</td>';
    echo '<td>';
    echo '<input type="text" required name="NoiGiao" id="textInput" disabled>';
    echo '</td>';
    echo '</tr>';
    echo '                <tr>';
    echo '                    <td style="">Số điện thoại:</td>';
    echo '                    <td>'.$row['SoDienThoai'].'</td>';
    echo '                </tr>';
    echo '                <tr>';
    echo '                    <td style="">Người nhận:</td>';
    echo '                    <td>'.$row['HoTen'].'</td>';
    echo '                </tr>';
    echo '            </table>';
?>