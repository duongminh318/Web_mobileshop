 <?php
 include('../include/connect.php');
 include('function/function.php');
		$masp=$_POST['masp'];
		$tensp=$_POST['tensp'];
		$gia=$_POST['gia'];
		$chitiet=$_POST['chitiet'];
	   //$hinhanh=$_POST['hinhanh'];
	   
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
		
		$soluong=$_POST['soluong'];
		$daban=$_POST['daban'];
		$madm=$_POST['danhmuc'];
		$stt=$_GET['stt'];
		if($_FILES['hinhanh']['name'] != "")
		{
		move_uploaded_file($file_tmp,$upload_image.$file__name__);
	   
	$sql_update=("
		UPDATE sanpham SET masp='$masp', 
							tensp='$tensp',
							soluong='$soluong',
							daban='$daban',
							hinhanh='$file__name__',
							chitiet='$chitiet',
							gia='$gia',
							madm='$madm'
						WHERE stt='$stt'
	");
	}
    else {
	   	$sql_update=("
		UPDATE sanpham SET masp='$masp', 
							tensp='$tensp',
							soluong='$soluong',
							daban='$daban',
							
							chitiet='$chitiet',
							gia='$gia',
							madm='$madm'
						WHERE stt='$stt'
	");
	}
	//echo $sql_update;
$update=mysql_query($sql_update);
		if($update)
{
		redirect("index.php?admin=hienthisp", "Bạn đã sửa thành công sản phẩm.", 2 );
	}
else {
	redirect ("index.php?admin=suasp&stt=$stt'", "Sửa thất bại", 2);
	}
	
?>
