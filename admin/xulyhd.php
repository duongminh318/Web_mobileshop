<?php
	if(isset($_POST['id']))
	{
	foreach($_POST['id'] as $mahd)
	{
		$_SESSION['id'][$mahd]=1;
	}
	


		if(isset($_POST['huy']))
			{ 
				foreach($_SESSION['id'] as $mahd=>$value)
				{
					if ($value==1)
					$sql="update hoadon set trangthai=3 where mahd='$mahd'";
					mysqli_query($link,$sql);
					unset($_SESSION['id']);
					echo "
							<script language='javascript'>
								alert('Đã huỷ đơn hàng');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
				}
			}
			elseif(isset($_POST['xoa']))
					{
						foreach($_SESSION['id'] as $mahd=>$value)
						{
							if ($value==1)
							$sql="delete from hoadon where mahd='$mahd'";
							mysqli_query($link,$sql);
							$sql1="delete from chitiethoadon where mahd='$mahd'";
							mysqli_query($link,$sql1);
							
							unset($_SESSION['id']);
							echo "
							<script language='javascript'>
								alert('Xóa thành công');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
						}
			
					}
			else 
			{
				foreach($_SESSION['id'] as $mahd=>$value)
				{
					if ($value==1)
					$sql="update hoadon set trangthai=4 where mahd='$mahd'";
					mysqli_query($link,$sql);
					unset($_SESSION['id']);
					echo "
							<script language='javascript'>
								alert('Đã duyệt đơn hàng');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
				}
			}

			}		else echo "
							<script language='javascript'>
								alert('Bạn chưa chọn hóa đơn cần xử lý');
								window.open('admin.php?admin=hienthihd','_self', 1);
							</script>
						";
		
?>