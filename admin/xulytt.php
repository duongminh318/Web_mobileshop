<?php
	if(isset($_POST['id']))
	{
	foreach($_POST['id'] as $matt)
	{
		$_SESSION['id'][$matt]=1;
	}

						foreach($_SESSION['id'] as $matt=>$value)
						{
							if ($value==1)
							$sql="delete from tintuc where matt='$matt'";
							mysqli_query($link,$sql);
							unset($_SESSION['id']);
							echo "
							<script language='javascript'>
								alert('Xóa tin tức đã chọn thành công');
								window.open('admin.php?admin=hienthitt','_self', 1);
							</script>
						";
						}
			
					

			}		else echo "
							<script language='javascript'>
								alert('Bạn chưa chọn bản tin cần xử lý');
								window.open('admin.php?admin=hienthitt','_self', 1);
							</script>
						";
		
?>