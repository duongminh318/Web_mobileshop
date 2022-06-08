<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Thêm Sản Phẩm</title>
<link rel="stylesheet" href="css/them_sanpham1.css" />
</head>

<body>
<?php
	include '../include/connect.php';

	if(isset($_POST['submit']))
	{
		
		$ten_sanpham=$_POST['tensp'];
		$gia=$_POST['gia'];
		$mau=$_POST['mau'];
		$chitiet=$_POST['chitiet'];
		$soluong=$_POST['soluong'];
		$khuyenmai1=$_POST['khuyenmai1'];
		$khuyenmai2=$_POST['khuyenmai2'];
	//	$hinhanh=$_POST['hinhanh'];
		$upload_image="../img/uploads/";
		$file_tmp= isset($_FILES['hinhanh']['tmp_name']) ?$_FILES['hinhanh']['tmp_name'] :"";
		$file_name=isset($_FILES['hinhanh']['name']) ?$_FILES['hinhanh']['name'] :"";
		$file_type=isset($_FILES['hinhanh']['type']) ?$_FILES['hinhanh']['type'] :"";
		$file_size=isset($_FILES['hinhanh']['size']) ?$_FILES['hinhanh']['size'] :"";
		$file_error=isset($_FILES['hinhanh']['error']) ?$_FILES['hinhanh']['error'] :"";
		//Lay gio cua he thong
		$dmyhis= date("Y").date("m").date("d").date("H").date("i").date("s");
		//Lay ngay cua he thong
		$ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");
		
		$file__name__=$dmyhis.$file_name;
		move_uploaded_file($file_tmp,$upload_image.$file__name__);
		$madm=$_POST['madm'];
		$idncc=$_POST['idncc'];
		$insert="INSERT INTO sanpham VALUES('','$idncc', '$ten_sanpham', '$file__name__', '$mau', '$chitiet', '$soluong','0', '$gia', '$khuyenmai1', '$khuyenmai2', '$madm', '$ngay')";
		$query=mysqli_query($link,$insert);
		if($query) {
			echo "<p align = center>Thêm sản phẩm thành công!</p>";
			echo '<meta http-equiv="refresh" content="1;url=staff.php?staff=hienthisp">';
		}
			else { echo "Thất bại";
			}
}


		
?>
<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return kiemtra()">
	
      <table>
			<tr class="tieude_themsp">
				<td colspan=2>Thêm Sản Phẩm </td>
			</tr>
    		<tr>
            	<td>Tên SP</td><td><input type="text" name="tensp"/></td>
            </tr>
            <tr>
            	<td>Hình ảnh</td><td><input type="file" name="hinhanh"/></td>
            </tr> 
			<tr>
            	<td>Màu</td><td><input type="text" name="mau"/></td>
            </tr> 
            <tr>
            	<td>Chi tiết</td><td><textarea name="chitiet" id="chitiet"></textarea></td>
            </tr>
			<tr>
            	<td>Số lượng</td><td><input type="text" name="soluong" size="5"/></td>
            </tr>
            <tr>
            	<td>Giá</td><td><input type="text" name="gia"/></td>
            </tr>
			<tr>
            	<td>Giảm giá </td><td><input type="text" name="khuyenmai1" size="1"/> &nbsp %</td>
            </tr>
			<tr>
            	<td>Tặng thêm</td><td><textarea name="khuyenmai2"></textarea></td>
            </tr>
            <tr>
            	<td>Mã DM</td><td>
                	<select name="madm">
                	<option value="">Chọn danh muc</option>
                    <?php
						$show = mysqli_query($link,"SELECT * FROM danhmuc WHERE dequi=0");
						while($show1 = mysqli_fetch_array($show))
						{
							$madm1 = $show1['madm'];	
							$tendm1 = $show1['tendm'];
							echo "<option value='".$madm1."'>".$tendm1."</option>";	
								$show2 = mysqli_query($link,"SELECT * FROM danhmuc WHERE dequi='".$madm1."'");
								while($show3 = mysqli_fetch_array($show2))
								{
									$madm2 = $show3['madm'];	
									$tendm2 = $show3['tendm'];
									echo "<option value='".$madm2."'> - ".$tendm2."</option>";
								}
						}
                	?>
                
                
                </td>
            </tr>
			<tr>
            	<td>ID NCC</td><td>
                	<select name="idncc">
                	<option value="">Chọn danh mục</option>
                    <?php
						$show = mysqli_query($link,"SELECT * FROM nhacungcap");
						while($show1 = mysqli_fetch_array($show))
						{
							$idncc1 = $show1['idncc'];	
							$tenncc1 = $show1['tenncc'];
							echo "<option value='".$idncc1."'>".$tenncc1."</option>";	

						}
                	?>

                </td>
            </tr>
            <tr>
                <td colspan=2 class="input"> <input type="submit" name="submit" value="Thêm" />
                <input type="reset" name="" value="Hủy" /></td>
            </tr>
         </table>  
</form>

<script type="text/javascript" language="javascript">
 
  CKEDITOR.replace( 'chitiet', {
	uiColor: '#d1d1d1'
});
</script>

</body>
</html>

<script language="javascript">
 	function  kiemtra()
	{
	    
		if(frm.tensp.value=="")
	 	{
			alert("Bạn chưa nhập tên SP. Vui lòng kiểm tra lại");
			frm.tensp.focus();
			return false;	
		}
		if(frm.hinhanh.value=="")
		{
			alert("Bạn chưa chọn hình ảnh");	
			frm.hinhanh.focus();
			return false;
		}
		if(frm.soluong.value=="")
		{
			alert("Bạn chưa nhập số lượng");	
			frm.soluong.focus();
			return false;
		}
		if(frm.madm.value=="")
		{
			alert("Bạn chưa chọn danh mục");	
			frm.madm.focus();
			return false;
		}
	}
 </script>