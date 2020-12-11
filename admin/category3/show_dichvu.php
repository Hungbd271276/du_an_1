<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <a href="?page=dich-vu&action=add"> 
                            <input type="button" class = "btn btn-success" value = "add categories">
                            </a>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
         <!--card-header-->    
  <div class="card-body">
    <table class = "table table-hover table-striped">
       <tr>
         <th>Ma_DV</th>
         <th>Ten_DV</th>
         <th>Gia</th>
         <th>images</th>
         <th>chi_tiet</th>
         <th>Update</th>
         <th>Delete</th>
       </tr>
       <tbody>
         <?php
              $stmt = $objConn->prepare("SELECT * FROM dich_vu ORDER BY id DESC");
              $stmt->execute();
              $stmt->setFetchMode(PDO::FETCH_ASSOC);
              $mang = $stmt->fetchAll(); 
              foreach($mang as $rows){
         ?>
      <tr>
        <td><?php echo $rows['id'] ?></td>
        <td><?php echo $rows['ten_dv'] ?></td>
        <td><?php echo $rows['gia'] ?></td>
        <td><img src = "<?php echo '../admin/'.$rows['images'];?>" width='100px' /></td>
        <td><?php echo $rows['chi_tiet'] ?></td>
        <td><a href = "?page=dich-vu&action=update&id=<?php echo $rows['id'] ?>"
        class = 'btn btn-success'>Edit</a></td> 
        <td><a href = "?page=dich-vu&action=del&id=<?php echo $rows['id'] 
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