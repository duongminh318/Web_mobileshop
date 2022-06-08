					

   
		<?php 
	   $sql="select * from danhmuc where dequi=1 order by madm";
	   $result=mysqli_query($link, $sql);
	
	 
	    while($row=mysqli_fetch_array($result))
		{ 
		?> 	<div class="sanpham"> <?php 
			$sql1="select * from sanpham where madm={$row['madm']} order by idsp  LIMIT 0,6";
			$kq=mysqli_query($link, $sql1);
			$dem = mysqli_num_rows($kq);
			if($dem>0)
			{
			?>
				
		<h2><?php echo $row["tendm"];?></h2> 
			<div id="xemthem">
				<p><a href="index.php?madm=<?php echo $row['madm']?>">Xem thêm</a></p>
			</div>
		<?php } ?>
    	<div class="sanphamcon">
			<?php while($rows=mysqli_fetch_array($kq))
			{ ?>
			<div class="dienthoai">
									<?php 
										if($rows['khuyenmai1']>0)
										{
									?>
									<div class="moi"><h3>-<?php echo $rows['khuyenmai1']?>%</h3></div>
									<?php } ?>
									<a href="index.php?content=chitietsp&idsp=<?php echo $rows['idsp'] ?>"><img  src="img/uploads/<?php echo $rows['hinhanh'];?>"></a><br>					
									<p><a href="index.php?content=chitietsp&idsp=<?php echo $rows['idsp'] ?>" ><?php echo $rows['tensp'];?></a></p><br>
									<h4><?php echo number_format(($rows['gia']*((100-$rows['khuyenmai1'])/100)),0,",",".");?></h4>
									<div class="button">
										<ul>
											<li>
												<h1><a href="index.php?content=chitietsp&idsp=<?php echo $rows['idsp'] ?>" class="chitiet"><button>Chi tiết</button></a></h1>
											</li>
											<li>
												<h5><a href="index.php?content=cart&action=add&idsp=<?php echo $rows['idsp'] ?>"><button>Cho vào giỏ</button></a></h5>
											</li>
										</ul>
									</div><!-- End .button-->
			</div><!-- End .dienthoai-->
			
			<?php } ?>
			
		</div>
		</div><!-- end san pham-->
<?php }?>