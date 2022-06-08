 <?php
 include('../include/connect.php');
 include('function/function.php');
		 
 		$idncc=$_POST['idncc'];
		$tensp=$_POST['tensp'];
		$gia=$_POST['gia'];
		$mau=$_POST['mau'];
		$chitiet=$_POST['chitiet'];
		$khuyenmai1=$_POST['khuyenmai1'];
		$khuyenmai2=$_POST['khuyenmai2'];
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
		$idsp=$_GET['idsp'];
		if($_FILES['hinhanh']['name'] != "")
		{
		move_uploaded_file($file_tmp,$upload_image.$file__name__);
	   
	$sql_update=("
		UPDATE sanpham SET 
							idncc='$idncc',
							tensp='$tensp',
							soluong='$soluong',
							daban='$daban',
							hinhanh='$file__name__',
							mau='$mau',
							chitiet='$chitiet',
							gia='$gia',
							khuyenmai1='$khuyenmai1',
							khuyenmai2='$khuyenmai2',
							madm='$madm',
						WHERE idsp='$idsp'
	");
	}
    else {
	   	$sql_update=("
		UPDATE sanpham SET 
							idncc='$idncc',
							tensp='$tensp',
							mau='$mau',
							soluong='$soluong',
							daban='$daban',							
							chitiet='$chitiet',
							gia='$gia',
							khuyenmai1='$khuyenmai1',
							khuyenmai2='$khuyenmai2',
							madm='$madm'
						WHERE idsp='$idsp'
	");
	}
	//echo $sql_update;
$update=mysqli_query($link,$sql_update);
		if($update)
{
		redirect("admin.php?admin=hienthisp", "Bạn đã sửa thành công sản phẩm.", 2 );
	}
else {
	redirect ("admin.php?admin=suasp&idsp=$idsp'", "Sửa thất bại", 2);
	}
	
?>
