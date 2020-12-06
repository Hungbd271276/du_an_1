<?php
  ob_start();
  //define("APP_PATH",__DIR__);
 //define('BASE_URL','http://localhost/Hungbdph10926_ASM_PHP1');
require_once "teamplate/header.php";
require_once "teamplate/sidebar.php";

  require_once "../database/db.php";
    $page = isset($_GET['page'])?$_GET['page']: "";
    switch($page){
        case '':
        case 'home':
            include_once '../admin/home.php';
            break;
        case 'nhan_vien':
            $action=isset($_GET['action'])?$_GET['action']:'';
            switch($action){
                case '':
                    include_once "../admin/category1/show_nhanvien.php";
                break;
                case 'add':
                    include_once "../admin/category1/add_nhanvien.php";
                break;
                case 'update':
                    include_once "../admin/category1/update_nhanvien.php";
                break;
                case 'del':
                    include_once "../admin/category1/del_nhanvien.php";
                break;
                default:
                #code...
                break;
            }  
        break;
        case 'khach-hang':
            $action=isset($_GET['action'])?$_GET['action']:'';
            switch($action){
                case '':
                    include_once "../admin/category2/show_khachhang.php";
                break;
                case 'add':
                    include_once "../admin/category2/add_khachhang.php";
                break;
                case 'update':
                    include_once "../admin/category2/update_khachhang.php";
                break;
                case 'del':
                    include_once "../admin/category2/del_khachhang.php";
                break;
                default:
                #code...
               break;
            }
        break;
        case 'dich-vu':
            $action=isset($_GET['action'])?$_GET['action']:'';
            switch($action){
                case '':
                    include_once "../admin/category3/show_dichvu.php";
                break;
                case 'add':
                    include_once "../admin/category3/add_dichvu.php";
                break;
                case 'update':
                    include_once "../admin/category3/update_dichvu.php";
                break;
                case 'del':
                    include_once "../admin/category3/del_dichvu.php";
                break;
                default:
                #code...
               break;
            }
        break;
        case 'lich-hen':
            $action=isset($_GET['action'])?$_GET['action']:'';
            switch($action){
                case '':
                    include_once "../admin/category4/show_lichhen.php";
                break;
                case 'add':
                    include_once "../admin/category4/add_lichhen.php";
                break;
                case 'update':
                    include_once "../admin/category4/update_lichhen.php";
                break;
                case 'del':
                    include_once "../admin/category4/del_lichhen.php";
                break;
                default:
                #code...
               break;
            }
        break;
        case 'slide':
            $action=isset($_GET['action'])?$_GET['action']:'';
            switch($action){
                case '':
                    include_once "../admin/category5/show_slide.php";
                break;
                case 'add':
                    include_once "../admin/category5/add_slide.php";
                break;
                case 'update':
                    include_once "../admin/category5/update_slide.php";
                break;
                case 'del':
                    include_once "../admin/category5/del_slide.php";
                break;
                default:
                #code...
               break;
            }
        break;
        case 'bai-viet':
            $action=isset($_GET['action'])?$_GET['action']:'';
            switch($action){
                case '':
                    include_once "../admin/category6/show_baiviet.php";
                break;
                case 'add':
                    include_once "../admin/category6/add_baiviet.php";
                break;
                case 'update':
                    include_once "../admin/category6/update_baiviet.php";
                break;
                case 'del':
                    include_once "../admin/category6/del_baiviet.php";
                break;
                default:
                #code...
               break;
            }
        break;
        case 'introduct':
            $action=isset($_GET['action'])?$_GET['action']:'';
            switch($action){
                case '':
                    include_once "../admin/category7/show_introduct.php";
                break;
                case 'add':
                    include_once "../admin/category7/add_introduct.php";
                break;
                case 'update':
                    include_once "../admin/category7/update_introduct.php";
                break;
                case 'del':
                    include_once "../admin/category7/del_introduct.php";
                break;
                default:
                #code...
               break;
            }
        break;
    }
 //  require_once "teamplate/footer.php";

?>
