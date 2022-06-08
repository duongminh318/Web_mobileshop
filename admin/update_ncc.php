<?php
 include('../include/connect.php');
 include('function/function.php');


		$tenncc=$_POST['tenncc'];
		$email=$_POST['email'];
        $dienthoai=$_POST['dienthoai'];
        $diachi=$_POST['diachi'];
		$id = $_GET['idncc'];
	$sql_update=("
		UPDATE nhacungcap SET
							tenncc='$tenncc',
							email='$email',
							dienthoai='$dienthoai',
							diachi='$diachi'
							where idncc=$id
	");
	$update=mysqli_query($link,$sql_update);
	if($update)
	{
		redirect("nv_kho.php?nv_kho=hienthincc", "Bạn đã sửa thành công nhà cung cấp.", 2 );
	}
	else {
	redirect ("nv_kho.php?nv_kho=suancc&idncc=$id", "Sửa thất bại", 2);
	}
	
?>