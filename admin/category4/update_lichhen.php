<?php
    $stmt=$objConn->prepare("SELECT * FROM lich_hen WHERE id = :get_id");
    $stmt->bindParam(":get_id",$_GET['id']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $row = $stmt->fetch();
    if(empty($row)){
        echo "Không tồn tại ID = ".$_GET['id'];
        return;
    }

 $msg = '';
 $err = [];
 if(isset($_POST['btnSave'])){
     $status = $_POST['status'];
 }
 // kiểm tra hợp lệ
  if(empty($status)){
      $err[] = '';
  }
  if(empty($err)){
    $sql = "UPDATE  lich_hen SET statuss = :post_statuss";
    $sql .= " WHERE id = :get_id";
    echo "<br> Câu lệnh SQL:" , $sql;
    $stmt = $objConn->prepare($sql);
    $stmt->bindParam(":post_statuss",$status);
    $stmt->bindParam(":get_id",$_GET['id']);
    $stmt->execute();
    header("Location:?page=lich-hen");
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
 </style>
</head>
<body>
<div class = "container">
  <p style = 'color:red'><?php echo $msg ?></p>
   <div class="row text-center">
   <form action = "" method = "POST">
           <div class= "left">
           <label for="exampleInputEmail1">Nhân viên</label>
          <input type="text" name = "nv" disabled value = '<?php echo $row['nhan_vien'] ?>' class="form-control" id="exampleInputEmail1" ><br>

          <label for="exampleInputEmail1">Tên khách hàng</label>
          <input type="text" name = "ten_kh" disabled value = '<?php echo $row['ten_kh'] ?>' class="form-control" id="exampleInputEmail1" > <br>

          <label for="exampleInputEmail1">SĐT Khách hàng</label>
         <input type="text" name = "sdt_kh" disabled value = '<?php echo $row['sdt_kh'] ?>' class="form-control" id="exampleInputEmail1" ><br>
         
         <label for="exampleInputEmail1">Giờ hẹn</label>
         <input type="text" name = "gio_hen" disabled value = '<?php echo $row['gio_hen'] ?>' class="form-control" id="exampleInputEmail1" ><br>
           </div><!--end--left-->
         <div class = "right">
         <label for="exampleInputEmail1">Ngày hẹn</label>
         <input type="text" name = "ngay_hen" disabled value = '<?php echo $row['ngay_hen'] ?>' class="form-control" id="exampleInputEmail1" ><br>

         
         <label for="exampleInputEmail1">Dịch vụ</label>
         <input type="text" name = "dich_vu" disabled value = '<?php echo $row['dich_vu'] ?>' class="form-control" id="exampleInputEmail1" ><br>

         
         <label for="exampleInputEmail1">Status</label>
         <input type="number" name = "status" value = '<?php echo $row['statuss'] ?>'  class="form-control" id="exampleInputEmail1" ><br>
         </div><!--end-right-->
                
         <a href=""><input type= "submit" name="btnSave" class="btn btn-success
                  mt-3 float-right" value="Submit"></a>     
   </form>
   </div><!--col-xl-6-->
</div>
</body>
</html>