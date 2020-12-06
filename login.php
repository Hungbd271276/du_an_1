<?php
 session_start();
 require_once "database/db.php";
$msg = '';
$err = [];
if(isset($_POST['btnLogin'])){
    $username  = $_POST['user'];
    $passwd = $_POST['pass'];
}
// ----------------Kiểm tra hợp lệ----------------------
if(empty($username)){
    $err[] = "";
}
if(empty($passwd)){
    $err[] = "";
}
if(empty($err)){
    // Không có lỗi
    $stmt = $objConn->prepare("SELECT * FROM nhan_vien where username= :post_username");
    $stmt->bindParam(":post_username",$username);
  // Thực thi câu lệnh
    $stmt->execute();
    // Lấy thông tin user
    $userInfo = $stmt->fetch();
    if(empty($userInfo)){
        $msg = 'Tên đăng nhập không đúng';
    }else{
         // có dữ liệu
         // Kiểm tra password:
         //  print_r($userInfo);
        if(password_verify($passwd,  $userInfo['passwd'])){
         // Đăng nhập thành công
         // cho dữ liệu vào session
         $_SESSION['auth'] = $userInfo;
         $msg = 'Đã đăng nhập thành công!';
         // hoặc chuyển về trang chủ bằng lệnh header(...).
         header("location:admin/index.php");
        }else{
            $msg = 'Sai Password';
        }
    }
}else{
    // Có lỗi
    $msg = implode("<br>" ,$err);
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=div, initial-scale=1.0">
     <title>Document</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <h4><?php echo $msg ?></h4>
     <div class="loginbox">
          <img src="view/img/user.png" class="avatar" alt="">
          <h1>Login Here</h1>
          <form action="" method = "POST">
               <p>Username</p>
               <input type="text" name="user" placeholder="Enter Username">
               <p>Password</p>
               <input type="password" name="pass" placeholder="Enter Password">
               <input type="submit" name="btnLogin" value="login">
               <a href="#">Lost your password</a><br>
               <a href="#">Don't have an account</a>

          </form>
     </div>
</body>
</html>