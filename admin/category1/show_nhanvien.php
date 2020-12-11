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
    <div class = "card-body">
       <table class = "table table-hover table-striped">
         <tr>
            <th>ID_NV</th>
            <th>Username</th>
            <th>Tên nhân viên</th>
            <th>SĐT</th>
            <th>Email</th>
            <th>Update</th>
            <th>Delete</th>
          </tr>
          <tbody>
         <?php 
          // tạo biến cấu trúc câu lệnh
    $stmt = $objConn->prepare("SELECT * FROM nhan_vien ORDER BY id_nv  ASC");
    // thực thi câu lệnh
    $stmt->execute();
    // thiết lập chế độ lấy dữ liệu dạng assoc
    // thiết lậ chế độ này sẽ trả về dạng mảng sẽ có tên cột trong bảng dữ liệu trỏ tới dữ liệu
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $mang = $stmt->fetchAll();
     foreach($mang as $rows){
    ?>
    <tr>
        <td><?php echo $rows['id_nv'] ?></td>
        <td><?php echo $rows['username'] ?></td>
        <td><?php echo $rows['ten_nv'] ?></td>
        <td><?php echo $rows['SDT'] ?></td>
        <td><?php echo $rows['email'] ?></td>
        <td><a href = "?page=nhan_vien&action=update&id=<?php echo $rows['id_nv'] ?>"
        class = 'btn btn-success'>Edit</a></td> 
        <td><a href = "?page=nhan_vien&action=del&id=<?php echo $rows['id_nv'] 
             ?>"onClick = "return confirm('Bạn có thực sự muốn xóa không')"
             class="btn btn-info">Delete</a></td>
    </tr>
    <?php 
     }
    ?>
      </tbody>
    </table>
    </div><!--card-body---->
</div>
    </div>
        </div>
            </div>
               </div>
              </div>    
