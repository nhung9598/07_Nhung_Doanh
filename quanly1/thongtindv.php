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
                      <li><a  href="benhnhan.php" ><i class="fas fa-user-edit"></i>Bệnh Nhân</a></li>
                       <li><a id="current"   href="dichvu.php"><i class="fas fa-stethoscope"></i>Dịch Vụ</a></li>
                      <li><a href="khothuoc.php"><i class="fas fa-capsules"></i>Kho Thuốc</a></li>


                  </ul>

              </div>
              <div id="main-contain"> 
			  <h2>DANH SÁCH DỊCH VỤ CON </h2><br>
			  <div id="listBN">

							  <table width = "70%">
								<tr>
									<th>Stt</th>
									<th>mã dịch vụ</th>
									<th>mã dịch vụ con</th>
									<th>tên dịch vụ con</th>
									<th>Đơn giá</th>
								</tr>
							 
							<?php
							  $query = 'SELECT * FROM dvcon WHERE iddv = "'.$_GET['iddv'].'" '; 
								$result = mysqli_query($link, $query);
								if(mysqli_num_rows($result) > 0){
									$i=0;
									while ($r = mysqli_fetch_assoc($result)){
										$i++;
										$iddv = $r['iddv'];
										$madv= $r['madv'];
										$madvcon=$r['madvcon'];
										$tendvcon = $r['tendvcon'];
										$dongia = $r['giatien'];
										
									     echo "<tr> ";
										echo "<td>$i</td>";	
										echo "<td>$madv</td>"	;
										echo "<td>$madvcon</td>";
										echo "<td>$tendvcon</td>";	
										echo "<td>$dongia</td>"	;
			
										}
									}
								
							?>
							</table>
					  </div>
					
		
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