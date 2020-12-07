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
<?php
try{
  $stmt = $objConn->prepare("SELECT * FROM dich_vu ORDER BY id DESC");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $mang = $stmt->fetchAll();
  
  echo "<table class = 'table table-hover table-striped'>
  <tr> <th>Ma_DV</th> <th>Ten_DV</th> <th>Gia</th>  <th>images</th> <th>chi_tiet</th> <th>Update</th> <th>Delete</th></tr>";

  foreach($mang as $row){
    $link_avt = '../admin/'.$row['images'];
    $link_update = '?page=dich-vu&action=update&id='.$row['id'];
    $link_del = '?page=dich-vu&action=del&id='.$row['id'];
    echo "<tr> <td>{$row['id']}</td> <td>{$row['ten_dv']}</td> <td>{$row['gia']}</td> <td><img src = '$link_avt' width='100px'/></td> <td>{$row['chi_tiet']}</td> 
    <td><a href = '$link_update' class = 'btn btn-success'>Update</a></td> <td><a href = '$link_del' class = 'btn btn-danger'>Delete</a></td>  </tr>";

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