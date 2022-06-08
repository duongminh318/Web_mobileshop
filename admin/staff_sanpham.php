<link rel="stylesheet" href="css/sanpham2.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
	include ('../include/connect.php');
	
    $select = "select * from sanpham inner join danhmuc on sanpham.madm=danhmuc.madm";
    $query = mysqli_query($link,$select);
    $dem = mysqli_num_rows($query);
?>
<div class="quanlysp">
	<h2>DANH SÁCH SẢN PHẨM</h2>
	<form action="staff.php?staff=xulysp" method="post">
		<div id="checksp">
			<p>
				<input type="submit" name="xoa" value="Xóa" />
			</p>
			<a href='?staff=themsp' >Thêm sản phẩm</a><br>
		</div>
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
		<td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
        <td>IDSP</td>
        <td>HÌnh ảnh và Tên SP</td>
        <td>Số lượng</td>
        <td>Đã bán</td>
        <td>Giá</td>
        <td>Danh mục</td>
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

		$sql = mysqli_query($link,"SELECT * FROM sanpham inner join danhmuc on sanpham.madm=danhmuc.madm ORDER by idsp DESC  LIMIT $from, $max_results"); 



								
    if($dem > 0)
        while ($bien = mysqli_fetch_array($sql))
        {
?>
            <tr class='noidung_hienthi_sp'>
				<td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$bien['idsp']?>"/></td>
                <td class="masp_hienthi_sp"><?php  echo $bien['idsp'] ?></td>
                <td class="img_hienthi_sp">
                    <img src="../img/uploads/<?php echo $bien['hinhanh'] ?>"  width='60' height='60'><br>
                    <h4><?php echo $bien['tensp'] ?></h4>
                </td>
				<td class="sl_hienthi_sp"><?php echo $bien['soluong'] ?></td>
				<td class="sl_hienthi_sp"><?php echo $bien['daban'] ?></td>
                <td class="gia_hienthi_sp"><?php echo number_format($bien['gia']).' VNÐ' ?></td>
                <td  class="madm_hienthi_sp">
					 
									<?=$bien['tendm'] ?>
				</td>
                <td class="active_hienthi_sp">
					<a href='staff.php?staff=suasp&idsp=<?php echo $bien['idsp']  ?>'><img src="img/sua1.png" title="Sửa"></a>
					<?php echo "<p onclick = 'checkdel({$bien['idsp'] })' ><img src='img/xoa1.png' title='Xóa' class='delete'></p>" ?>
				</td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có sản phẩm trong CSDL</td></tr>";
	
?>
</table>
</form>
	<div id="phantrang_sp">
	
	<?php
			// Tính tổng kết quả trong toàn DB:  
			$total_results = mysql_result(mysqli_query($link,"SELECT COUNT(*) as Num FROM sanpham"),0);  

			// Tính tổng số trang. Làm tròn lên sử dụng ceil()  
			$total_pages = ceil($total_results / $max_results);  


			// Tạo liên kết đến trang trước trang đang xem 
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?staff=hienthisp&page=$prev\"><button class='trang'><<</button></a>&nbsp;";  
			}  

			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
				if($i>1) {
						echo "$i&nbsp;";  } 
				
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?staff=hienthisp&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  

			// Tạo liên kết đến trang tiếp theo  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?staff=hienthisp&page=$next\"><button class='trang'>>></button></a>";  
			}  
			echo "</center>";  		
		
	?>
	</div>
	<script language="JavaScript">
    function checkdel(idsp)
    {
        var	idncc=idncc;
        var link="staff_xoasp.php?idsp="+idsp;
        if(confirm("Bạn có chắc chắn muốn xóa sản phẩm này?")==true)
            window.open(link,"_self",1);
    }
	</script>