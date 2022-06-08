<script language="javascript">
function kiemtra()
{
if(a.hoten.value=="")
{
alert("Bạn chưa điền tên")
a.hoten.focus();
return false;

}

if(a.dienthoai.value=="")
{
alert("Bạn chưa điền SĐT<br> hãy điền số điện thoại để chúng tôi liên lạc lại với bạn")
a.dienthoai.focus();
return false;
}
if(a.diachi.value=="")
{
alert("Bạn chưa điền địa chỉ")
a.diachi.focus();
return false;
}

if(a.hoten.value!="" && a.dienthoai.value!=""&&a.diachi.value!="")
{
a.submit();	
}
}

</script>
<!----
<div class="thongtinkhachhang">
<h3>Thông tin thanh toán</h3>
<form action="index.php?content=cart&action=insert" method="POST" id="a" onsubmit="return kiemtra();">
	<table>
		<tr><td class="tieude">Tên khách hàng</td><td><input type="text" name="hoten"/></td></tr>
		<tr><td class="tieude">Địa chỉ giao hàng</td><td><input type="text" name="diachi"/></td></tr>
		<tr><td class="tieude">Số điện thoại</td><td><input type="text" name="dienthoai"/></td></tr>
		<tr><td class="tieude">Email</td><td><input type="text" name="email"/></td></tr>
		<tr><td class="tieude">Ngày nhận: </td><td><input type="date" name="ngaynhan"/></td></tr>
		<tr><td colspan="2" class="submit"><center><input type="submit" value="Đặt hàng"/></center></td></tr>
	</table>
</form>

</div>
-->
<h2>Thanh toán</h2>
<div class="thongtinkhachhang">

<form action="index.php?content=cart&action=insert" method="POST" id="a" onsubmit="return kiemtra();"><hr>
	<div class="dangky">
		<?php 
		if(isset($_SESSION['idnd'])){
		
		
			$sql=mysqli_query($link,"select * from nguoidung where idnd='".$_SESSION['idnd']."'");
			$row=mysqli_fetch_array($sql);
			}
		?>
		<label for="tenkh">Tên khách hàng</label>
		<input type="text" name="hoten" value="<?php echo $row['tennd'] ?>"/>
		
		<label for="diachi">Địa chỉ giao hàng</label>
		<input type="text" name="diachi" value="<?php echo $row['diachi'] ?>"/>

		<label for="sdt">Số điện thoại</label>
		<input type="text" name="dienthoai" value="<?php echo $row['diachi'] ?>"/>

		<label for="email">Email</label>
		<input type="text" name="email" value="<?php echo $row['email'] ?>"/>

		<label for="pttt">Phương thức thanh toán</label>
		<select name="phuongthuc" id="madm">
				<option value="1">Qua bưu điện</option>
				<option value="3">Thanh toán khi nhận hàng</option>
				
		</select>

		<input type="submit" value="Đặt hàng"/>

		</div>
</form>

</div>
