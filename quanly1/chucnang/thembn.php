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
                      <li><a id="current"href="../benhnhan.php" ><i class="fas fa-user-edit">Bệnh Nhân</i></a></li>
                      <li><a href="../dichvu.php"><i class="fas fa-stethoscope"></i>Dịch Vụ</a></li>
                      <li><a href="../donthuoc.php"><i class="fas fa-capsules"></i>Đơn Thuốc</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Thêm Bệnh Nhân</h2>
				
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập thông tin bệnh nhân: </b> </span> </br>
					(Chú ý điền đủ thông tin)
				
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Họ tên </td>
								<td> <input type="text" name="ten" autofocus></td>
							</tr>
							
							<tr>
								<td>Ngày sinh </td>
								<td> <input type="date" name="ngaysinh"></td>
							</tr>
							<tr>
								<td>Số điện thoại </td>
								<td> <input type="text" name="sdt"></td>
							</tr>
							<tr>
								<td>Địa Chỉ </td>
								<td> <input type="text" name="diachi"></td>
							</tr>
							<tr>
								<td>Giới Tính </td>
								<td> <input type="text" name="gioitinh"></td>
							</tr>
							<tr>
								<td> Mã bệnh nhân </td>
								<td> <input type="text" name="mabn"></td>
							</tr>
							<tr>
								<td>Chọn dịch vụ  </td>
								<td> <select name="dichvu">
									 <?php
											 $q = "SELECT * FROM dichvu";
											 $rs = mysqli_query($link, $q);
											 if(mysqli_num_rows($rs)>0)
											 {
												 $i =0;
												 while ($row  = mysqli_fetch_assoc($rs))
												 {
													 $i++;
													 $madv = $row['madv'];
													 $tendv = $row['tendv'];
	
													// echo $tendv;
													echo"<option value= '$madv'>$tendv</option>";
												 }
											 }
									 ?>
									</select>
								</td>
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
							if(empty($_POST['ten']) or empty($_POST['ngaysinh']) or empty($_POST['sdt']) or empty($_POST['diachi'])or empty($_POST['gioitinh'])or empty($_POST['mabn'])) {echo'<p style="color:red;font-weight:bold; "> Bạn chưa nhập thông tin đầy đủ !</p> ';}
							else
							{ 
								$hotenBN = $_POST['ten'];
								$ngaySinh = $_POST['ngaysinh'];
								$madv = $_POST['dichvu'];
								$sDt = $_POST['sdt'];
								$diaChi = $_POST['diachi'];
								$gioiTinh=$_POST['gioitinh'];
								$maBN=$_POST['mabn'];
					$query = "INSERT INTO `benhnhan`( `tenbn`, `madv`,`ngaysinh`, `sdt`, `diachi`,`gioitinh`,`mabn`) VALUES('$hotenBN','$madv','$ngaySinh','$sDt','$diaChi','$gioiTinh','$maBN')";
								mysqli_query($link,$query) or die("thêm dữ liệu thất bại");
								header('location:../benhnhan.php');
							}
						}
					?>
					<br>
					Chọn menu bên trái hoặc click vào <a href="../benhnhan.php" style="color: blue; text-decoration:underline; font-weight:bold;">đây</a> để quay lại danh sách bệnh nhân.
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