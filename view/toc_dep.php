<style>
.media{
    grid-gap:20px;
    border-bottom: 1px solid #999999;
}
h1{
    text-align:center;
    padding-top:50px;
}
</style>
<main> 
     <h1>Các Kiểu Tóc HOT Nhất Năm 2020</h1>
        <?php
         $stmt = $objConn->prepare("SELECT * FROM bai_viet ORDER BY id ASC");
         $stmt->execute();
         $stmt->setFetchMode(PDO::FETCH_ASSOC);
         $mang = $stmt->fetchAll();
         foreach($mang as $row){
        ?>
         <div class="media container mx-auto p-5 ">
            <img  src="admin/<?php echo $row['images'] ?>" width = '250px' height = "250px" alt="...">
            <div class="media-body">
              <h5 class="mt-0 "><?php echo $row['ten_bai_viet'] ?></h5>
             <p style = "text-align:justify"><?php echo $row['chi_tiet'] ?><p>
            </div>
            </div>
        <?php
         }
        ?>
    </main>