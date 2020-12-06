<?php
try{
    $stmt = $objConn->prepare("SELECT * FROM bai_viet WHERE stt =:get_stt");
    $stmt->bindParam(":get_stt",$_GET['id']);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    
    $row = $stmt->fetch();
    if(empty($row)){
        echo "Không tồn tại user có ID = ".$_GET['id'];
        return;
    }
    
    // xuống đến đây thì có dữ liệu, không làm gì mà xuống gắn vào form
    }catch(PDOException $e){
       echo "Lỗi không lấy được dữ liệu: " . $e->getMessage();
    } 
    
    //-------Tiến hành xử lý sự kiện bấm nút lưu dữ liệu ở dưới đây
    // 1: Thu nhận dữ liệu 
    // 2: Kiểm tra hộ lệ
    // 3:  Nếu không có lỗi thì ghi vào csdl
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
            // Người dùng nhập hợp lệ
            // tiếp hành truy vấn update
            $sql = "UPDATE bai_viet SET ten_bai_viet=:post_ten_bai_viet, images=:post_images, chi_tiet=:post_chi_tiet";
            $sql .= " WHERE stt = :get_stt";
             echo "<br> Câu lệnh SQL:" , $sql;
                $stmt = $objConn->prepare($sql);
                $stmt->bindParam(":post_ten_bai_viet",$ten_bv);
                $stmt->bindParam(":post_images",$image_url);
                $stmt->bindParam(":post_chi_tiet",$chi_tiet);
                $stmt->bindParam(":get_stt",$_GET['id']);
                $stmt->execute();
                // chuyển trang
                header("Location:?page=bai-viet");
              
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
  <h1>Edit bài viết</h1>
   <div class="row text-center">
   <form action = "" method = "post" enctype="multipart/form-data">
           <div class="form-group"><br>
           <label for="exampleInputEmail1">Tên bài viết</label>
          <input type="text" name = "Ten_bv" value = "<?php echo $row['ten_bai_viet'] ?>" class="form-control" id="exampleInputEmail1" ><br>

          <div>
          <label for="">Images</label>  <br> 
           <img  src="../admin/<?php echo $row['images'] ?>" width="150"> 
         <input type="file" name = "image"><br>
          </div>

             </div>       
   <div class="right">
   <div class="card-body pad">
            
              <label for="exampleInputEmail1">Chi tiết</label>
                <textarea class="textarea" placeholder="Place some text here" name = "ct" 
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