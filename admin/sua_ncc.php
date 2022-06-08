<link rel="stylesheet" href="css/them_sanpham1.css">
<?php
		$idnd=$_GET['idncc'];
        $sql="select * from nhacungcap where idncc='".$_GET['idncc']."'";
         $rows=mysqli_query($link,$sql);
         $row=mysqli_fetch_array($rows);
?>
<form action="update_ncc.php?idncc=<?php echo $idnd;?>" method="post" name="frm" onsubmit="return kiemtra()" enctype="multipart/form-data">
	<table>
			<tr class="tieude_themsp">
				<td colspan=2>Sửa Nhà Cung Cấp </td>
			</tr>
    		<tr>
            	<td>Tên NCC</td><td><input type="text" name="tenncc" value="<?php echo $row['tenncc'] ?>"/></td>
            </tr>
			<tr>
            	<td>Email</td><td><input type="text" name="email"  value="<?php echo $row['email'] ?>"/></td>
            </tr>
			<tr>
            	<td>Điện thoại</td><td><input type="text" name="dienthoai"  value="<?php echo $row['sdt'] ?>"/></td>
            </tr>
            <tr>
            	<td>Địa chỉ</td><td><input type="text" name="diachi"  value="<?php echo $row['diachi'] ?>"/></td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="update" value="Update" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
        </table> 

</form>

<script language="javascript">
 	function  kiemtra()
	{
	    if(frm.tenncc.value=="")
		{
			alert("Bạn chưa nhập tên. Vui lòng kiểm tra lại");
			frm.tenncc.focus();
			return false;	
		}
		if(frm.tenncc.value.length<6)
		{
			alert("Tên quá ngắn. Vui lòng điền đầy đủ tên");
			frm.tenncc.focus();
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
        if(frm.diachi.value=="")
		{
			alert("Bạn chưa nhập địa chỉ");	
			frm.diachi.focus();
			return false;
		}
	}
 </script>