<?php
  if(isset($_GET['id'])){
     $id = intval($_GET['id']);
     if(isset($_POST['btndelete'])){
         $stmt = $objConn->prepare("DELETE FROM dich_vu WHERE ma_dv=$id");
         $stmt->execute();
         header("Location:?page=dich-vu");
     }
  }

?>
<form action="" method = "post">
<button name = "btndelete">Chắc chắn xóa</button>
<button><a href="?page=dich-vu">Không xóa</a></button>
</form>