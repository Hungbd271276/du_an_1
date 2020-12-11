<?php
 if(isset($_GET['id'])){
    $id = intval($_GET['id']);
        $stmt = $objConn->prepare("DELETE FROM bai_viet WHERE id=$id");
        $stmt->execute();
        header("Location:?page=bai-viet");
 }   
?>