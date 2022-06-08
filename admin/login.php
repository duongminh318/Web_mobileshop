<?php
session_start();
if(isset($_SESSION['username']))
{
	

if($_SESSION['phanquyen']==1)
{
	header("location:../index.php");
}
if($_SESSION['phanquyen']==0)
{
	header("location:admin.php");
}
if($_SESSION['phanquyen']==2)
{
	header("location:shipper.php");
}
}
?>
<link rel="stylesheet" href="css/login.css" type="text/css">
<div class="body">
    <div class="tieude1">
        <div class="quantri">
            <h2>Đăng nhập quản trị</h2>
        </div>
    </div>
<?php
include("../include/connect.php");

if(isset($_POST['login']))
{
    $username = $_POST['user'];
    $password = MD5($_POST['pass']);
    $sql_check = mysqli_query($link,"select * from nguoidung where username = '$username'");
    $dem = mysqli_num_rows($sql_check);
    if($dem == 0)
    {
        echo "<p class='thongbao1'>Tài khoản không tồn tại</p>";
    }
    else
    {
        $sql_check2 = "select * from nguoidung where username = '$username' and password = '$password'";
		$row=mysqli_query($link,$sql_check2);	
        $dem2 = mysqli_num_rows($row);
        if($dem2 == 0)
            echo "<p class='thongbao1'>Mật khẩu không chính xác</p>";
        else
        {
	
		 while($rows = mysqli_fetch_array($row))
            {
              $_SESSION['username'] = $username;
				$_SESSION['phanquyen'] = $row['phanquyen'];
				$_SESSION['idnd'] = $row['idnd'];
                if($rows['phanquyen'] == 0)
                {
                    
					echo "
							<script language='javascript'>
								alert('Đăng nhập quản trị thành công');
								window.open('admin.php','_self', 1);
							</script>
						";
                }
                else if ($rows['phanquyen'] == 2) 
                {
                    echo "
                    <script language='javascript'>
                        alert('Đăng nhập nhân viên giao hàng thành công');
                        window.open('shipper.php','_self', 1);
                    </script>
                "; 
                }
                {
                    
					header('location:../index.php');
                }
            }
        }
    }
}
?>
<div class="admin_login">
    <form action="" method="post">
        <label>Tên tài khoản:</label><input type="text" name="user" placeholder=" Username"><br>
        <label>Mật khẩu:</label><input type="password" name="pass" placeholder=" Password"><br>
        <button name="login" class="dangnhap">Đăng nhập</button><button class="thoat"><a href="../index.php">Thoát</a></button>
    </form>
</div>
</div>
