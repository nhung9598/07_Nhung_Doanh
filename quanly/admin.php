<?php
	if(!isset($_SESSION["loged"])){
		header("location:index.php");
		setcookie("error", "Bạn chưa đăng nhập!", time()+1, "/","", 0);
	}
	else
		echo "phần mềm quản lý phòng khám";
 
?>