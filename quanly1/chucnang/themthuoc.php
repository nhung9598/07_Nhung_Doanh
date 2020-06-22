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
        <link rel = "stylesheet" href = "../style/style.css">
        <link rel = "stylesheet" href = "../style/fontawesome/css/all.css">
    </head>
    <body>
        <header> 
            <div class="container"> 
                 <div id="logo">
					  <div id="logoImg">
						   <img src="../image/logo.jpg " width="30px">
					  </div>
					<a href="../index.php">TRANG QUẢN LÝ</a>
				 </div>
				<div id="accountName">
					
					<p> Xin chào ! </p>
					<a href="../dangxuat.php" alt="Đăng xuất"> <img src="../image/logout.png" width="25px"> </a>
				 </div>
            </div>
			
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                      <li><a href="../index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a href="../benhnhan.php" ><i class="fas fa-user-edit">Bệnh Nhân</i></a></li>
                      <li><a href="../dichvu.php"><i class="fas fa-stethoscope"></i>Dịch Vụ</a></li>
                      <li><a id="current" href="../khothuoc.php"><i class="fas fa-capsules"></i>Đơn Thuốc</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Thêm Bệnh Nhân</h2>
				
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập thông tin thuốc </b> </span> </br>
					(Chú ý điền đủ thông tin)
				
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Mã thuốc</td>
								<td> <input type="text" name="mathuoc" autofocus></td>
							</tr>
							
							<tr>
								<td>Tên thuốc </td>
								<td> <input type="text" name="tenthuoc"></td>
							</tr>
							<tr>
								<td>Đơn vị </td>
								<td> <input type="text" name="donvi"></td>
							</tr>
							<tr>
								<td>Số lượng</td>
								<td> <input type="text" name="soluong"></td>
							</tr>
							<tr>
								<td>Thành tiền </td>
								<td> <input type="text" name="thanhtien"></td>
							</tr>
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="them"/>
								</td>
							</tr>
						</table>
						
					</form>
					
					
					
					<?php
					
						
						if(isset($_POST['them'])){
							if(empty($_POST['tenthuoc']) or empty($_POST['mathuoc']) or empty($_POST['donvi']) or empty($_POST['soluong'])or empty($_POST['thanhtien'])) {echo'<p style="color:red;font-weight:bold; "> Bạn chưa nhập thông tin đầy đủ !</p> ';}
							else
							{ 
								$mathuoc= $_POST['mathuoc'];
								$tenthuoc = $_POST['tenthuoc'];
								$donvi = $_POST['donvi'];
								$soluong = $_POST['soluong'];
								$thanhtien = $_POST['thanhtien'];
					$query = "INSERT INTO `khothuoc`( `mathuoc`, `tenthuoc`,`donvi`, `soluong`, `thanhtien`) VALUES('$mathuoc','$tenthuoc','$donvi','$soluong','$thanhtien')";
								mysqli_query($link,$query) or die("thêm dữ liệu thất bại");
								header('location:../khothuoc.php');
							}
						}
					?>
					<br>
					Chọn menu bên trái hoặc click vào <a href="../khothuoc.php" style="color: blue; text-decoration:underline; font-weight:bold;">đây</a> để quay lại danh sách thuốc.
					<br>
					<br>
					
				
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
	else{
		header('location:../login.php');
	}
?>