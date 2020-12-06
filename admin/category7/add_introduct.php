<?php
 $msg = '';
 $err = [];
 if(isset($_POST['btnSave'])){
     $ten_bv = $_POST['Ten_bv'];
     $chi_tiet = $_POST['ct'];
     // kiểm tra hợp lệ
     if(empty($ten_bv)){
         $err[] = 'Bạn chưa nhập tên bài viết';
     }
    if(empty($chi_tiet)){
        $err[] = 'Bạn chưa nhập chi tiết';
    }
       // load file ảnh
    $image_url = null;
    if(isset($_FILES['image'])){
    $file_exe_ollw = ['image/jpeg','image/png'];
    $file_avt = $_FILES['image'];
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
         $stmt = $objConn->prepare("INSERT INTO gioi_thieu(tieu_de,images,content)
         VALUES(:tieu_de,:images,:content)");
         $stmt->bindParam(":tieu_de",$ten_bv);
         $stmt->bindParam(":images",$image_url);
         $stmt->bindParam(":content",$chi_tiet);
         $stmt->execute();

         header("Location:?page=introduct");
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
  <h1>Thêm bài viết</h1>
   <div class="row text-center">
   <form action = "" method = "post" enctype="multipart/form-data">
           <div class="form-group"><br>
           <label for="exampleInputEmail1">Tiêu đề</label>
          <input type="text" name = "Ten_bv" class="form-control" id="exampleInputEmail1" ><br>

          <label for="exampleInputEmail1">Images</label>
         <input type="file" name = "image" class="form-control" id="exampleInputEmail1" ><br>

             </div>       
   <div class="right">
   <div class="card-body pad">
            
              <label for="exampleInputEmail1">Chi tiết</label>
                <textarea class="textarea" placeholder="Place some text here" name = "ct"
                          style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
   </div><!--right-->
   <a href=""><input type= "submit" name="btnSave" class="btn btn-success
                  mt-3 float-right" value="Submit"></a>  
   </form>
   </div>
</div>
</body>
</html>