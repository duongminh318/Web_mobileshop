<?php

if(isset($_SESSION['admin'])){
	header("location:admin.php");
echo '<meta http-equiv="refresh" content="1;url=admin.php">';}
else

echo "
							<script language='javascript'>
								window.open('login.php','_self', 1);
							</script>
						";

    ?>
