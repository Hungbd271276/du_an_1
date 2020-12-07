<style>
 .service{
     font-size: 18px;
 }
 img{
     padding-top:10px;
 }
 .pb-4{
     padding-top:15px;
 }
 .col-xl-4{
     margin-top:15px;
 }
</style>    
<h1 class="font-bold">Bảng giá dịch vụ Barber Store</h1>
  <div class="big container ">
      <div class="row" style="margin-top: 20px;">
       <?php
        $stmt = $objConn->prepare("SELECT * FROM dich_vu ORDER BY id DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $result = $stmt->fetchAll();
        foreach($result as $rows){
       ?>
            <div class="col-xl-4">
          <h4 class="service"><?php echo $rows['ten_dv']?>..................<?php echo $rows['gia'] ?></h4>
          <img src="admin/<?php echo $rows['images'] ?>" width = "340px" height = "200px" alt="">
          <p class="pb-4" style = "padding-top:10px"><?php echo $rows['chi_tiet'] ?></p>
          <a href="?abc=dat-lich"><input type="submit" class="btn btn-primary" value="Cắt ngay"></a>
        </div>
       <?php
        }
       ?>

      </div>
    </div>  
  </div><!--end-container mx-auto--->