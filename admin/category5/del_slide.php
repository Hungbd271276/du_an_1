<?php
   if(isset($_GET['id'])){
       $id = intval($_GET['id']);
       if(isset($_POST['btndelete'])){
           $stmt = $objConn->prepare("DELETE FROM  slide WHERE 	ma_slide =$id");
           $stmt->execute();
           header("Location:?page=slide");
       }
   }

?>
<form action="" method = "post">
<button name = 'btndelete'>Chắc chắn xóa</button>
<button><a href="?page=slide">Không xóa</a></button>
</form>