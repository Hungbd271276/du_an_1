<?php
    $stmt=$objConn->prepare("SELECT * FROM nhan_vien WHERE id_nv = :get_id_nv");
    $stmt->bindParam(":get_id_nv",$_GET['id']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();
    if(empty($row)){
        echo "Không tồn tại ID = ".$_GET['id'];
        return;
    }
$msg = "";
$err = [];
if(isset($_POST['btnSave'])){
   $username = $_POST['username'];
   $passwd = $_POST['passwd'];
   $ten_nv = $_POST['ten_nv'];
   $sdt = $_POST['sdt'];
   $email = $_POST['email'];
}
    // kiểm tra hợp lệ
   if(empty($passwd)){
     $err[] = '';
   }
   if(empty($ten_nv)){
     $err[] = '';
   }
   if(empty($sdt)){
     $err[] = '';
   }
   if(empty($email)){
     $err[] = '';
    }      
    if(empty($err)){
        // người dùng nhập hợp lệ
        // Tiến hành câu truy vấn update
        $sql = "UPDATE  nhan_vien SET ten_nv=:post_ten_nv, SDT=:post_SDT ,email=:post_email";
        if(!empty($passwd)){
            $sql .=", passwd=:post_passwd";
            $passwd = password_hash($passwd,PASSWORD_DEFAULT);
        }
        $sql .= " WHERE id_nv = :get_id_nv";
         echo "<br> Câu lệnh SQL:" , $sql;
            $stmt = $objConn->prepare($sql);
            $stmt->bindParam(":post_passwd",$passwd);
            $stmt->bindParam(":post_ten_nv",$ten_nv);
            $stmt->bindParam(":post_SDT",$sdt);
            $stmt->bindParam(":post_email",$email);
            $stmt->bindParam(":get_id_nv",$_GET['id']);
            $stmt->execute();
            // chuyển trang
            header("Location:?page=nhan_vien");
          
       }else{
           $msg = implode("<br>",$err);
       }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 <style>
    form{
    display: grid;
     grid-template-columns: 1fr 1fr;
     gap:20px
   }
   h4{
       text-align: center;
       font-size:60px
   }
 </style>
</head>
<body>
 <p style = 'color:red'><?php echo $msg ?></p>
<div class = "container">
  <h4>Thêm nhân viên</h4>
   <div class="row text-center">
   <form action = "" method = "POST">
          <div class= "left">
          <label for="exampleInputEmail1">Username</label>
          <input type="text" name = "username" disabled value = "<?php echo $row['username'] ?>" class="form-control" id="exampleInputEmail1" ><br>

          <label for="exampleInputEmail1">Passwd</label>
          <input type="text" name = "passwd" value = "<?php echo $row['passwd'] ?>" class="form-control" id="exampleInputEmail1" > <br>

          <label for="exampleInputEmail1">Ten_nv</label>
         <input type="text" name = "ten_nv" value = "<?php echo $row['ten_nv'] ?>" class="form-control" id="exampleInputEmail1" ><br>
          </div>
          <div class= "right">
          <label for="exampleInputEmail1">SDT</label>
        <input type="text" name = "sdt" value = "<?php echo $row['SDT'] ?>" class="form-control" id="exampleInputEmail1" ><br>
        
        <label for="exampleInputEmail1">Email</label>
    <input type="text" name = "email" value = "<?php echo $row['email'] ?>" class="form-control" id="exampleInputEmail1" ><br>
          </div>
         <a href=""><input type= "submit" name="btnSave" class="btn btn-success
                  mt-3 float-right" value="Submit"></a>     
   </form>
   </div><!--col-xl-6-->
</div>
</body>
</html>