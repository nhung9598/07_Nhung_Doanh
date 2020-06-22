
<?php
	$link = new mysqli('localhost','root','','quanly') or die('kết nối thất bại '); 
	mysqli_query($link, 'SET NAMES UTF8');
						
	if(isset($_GET['id'])){
	$tenthuoc = $_GET['id'];
	$query = 'DELETE FROM `khothuoc` WHERE id = "'.$_GET['id'].'"' ;
	mysqli_query($link,$query) or die("xóa dữ liệu thất bại");
    header('location:../khothuoc.php');
						}
?>
				