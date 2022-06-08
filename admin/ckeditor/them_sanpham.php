<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Sản Phẩm</title>
<link rel="stylesheet" href="css/them_sanpham.css" />
</head>

<body>
<?php
	include '../include/connect.php';

	if(isset($_POST['submit']))
	{
		$masp=$_POST['masp'];
		$ten_sanpham=$_POST['tensp'];
		$gia=$_POST['gia'];
		$chitiet=$_POST['chitiet'];
		$soluong=$_POST['soluong'];
		$daban=$_POST['daban'];
	//	$hinhanh=$_POST['hinhanh'];
		$upload_image="../img/uploads/";
		$file_tmp= isset($_FILES['hinhanh']['tmp_name']) ?$_FILES['hinhanh']['tmp_name'] :"";
		$file_name=isset($_FILES['hinhanh']['name']) ?$_FILES['hinhanh']['name'] :"";
		$file_type=isset($_FILES['hinhanh']['type']) ?$_FILES['hinhanh']['type'] :"";
		$file_size=isset($_FILES['hinhanh']['size']) ?$_FILES['hinhanh']['size'] :"";
		$file_error=isset($_FILES['hinhanh']['error']) ?$_FILES['hinhanh']['error'] :"";
		//Lay gio cua he thong
		$dmyhis= date("Y").date("m").date("d").date("H").date("i").date("s");
		//Lay ngay cua he thong
		$ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
		
		$file__name__=$dmyhis.$file_name;
		move_uploaded_file($file_tmp,$upload_image.$file__name__);
		$madm=$_POST['madm'];
		$insert="INSERT INTO sanpham VALUES('','$masp', '$ten_sanpham', '$file__name__', '$chitiet', '$soluong','$daban', '$gia','$madm', '$ngay')";
		$query=mysql_query($insert);
		if($query) {
			echo "<p align = center>Thêm sản phẩm thành công!</p>";
			echo '<meta http-equiv="refresh" content="1;url=index.php?admin=hienthisp">';
		}
			else { echo "Thất bại";
			}
}


		
?>
<form action="" method="post" enctype="multipart/form-data">
	
      <table>
			<tr class="tieude_themsp">
				<td colspan=2>Thêm Sản Phẩm </td>
			</tr>
        	<tr>
            	<td>Mã SP</td><td><input type="text" name="masp" size="10" /></td>
            </tr>
    		<tr>
            	<td>Tên SP</td><td><input type="text" name="tensp"/></td>
            </tr>
            <tr>
            	<td>Hình ảnh</td><td><input type="file" name="hinhanh"/></td>
            </tr> 
            <tr>
            	<td>Chi tiết</td><td><textarea name="chitiet" id="chitiet"></textarea></td>
            </tr>
			<tr>
            	<td>Số lượng</td><td><input type="text" name="soluong" size="5"/></td>
            </tr>
			<tr>
            	<td>Đã bán</td><td><input type="text" name="daban" size="5"/></td>
            </tr>
            <tr>
            	<td>Giá</td><td><input type="text" name="gia"/></td>
            </tr>
            <tr>
            	<td>Mã DM</td><td>
                	<select name="madm">
                	<option>Chọn danh muc</option>
                    <?php
						$show = mysql_query("SELECT * FROM danhmuc WHERE dequi=0");
						while($show1 = mysql_fetch_array($show))
						{
							$madm1 = $show1['madm'];	
							$tendm1 = $show1['tendm'];
							echo "<option value='".$madm1."'>".$tendm1."</option>";	
								$show2 = mysql_query("SELECT * FROM danhmuc WHERE dequi='".$madm1."'");
								while($show3 = mysql_fetch_array($show2))
								{
									$madm2 = $show3['madm'];	
									$tendm2 = $show3['tendm'];
									echo "<option value='".$madm2."'> - ".$tendm2."</option>";
								}
						}
                	?>
                
                
                </td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="submit" value="Thêm" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
         </table>  
</form>

<script type="text/javascript" language="javascript">
 
  CKEDITOR.replace( 'chitiet', {
	uiColor: '#d1d1d1'
});
</script>

</body>
</html>