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
    <div class = "card-body">
    <table class = "table table-hover table-striped">
         <tr>
            <th>ID_khach-hang</th>
            <th>Tên_kh</th>
            <th>SĐT</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
         <tbody>
                <?php
                  $stmt = $objConn->prepare("SELECT * FROM khach_hang ORDER BY id_kh DESC");
                  // thực thi câu lệnh
                  $stmt->execute();
                  // thiết lập chế ddojj assoc
                  // thiết lập chế độ này sẽ trả về dạng mảng sẽ có tên cột trong bảng dữ liệu trỏ tới dữ liệu
                  $stmt->setFetchMode(PDO::FETCH_ASSOC);
                  $mang = $stmt->fetchAll();
                   foreach($mang as $rows){
                ?>
    <tr>
        <td><?php echo $rows['id_kh'] ?></td>
        <td><?php echo $rows['ten_khach_hang'] ?></td>
        <td><?php echo $rows['SDT'] ?></td>
        <td><a href = "?page=khach-hang&action=update&id=<?php echo $rows['id_kh'] ?>"
        class = 'btn btn-success'>Edit</a></td> 
        <td><a href = "?page=khach-hang&action=del&id=<?php echo $rows['id_kh'] 
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