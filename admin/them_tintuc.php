<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Tin Tức</title>
<link rel="stylesheet" href="css/them_sanpham17.css" />
</head>

<body>
<?php
	include '../include/connect.php';

	if(isset($_POST['submit']))
	{
		$tieude=$_POST['tieude'];
		$ndngan=$_POST['ndngan'];
		$tacgia=$_POST['tacgia'];
		$noidung=$_POST['noidung'];
	//	$hinhanh=$_POST['hinhanh'];
		$upload_image="../img/tintuc/";
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
		
		$insert="INSERT INTO tintuc VALUES('','$tieude', '$ndngan', '$noidung', '$file__name__', '$ngay', '$tacgia','1')";
		$query=mysqli_query($link,$insert);
		if($query) {
			echo "Thêm tin tức hành công";		
			echo '<meta http-equiv="refresh" content="2;url=admin.php?admin=hienthitt">';
			}
			else { echo "Thêm tin tức thất bại";
			}
}


		
?>
<h2>Thêm tin tức</h2>
<form action="" method="post" enctype="multipart/form-data">
	<label for="tieude">Tiêu đề</label>
	<input type="text" name="tieude" placeholder="Nhập tiêu đề..."/>

	<label for="ndn">Nội dung ngắn</label>
	<textarea name="ndngan" placeholder="Nhập nội dung ngắn..."></textarea>

	<label for="ndct">Nội dung chi tiết</label>
	<textarea name="noidung" id="chitiet" placeholder="Nhập nội chi tiết..."></textarea>

	<label for="hinhanh">Hình ảnh</label>
	<input type="file" name="hinhanh"/>

	<label for="tacgia">Tác giả</label>
	<input type="text" name="tacgia" placeholder="Nhập nội tên tác giả..."/>

	<input type="submit" name="submit" value="Thêm" />
    <input type="reset" name="" value="Hủy" /> 
</form>

<script type="text/javascript" language="javascript">
 
  CKEDITOR.replace( 'chitiet', {
	uiColor: '#d1d1d1'
});
</script>

</body>
</html>