<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <a href="?page=khach-hang&action=add"> 
                            <input type="button" class = "btn btn-success" value = "add categories">
                            </a>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
         <!--card-header-->      
     <?php
     try{
         $stmt = $objConn->prepare("SELECT * FROM khach_hang ORDER BY id DESC");
        // thực thi câu lệnh
        $stmt->execute();
        // thiết lập chế ddojj assoc
        // thiết lập chế độ này sẽ trả về dạng mảng sẽ có tên cột trong bảng dữ liệu trỏ tới dữ liệu
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $mang = $stmt->fetchAll();

        echo "<table class = 'table table-hover table-striped'>
        <tr><th>ID_khach-hang</th><th>Tên_kh</th><th>SĐT</th><th>Update</th><th>Delete</th></tr>";

        foreach($mang as $rows){
            $link_update = '?page=khach-hang&action=update&id='.$rows['id'];
            $link_del = '?page=khach-hang&action=del&id='.$rows['id'];
            echo "<tr> <td>{$rows['id']}</td> <td>{$rows['ten_khach_hang']}</td> <td>{$rows['SDT']}</td> 
            <td><a href = '$link_update' class = 'btn btn-success'>Update</a></td> <td><a href = '$link_del' class = 'btn btn-danger'>Delete</a></td></tr>";
        }
           
        echo '</table>';
     }catch(PDOEXception $e){
        echo 'Lỗi truy vấn cơ sở dữ liệu'.$e->getMessage();
     }
     


     ?>



 </div>
     </div>
      </div>
         </div>
         </div>
            </div>    