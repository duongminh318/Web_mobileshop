<?php 
   session_start();
   if(!isset($_SESSION['username'])   or ($_SESSION['phanquyen']==1))
   {
		
		header('location:login.php');
		exit();
   }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language="javascript" src="ckeditor/ckeditor.js"></script>
<title> Khởi Minh mobile </title>
<link rel="stylesheet" type="text/css" href="css/css123.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">




</head>
<?php 
	include("../include/connect.php");
?>
<body>
<div id="wapper">
	<div id="header">
		<div id="bg-header">
		</div><!-- End .bg-header -->
	</div><!-- End .header -->
	<div id="content">
		<div id="top-content">
						<p><font color="#be2edd"><b><?= $_SESSION['username']?></b></font></p>
		</div>
		<div id="main-content">
			<div id="left-content-staff">
				<div class="menu-staff">
					<div class="center-staff">
						<ul>
							<li><a href="staff.php"><i class="fas fa-home"></i>Trang chủ</a></li>
							<li><a href="?staff=hienthisp"><i class="fas fa-archive"></i> Sản phẩm</a></li>
							<li><a href="?staff=hienthidt"><i class="fas fa-donate"></i> Doanh thu</a></li>
							<li><a href="?staff=suand"><i class="fas fa-user-edit"></i> Cập nhật thông tin</a></li>
							<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Thoát</a></li>
						</ul> 
					</div><!-- End .center -->
				</div>	<!-- End .menu-staff -->
			</div><!-- End .left-content-staff -->
			<!---------------- Hiển trị content-admin------------------->
			
			
			<div id="center-content-staff">
                <?php
                    include("content_staff.php");
                ?>
			</div>
		</div><!-- End .main-content -->
	</div><!-- End .content -->
	
</div><!-- End .wapper -->
</body>
</html>
