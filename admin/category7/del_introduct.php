<?php
 if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    if(isset($_POST['btnDelete'])){
        $stmt = $objConn->prepare("DELETE FROM  gioi_thieu WHERE id=$id");
        $stmt->execute();
        header("Location:?page=introduct");
    }
 }   
    


?>
<form action="" method = "post">
  <button name = "btnDelete">Chắc chắn xóa</button>
  <button><a href="?page=introduct">Không xóa</a></button>
</form>