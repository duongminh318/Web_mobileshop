<?php 
   session_start();
   if(!isset($_SESSION['username'])   or ($_SESSION['phanquyen']==1))
   {
		
		header('location:index.php');
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
						<p><font color="#be2edd"><b><u><?= $_SESSION['username']?></u></b></font></p>
		</div>
		<div id="main-content">
			<div id="left-content-shipper">				
				<div class="menu-shipper">
					<div class="center-shipper">
						<ul>
							<li><a href="shipper.php"><i class="fas fa-home"></i> Trang chủ</a></li>
							<li><a href="?shipper=hienthidh"><i class="far fa-calendar-check"></i> Đơn hàng cần giao</a></li>
							<li><a href="?shipper=suand"><i class="fas fa-user-edit"></i> Cập nhật thông tin</a></li>
							<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Thoát</a></li>						
						</ul>
					</div><!-- End .center-shipper -->
				</div>	<!-- End .menu-shipper -->
			</div><!-- End .left-content-shipper -->
			<!---------------- Hiển trị content-admin------------------->
			
			
			<div id="center-content-shipper">
                <?php
                    include("content_shipper.php");
                ?>
			</div>
		</div><!-- End .main-content -->
	</div><!-- End .content -->
	
</div><!-- End .wapper -->
</body>
</html>
