<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <a href="?page=introduct&action=add"> 
                            <input type="button" class = "btn btn-success" value = "add categories">
                            </a>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
         <!--card-header-->    
   <?php
      try{
        $stmt = $objConn->prepare("SELECT * FROM gioi_thieu ORDER BY id_bv DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $mang = $stmt->fetchAll();

        echo "<table class = 'table table-hover table-striped'>
        <tr><th>ID</th><th>Tên </th><th>Ảnh</th><th>Chi tiết</th> <th>Update</th> <th>Delete</th></tr>";
        
         foreach($mang as $row){
            $link_avt = '../admin/'.$row['images'];
            $link_update = "?page=introduct&action=update&id=".$row['id_bv'];
            $link_del = "?page=introduct&action=del&id=".$row['id_bv']; 
            echo "<tr> <td>{$row['id_bv']}</td> <td>{$row['tieu_de']}</td>  <td><img src = '$link_avt' width='150px'/></> <td>{$row['content']}</td>
            <td><a href = '$link_update' class = 'btn btn-success'>Update</a></td> <td><a href = '$link_del' class = 'btn btn-danger'>Delete</a></td> </tr>";
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