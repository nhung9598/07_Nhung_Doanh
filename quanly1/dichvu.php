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
        <title>Dịch vụ</title>
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
                      <li><a href="benhnhan.php" ><i class="fas fa-user-edit"></i>Bệnh Nhân</a></li>
                      <li><a id="current"   href="dichvu.php"><i class="fas fa-stethoscope"></i>Dịch Vụ</a></li>
                      <li><a href="khothuoc.php"><i class="fas fa-capsules"></i>Kho Thuốc</a></li>

                  </ul>

              </div>
              <div id="main-contain"> 
        <h2>DANH SÁCH DỊCH VỤ</h2><br>
        <div id="listBN">
        <form method= "post" id= "f_search"> <input id = "txtSearch" type="search" name= "search" placeholder = "Nhập tên hoặc mã dịch vụ">
        <input id= "btnSearch" type = "submit" name = "tim" value="" > 
        </form> 

                <table width = "70%">
                <tr>
                  <th>Stt</th>
                  <th>Mã dịch vụ</th>
                  <th>Tên Dịch vụ</th>
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
                    $query = "SELECT * FROM dichvu WHERE dichvu.tendv LIKE '%".$giatri."%' or dichvu.madv = '$giatri'";
                  }
                  }
                else{
                $query = "SELECT * FROM dichvu";
                }
                $result = mysqli_query($link, $query);
                if(mysqli_num_rows($result) > 0){
                  $i=0;
                  while ($r = mysqli_fetch_assoc($result)){
                    $i++;
                    $iddv = $r['iddv'];
                    $madv = $r['madv'];
                    $tendv=$r['tendv'];
                    echo "<tr> ";
                    echo "<td>$i</td>"; 
                     echo "<td>$madv</td>" ;
                     echo "<td>$tendv</td>";
                      echo " <td style='text-align: center;'> <a href='thongtindv.php?iddv=$iddv'><input id='btnChitiet' type='button' value='chi  tiết' '></a>  </td>";
      
                    }
                  }
              ?>
              </table>
            </div>
          
        <br>
        <form id="formChucnang">
        <a href="chucnang/themdv.php" ><input  id="btnThemdv" type="button" value=" thêm dịch vụ"> </a>
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