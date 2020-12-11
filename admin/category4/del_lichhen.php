<?php
  if(isset($_GET['id'])){
      $id = intval($_GET['id']);
          $stmt=$objConn->prepare("DELETE FROM lich_hen WHERE id = $id");
          $stmt->execute();
          header("Location:?page=lich-hen");
  }


?>
