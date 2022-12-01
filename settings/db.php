<?php
if($_SERVER["SERVER_NAME"] == "localhost" || $_SERVER["SERVER_ADDR"] == "127.0.0.1"){
    $dsn = "mysql:host=localhost;dbname=sportswh;charset=utf8";
    $username = "root";
    $password = "";
}else{
    $dsn = "mysql:host=sql213.epizy.com;dbname=epiz_32583271_sportswh;charset=utf8";
    $username = "epiz_32583271";
    $password = "ocn1ErFpmawhmLM";
}
?>