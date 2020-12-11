<?php
$msg = '';
$err = [];
if(isset($_POST['btnSave'])){
    $nhan_vien = $_POST['nv'];
    $ten_kh = $_POST['ten_kh'];
    $sdt_kh = $_POST['sdt_kh'];
    $gio_hen = $_POST['gio_hen'];
    $ngay_hen = $_POST['ngay_hen'];
    // kiểm tra hợp lệ
    if(empty($nhan_vien)){
        $err[] = 'Bạn chưa nhập tên khách hàng';
    }
    if(empty($ten_kh)){
        $err[] = 'Bạn chưa nhập Số điện thoại';
    }
    if(empty($sdt_kh)){
        $err[] = 'Bạn chưa nhập địa chỉ';
    }
    if(empty($gio_hen)){
        $err[]  ='Bạn cần nhập giờ hẹn';
    }
    if(empty($ngay_hen)){
        $err[] = 'Bạn cần nhập ngày hẹn';
    }

    if(empty($err)){
        $stmt = $objConn->prepare("INSERT INTO lich_hen(nhan_vien, ten_kh, sdt_kh, gio_hen, ngay_hen)
        VALUES(:nhan_vien,:ten_kh,:sdt_kh ,:gio_hen ,:ngay_hen)");
        $stmt->bindParam(":nhan_vien",$nhan_vien);
        $stmt->bindParam(":ten_kh",$ten_kh);
        $stmt->bindParam(":sdt_kh",$sdt_kh);
        $stmt->bindParam(":gio_hen",$gio_hen);
        $stmt->bindParam(":ngay_hen",$ngay_hen);
        $stmt->execute();

        $msg = 'Đã thêm thành công lịch hẹn';
        header("Location:?page=lich-hen");
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
  <h1>Lịch hẹn</h1>
   <div class="row text-center">
   <div class="col-xl-6">
   <form action = "" method = "POST">
           <div class="form-group"><br>
           <label for="exampleInputEmail1">Nhân viên</label>
          <input type="text" name = "nv" class="form-control" id="exampleInputEmail1" ><br>

          <label for="exampleInputEmail1">Tên khách hàng</label>
          <input type="text" name = "ten_kh" class="form-control" id="exampleInputEmail1" > <br>

          <label for="exampleInputEmail1">SĐT Khách hàng</label>
         <input type="text" name = "sdt_kh" class="form-control" id="exampleInputEmail1" ><br>
         
         <label for="exampleInputEmail1">Giờ hẹn</label>
         <input type="text" name = "gio_hen" class="form-control" id="exampleInputEmail1" ><br>

         <label for="exampleInputEmail1">Ngày hẹn</label>
         <input type="text" name = "ngay_hen" class="form-control" id="exampleInputEmail1" ><br>

         
         <label for="exampleInputEmail1">Dịch vụ</label>
         <input type="text" name = "ngay_hen" class="form-control" id="exampleInputEmail1" ><br>

         
         <label for="exampleInputEmail1">Status</label>
         <input type="text" name = "ngay_hen" class="form-control" id="exampleInputEmail1" ><br>
             </div>    
         <a href=""><input type= "submit" name="btnSave" class="btn btn-success
                  mt-3 float-right" value="Submit"></a>     
   </div>
   </form>
   </div><!--col-xl-6-->
</div>
</body>
</html>