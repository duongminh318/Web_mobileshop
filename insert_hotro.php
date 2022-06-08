<?php 
	include("include/connect.php");
	include("admin/function/function.php");
	if(isset($_POST['submit']))
	{
		$chude =$_POST['chude'];
		$hoten =$_POST['hoten'];
		$email =$_POST['email'];
		$dienthoai =$_POST['dienthoai'];
		$noidung =$_POST['noidung'];
		$ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
		$insert=mysqli_query($link, "insert into hotro values('','$chude','$noidung','$hoten','$dienthoai','$email','$ngay')");
		if($insert)
			redirect("index.php","Cảm ơn bạn đã góp ý. Chúng tôi sẽ trả lời bạn sớm nhất có thể", 2);
		else
			echo "<script language='javascript'>
								alert('Lỗi');
								history.back(); 
     history.go(-1);
							</script>";
	}
?>