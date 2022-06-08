

<?php

if(isset($_GET['admin']))
	switch($_GET['admin'])
	{
		case 'hienthidt':
			include ("doanhthu.php");
			break;
		case 'hienthisp':
			include ("sanpham.php");
			break;
		case 'hienthincc':
			include ("nhacungcap.php");
			break;
		case 'themsp':
			include ("them_sanpham.php");
			break;
		case 'themncc':
			include ("them_ncc.php");
			break;
		case 'suasp':
			include ("sua_sanpham.php");
			break;
		case 'hienthidm':
			include ("danhmuc.php");
			break;
		case 'themdm':
			include ("them_danhmuc.php");
			break;
		case 'suadm':
			include ("sua_danhmuc.php");
			break;
		case 'hienthind':
			include ("nguoidung.php");
			break;
		case 'themnd':
			include ("them_nguoidung.php");
			break;
		case 'suand':
			include ("sua_nguoidung.php");
			break;
		case 'xulyhd':
			include ("xulyhd.php");
			break;
			case 'abc':
				include ("abc.php");
				break;
		case 'hienthitt':
			include ("tintuc.php");
			break;
		case 'themtt':
			include ("them_tintuc.php");
			break;
		case 'suatt':
			include ("sua_tintuc.php");
			break;
		case 'hienthiht':
			include ("hotro.php");
			break;
		case 'hienthihd':
			include ("hoadon.php");
			break;
		case 'hienthihd1':
			include ("hoadon1.php");
			break;
		case 'chitiethoadon':
			include ("chitiethoadon.php");
			break;
		case 'xulyht':
			include ("xulyht.php");
			break;
		case 'xulysp':
			include ("xulysp.php");
			break;
		case 'xulyncc':
			include ("xulyncc.php");
			break;
		case 'xulytt':
			include ("xulytt.php");
			break;
		case 'suancc':
			include ("sua_ncc.php");
			break;
		case 'xulytt':
			include ("xulytt.php");
			break;
		default:
			include ("sanpham.php");
			break;
	}
	else 
	{
	?>
		<div id="admincon">			
			<div id="sanphammoi">
			<h3>ĐƠN ĐẶT HÀNG MỚI</h3>
				<table>
				<?php $ngay=date('Y-m-d'); ?>
					<tr class="tieudespmoi">
						<td>STT</td>
						<td>Họ tên</td>
						<td>Địa chỉ</td>
						<td>Điện thoại</td>
						<td>Ngày đặt hàng</td>
					</tr>
					<?php 
						$i=1;
						$sql=mysqli_query($link,"select * from hoadon where trangthai='1'");
						
						$dem = mysqli_num_rows($sql);
						if($dem>0)
						while($row=mysqli_fetch_array($sql))
						{
					
					?>
					<tr>
						<td><?php echo $i++; ?></td>
						<td><?php echo $row['hoten'] ?></td>
						<td><?php echo $row['diachi'] ?></td>
						<td><?php echo $row['dienthoai'] ?></td>
						<td><?php echo $row['ngaydathang'] ?></td>
					</tr>
					<?php }
					else {
						echo "<tr><td colspan='6'>Không có đơn hàng nào cần duyệt!!!</td></tr>";
					}
					?>
					<tr>
						<td colspan=6 align="right" style="padding-right:20px; height:30px;"><a href="admin.php?admin=hienthihd1">Xem chi tiết</a></td>
					</tr>
				</table>
			</div>
		</div>
	<?php 
	}

?>