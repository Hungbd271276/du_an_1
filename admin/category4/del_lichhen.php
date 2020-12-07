<?php
  if(isset($_GET['id'])){
      $id = intval($_GET['id']);
      if(isset($_POST['btndelete'])){
          $stmt=$objConn->prepare("DELETE FROM lich_hen WHERE id = $id");
          $stmt->execute();
          header("Location:?page=lich-hen");
      }
  }


?>
<form action="" method = "post">
<button name = "btndelete">Chắc chắn xóa</button>
<button><a href="?page=lich-hen">Không xóa</a></button>
</form>