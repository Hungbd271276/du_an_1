<?php
  if(isset($_GET['id'])){
      $id = intval($_GET['id']);
          $stmt = $objConn->prepare("DELETE FROM khach_hang WHERE id_kh  =$id");
          $stmt->execute();
          header("Location:?page=khach-hang");
  }


?>



