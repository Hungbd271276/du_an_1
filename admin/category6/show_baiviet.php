<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <a href="?page=bai-viet&action=add"> 
                            <input type="button" class = "btn btn-success" value = "add categories">
                            </a>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
         <!--card-header-->    
   <div class = "card-body">
      <table class = "table table-hover table-striped">
      <tr>
         <th>STT</th>
         <th>Tên</th>
         <th>Ảnh</th>
         <th>Chi tiết</th>
         <th>Update</th>
         <th>Delete</th>
       </tr>
       <tbody>
          <?php
             $stmt = $objConn->prepare("SELECT * FROM bai_viet ORDER BY id DESC");
             $stmt->execute();
             $stmt->setFetchMode(PDO::FETCH_ASSOC);
             $mang = $stmt->fetchAll();
             foreach($mang as $rows){
          ?>
    <tr>
        <td><?php echo $rows['id'] ?></td>
        <td><?php echo $rows['ten_bai_viet'] ?></td>
        <td><img src = "<?php echo '../admin/'.$rows['images'];?>" width='100px' /></td>
        <td><?php echo $rows['chi_tiet'] ?></td>
        <td><a href = "?page=bai-viet&action=update&id=<?php echo $rows['id'] ?>"
        class = 'btn btn-success'>Edit</a></td> 
        <td><a href = "?page=bai-viet&action=del&id=<?php echo $rows['id'] 
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