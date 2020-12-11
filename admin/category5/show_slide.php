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
       <div class = "card-body">
         <table class = "table table-hover table-striped">
         <tr>
            <th>Mã_slide</th>
            <th>Tên slide</th>
            <th>Ảnh slide</th>
            <th>Ngày Đăng</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
          <tbody>
            <?php
               $stmt = $objConn->prepare("SELECT * FROM slide ORDER BY id DESC");
               $stmt->execute();
               $stmt->setFetchMode(PDO::FETCH_ASSOC);
               $mang = $stmt->fetchAll();
               foreach($mang as $rows){
            ?>
    <tr>
        <td><?php echo $rows['id'] ?></td>
        <td><?php echo $rows['ten_slide'] ?></td>
        <td><img src = "<?php echo '../admin/'.$rows['anh_slide'] ;?>" width='200px'/></td>
        <td><?php echo $rows['ngay_dang'] ?></td>
        <td><a href = "?page=slide&action=update&id=<?php echo $rows['id'] ?>"
        class = 'btn btn-success'>Edit</a></td> 
        <td><a href = "?page=slide&action=del&id=<?php echo $rows['id'] 
             ?>"onClick = "return confirm('Bạn có thực sự muốn xóa không')"
             class="btn btn-info">Delete</a></td>
    </tr>
            <?php
               }
            ?>   
          </tbody>
         </table>
       </div>
  </div>
    </div>
      </div>
        </div>
          </div>
            </div>    