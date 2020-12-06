<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <a href="?page=nhan_vien&action=add"> 
                            <input type="button" class = "btn btn-success" value = "add categories">
                            </a>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
         <!--card-header-->          
         <?php
    
   /* if(isset($_SESSION['err'])){
    echo "<p style = 'color:red'>".$_SESSION['err']."</p>";
    unset($_SESSION['err']);
    } */
    try{
    // tạo biến cấu trúc câu lệnh
    $stmt = $objConn->prepare("SELECT * FROM nhan_vien ORDER BY id_nv  ASC");
    // thực thi câu lệnh
    $stmt->execute();
    // thiết lập chế độ lấy dữ liệu dạng assoc
    // thiết lậ chế độ này sẽ trả về dạng mảng sẽ có tên cột trong bảng dữ liệu trỏ tới dữ liệu
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $mang = $stmt->fetchAll();
  //  echo '<pre>';
   //  print_r($mang);
   echo "<table class = 'table table-hover table-striped'>
   <tr> <th>ID_NV</th> <th>Username</th> <th>Tên nhân viên</th> <th>SĐT</th> <th>Email</th> <th>Update</th> <th>Delete</th></tr>";
   
   foreach($mang as $row){
       $link_delete = '?page=nhan_vien&action=del&id='.$row['id_nv'];
        echo "<tr> <td>{$row['id_nv']}</td> <td>{$row['username']}</td> <td>{$row['ten_nv']}</td><td>{$row['SDT']}</td> <td>{$row['email']}</td> 
        <td><a ' href = '?page=nhan_vien&action=update&id={$row['id_nv']} ' class = 'btn btn-success' >Update</a></td><td><a href = '$link_delete' class = 'btn btn-danger'>Delete</a></td></tr>";
    }
  

    echo '</table>'; 
   }catch(PDOException $e){
    echo "<br> Lỗi truy vấn CSDL: " . $e->getMessage();
   } 
   ?>


</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>    
