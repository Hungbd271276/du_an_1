<style>
    .text{
        text-align:justify;
        font-size: large;
        line-height: 2em;
    }
    .font-bold{
        font-weight: bold;
    }
</style>
<main>
        <div class="container">
           <?php
             $stmt = $objConn->prepare("SELECT * FROM gioi_thieu");
             $stmt->execute();
             $stmt->setFetchMode(PDO::FETCH_ASSOC);
             $mang = $stmt->fetchAll();
             foreach($mang as $rows){
           ?>
            <h3 class="font-bold"><?php echo $rows['tieu_de'] ?></h3>
            <div class="brows"style = "padding-top:20px"> <img src="admin/<?php echo $rows['images']?>" width = "1110px"  alt=""></div>
            <p class="text">
             <?php echo $rows['content'] ?>
            </p>
           <?php
             }
           ?> 
        </div>

    </main>