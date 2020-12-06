<?php
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
        $stmt = $objConn->prepare("INSERT INTO khach_hang(ten_khach_hang,SDT)
        VALUES(:ten_khach_hang,:SDT)");
        $stmt->bindParam(":ten_khach_hang",$ten_kh);
        $stmt->bindParam(":SDT",$sdt);
        $stmt->execute();

        $msg = 'Đã thêm thành công khách hàng';
        header("Location:?page=khach-hang");
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
  <h1>Thêm khách hàng</h1>
   <div class="row text-center">
   <div class="col-xl-6">
   <form action = "" method = "POST">
           <div class="form-group"><br>
           <label for="exampleInputEmail1">Tên khách hàng</label>
          <input type="text" name = "ten_kh" class="form-control" id="exampleInputEmail1" ><br>

          <label for="exampleInputEmail1">Số điện thoại</label>
          <input type="text" name = "sdt" class="form-control" id="exampleInputEmail1" > <br>

             </div>    
         <a href=""><input type= "submit" name="btnSave" class="btn btn-success
                  mt-3 float-right" value="Submit"></a>     
   </div>
   </form>
   </div><!--col-xl-6-->
</div>
</body>
</html>