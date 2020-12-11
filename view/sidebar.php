 <div class="slide">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      
      <div class="carousel-inner">
      <?php
        $stmt = $objConn->prepare("SELECT * FROM slide ORDER BY id ASC");
        $stmt->execute();
         // thiết lập chế độ lấy dữ liệu dạng assoc
        // để mảng dữ liệu trả về có key là tên cột trong bảng
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $mang = $stmt->fetchAll();
      
       foreach($mang as $key=> $row){
      ?>
        <div class="carousel-item <?php if($key==0) echo "active" ?>">
          <img src="admin/<?php echo $row['anh_slide'];?>" class="d-block w-100" alt="anh1"
            height="400px">
        </div>
       <?php }
       ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!--end-container-fluid-->
  </div>
   
   <div class="main">
   <div class="buttom">
    <div class="buttom p-3 my-3 bg-dark text-white">
      <h1 class="h1"><a href="index.php?abc=dat-lich">Đặt lịch dữ chỗ</a></h1>
    </div>
  </div>
  <!--end-buttom-->
  </div>
  <h1 class="font-bold">Service Barber House</h1>
  <div class="big container">
      <div class="row" style="margin-top: 20px;">
      <?php
       $stmt = $objConn->prepare("SELECT * FROM dich_vu ORDER BY id DESC");
       $stmt->execute();
       $stmt->setFetchMode(PDO::FETCH_ASSOC);
       $result = $stmt->fetchAll();
       foreach($result as $row){
        ?> 
         <div class="col-xl-4">
          <h5 class="service"><?php echo $row['ten_dv']?>.................................<?php echo $row['gia'] ?></h5>
          <p class="pb-4"><?php echo $row['chi_tiet']?></p>
          <a href="?abc=dat-lich"><input type="submit" class="btn btn-primary" value="Cắt ngay"></a>
        </div>
      <?php  
       }
       ?>
      </div>
    </div>  
    <h1 class="font-bold">Mẫu tóc Barber</h1>
    <section class="variable slider">
      <?php  
      $stmt = $objConn->prepare("SELECT * FROM bai_viet ORDER BY id DESC");
      $stmt->execute();
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $mang = $stmt->fetchAll();
       foreach($mang as $rows){
      ?>
        <div><img src="admin/<?php echo $rows['images']?>" width="230px" height="230px"  alt=""></div>
      <?php
       }
      ?> 
  </section>
  <h1 class="font-bold ">Qúy ông nói gì?</h1>
  <section class="slider-area slider">
    <div>
      <p style="font-size: 25px;">Nhân viên nhiệt tình thật sự luôn ý, chỗ để xe cũng thoải mái. Đi cắt tóc lại còn được miễn phí
    coffe, lại còn có quà mang về nữa</p><p>-Mr:Long</p>
    </div>
    <div>
      <p style="font-size: 25px;">Tay nghề rất tốt, Form đầu mình khá là khó cắt, nhưng bạn đã cho mình một kiểu tóc rất ưng ý:)))</p>
      <p>-Mr:Hùng</p>
    </div>
  </section>
   </div><!--main-->
 