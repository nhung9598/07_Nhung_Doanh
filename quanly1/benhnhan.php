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
        <title>Bệnh nhân</title>
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
					<a href="index.php">Trang Quản lý</a>
				 </div>
				<div id="accountName">
					
					<p> Xin chào ! </p>
					<a href="dangxuat.php" alt= "Đăng xuất"> <img src="image/logout.png" width="25px"> </a>
				</div>
            </div>
        </header>
        <!--endheader-->
        <div class="body">
			<div class="container"> 
				<div id="menu">
                  <ul>
                      <li><a  href="index.php"><i class="fas fa-home"></i>Trang chủ</a></li>
                      <li><a id="current" href="benhnhan.php" ><i class="fas fa-user-edit"></i>Bệnh Nhân</a></li>
                       <li><a   href="dichvu.php"><i class="fas fa-stethoscope"></i>Dịch Vụ</a></li>
                      <li><a href="khothuoc.php"><i class="fas fa-capsules"></i>Kho thuốc</a></li>


                  </ul>

              </div>
              <div id="main-contain"> 
			  <h2>DANH SÁCH BỆNH NHÂN </h2><br>
			  <div id="listBN">
				<form method= "post" id= "f_search"> <input id = "txtSearch" type="search" name= "search" placeholder = "Nhập tên hoặc sđt">
				<input id= "btnSearch" type = "submit" name = "tim" value="" > 
				</form> 

							  <table width = "70%">
								<tr>
									<th>Stt</th>
									<th>Họ Tên</th>
									<th>Ngày sinh</th>
									<th>giới tính</th>
									<th>Mã Bệnh Nhân</th>
									<th>SĐT</th>
									<th>Địa chỉ</th>
									<th>Chức năng</th>

								</tr>
							 
							<?php
								if (isset($_POST['tim'])){
									$giatri = $_POST['search'];
									//echo $giatri;
									if (empty($giatri))
									{
										echo "Bạn muốn tìm gì?";
									}
									   else
									{
										$query = "SELECT * FROM benhnhan WHERE benhnhan.tenbn LIKE '%".$giatri."%' or benhnhan.sdt = '$giatri'";
									}
									}
								else{
								$query = "SELECT * FROM benhnhan";
								}
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
										echo "<tr> ";
										echo "<td>$i</td>";	
										echo "<td>$ten</td>"	;
										echo "<td>$ngaysinh</td>";
										echo "<td>$gioitinh</td>";	
										echo "<td>$mabn</td>"	;
										echo "<td>$sdt</td>"	;
										echo "<td>$diachi</td>";
										echo " <td style='text-align: center;'> <a href='chucnang/suabn.php?id=$benhnhanid'><input id='btnSua' type='button' value='sửa' '></a> <a href='khambenh.php'><input id='btnkhambenh' type='button' value='khám'><a href='thongtinbn.php?id=$benhnhanid'><input id='btnChitiet' type='button' value='chi  tiết' '></a>  </td>";
			
										}
									}
								
							?>
							</table>
					  </div>
					
			  <br>
				<form id="formChucnang">
				<a href="chucnang/thembn.php" ><input  id="btnThembn" type="button" value=" thêm bệnh nhân"> </a>
				</form>
		
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
		header('location:login.php');
	}
?>