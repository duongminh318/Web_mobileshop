<?php
include '../include/connect.php';
include 'function/function.php';
$delete = "delete from sanpham where idsp='{$_GET['idsp']}'";

$del = mysqli_query($delete);
if ($del)
	//echo "thanh cong";
	//header("location: index.php?admin=hienthind");
	redirect ("staff.php?staff=hienthisp", "Xóa sản phẩm thành công. ", 2);
	else
	echo "Xóa sản phẩm thất bại";
?>