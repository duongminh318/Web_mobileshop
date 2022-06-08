<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Nhà Cung Cấp</title>
<link rel="stylesheet" href="css/them_sanpham17.css" />
</head>

<body>
<?php
	include '../include/connect.php';

	if(isset($_POST['submit']))
	{
		$ten_ncc=$_POST['tenncc'];
		$email=$_POST['email'];
		$sdt=$_POST['sdt'];
		$diachi=$_POST['diachi'];
		$insert="INSERT INTO nhacungcap VALUES('', '$ten_ncc', '$email', '$sdt', '$diachi')";
		$query=mysqli_query($link,$insert);
		if($query) {
			echo "<p align = center>Thêm nhà cung cấp thành công!</p>";
			echo '<meta http-equiv="refresh" content="1;url=admin.php?admin=themncc">';
		}
			else { echo "Thất bại";
			}
}


		
?>
<h2>Thêm nhà cung cấp</h2>
<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return kiemtra()">
	<label for="idncc">Tên nhà cung cấp</label>
	<input type="text" name="tenncc" placeholder="Nhập tên danh mục..."/>

	<label for="email">Email</label>
	<input type="text" name="email" placeholder="Nhập email..."/>

	<label for="sdt">Số điện thoại</label>
	<input type="text" name="sdt" placeholder="Nhập số điện thoại..."/>

	<label for="diachi">Địa chỉ</label>
	<input type="text" name="diachi" placeholder="Nhập địa chỉ..."/>

	<input type="submit" name="submit" value="Thêm" />
    <input type="reset" name="reset" value="Hủy" />

</form>

<script type="text/javascript" language="javascript">
 
  CKEDITOR.replace( 'chitiet', {
	uiColor: '#d1d1d1'
});
</script>

</body>
</html>

<script language="javascript">
 	function  kiemtra()
	{
	    
		if(frm.tenncc.value=="")
	 	{
			alert("Bạn chưa nhập tên nhà cung cấp. Vui lòng kiểm tra lại");
			frm.tenncc.focus();
			return false;	
		}
		if(frm.email.value=="")
		{
			alert("Bạn chưa nhập email");	
			frm.email.focus();
			return false;
		}
		if(frm.sdt.value=="")
		{
			alert("Bạn chưa nhập số điện thoại");	
			frm.sdt.focus();
			return false;
		}
        if(frm.diachi.value=="")
		{
			alert("Bạn chưa nhập địa chỉ");	
			frm.diachi.focus();
			return false;
		}
	}
 </script>