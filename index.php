<?php
  ob_start();
  require_once "database/db.php";


  require_once "view/header.php";
  if(isset($_GET['abc'])){
    $abc = $_GET['abc'];
    switch($abc){
      case 'logout':
      include_once 'logout.php';
    break;
      case 'dat-lich':
      include_once 'view/dat_lich.php';
      break;
      case 'toc_dep':
        include_once 'view/toc_dep.php';
      break;
      case 'dich-vu':
        include_once 'view/dich_vu.php';
      break;
      case 'introduct':
        include_once 'view/introduct.php';
      break;
      case 'xem-lich':
        include_once 'view/xem_lich.php';
      break;
    }
  }else{
    require_once "view/sidebar.php";
  }
  require_once "view/footer.php";
?>