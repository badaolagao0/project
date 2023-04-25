<?php
    class clsketnoi{
        // Ham ket noi CSDL
        function ketnoiDB(& $conn){
            $conn = mysql_connect("localhost","mrQ","123456");
            mysql_set_charset("utf8");
            if ($conn) {
                return mysql_select_db("truyentranh");
            } else {
                return false;
            }
        }

        function dongketnoi($conn){
            mysql_close($conn);
        }
    }