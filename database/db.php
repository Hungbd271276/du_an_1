<?php
 $host = 'localhost';
 $db_user = 'root';
 $db_passwd = '';
 $db_name = 'du-an1-website';

try{
   $objConn = new PDO("mysql:host=$host;dbname=$db_name",$db_user,$db_passwd);
   $objConn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
   // echo "Kết nối Cơ sở dữ liệu thành công!";
}catch(Exception $e){
    die($e->getMessage());
}
?>