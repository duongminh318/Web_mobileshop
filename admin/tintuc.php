<link rel="stylesheet" href="css/sanpham2.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
	include ('../include/connect.php');
	include ('function/function.php');
    $select = "select * from tintuc ";
    $query = mysqli_query($link,$select);
    $dem = mysqli_num_rows($query);
?>
	<h2>TIN TỨC</h2>
<div class="tintuc">

	<form action="admin.php?admin=xulytt" method="post">
		<div id="checktt">
			<a href='?admin=themtt' >Thêm tin tức</a>
		</div>
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
        <td>ID</td>
        <td>Tiêu đề</td>
        <td>Nội dung ngắn</td>
        <td>Hình ảnh</td>
        <td style="width:60px;">Tác giả</td>
        <td style="width:80px;">Sửa</td>
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

		$sql = mysqli_query($link,"SELECT * FROM tintuc order by matt DESC LIMIT $from, $max_results"); 



								
    if($dem > 0)
        while ($bien = mysqli_fetch_array($sql))
        {
?>
            <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp" width="30"><?php  echo $bien['matt'] ?></td>
                <td class="stt_hienthi_sp"><?php echo $bien['tieude'] ?></td>
                <td class="img_hienthi_sp" width="300"> <?php echo $bien['ndngan'] ?>  </td>
				<td class="sl_hienthi_sp"><img src="../img/tintuc/<?php echo $bien['hinhanh'] ?>" width="80" height="60"/></td>
				<td class="sl_hienthi_sp"><?php echo $bien['tacgia'] ?> </td>
                <td class="active_hienthi_sp">
					<a href='?admin=suatt&matt=<?php echo $bien['matt'] ?>'><img src="img/sua1.png" title="Sửa"></a>
					<?php echo "<p onclick = 'checkdel({$bien['matt'] })' ><img src='img/xoa1.png' title='Xóa' class='delete'></p>" ?>
				 </td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có khách hàng</td></tr>";
	
?>
</table>
</form>
	<div id="phantrang_sp">
	
	<?php
			// Tính tổng kết quả trong toàn DB:  
			$total_results = mysqli_result(mysqli_query($link,"SELECT COUNT(*) as Num FROM tintuc"),0);  

			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($total_results / $max_results);  


			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthitt&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthitt&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthitt&page=$next\"><button class='trang'>Trang sau</button></a>";  
			}  
			echo "</center>";  		
		
	?>
	</div>