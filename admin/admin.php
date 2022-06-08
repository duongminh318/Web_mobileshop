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
<title> Khởi Minh mobile Admin </title>
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
			<div id="left-content"> 
					<div class="menu">
						<div class="center">
							<ul>
								<li><a href="admin.php"><i class="fas fa-home"></i> Trang chủ</a></li>
								<li><a href="?admin=hienthidt"><i class="fas fa-donate"></i> Doanh thu</a></li>
								<li><a href="?admin=hienthisp"><i class="fas fa-archive"></i> Sản phẩm</a></li>
								<li><a href="?admin=hienthidm"><i class="fas fa-bars"></i> Danh mục</a></li>
								<li><a href="?admin=hienthihd"><i class="far fa-calendar-check"></i> Hóa đơn</a></li>
								<li><a href="?admin=hienthind"><i class="fas fa-user"></i> Người dùng</a></li>
								<li><a href="?admin=hienthincc"><i class="far fa-handshake"></i> Nhà cung cấp</a></li>
								<li><a href="?admin=hienthitt"><i class="far fa-newspaper"></i> Tin tức</a></li>
								<li><a href="?admin=hienthiht"><i class="far fa-envelope"></i> Hỗ trợ</a></li>
								<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Thoát</a></li>
							</ul>
						</div><!-- End .center -->
					</div> <!-- End .menu -->				
			</div> <!-- End left-content -->
			<!---------------- Hiển trị content-admin------------------->
			<div id="center-content">
                <?php
                    include("content_admin.php");
                ?>
			</div>
		</div><!-- End .main-content -->
	</div><!-- End .content -->
	
</div><!-- End .wapper -->
</body>
</html>
