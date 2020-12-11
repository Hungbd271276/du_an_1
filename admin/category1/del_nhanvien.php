<?php
  if(isset($_GET['id'])){
      $id = intval($_GET['id']);
          $stmt = $objConn->prepare("DELETE FROM nhan_vien WHERE id_nv=$id");
          $stmt->execute();
          header("Location:?page=nhan_vien");
  }
?>
