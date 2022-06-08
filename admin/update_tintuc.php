 <?php
 include('../include/connect.php'); include('function/function.php');
		$tieude=$_POST['tieude'];
		$ndngan=$_POST['ndngan'];
		$noidung=$_POST['noidung'];
		$tacgia=$_POST['tacgia'];
	   // $hinhanh=$_POST['hinhanh'];
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
		$ma=$_GET['matt'];
		if($_FILES['hinhanh']['name'] != "")
		{
			move_uploaded_file($file_tmp,$upload_image.$file__name__);
			$sql_update=("
				UPDATE tintuc SET 
									tieude='$tieude',
									ndngan='$ndngan',
									noidung='$noidung',
									hinhanh='$file__name__',
									tacgia='$tacgia'
								WHERE matt='$ma'
			");
		}
		else {
	   	$sql_update=("
			UPDATE tintuc SET 
									tieude='$tieude',
									ndngan='$ndngan',
									noidung='$noidung',
									tacgia='$tacgia'
								WHERE matt='$ma'
		");
		}
	$update=mysqli_query($link,$sql_update);
		if($update) {
			echo "Sửa tin tức hành công";		
			echo '<center><meta http-equiv="refresh" content="2;url=admin.php?admin=hienthitt"></center>';
			}
			else { echo "Thêm tin tức thất bại";
			}
	
?>