<?php
  $msg = '';
  $err = [];
  if(isset($_POST['btnSave'])){
      $username = $_POST['username'];
      $passwd = $_POST['passwd'];
      $ten_nv = $_POST['ten_nv'];
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
           $msg = 'Đã thêm thành công nhân viên';
           header("Location:?page=nhan_vien");
              
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>
 
   h1{
       text-align: center;
   }
   form{
    display: grid;
     grid-template-columns: 1fr 1fr;
     gap:20px
   }
 </style>
</head>
<body>
<div class = "container">
  <h1>Thêm nhân viên</h1>
  <p style = 'color:red'><?php echo $msg ?></p>
   <div class="row text-center">
   <form action = "" method = "POST">
           
           <div class= "left">
           <label for="exampleInputEmail1">Username</label>
          <input type="text" name = "username" class="form-control" id="exampleInputEmail1" ><br>

          <label for="exampleInputEmail1">Passwd</label>
          <input type="text" name = "passwd" class="form-control" id="exampleInputEmail1" > <br>

          <label for="exampleInputEmail1">Ten_nv</label>
         <input type="text" name = "ten_nv" class="form-control" id="exampleInputEmail1" ><br>
           </div><!--end--left-->
         <div class = "right">
         <label for="exampleInputEmail1">SDT</label>
        <input type="text" name = "sdt" class="form-control" id="exampleInputEmail1" ><br>
        
        <label for="exampleInputEmail1">Email</label>
        <input type="text" name = "email" class="form-control" id="exampleInputEmail1" ><br>
         </div><!--end-right-->
                
         <a href=""><input type= "submit" name="btnSave" class="btn btn-success
                  mt-3 float-right" value="Submit"></a>     
   </form>
   </div><!--col-xl-6-->
</div>
</body>
</html>