<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Nhập đơn hàng mới</title>
<link rel="stylesheet" href="css/them_sanpham17.css" />
</head>

<body>
<?php
	include '../include/connect.php';

	if(isset($_POST['submit']))
	{
		$gianhap=$_POST['gianhap'];
		$soluong=$_POST['soluongnhap'];
		//Lay gio cua he thong
		$dmyhis= date("Y").date("m").date("d").date("H").date("i").date("s");
		//Lay ngay cua he thong
		$ngay=date("Y").":".date("m").":".date("d").":".date("H").":".date("i").":".date("s");

		$idsp=$_POST['idsp'];
        $insert="INSERT INTO phieunhap VALUES('', '$ngay')";
        $query=mysqli_query($link,$insert);
        $insert1="INSERT INTO chitietphieunhap VALUES('','$idsp', '$soluong','$gianhap')";
		$query1=mysqli_query($link,$insert1);
		if($query) {
			echo "<p align = center>Thêm sản phẩm thành công!</p>";
			echo '<meta http-equiv="refresh" content="1;url=nv_kho.php?nv_kho=hienthidm">';
        }
        elseif ($query1) {
			echo "<p align = center>Thêm sản phẩm thành công!</p>";
			echo '<meta http-equiv="refresh" content="1;url=nv_kho.php?nv_kho=hienthidm">';
        }
			else { echo "Thất bại";
			}
}


		 
?>
<h2>Nhập đơn hàng mới</h2>
<form action="" method="post" enctype="multipart/form-data" name="frm" onsubmit="return kiemtra()"><hr>
                
                <label for="soluong">Số lượng nhập</label>
                <input type="text" id="mau" name="soluongnhap" placeholder="Nhập số lượng...">
				
                <label for="gia">Giá nhập</label>
                <input type="text" id="mau" name="gianhap" placeholder="Nhập số lượng...">

                <label for="idsp">Sản phẩm</label>
				    <select name="idsp" id="madm">
                	    <option value="">Chọn sản phẩm</option>
                            <?php
						        $show = mysqli_query($link,"SELECT tensp FROM sanpham");
						        while($show1 = mysqli_fetch_array($show))
						        {
							    $idsp1 = $show1['idsp'];	
							    $tenncc1 = $show1['tensp'];
							    echo "<option value='".$idncc1."'>".$tenncc1."</option>";	
						        }
                	        ?>   

				<input type="submit" name="submit" value="Thêm" />
                <input type="reset" name="" value="Hủy" /></td>
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