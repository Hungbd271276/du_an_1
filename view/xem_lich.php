<div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header"> </div>
                            <div class="content table-responsive table-full-width">
         <!--card-header-->   
  <div class = "card-body">
  <table class = "table table-hover table-striped">
  <h1>Danh sách lịch hẹn</h1>
          <tr>
            <th>STT</th>
            <th>Nhân viên</th>
            <th>Tên khách hàng</th>
            <th>SĐT khách hàng</th>
            <th>Giờ hẹn</th>
            <th>Ngày hẹn</th>
            <th>Dịch vụ</th>
            <th>Trạng thái</th>
          </tr>
        
         <tbody>
        <?php
        $stmt = $objConn->prepare("SELECT * FROM lich_hen ORDER BY id DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $mang = $stmt->fetchAll();   
          foreach($mang as $rows){
        ?>
           <tr>
             <td><?php echo $rows['id'] ?></td>
             <td><?php echo $rows['nhan_vien'] ?></td>
             <td><?php echo $rows['ten_kh'] ?></td>
             <td><?php echo $rows['sdt_kh'] ?></td>
             <td><?php echo $rows['ngay_hen'] ?></td>
             <td><?php echo $rows['gio_hen'] ?></td>
             <td><?php echo $rows['dich_vu'] ?></td>
             <td><?php if($rows['statuss'] == 1){ ?>
                  <span class = "btn btn-danger">Chưa xử lý</span>
              <?php
               }elseif($rows['statuss'] == 2){?>
                 <span class = "btn btn-warning">Đang xử lý</span>
               <?php 
               }elseif($rows['statuss'] == 3){?>
                  <span class = "btn btn-success">Đã hoàn tất</span>
               <?php
               }
               ?>
             </td>
        <?php
          }
        ?>
         </tbody>
      </table>
   </div><!--end--card-body-->
</div>
   </div>
      </div>
         </div>
         </div>
            </div>   