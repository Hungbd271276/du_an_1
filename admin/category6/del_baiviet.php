<?php
 if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    if(isset($_POST['btnDelete'])){
        $stmt = $objConn->prepare("DELETE FROM bai_viet WHERE id=$id");
        $stmt->execute();
        header("Location:?page=bai-viet");
    }
 }   
    


?>
<form action="" method = "post">
  <button name = "btnDelete">Chắc chắn xóa</button>
  <button><a href="?page=bai-viet">Không xóa</a></button>
</form>