<link rel="stylesheet" href="css/sanpham.css">	
<div id="admincon">			
			<div id="sanphammoi">
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
						echo "<tr><td colspan='6'>Không có đơn hàng nào cần giao!!!</td></tr>";
					}
					?>
					<tr>
						<td colspan=6 align="right" style="padding-right:20px; height:30px;"><a href="shipper.php?shipper=hienthihd">Chi tiết</a></td>
					</tr>
				</table>
			</div>
		</div>
	<?php 