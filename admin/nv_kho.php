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
<title> Khởi Minh mobile Shipper </title>
<link rel="stylesheet" type="text/css" href="css/style-nvkho.css">
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
						<p>Chào bạn <font color="#be2edd"><b><?= $_SESSION['username']?></b></font></p>
		</div>
		<div id="main-content">
			<div id="left-content-nvkho">
				<div class="menu-nvkho">
					<div class="center-nvkho">
						<ul>
							<li><a href="nv_kho.php"><i class="fas fa-home"></i>Trang chủ</a></li> 
							<li><a href="?nv_kho=hienthidm"><i class="fas fa-bars"></i> Danh mục</a></li>
							<li><a href="?nv_kho=suand"><i class="fas fa-user-edit"></i> Cập nhật thông tin</a></li>
							<li><a href="?nv_kho=tinhtrang"><i class="far fa-calendar-check"></i> Tình trạng đơn hàng</a></li>
							<li><a href="?nv_kho=nhaphang"><i class="fas fa-cart-plus"></i> Nhập hàng</a></li> 
							<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Thoát</a></li>
						</ul>
					</div><!-- End .center-nvkho -->
				</div>	<!-- End .menu-nvkho -->
			</div><!-- End .left-content-nvkho -->
			<!---------------- Hiển trị content-admin------------------->
			
			
			<div id="center-content-nvkho">
                <?php
                    include("content_nvkho.php");
                ?>
			</div>
		</div><!-- End .main-content -->
	</div><!-- End .content -->
	
</div><!-- End .wapper -->
</body>
</html>
