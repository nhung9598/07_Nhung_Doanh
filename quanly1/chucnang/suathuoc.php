
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','quanly') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
	$query = 'SELECT * FROM khothuoc WHERE id = "'.$_GET['id'].'"' ;
	$result = mysqli_query($link, $query);
								if(mysqli_num_rows($result) > 0){
									$i=0;
									while ($r = mysqli_fetch_assoc($result)){
										$i++;
										$tenthuoc= $r['tenthuoc'];
										$donvi=$r['donvi'];
										$soluong= $r['soluong'];
										$thanhtien = $r['thanhtien'];
										$mathuoc=$r['mathuoc'];
									}
								}
	//echo $query;
	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sửa thuốc</title>
        <link rel="stylesheet" href="../style/style.css">
        <link rel="stylesheet" href="../style/fontawesome/css/all.css">
		<link rel="shortcut icon" href="../image/logo.jpg">
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
				<h2>Sửa thuốc</h2>
				
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập lại thông tin thuốc <?php echo $tenthuoc ?>: </b> </span> </br>
					(Chú ý điền đủ thông tin)
					</br></br>
					<form method="post">
						<table>
						<tr>
								<td>Mã Thuốc </td>
								<td> <input type="text" name="mathuoc" value="<?php echo $mathuoc; ?>"></td>
							</tr>
							<tr>
								<td>Tên thuốc </td>
								<td> <input type="text" name="tenthuoc" value="<?php echo $tenthuoc; ?>"></td>
							</tr>
							<tr>
								<td>Đơn vị </td>
								<td> <input type="text" name="donvi" value="<?php echo $donvi; ?>"></td>
							</tr>
							<tr>
								<td>Số lượng </td>
								<td> <input type="text" name="soluong" value="<?php echo $soluong; ?>"></td>
							</tr>
							<tr>
								<td>Thành tiền </td>
								<td> <input type="text" name="thanhtien" value="<?php echo $thanhtien; ?>"></td>
							</tr>
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="sua"/>
								</td>
							</tr>
						</table>
						
					</form>
					<br>Chọn menu bên trái hoặc click vào <a href="../khothuoc.php" style="color: blue; text-decoration:underline">đây</a> để quay lại danh sách thuốc.
					
					
					<?php
						
						if(isset($_POST['sua'])){
							if(empty($_POST['tenthuoc']) or empty($_POST['mathuoc']) or empty($_POST['soluong']) or empty($_POST['donvi']) or empty($_POST['thanhtien'])) {echo'</br> <p style="color:red;font-weight:bold; "> vui lòng không để trống các trường!</p> </br>';}
							else{
								$id = $_GET['id'];
								$ten = $_POST['tenthuoc'];
								$ma= $_POST['mathuoc'];
								$donVi = $_POST['donvi'];
								$soLuong = $_POST['soluong'];
								$thanhTien=$_POST['thanhtien'];
								$query = "UPDATE `khothuoc` SET tenthuoc = '$ten', mathuoc = '$ma', donvi = '$donVi', soluong = '$soLuong',thanhtien='$thanhTien'  WHERE id = '$id'";
								mysqli_query($link, $query) or die("sửa không thành công");
								header('location:../khothuoc.php');
							}
						}
					?>
					
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