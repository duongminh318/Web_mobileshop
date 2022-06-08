<?php
include '../include/connect.php';
include 'function/function.php';
$delete = "delete from nhacungcap where idncc='{$_GET['idncc']}'";

$del = mysqli_query($link,$delete);
if ($del)
	//echo "thanh cong";
	//header("location: index.php?admin=hienthind");
	redirect ("admin.php?admin=hienthincc", "Xóa nhà cung cấp thành công. ", 2);
	else
	echo "Xóa nhà cung cấp thất bại";
?>