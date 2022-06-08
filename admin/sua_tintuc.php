<link rel="stylesheet" href="css/them_sanpham17.css">
<?php
		$matt=$_GET['matt'];
        $sql="select * from tintuc where matt='".$_GET['matt']."'";
         $rows=mysqli_query($link,$sql);
         $row=mysqli_fetch_array($rows);
?>
<h2>Sửa tin tức</h2>
<form action="update_tintuc.php?matt=<?php echo $matt;?>" method="post" name="frm" onsubmit="" enctype="multipart/form-data"><hr>
    <div class="dangky">

        <label for="tieude">Tiêu đề</label>
        <input type="text" name="tieude" size="50" value="<?php echo $row['tieude'];?>"/>

        <label for="ndn">Nội dung ngắn</label>
        <textarea name="ndngan" > <?php echo $row['ndngan'];?></textarea>

        <label for="ndct">Nội dung chi tiết</label>
        <textarea name="noidung" id="chitiet"> <?php echo $row['noidung'];?></textarea>

	    <label for="hinhanh">Hình ảnh</label>
        <img src="../img/tintuc/<?=$row['hinhanh']?>" width="80" height="120"/><br /><br /><input type="file" name="hinhanh" />

        <label for="tacgia">Tác giả</label>
        <input type="text" name="tacgia" value="<?php echo $row['tacgia'];?>"/>

        <input type="submit" name="update" value="Update" />
        <input type="reset" name="" value="Hủy" />

    </div>
</form>
<script type="text/javascript" language="javascript">
 
  CKEDITOR.replace( 'chitiet', {
	uiColor: '#d1d1d1'
});
</script>