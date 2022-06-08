<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Danh Mục</title>
<link rel="stylesheet" href="css/them_sanpham17.css" />
</head>

<body>
<?php
	include'../include/connect.php';
 

if(isset($_POST['btnthem']))
{
	$tendm=$_POST['tendm'];
	$dequi=$_POST['dequi'];
	$insertdm = mysqli_query($link,"INSERT INTO danhmuc VALUES('', '$tendm', '$dequi') ");
	if($insertdm) {
		
		echo "<p align = center>Thêm danh muc <font color='red'><b> $tendm </b></font> thành công!</p>";
		echo '<meta http-equiv="refresh" content="1;url=admin.php?admin=hienthidm">';
	}
	else {
		echo "Thêm thất bại";
	}
}
?>
<h2>Thêm danh mục mới</h2>
<form action="" method="post">
	<label for="madm">Mã danh mục</label>
	<input type="text" disabled="disabled" name="madm" size="5" />

	<label for="name">Tên danh mục</label>
	<input type="text" name="tendm" placeholder="Nhập tên danh mục..."/>

	<label for="thuoc">Thuộc</label>
	<select name="dequi" id="madm">
                	<option value="0">Danh mục chính</option>
                    <?php
						$show = mysqli_query($link,"SELECT * FROM danhmuc WHERE dequi=0");
						while($show1 = mysqli_fetch_array($show))
						{
							$madm = $show1['madm'];	
							$tendm = $show1['tendm'];
							echo "<option value='".$madm."'>".$tendm."</option>";	
								$show2 = mysqli_query($link,"SELECT * FROM danhmuc WHERE dequi='".$madm."'");
								while($show3 = mysqli_fetch_array($show2))
								{
									$madm1 = $show3['madm'];	
									$tendm1 = $show3['tendm'];
									echo "<option value='".$madm1."'> - ".$tendm1."</option>";
								}
						}
							
					?>
				</select>

	<input type="submit" name="btnthem" value="Thêm" />
    <input type="reset" name="" value="Hủy" />	

</form>
</body>
</html>