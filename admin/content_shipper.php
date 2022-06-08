<link rel="stylesheet" href="css/sanpham.css">	
<?php
if(isset($_GET['shipper']))
	switch($_GET['shipper'])
	{
		case 'hienthidh':
			include ("shipper_hoadon.php");
			break;
		case 'hienthihd':
			include ("shipper_hoadon.php");
			break;
		case 'chitiethoadon':
			include ("chitiethoadon.php");
			break;
		case 'xulyhd':
			include ("shipper_xulyhd.php");
			break;
		case 'suand':
			include ("sua_shipper.php");
			break;
	}
	else 
    {
		?>
		<div class="quanlysp">
			<h2>NHÂN VIÊN GIAO HÀNG</h2>
		</div>
		
		<?php
		}
		?>