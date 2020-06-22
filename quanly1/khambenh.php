<!DOCTYPE html>
<html>
<?php
  session_start();
  if (isset($_SESSION['username'])){
  $link = new mysqli('localhost','root','','quanly') or die('kết nối thất bại '); 
  mysqli_query($link, 'SET NAMES UTF8');      
?>

    <head>
        <meta charset="utf-8">
        <title>BỆNH NHÂN</title>
        <link rel = "stylesheet" href = "style/style.css">
        <link rel = "stylesheet" href = "style/fontawesome/css/all.css">

       <script src="bootstrap/js/bootstrap.min.js" type="text/javascript" ></script>
         <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="bootstrap/css/style.css">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
            <div id="logoImg">
               <img src="image/logo.jpg " width="30px">
            </div>
          <a href="index.php">TRANG QUẢN LÝ</a>
         </div>
        <div id="accountName">
          
          <p> Xin chào ! </p>
          <a href="dangxuat.php" alt="Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
         </div>
            </div>
      
        </header>
        <!--endheader-->
        <div class="body"> 
             <div class="container">
    <div class="col-md-12 text-center">
      <h3 style="margin: 5px 0px 25px 0; color:#bd0103;">KHÁM BỆNH</h3>
    </div>
        </div>
        <div class="col-md-12">
        <?php
             $query = "SELECT * FROM benhnhan";
             $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result) > 0){
                  $i=0;
                  while ($r = mysqli_fetch_assoc($result)){
                    $i++;
                    $benhnhanid = $r['benhnhanid'];
                    $ten= $r['tenbn'];
                    $ngaysinh=$r['ngaysinh'];
                    $gioitinh = $r['gioitinh'];
                    $mabn = $r['mabn'];
                    $diachi=$r['diachi'];
                    $sdt=$r['sdt'];
                  }
                }
               $query = "SELECT * FROM dichvu";
             $result = mysqli_query($link, $query);
             $madv=$r['madv'];
         ?>
         <form class="form-horizontal" role="form">
        <div class="col-md-4">
          <div class="form-group">
            <label>Tên Bệnh Nhân: </label>
            <span><?php echo $ten ?></span> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Ngày sinh: </label>
            <span><?php echo $ngaysinh ?></span>  
          </div>
        </div>
        <div class="col-md-2">
          <div class="form-group">
            <label>Giới tính: </label>
            <span><?php echo $gioitinh ?></span> 
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label>Số điện thoại: </label>
            <span><?php echo $sdt ?></span>  
          </div>
        </div>
      </form>
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label class="control-label" >Dịch vụ: </label>
        <input type="text" class="form-control" placeholder="...">
      </div>
    </div>
    <div class="col-md-12" >
      <div class="form-group">
        <label class="control-label" > đơn thuốc</label>
        <input id="tenthuoc" type="text" class="form-control" placeholder="Search tên thuốc...">
      </div>
      <div style="overflow:scroll;"> 
        <table class="table table-striped table-bordered text-center" style="">
          <tbody id="thuocList">
            
          </tbody>
        </table>
      </div>  
      <div style="overflow:scroll;"> 
        <table class="table table-striped table-bordered text-center" style="">
          <thead style="font-size:17px;">
            <tr>
              <td>STT</td>
              <td>Tên Thuốc</td>
              <td style="width: 7%;">Đơn Vị</td>
              <td style="width: 7%;">SL</td>
              <td style="width: 10%;">Đơn giá</td>
              <td style="width: 12%;">Thành tiền</td>
              <td>Cách dùng</td>
            </tr>
          </thead>
          <tbody id="hienthi-thuoc">
          </tbody>
        </table>
      </div>  
    </div>
    <div class="col-md-12">
      <div class="form-group">
        <label class="control-label" >Tái khám: </label>
        <input type="text" class="form-control" placeholder="sau 10 ngày..." >
      </div>
    </div>
      <td colspan=2>
                <input id="btnChapNhan" type="submit" value="Hoàn tất" name="them"/>
                </td>

  </div>

         </div>
         </div>

        <!--endbody-->
    <footer>
      <div class="container">
        QUẢN LÝ PHÒNG KHÁM
      </div>
    </footer>
       
    </body>
</html>
<?php
  }
  else{
    header('location:../login.php');
  }
?>