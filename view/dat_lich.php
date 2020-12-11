<?php
  $stmt = $objConn->prepare("SELECT * FROM dich_vu ORDER BY id DESC");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $mang = $stmt->fetchAll();

  $stmt = $objConn->prepare("SELECT * FROM nhan_vien ORDER BY id_nv  ASC");
  $stmt->execute();
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $result = $stmt->fetchAll();
 
    $msg = '';
    $err = [];
    if(isset($_POST['btnSave'])){
      $hoten = $_POST['ho_ten'];
      $sdt = $_POST['sdt'];
      $ngaycat = $_POST['ngay_cat'];
      $giocat = $_POST['gio_cat'];
      $dich_vu = $_POST['dich_vu'];
      $style_list = $_POST['style_list'];
        // kiểm tra hợp lệ
       if(empty($hoten)){
          $err[] = 'Bạn cần chọn họ tên';
        }
        if(empty($sdt)){
          $err[] = 'Bạn cần chọn Số Điện Thoại';
        }
        if(empty($ngaycat)){
          $err[] = 'Bạn cần chọn Ngày Cắt';
        }
        if(empty($giocat)){
          $err[] = 'Bạn cần chọn Giờ Cắt';
        }
        if(empty($dich_vu)){
          $err[] = 'Bạn cần chọn dịch vụ';
        }
        if(empty($style_list)){
          $err[] = 'Bạn cần chọn style-list';
        }
        if(empty($err)){
          $stmt = $objConn->prepare("INSERT INTO lich_hen(nhan_vien,ten_kh,sdt_kh,gio_hen, ngay_hen,dich_vu)
          VALUES(:nhan_vien,:ten_kh,:sdt_kh,:gio_hen ,:ngay_hen,:dich_vu)");
            $stmt->bindParam(":nhan_vien",$style_list);
             $stmt->bindParam(":ten_kh",$hoten);
             $stmt->bindParam(":sdt_kh",$sdt);
             $stmt->bindParam(":gio_hen",$ngaycat);
             $stmt->bindParam(":ngay_hen",$giocat);
             $stmt->bindParam(":dich_vu",$dich_vu);
             $stmt->execute();

             $msg = 'Đã đặt lịch thành công';
        }else{
          // có lỗi
          $msg = implode("<br>",$err);
      }
    } 
  ?>
<style>
body{
  background-image: url(view/img/backgound1.jpg);
}
  .alert {
    background-color: #C9CDCF;
    height: 110px;
    margin: auto;
    margin-top: 50px;
  }
  label{
    font-weight: bold;
    font-size: 17px;
    color: #000000;
  }


  .buttom {
    width: 350px;
    margin: auto;
    margin-top: 60px;
  }
  h4{
    color:white;
    text-align:center;
  }
 
</style>

<h4><?php echo $msg ?></h4>
      <main>
        <div class="container">
          <form action="" method = "post">
                 <div class="alert alert-primary" role="alert">
            <div class="form-group">
              <label for="exampleInputEmail1">HỌ TÊN</label>
              <input type="text" name = "ho_ten" width="100px" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div><!--emd-form-group-->
           </div><!--end-alert alert-primary-->

           <div class="alert alert-primary" role="alert">
            <div class="form-group">
              <label for="exampleInputEmail1">SỐ ĐIỆN THOẠI</label>
              <input type="text" name = "sdt" width="100px" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div><!--emd-form-group-->
           </div><!--end-alert alert-primary-->

           <div class="alert alert-primary" role="alert">
            <div class="form-group">
              <label for="exampleInputEmail1">NGÀY CẮT</label>
             <input type="date" width="100px" name = "ngay_cat" class="form-control" id="exampleInputEmail1">
            </div><!--emd-form-group-->
           </div><!--end-alert alert-primary-->

           <div class="alert alert-primary" role="alert">
            <div class="form-group">
              <label for="exampleInputEmail1">GIỜ CẮT</label>
              <select name="gio_cat" class="custom-select custom-select-lg mb-2" >
                <option value="">--Chọn--</option>
                <option value="8h-11h sáng">8h-11h sáng</option>
                <option value="2h-4h30 chiều">2h-4h30 chiều</option>
                <option value="7h-9h30 tối">7h-9h30 tối</option>
              </select>
            </div><!--emd-form-group-->
           </div><!--end-alert alert-primary-->

           <div class="alert alert-primary" role="alert">
            <div class="form-group">
              <label for="exampleInputEmail1">Dịch vụ</label>
              <select name="dich_vu" class="custom-select custom-select-lg mb-2" >
                <option value="">--Chọn--</option>
                <?php foreach ($mang as $depart): ?>
               <option value="<?php echo $depart['ten_dv'] ?>"><?php echo $depart['ten_dv'] ?></option>
                <?php endforeach ?>
              </select>
            </div><!--emd-form-group-->
           </div><!--end-alert alert-primary-->

           <div class="alert alert-primary" role="alert">
            <div class="form-group">
              <label for="exampleInputEmail1">Style List</label>
              <select name="style_list" class="custom-select custom-select-lg mb-2" >
                <option value="">--Chọn--</option>
            <?php foreach($result as $nv):?>
              <option value="<?php echo $nv['ten_nv'] ?>"><?php echo $nv['ten_nv'] ?></option> 
            <?php endforeach ?>
              </select>
            </div><!--emd-form-group-->
           </div><!--end-alert alert-primary-->

           <div class="buttom p-3 my-3 bg-dark text-white">
            <h1 class="h1"><a href=""><input type= "submit" name="btnSave" value = "Đặt lịch"></a></h1>
          </div>
          </form>
        </div>
      </main>
      <body>
 