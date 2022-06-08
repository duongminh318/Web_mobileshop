
 <div id="danhmucsp">
					<div class="center">
					<h4><i class="fas fa-mobile-alt"></i> ĐIỆN THOẠI</h4>
					<?php 
					   $sql="select * from danhmuc where dequi=1";
					   $result=mysqli_query($link,$sql);
					?>
						<ul>
						<?php 
						   while($row=mysqli_fetch_array($result))
						   {
						?>
							<li><a href="index.php?madm=<?php echo $row['madm'] ?>"><?php echo $row["tendm"];?></a></li>
							<?php } ?>
							
							
						</ul>
					</div><!-- End .center -->
				</div>	<!-- End .menu-left -->
				
				<div id="phukien"> 
					<div class="center2">
						<h4><i class="fas fa-charging-station"></i> PHỤ KIỆN</h4>
						<?php 
					   $sql="select * from danhmuc where dequi=2";
					   $result=mysqli_query($link,$sql);
					?>
						<ul>
						<?php 
						   while($row=mysqli_fetch_array($result))
						   {
						?>
							<li><a href="index.php?madm=<?php echo $row['madm'] ?>"><?php echo $row["tendm"];?></a></li>
							<?php } ?>
							
						</ul>
					</div><!-- End .center -->
				</div><!-- End .phukien -->	
				<div id="timkiem">
					<div class="center1">
						<h4><i class="fas fa-search"></i> Bạn tìm gì... </h4>
							<div id="select">
								<form action="index.php?content=timkiem" method="GET">
								<input type="hidden" name="content" value="timkiem">
								<input type="text" name="timkiem" placeholder="Iphone 11..."/>
								<div id="select2">
									<select name="gia">
										<option value="0"> - Mức giá - </option>
										<option value="1"> Dưới 2 triệu</option>
										<option value="2">Từ 2 - 4 triệu</option>
										<option value="3">Từ 4 - 7 triệu</option>
										<option value="4">Từ 7 - 13 triệu</option>
										<option value="5">Trên 13 triệu</option>
									</select>
									<input type="submit" name="btntk" value="Tìm kiếm" />
								</form>
								</div><!-- End .select2-->
							</div><!-- End .select-->
					
					</div><!-- End .center1-->
				</div><!-- End .timkiem-->			
