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
      
        <div id="menu">
                  <ul>
                      <li><a  href="index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a  id="current"  href="benhnhan.php" ><i class="fas fa-user-edit"></i>Bệnh Nhân</a></li>
                      <li><a  href="dichvu.php"><i class="fas fa-stethoscope"></i>Dịch Vụ</a></li>
                      <li><a href="khothuoc.php"><i class="fas fa-capsules"></i>Kho Thuốc</a></li>

                  </ul>

              </div>
              <div id="main-contain"> 
        <h2>Chi tiết hồ sơ của bệnh nhân</h2></br>

           <div class="col-md-12">
                 <?php
                  $query = 'SELECT * FROM benhnhan WHERE benhnhanid = "'.$_GET['id'].'" '; 
                  $result = mysqli_query($link, $query);
                  if( mysqli_num_rows($result) > 0 )
                    {
                      $i = 0; 
                      while($r= mysqli_fetch_assoc($result))
                      {
                        $i++;
                        $mabn=$r['mabn'];
                        $tenbn= $r['tenbn'];
                        $ngaysinh =$r['ngaysinh'];
                        $sdt = $r['sdt'];
                        $diachi = $r['diachi'];
                        $gioitinh=$r['gioitinh'];
                      }
                    }          
              ?>
              <div class="col-md-2">
        <div class="form-group">
          <label>Mã Bệnh Nhân</label>
          <p><?php echo $mabn; ?></p> 
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label>Họ và tên</label>
          <p><?php echo $tenbn; ?></p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label>Số điện thoại</label>
          <p><?php echo $sdt; ?></p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label>Ngày sinh</label>
          <p><?php echo $ngaysinh; ?></p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label>Giới Tính</label>
          <p><?php echo $gioitinh; ?></p>
        </div>
      </div>
      <div class="col-md-2">
        <div class="form-group">
          <label>Số điện thoại</label>
          <p><?php echo $sdt; ?></p>
        </div>
        </div>
        <div class="col-md-12" style="margin-top:15px;">
      <div style="height: 250px; overflow:scroll;"> 
        <table class="table table-striped table-bordered text-center" style="">
          <thead style="font-size:17px;">
            <tr>
              <td>STT</td>
              <td>Mã bệnh nhân</td>
              <td>Tên bệnh nhân</td>
              <td>dịch vụ</td>
              <td>Ngày khám bệnh</td>
              <td>Ngày tái khám</td>
            </tr>
          </thead>
          <tbody>
            <?php 
               $query = 'SELECT * FROM kham WHERE id = "'.$_GET['id'].'" '; 
               $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result) > 0){
                  $i=0;
                  while ($r = mysqli_fetch_assoc($result))
                  {
                    $i++;
                    $mabn=$r['mabn'];
                    $tenbn=$r['tenbn'];
                    $dichvu=$r['dichvu'];
                    $ngaykham=$r['ngaykham'];
                    $taikham=$r['taikham'];
                    echo "<tr> ";
                    echo "<td>$i</td>"; 
                    echo "<td>$mabn</td>"  ;
                    echo "<td>$tenbn</td>";
                    echo "<td>$dichvu</td>";  
                    echo "<td>$ngaykham</td>" ;
                    echo "<td>$taikham</td>"  ;
                   }
                 }
                
            ?>
          </tbody>
          </table>
          </div>
          </div>
          </div>
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
  else {
    header('location:login.php');
  }
?>