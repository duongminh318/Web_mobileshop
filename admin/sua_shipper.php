
<link rel="stylesheet" href="css/them_sanpham17.css">
<?php
		$idnd=$_SESSION['idnd'];
        $sql="select * from nguoidung where idnd='".$_SESSION['idnd']."'";
         $rows=mysqli_query($link,$sql);
         $row=mysqli_fetch_array($rows);
?>
<h2>Cập nhật thông tin cá nhân</h2>
<form action="update_sua_shipper.php" method="post" name="frm" onsubmit="return kiemtra()" enctype="multipart/form-data"><hr>
<div class="dangky">

<label for="tennd">Tên người dùng</label>
<input type="text" name="tennd" value="<?php echo $row['tennd'] ?>"/> 

<label for="username">Username</label>
<input type="text" name="user"  value="<?php echo $row['username'] ?>"/>


<label for="email">Email</label>
<input type="text" name="email"  value="<?php echo $row['email'] ?>"/>

<label for="sdt">Số điện thoại</label>
<input type="text" name="dienthoai"  value="<?php echo $row['dienthoai'] ?>"/>

<label for="gioitinh">Giới tính</label>
<select name="gioitinh" id="madm">
	<option value="Nam" selected="selected"> Nam </option>
	<option value="Nữ" selected="selected"> Nữ </option>
	<option value="Tùy chọn" selected="selected"> Tùy chọn </option>
</select>


<input type="submit" name="update" value="Update" />
<input type="reset" name="" value="Hủy" />
</div>

</form>

<script language="javascript">
 	function  kiemtra()
	{
	    if(frm.tennd.value=="")
		{
			alert("Bạn chưa nhập tên. Vui lòng kiểm tra lại");
			frm.tennd.focus();
			return false;	
		}
		if(frm.tennd.value.length<6)
		{
			alert("Tên quá ngắn. Vui lòng điền đầy đủ tên");
			frm.tennd.focus();
			return false;	
		}
		if(frm.user.value=="")
	 	{
			alert("Bạn chưa nhập tên đăng nhập . Vui lòng kiểm tra lại");
			frm.user.focus();
			return false;	
		}
		if(frm.user.value.length<5)
	 	{
			alert("Tên đăng nhập phải lớn hơn 5 ký tự");
			frm.user.focus();
			return false;	
		}
		if(frm.pass.value=="")
		{
			alert("Bạn chưa nhập password");	
			frm.pass.focus();
			return false;
		}
		if(frm.pass.value.length<6)
		{
			alert("Mật khẩu phải lớn hơn 6 ký tự");	
			frm.pass.focus();
			return false;
		}
	   dt=/^[0-9]+$/;
	   dienthoai=frm.dienthoai.value;
	   if(!dt.test(dienthoai))
	   {
		    alert("Bạn chưa nhập điện thoại. Vui lòng kiểm tra lại.");
		    frm.dienthoai.focus();
		    return false;
	   }
	   	dd=frm.dienthoai.value;
		if(9>dd.length || dd.length>9)
		{
			alert("Số điện thoại không đủ độ dài. Vui lòng nhập lại");
			frm.dienthoai.focus();
			return false;	
		}
		if(frm.email.value=="")
		{
			alert("Bạn chưa nhập email");	
			frm.email.focus();
			return false;
		}
		mail=frm.email.value;
		m=/^([A-z0-9])+[@][a-z]+[.][a-z]+[.]*([a-z]+)*$/;
		if(!m.test(mail))
		{
			alert("Bạn nhập sai email");	
			frm.email.focus();
			return false;
		}
		
		if(frm.pass1.value=="")
		{
			alert("Bạn chưa nhập lại password");	
			frm.pass1.focus();
			return false;
		}
		mk=frm.pass.value;
		mk1=frm.pass1.value;
		if(pass!=pass1)
		{
			alert("Password chưa đúng");	
			frm.pass1.focus();
			return false;
		}
	}
 </script>