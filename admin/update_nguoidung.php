  <?php
 include('../include/connect.php');
 include('function/function.php');


		$tennd=$_POST['tennd'];
		$user=$_POST['user'];
		$email=$_POST['email'];
	   $dienthoai=$_POST['dienthoai'];
		$phanquyen=$_POST['phanquyen'];
		$id = $_GET['idnd'];
		$gioitinh = $_POST['gioitinh'];
	$sql_update=("
		UPDATE nguoidung SET
							tennd='$tennd',
							username='$user',
							email='$email',
							dienthoai='$dienthoai',
							phanquyen='$phanquyen'
							where idnd=$id
	");
	$update=mysqli_query($link,$sql_update);
	if($update)
	{
		redirect("admin.php?admin=hienthind", "Bạn đã sửa thành công người dùng.", 2 );
	}
	else {
	redirect ("admin.php?admin=suand&idnd=$id", "Sửa thất bại", 2);
	}
	
?>