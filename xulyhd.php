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
                    mysqli_query($link, $sql);

					unset($_SESSION['id']);
					echo "
							<script language='javascript'>
								alert('Đã huỷ đơn hàng');
								window.open('index.php?content=donhang','_self', 1);
							</script>
                        ";
				}
			}
			}		else echo "
							<script language='javascript'>
								alert('Bạn chưa chọn hóa đơn cần xử lý');
								window.open('index.php?content=donhang','_self', 1);
							</script>
						";
		
?>