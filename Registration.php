<?php
require_once "database/db.php";
  $msg = '';
  $err = [];
  if(isset($_POST['btnSubmit'])){
      $username = $_POST['username'];
      $passwd = $_POST['passwd'];
      $ten_nv = $_POST['name'];
      $sdt = $_POST['sdt'];
      $email = $_POST['email'];
     // kiểm tra hợp lệ
      if(empty($username)){
          $err[] = 'Bạn cần nhập username';
      }
      if(empty($passwd)){
        $err[] = 'Bạn cần nhập Password';
      }
      if(empty($ten_nv)){
        $err[] = 'Bạn cần nhập Tên nhân viên';
      }
      if(empty($sdt)){
        $err[] = 'Bạn cần nhập số điện thoại';
      }
      if(empty($email)){
        $err[] = 'Bạn cần nhập email';
       }
       if(empty($err)){
           $passwd = password_hash($passwd,PASSWORD_DEFAULT);
           $stmt = $objConn->prepare("INSERT INTO nhan_vien(username,passwd,ten_nv,SDT,email)
           VALUES(:username,:passwd,:ten_nv,:sdt,:email)");
           $stmt->bindParam(":username",$username);
           $stmt->bindParam(":passwd",$passwd);
           $stmt->bindParam(":ten_nv",$ten_nv);
           $stmt->bindParam(":sdt",$sdt);
           $stmt->bindParam(":email",$email);
           // thực thi câu lệnh 
           $stmt->execute();
           $msg = 'Đăng ký tài khoản thành công';
          // header("Location:?page=nhan_vien");
              
       }else{
           // có lỗi 
           $msg = implode("<br>",$err);
       }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=div, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="Registration.css">
     <style>
     </style>
</head>
<body>
<h4><?php echo $msg ?></h4>
     <div class="loginbox">
          <img src="view/img/user.png" class="avatar" alt="">
          <h1>Đăng ký</h1>
          <form action="" method = "POST">
               <p>Username</p>
               <input type="text" name="username" placeholder="Enter Username">
               <p>Password</p>
               <input type="password" name="passwd" placeholder="Enter Password">
               <p>Email</p>
               <input type="email" name="email" placeholder="Enter Email">
               <p>Số điện thoại</p>
               <input type="text" name="sdt" placeholder="Enter Số điện thoại">
               <p>Họ tên</p>
               <input type="text" name="name" placeholder="Enter Họ tên">
               <input type="submit" name="btnSubmit" value="Submit">
               <a href="login.php">Quay lại login</a><br>
          </form>
     </div>
</body>
</html>