<link rel="stylesheet" href="css/sanpham2.css">
<?php
	include ('../include/connect.php');
	include ('function/function.php');
    $select = "select * from nguoidung ";
    $query = mysqli_query($link,$select);
    $dem = mysqli_num_rows($query);
?>
	<h2>Người dùng</h2>
<div class="nguoidung">
</div>
<table> 
    
    <tr class='tieude_hienthi_sp'>
        <td>ID</td>
        <td>Tên ND</td>
        <td>Username</td>
        <td>Email</td>
        <td>Điện thoại</td>
        <td>Quyền</td>
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

		$sql = mysqli_query($link,"SELECT * FROM nguoidung LIMIT $from, $max_results"); 



								
    if($dem > 0)
        while ($bien = mysqli_fetch_array($sql))
        {
?>
            <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp"><?php  echo $bien['idnd'] ?></td>
                <td class="stt_hienthi_sp"><?php echo $bien['tennd'] ?></td>
                <td class="img_hienthi_sp"> <?php echo $bien['username'] ?>  </td>
				<td class="sl_hienthi_sp"><?php echo $bien['email'] ?></td>
				<td class="sl_hienthi_sp">0<?php echo $bien['dienthoai'] ?></td>
				<td class="sl_hienthi_sp"><?php 
					if($bien['phanquyen']==0)
						echo "Admin";
					else if($bien['phanquyen']==1)
						echo "Người dùng";
					else if($bien['phanquyen']==2)
						echo "NV giao hàng";
					else if($bien['phanquyen']==3)
						echo "NV quản lý";
					else 
						echo "NV kho"
				?></td>
                <td class="active_hienthi_sp">
                    <a href='?admin=suand&idnd=<?php echo $bien['idnd'] ?>'><img src="img/sua1.png" title="Sửa"></a>
					<?php echo "<p onclick = 'checkdel({$bien['idnd'] })' ><img src='img/xoa1.png' title='Xóa' class='delete'></p>" ?>
                </td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có khách hàng</td></tr>";
	
?>
</table>

	<div id="phantrang_sp">
	
	<?php
			// Tính tổng kết quả trong toàn DB:  
			//$total_results = mysql_result(mysqli_query($link,"SELECT COUNT(*) as Num FROM nguoidung"),0);  
				$total_results = mysqli_result(mysqli_query($link,"SELECT COUNT(*) as Num FROM nguoidung"),0);  
			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($total_results / $max_results);  


			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthind&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthind&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?admin=hienthind&page=$next\"><button class='trang'>Trang sau</button></a>";  
			}  
			echo "</center>";  		
		
	?>
	</div>

<script language="JavaScript">
    function checkdel(idnd)
    {
        var	idnd=idnd;
        var link="xoa_nguoidung.php?idnd="+idnd;
        if(confirm("Bạn có chắc chắn muốn xóa người dùng này?")==true)
            window.open(link,"_self",1);
    }
</script>