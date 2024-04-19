<?php
    class connect{
        function ConnectDB(& $conn){
            $conn = mysqli_connect("localhost", "root", "","cuahangsach");
            mysqli_set_charset($conn, "utf8");
            if($conn){
                return mysqli_select_db($conn,"cuahangsach");
            }else{
                return false;
            }
        }

        function CloseConnect($conn){
            mysqli_close($conn);
        }
    }
    // $s = new connect();
    // echo $s->ConnectDB($conn);
?>