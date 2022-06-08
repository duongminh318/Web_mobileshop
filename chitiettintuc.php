<?php 

	$matt=$_GET['matt'];
	$select=mysqli_query($link, "select * from tintuc where matt='".$matt."'");
	while($row=mysqli_fetch_array($select))
	{
?>
<div class="chitiettintuc">
	<h3><?php echo $row['tieude'] ?></h3>
	<div class="noidungchitiettintuc">
		<img src="img/tintuc/<?php echo $row['hinhanh']?>" width="200" height="200">
		<p><?php echo $row['ndngan'] ?></p>
	</div>
	<div class="noidungfull">
		<p><?php echo $row['noidung'] ?></p>
		<span>Tác giả: <?php echo $row['tacgia'] ?></span>
	</div>
</div>
<?php } ?>