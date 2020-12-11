<?php
  if(isset($_GET['id'])){
     $id = intval($_GET['id']);
         $stmt = $objConn->prepare("DELETE FROM dich_vu WHERE id=$id");
         $stmt->execute();
         header("Location:?page=dich-vu");
  }

?>