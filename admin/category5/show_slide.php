<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <a href="?page=slide&action=add"> 
                            <input type="button" class = "btn btn-success" value = "add categories">
                            </a>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
         <!--card-header-->    
  <?php
    try{
       $stmt = $objConn->prepare("SELECT * FROM slide ORDER BY 	ma_slide DESC");
       $stmt->execute();
       $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $mang = $stmt->fetchAll();
        
       echo "<table class = 'table table-hover table-striped'>
       <tr><th>Mã_slide</th><th>Tên slide</th> <th>Ảnh slide</th><th>Ngày Đăng</th><th>Update</th> <th>Delete</th></tr>";
          
       foreach($mang as $row){
           $link_avt = '../admin/'.$row['anh_slide'];
           $link_update = "?page=slide&action=update&id=".$row['ma_slide'];
           $link_del = "?page=slide&action=del&id=".$row['ma_slide'];
           echo "<tr> <td>{$row['ma_slide']}</td> <td>{$row['ten_slide']}</td> <td><img src = '$link_avt' width='200px' /></td> <td>{$row['ngay_dang']}</td>
           <td><a href = '$link_update' class = 'btn btn-success'>Update</a></td> 
           <td><a href = '$link_del' class = 'btn btn-danger'>Delete</a></td></tr>";
       }
       echo "</table>"; 
    }catch(PDOException $e){
        echo 'Lỗi truy vấn cơ sở dữ liệu'.$e->getMessage();
    }
  ?>
  </div>
         </div>
            </div>
               </div>
                   </div>
                        </div>    