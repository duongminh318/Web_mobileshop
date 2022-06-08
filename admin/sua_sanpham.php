<link rel="stylesheet" href="css/them_sanpham17.css">
<?php
		//include('../include/connect.php');
		$idsp=$_GET['idsp'];
        $sql="select * from sanpham where idsp=$idsp";
         $rows=mysqli_query($link,$sql);
         $row=mysqli_fetch_array($rows);
?>
<h2>Chỉnh sửa sản phẩm</h2>
<form action="update_sanpham.php?idsp=<?php echo $idsp;?>" method="post" name="frm" onsubmit="" enctype="multipart/form-data">
	<div class="dangky">

		<label for="tensp">Tên sản phẩm</label>
		<input type="text" name="tensp" value="<?php echo $row['tensp'] ?>"/>

		<label for="hinhanh">Hình ảnh</label>
		<img src="../img/uploads/<?=$row['hinhanh']?>" width="80" height="120"/><br /><br /><input type="file" name="hinhanh" />

		<label for="Màu">Màu</label>
		<input type="text" name="mau" value="<?php echo $row['mau'] ?>"/>

		<label for="chitiet">Chi tiết</label>
		<textarea name="chitiet" id="chitiet"><?php echo $row['chitiet'] ?></textarea>

		<label for="soluong">Số lượng</label>
		<input type="text" name="soluong" size="5" value="<?php echo $row['soluong'] ?>"/>

		<label for="daban">Đã bán</label>
		<input type="text" name="daban" size="5" value="<?php echo $row['daban'] ?>"/>

		<label for="gia">Giá</label>
		<input type="text" name="gia" value="<?php echo $row['gia'] ?>"/>

		<label for="giamgia">Giảm giá</label>
		<input type="text" name="khuyenmai1" size="1" value="<?php echo $row['khuyenmai1'] ?>" />

		<label for="tangthem">Tặng thêm</label>
		<textarea name="khuyenmai2"><?php echo $row['khuyenmai2'] ?></textarea>

		<label for="madm">Danh mục</label>
			<select name="danhmuc" id="madm">
				<?php 
					$sql1="select * from danhmuc";
					$rows1=mysqli_query($link,$sql1);
					while($row1=mysqli_fetch_array($rows1))
				{
				?>
					<option value="<?php echo $row1['madm']?>" <?php if($row['madm']==$row1['madm']) echo 'selected="selected"';?>><?php echo $row1['tendm']?></option>
					<?php }?>
			</select>
		
		<label for="madm">Nhà cung cấp</label>
		<select name="idncc" id="madm">
					<?php 
						$sql1="select * from nhacungcap";
						$rows1=mysqli_query($link,$sql1);
						while($row1=mysqli_fetch_array($rows1))
					{
					?>
					<option value="<?php echo $row1['idncc']?>" <?php if($row['idncc']==$row1['idncc']) echo 'selected="selected"';?>><?php echo $row1['tenncc']?></option>
					<?php }?>
		</select>

		<input type="submit" name="update" value="Update" />
        <input type="reset" name="" value="Hủy" />
	</div>

</form>
<script type="text/javascript" language="javascript">
 
  CKEDITOR.replace( 'chitiet', {
	uiColor: '#d1d1d1'
});
</script>
