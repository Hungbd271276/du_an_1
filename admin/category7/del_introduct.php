<?php
 if(isset($_GET['id'])){
    $id = intval($_GET['id']);
        $stmt = $objConn->prepare("DELETE FROM  gioi_thieu WHERE id=$id");
        $stmt->execute();
        header("Location:?page=introduct");
 }   
?>
