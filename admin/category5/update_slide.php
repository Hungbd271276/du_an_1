<?php
  $stmt = $objConn->prepare("SELECT * FROM slide WHERE 	id =:get_id");
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
    $ten_slide = $_POST['ten_slide'];
    $ngay_dang = $_POST['ngay_dang'];
  // kiểm tra hợp lệ

  if(empty($ten_slide)){
      $err[] = 'Bạn cần nhập tên slide';
  }
  if(empty($ngay_dang)){
    $err[] = 'Bạn cần nhập ngày đăng';
  }
     
      // load file ảnh
      $image_url = null;
      if(isset($_FILES['img_slide'])){
      $file_exe_ollw = ['image/jpeg','image/png'];
      $file_avt = $_FILES['img_slide'];
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
          $sql = "UPDATE slide SET ten_slide=:post_ten_slide, ngay_dang=:post_ngay_dang, anh_slide=:post_anh_slide ";
          $sql .= " WHERE id = :get_id";
           echo "<br> Câu lệnh SQL:" , $sql;
              $stmt = $objConn->prepare($sql);
              $stmt->bindParam(":post_ten_slide",$ten_slide);
              $stmt->bindParam(":post_ngay_dang",$ngay_dang);
              $stmt->bindParam(":post_anh_slide",$image_url);
              $stmt->bindParam(":get_id",$_GET['id']);
              $stmt->execute();
              // chuyển trang
              header("Location:?page=slide");
            
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
  <h1>Edit Slide</h1>
   <div class="row text-center">
   <div class="col-xl-6">
   <form action = "" method = "POST" enctype="multipart/form-data">
           <div class="form-group"><br>
           <label for="exampleInputEmail1">Tên slide</label>
          <input type="text" name = "ten_slide" value = "<?php echo $row['ten_slide'] ?>" class="form-control" id="exampleInputEmail1" ><br>

          <div>
          <label for="">Ảnh slide</label>   <br>   
           <img  src="../admin/<?php echo $row['anh_slide'] ?>" width="150"> 
          <input type="file" name = "img_slide"> <br>
          </div>

          <label for="exampleInputEmail1">Ngày Đăng</label>
         <input type="text" name = "ngay_dang" value = "<?php echo $row['ngay_dang'] ?>"  class="form-control" id="exampleInputEmail1" ><br>

             </div>    
         <a href=""><input type= "submit" name="btnSave" class="btn btn-success
                  mt-3 float-right" value="Submit"></a>     
   </div>
   </form>
   </div><!--col-xl-6-->
</div>
</body>
</html>