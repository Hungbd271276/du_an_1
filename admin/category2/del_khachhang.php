<?php
  if(isset($_GET['id'])){
      $id = intval($_GET['id']);
      if(isset($_POST['btnDelete'])){
          $stmt = $objConn->prepare("DELETE FROM khach_hang WHERE id_kh  =$id");
          $stmt->execute();
          header("Location:?page=khach-hang");
      }
  }


?>
<form action="" method = "post">
<button name = "btnDelete">Chắc chắn xóa</button>
<button><a href = "?page=khach-hang">không xóa</a></button>
</form>


