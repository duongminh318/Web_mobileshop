<h2>Đăng ký tài khoản</h2>
<form action="update_dangky.php" method="post" name="frm" onsubmit="return dangky()"><hr>
	<div class="dangky">
		<label for="tentk">Tên tài khoản</label>
		<input type="text" name="user" placeholder="Nhập tên tài khoản...">

		<label for="tennd">Tên người dùng</label>
		<input type="text" name="tennd" placeholder="Nhập tên người dùng...">

		<label for="mk">Mật khẩu</label>
		<input type="password" name="pass" >

		<label for="nmk">Nhập lại mật khẩu</label>
		<input type="password" name="pass1">

		<label for="ngaysinh">Ngày sinh</label>
		<input type="date" name="ngaysinh">

		<label for="gioitinh">Giới tính</label>
			<select name="gioitinh" id="madm">
					<option value="">-Chọn giới tính-</option>
					<option value="Nam">Nam</option>
					<option value="Nữ">Nữ</option>
					<option value="Khác">Tùy chọn</option>
			</select>

		<label for="email">Email</label>
		<input type="text" name="email" placeholder="Nhập email...">

		<label for="sdt">Số điện thoại</label>
		<input type="text" name="dienthoai" placeholder="Nhập số điện thoại...">

		<label for="diachi">Địa chỉ</label>
		<textarea name="diachi"></textarea>

		<button type="submit" name="submit">Đăng ký</button>
		<button type="reset">Hủy</button>

	</div>
</form>

<script language="javascript">
 	function  dangky()
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
		if(10>dd.length || dd.length>11)
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