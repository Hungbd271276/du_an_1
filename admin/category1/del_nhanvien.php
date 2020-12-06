<?php
  if(isset($_GET['id'])){
      $id = intval($_GET['id']);
      if(isset($_POST['btnDelete'])){
          $stmt = $objConn->prepare("DELETE FROM nhan_vien WHERE id_nv=$id");
          $stmt->execute();
          header("Location:?page=nhan_vien");
      }
  }


?>
<form action="" method = "post">
<button name = "btnDelete">Chắc chắn xóa</button>
<button><a href = "?page=nhan_vien">không xóa</a></button>
</form>