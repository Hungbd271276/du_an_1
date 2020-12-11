<?php
$stmt = $objConn->prepare("SELECT * FROM dich_vu WHERE id =:get_id");
$stmt->bindParam(":get_id",$_GET['id']);
$stmt->execute();
$stmt->setFetchMode(PDO::FETCH_ASSOC);

$row = $stmt->fetch();
if(empty($row)){
    echo "Không tồn tại user có ID = ".$_GET['id'];
    return;
}
//-------Tiến hành xử lý sự kiện bấm nút lưu dữ liệu ở dưới đây
// 1: Thu nhận dữ liệu 
// 2: Kiểm tra hộ lệ
// 3:  Nếu không có lỗi thì ghi vào csdl
$msg = '';
$err = [];
if(isset($_POST['btnSave'])){
    $ten_dv = $_POST['Ten_DV'];
    $gia = $_POST['GIA'];
    $chi_tiet = $_POST['CT'];
  // kiểm tra hợp lệ

  if(empty($ten_dv)){
      $err[] = 'Bạn cần nhập tên dịch vụ';
  }
  if(empty($gia)){
    $err[] = 'Bạn cần nhập giá';
  }
  if(empty($chi_tiet)){
    $err[] = 'Bạn cần nhập chi tiết';
  }
   
    // load file ảnh
    $image_url = null;
    if(isset($_FILES['img'])){
    $file_exe_ollw = ['image/jpeg','image/png'];
    $file_avt = $_FILES['img'];
    $file_type = $file_avt['type'];
 
    if(in_array($file_type,$file_exe_ollw)){
        $file_path = APP_PATH .'/upload/'.$file_avt['name'];
        $image_url = '/upload/' .$file_avt['name'];
        move_uploaded_file($file_avt['tmp_name'],$file_path);
    }else{
        $err[] = 'File của bạn không hợp lệ bạn hãy nhập file khác';
    }
    } 

    if(empty($err)){
        // Người dùng nhập hợp lệ
        // tiếp hành truy vấn update
        $sql = "UPDATE dich_vu SET ten_dv=:post_ten_dv, gia=:post_gia, images=:post_images ,chi_tiet=:post_chi_tiet";
        $sql .= " WHERE id = :get_id";
         echo "<br> Câu lệnh SQL:" , $sql;
            $stmt = $objConn->prepare($sql);
            $stmt->bindParam(":post_ten_dv",$ten_dv);
            $stmt->bindParam(":post_gia",$gia);
            $stmt->bindParam(":post_chi_tiet",$chi_tiet);
            $stmt->bindParam(":post_images",$image_url);
            $stmt->bindParam(":get_id",$_GET['id']);
            $stmt->execute();
            // chuyển trang
            header("Location:?page=dich-vu");
          
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
       display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
   }
   h1{
       text-align: center;
   }
   .right{
       margin-top: 20px;
   }
 </style>
</head>
<body>
<p style = 'color:red'><?php echo $msg ?></p>
<div class = "container">
  <h1>Update dịch vụ</h1>
   <div class="row text-center">
   <form action = "" method = "post" enctype="multipart/form-data">
           <div class="form-group"><br>
           <label for="exampleInputEmail1">Tên dịch vụ</label>
          <input type="text" name = "Ten_DV" value = "<?php echo $row['ten_dv'] ?>" class="form-control" id="exampleInputEmail1" ><br>

          <label for="exampleInputEmail1">Giá</label>
          <input type="text" name = "GIA" value = "<?php echo $row['gia'] ?>" class="form-control" id="exampleInputEmail1" > <br>

           <div>
           <label for="">Images</label>  <br> 
           <img  src="../admin/<?php echo $row['images'] ?>" width="150"> 
         <input type="file" name = "img"  ><br>
           </div>
             </div>       
   <div class="right">
   <div class="card-body pad">
            
              <label for="exampleInputEmail1">Nội dung</label>
                <textarea class="textarea" placeholder="Place some text here" name = "CT"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $row['chi_tiet'] ?></textarea>
            </div>
   </div><!--right-->
   <a href=""><input type= "submit" name="btnSave" class="btn btn-success
                  mt-3 float-right" value="Submit"></a>  
   </form>
   </div>
</div>
</body>
</html>