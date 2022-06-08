<link rel="stylesheet" href="css/sanpham2.css">
<?php
	include ('../include/connect.php');
	
    $select = "select * from hoadon, chitiethoadon where hoadon.mahd = chitiethoadon.mahd and hoadon.trangthai = 2 ";
    $query = mysqli_query($link,$select);
    $dem = mysqli_num_rows($query);
?>
	<h2>Doanh thu</h2>
<div class="doanhthu">

	 
</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
        <td>Mã HD</td>
        <td>Tên sản phẩm</td>
        <td>Số lượng</td>
        <td>Giá</td>
        <td>Thành tiền</td>
    </tr>

    <?php
	


			$tong=0;					
    if($dem > 0){
        while ($bien = mysqli_fetch_array($query))
        {
		$thanhtien=$bien['gia']*$bien['soluong'];
		$tong+=$thanhtien;
?>

            <tr class='noidung_hienthi_sp'>
                <td class="masp_hienthi_sp"><?php  echo $bien['mahd'] ?></td>
                <td class="stt_hienthi_sp"><?php echo $bien['tensp'] ?></td>
				<td class="sl_hienthi_sp"><?php echo $bien['soluong'] ?></td>
				<td class="sl_hienthi_sp"><?php echo number_format($bien['gia'],0,",",".") ?></td>
				<td class="sl_hienthi_sp"><?php echo number_format($thanhtien,0,",",".") ?></td>
                
            </tr>
<?php 

		}
		
	?>
		<tr>
			<td colspan=5 align="right" style="padding:10px 20px 10px 0px; font-size:20px;">Tổng doanh thu: <font color="red"><?php echo number_format($tong,0,",",".") ?> vnđ</font></td>
		</tr>
	<?php 
	}
    else echo "<tr><td colspan='6'>Bạn chưa bán được sản phẩm nào</td></tr>";
	
?>
</table>



