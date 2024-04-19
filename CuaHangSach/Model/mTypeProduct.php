<?php
    include_once("connect.php");
    class modelAllType{
        function SelectAllType(){
            $conn;
            $p = new connect();
            $tbl = $p -> ConnectDB($conn);

            if($tbl){
                $query = "select * from loaisach";
                $result = mysqli_query($conn, $query);

                $p -> CloseConnect($conn);
                return $result;
            }else{
                return false;
            }
        }
    }
?>