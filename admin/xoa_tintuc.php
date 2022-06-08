 <?php
include '../include/connect.php';
include 'function/function.php';
$delete = "delete from tintuc where matt='{$_GET['matt']}'";
$del = mysqli_query($link,$delete);
if ($del)
	//echo "thanh cong";
	//header("location: index.php?admin=hienthind");
	redirect ("admin.php?admin=hienthitt", "Xóa tin tức thành công. ", 1);
	else
	echo "Xóa tin tức thất bại";
?>