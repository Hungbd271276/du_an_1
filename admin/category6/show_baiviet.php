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
   <?php
      try{
        $stmt = $objConn->prepare("SELECT * FROM bai_viet ORDER BY stt DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $mang = $stmt->fetchAll();

        echo "<table class = 'table table-hover table-striped'>
        <tr><th>STT</th><th>Tên </th><th>Ảnh</th><th>Chi tiết</th> <th>Update</th> <th>Delete</th></tr>";
        
         foreach($mang as $row){
            $link_avt = '../admin/'.$row['images'];
            $link_update = "?page=bai-viet&action=update&id=".$row['stt'];
            $link_del = "?page=bai-viet&action=del&id=".$row['stt']; 
            echo "<tr> <td>{$row['stt']}</td> <td>{$row['ten_bai_viet']}</td>  <td><img src = '$link_avt' width='70px'/></> <td>{$row['chi_tiet']}</td>
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