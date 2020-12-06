<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                            <a href="?page=lich-hen&action=add"> 
                            <input type="button" class = "btn btn-success" value = "add categories">
                            </a>
                        
                            </div>
                            <div class="content table-responsive table-full-width">
         <!--card-header-->   
<?php
 try{
    $stmt = $objConn->prepare("SELECT * FROM lich_hen ORDER BY stt DESC");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $mang = $stmt->fetchAll();

    echo "<table class = 'table table-hover table-striped'>
    <tr><th>STT</th><th>Nhân viên</th><th>Tên khách hàng</th><th>SĐT khách hàng</th> <th>Giờ hẹn</th> <th>Ngày hẹn</th> <th>Dịch vụ</th><th>Delete</th></tr>";
     
    foreach($mang as $rows){
    //    $link_update = '?page=lich-hen&action=update&id='.$rows['stt']; ngay_hen
        $link_del = '?page=lich-hen&action=del&id='.$rows['stt'];
        echo "<tr> <td>{$rows['stt']}</td> <td>{$rows['nhan_vien']}</td> <td>{$rows['ten_kh']}</td> <td>{$rows['sdt_kh']}</td> <td>{$rows['ngay_hen']}</td> <td>{$rows['gio_hen']}</td> <th>{$rows['dich_vu']}</th>
        <td><a href = '$link_del' class = 'btn btn-danger'>Delete</a></td></tr>";
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