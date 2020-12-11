<?php
   $stmt = $objConn->prepare("SELECT * FROM khach_hang WHERE id_kh =:get_id_kh");
   $stmt->bindParam(':get_id_kh',$_GET['id']);
   $stmt->execute(); 
   $stmt->setFetchMode(PDO::FETCH_ASSOC);
   $row = $stmt->fetch();
   if(empty($row)){
       echo "Không tồn tại ID".$_GET['id'];
       return;
   }
 $msg = '';
 $err = [];
 if(isset($_POST['btnSave'])){
    $ten_kh = $_POST['ten_kh'];
    $sdt = $_POST['sdt'];
    // kiểm tra hợp lệ
    if(empty($ten_kh)){
        $err[] = 'Bạn chưa nhập tên khách hàng';
    }
    if(empty($sdt)){
        $err[] = 'Bạn chưa nhập Số điện thoại';
    }
    if(empty($err)){
        // Người dùng nhập hợp lệ
        // tiếp hành truy vấn update
        $sql = "UPDATE  khach_hang SET ten_khach_hang=:post_ten_khach_hang, SDT=:post_SDT ";
        $sql .= " WHERE id_kh = :get_id_kh";
         echo "<br> Câu lệnh SQL:" , $sql;
            $stmt = $objConn->prepare($sql);
            $stmt->bindParam(":post_ten_khach_hang",$ten_kh);
            $stmt->bindParam(":post_SDT",$sdt);
            $stmt->bindParam(":get_id_kh",$_GET['id']);
            $stmt->execute();
            // chuyển trang
            header("Location:?page=khach-hang");


    }else{
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
   form {
       width: 600px;
       margin:auto;
   }
   h1{
       text-align: center;
   }
 </style>
</head>
<body>
 <p style = 'color:red'><?php echo $msg ?></p>
<div class = "container">
  <h1>Update khách hàng</h1>
   <div class="row text-center">
   <div class="col-xl-6">
   <form action = "" method = "POST">
           <div class="form-group"><br>
           <label for="exampleInputEmail1">Tên khách hàng</label>
          <input type="text" name = "ten_kh" value = "<?php echo $row['ten_khach_hang'] ?>" class="form-control" id="exampleInputEmail1" ><br>

          <label for="exampleInputEmail1">Số điện thoại</label>
          <input type="text" name = "sdt" value = "<?php echo $row['SDT'] ?>" class="form-control" id="exampleInputEmail1" > <br>
             </div>    
         <a href=""><input type= "submit" name="btnSave" class="btn btn-success
                  mt-3 float-right" value="Submit"></a>     
   </div>
   </form>
   </div><!--col-xl-6-->
</div>
</body>
</html>