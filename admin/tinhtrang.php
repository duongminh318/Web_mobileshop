<link rel="stylesheet" href="css/sanpham2.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
	include ('../include/connect.php');
	include ('function/function.php');
    $select = "select * from hoadon";
    $query = mysqli_query($link,$select);
    $dem = mysqli_num_rows($query);
?>
	<h2>Tình trạng đơn hàng</h2>
<div class="quanlysp">

	<form action="shipper.php?shipper=xulyhd" method="post">

	
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
        <td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
        <td>Mã HD</td>
		<td>Ngày đặt hàng</td>
		<td>Tên KH</td>
		<td>Nơi nhận</td>
        <td>Trạng thái</td>
        <td colspan=2>Chi tiết</td>
    </tr>

    <?php
	
	/*------------Phan trang------------- */
		// Nếu đã có sẵn số thứ tự của trang thì giữ nguyên (ở đây tôi dùng biến $page) 
		// nếu chưa có, đặt mặc định là 1!   

		if(!isset($_GET['page'])){  
		$page = 1;  
		} else {  
		$page = $_GET['page'];  
		}  

		// Chọn số kết quả trả về trong mỗi trang mặc định là 10 
		$max_results = 10;  

		// Tính số thứ tự giá trị trả về của đầu trang hiện tại 
		$from = (($page * $max_results) - $max_results);  

		// Chạy 1 MySQL query để hiện thị kết quả trên trang hiện tại  

		$sql = mysqli_query($link,"SELECT * FROM hoadon ORDER by mahd DESC  LIMIT $from, $max_results"); 



								
    if($dem > 0)
        while ($bien = mysqli_fetch_array($sql))
        {
?>
            <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$bien['mahd']?>"/></td>
                <td class="masp_hienthi_sp"><?php  echo $bien['mahd'] ?></td>
				<td class="masp_hienthi_sp"><?php  echo $bien['ngaydathang'] ?></td>
				<td class="masp_hienthi_sp"><?php  echo $bien['hoten'] ?></td>
				<td class="masp_hienthi_sp"><?php  echo $bien['diachi'] ?></td>
				<td class="sl_hienthi_sp"><?php if($bien['trangthai']==1) echo "Đang xử lý"; else if($bien['trangthai']==2) echo"Đã giao hàng"; else echo"Đã hủy đơn hàng";?></td>
				<td class="active_hienthi_sp" style="width:70px;"><a href="nv_kho.php?nv_kho=chitiethoadon&mahd=<?php echo $bien['mahd']; ?> " style="float:left;"><?php echo "<img src='img/detail.png' title='chi tiết đơn hàng' class='chitiet'>" ?></a>
					
				</td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Bạn không có đơn hàng nào</td></tr>";
	
?>
</table>
</form>
	<div id="phantrang_sp">
	
	<?php
			// Tính tổng kết quả trong toàn DB:  
			$total_results = mysqli_result(mysqli_query($link,"SELECT COUNT(*) as Num FROM hoadon"),0);  

			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($total_results / $max_results);  


			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?shipper=hienthihd&page=$prev\"><button class='trang'><<</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?shipper=hienthihd&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?shipper=hienthihd&page=$next\"><button class='trang'>>></button></a>";  
			}  
			echo "</center>";  		
		
	?>
	</div>
