
<?php
	session_start();
	if (isset($_SESSION['username'])){
	$link = new mysqli('localhost','root','','quanly') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
	$query = 'SELECT * FROM benhnhan WHERE benhnhanid = "'.$_GET['id'].'"' ;
	$result = mysqli_query($link, $query);
								if(mysqli_num_rows($result) > 0){
									$i=0;
									while ($r = mysqli_fetch_assoc($result)){
										$i++;
										$ten= $r['tenbn'];
										$ngaysinh=$r['ngaysinh'];
										$sdt = $r['sdt'];
										$diachi = $r['diachi'];
										$gioitinh=$r['gioitinh'];
										$dichvu=$r['dichvu'];
										$mabn=$r['mabn'];
									}
								}
	//echo $query;
	
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Sửa thông tin bệnh nhân</title>
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
                      <li><a id="current"href="../benhnhan.php" ><i class="fas fa-user-edit">Bệnh Nhân</i></a></li>
                      <li><a href="../dichvu.php"><i class="fas fa-stethoscope"></i>Dịch Vụ</a></li>
                      <li><a href="../donthuoc.php"><i class="fas fa-capsules"></i>Đơn Thuốc</a></li>
                  </ul>

              </div>
              <div id="main-contain"> 
				<h2>Sửa thông tin bệnh nhân</h2>
				
				<div class="form">
					<span style="font-size: 20px; color: red; font-style: italic"><b>Mời nhập lại thông tin bệnh nhân <?php echo $ten ?>: </b> </span> </br>
					(Chú ý điền đủ thông tin)
					</br></br>
					<form method="post">
						<table>
							<tr> 
								<td>Họ tên </td>
								<td> <input type="text" name="ten" value="<?php echo $ten; ?>">
								</td>
							</tr>
							<tr>
								<td>Ngày sinh </td>
								<td> <input type="date" name="ngaysinh" value= "<?php echo $ngaysinh;?>">
								 </td>
							</tr>
							<tr>
								<td>Giới Tính </td>
								<td> <input type="text" name="gioitinh" value="<?php echo $gioitinh; ?>"></td>
							</tr>
							<tr>
								<td>Số điện thoại </td>
								<td> <input type="text" name="sdt" value="<?php echo $sdt; ?>"></td>
							</tr>
							<tr>
								<td>Địa Chỉ </td>
								<td> <input type="text" name="diachi" value="<?php echo $diachi; ?>"></td>
							</tr>
							<tr>
								<td> Mã Bệnh Nhân </td>
								<td> <input type="text" name="mabn" value="<?php echo $mabn; ?>"></td>
							</tr>
							<tr>
								<td colspan=2>
								<input id="btnChapNhan" type="submit" value="Hoàn tất" name="sua"/>
								</td>
							</tr>
						</table>
						
					</form>
					<br>Chọn menu bên trái hoặc click vào <a href="../benhnhan.php" style="color: blue; text-decoration:underline">đây</a> để quay lại danh sách bệnh nhân.
					
					
					<?php
						
						if(isset($_POST['sua'])){
							if(empty($_POST['ten']) or empty($_POST['ngaysinh']) or empty($_POST['sdt']) or empty($_POST['diachi']) or empty($_POST['gioitinh']) or empty($_POST['mabn'])) {echo'</br> <p style="color:red;font-weight:bold; "> vui lòng không để trống các trường!</p> </br>';}
							else{
								$id = $_GET['id'];
								$hotenBN = $_POST['ten'];
								$ngaySinh = $_POST['ngaysinh'];
								$sDt = $_POST['sdt'];
								$diaChi = $_POST['diachi'];
								$gioiTinh=$_POST['gioitinh'];
								$maBN=$_POST['mabn'];
								$query = "UPDATE `benhnhan` SET tenbn = '$hotenBN', ngaysinh = '$ngaySinh', sdt = '$sDt', diachi = '$diaChi',gioitinh='$gioitinh',maBN='$mabn' WHERE benhnhanid = '$id'";
								mysqli_query($link, $query) or die("sửa không thành công");
								header('location:../benhnhan.php');
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