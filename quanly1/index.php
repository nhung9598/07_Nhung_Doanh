<?php 
  session_start();
  if(isset($_SESSION['username'])){
2 tuần chưa thấy gì mới
    // echo $_SESSION['username'];
  $link = new mysqli('localhost','root','','quanly') or die('failed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Quản Lý Phòng Khám</title>
        <link rel="stylesheet" href="style/style.css">
		<link rel="stylesheet" href="style/fontawesome/css/all.css">

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
                      <li><a  id="current" href="#"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="benhnhan.php" ><i class="fas fa-user-edit"></i>Bệnh Nhân</a></li>
                      <li><a href="dichvu.php" ><i class="fas fa-stethoscope"></i>Dịch vụ</a></li>
                      <li><a href="donthuoc.php" ><i class="fas fa-capsules"></i>Đơn thuốc</a></li>

                  </ul>
          </br>
              </div>
        <div id="cthome">
			<div>
				<span>NEWS</span> 
			</div>
            <img src="image/logo.png" width= "550px" height="400px"> </br></br>
            <h3> Phòng khám  </h3> </br>
                       <a  id="current" href="#"><i class="fas fa-home"></i>Trang chủ</a>
                      <a href="benhnhan.php" ><i class="fas fa-user-edit"></i>Bệnh Nhân</a>
                      <a href="dichvu.php" ><i class="fas fa-stethoscope"></i>Dịch vụ</a>
                      <a href="donthuoc.php" ><i class="fas fa-capsules"></i>Đơn thuốc</a>

        </div>
            </div>
        </div>
        <!--endbody-->
    <footer>
      <div class="container">
      </div>
    </footer>
    </body>
</html>

<?php
  
}
else {
  header('location: login.php');
}
?>