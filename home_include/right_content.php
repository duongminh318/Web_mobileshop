 <div id="dangnhap">
					<div class="center1"> 
						<h4><i class="fas fa-user"></i> TÀI KHOẢN</h4>
						<?php if(isset( $_SESSION['username'])){
							?>
							<div class="user">
								<ul>
									<li><a href="index.php?content=suand"><i class="fas fa-user-edit"></i> Cập nhật thông tin</a></li>
									<li><a href="index.php?content=donhang"><i class="far fa-calendar-check"></i> Đơn hàng của bạn</a></li>
									<li><a href="logout.php"><i class="fas fa-sign-out-alt"></i> Đăng xuất</a></li>
								</ul>
							</div>
							<?php
						}
						else{
						?>
						<div id="dangnhap-in">
							<form action="dangnhap.php" method="post">
								<span>
									<p>Tài khoản:</p><br>
									<input type="text" size="15" name="user"><br>
									<p>Mật khẩu:</p><br>
									<input type="password" size="15" name="pass"><br>
								</span>
								<a href="index.php?content=dangnhap"><button name="login">Đăng nhập</button></a><br>
							</form>
							<ul>
								<li><a href="index.php?content=dangky">Đăng ký</a></li>
							</ul>
						</div><!-- End .dangnhap-in-->
						<?php } ?>
					</div><!-- End .center1-->
				</div><!-- End .giohang-->
				<div id="giohang">
					<div class="center1">
						<h4><i class="fas fa-shopping-cart"></i> GIỎ HÀNG</h4>
							<a href="index.php?content=cart"><img src="img/images.png" title="Vào giỏ hàng" width="150" height="100px"></a>
							<?php 
								$tongtien=0;
								if(isset($_SESSION['cart']))
								$count=count($_SESSION['cart']);
								else $count=0;
								if($count==0){
							?>
							<p>Bạn chưa mua sản phẩm nào nha :D </p>
							<?php } 
							else {
							?>
								<p id="soluonggiohang">Có <span><?=$count?></span> sản phẩm trong giỏ</p> 
							 <p id="tiengiohang">
							  <?php $sql ="select * from sanpham where idsp in(";		 
		 foreach($_SESSION['cart'] as $id => $soluong)
			 {
			   if($soluong>0)
				 $sql .= $id.",";
			 }
			 if (substr($sql,-1,1)==',')
			 {
				 $sql = substr($sql,0,-1);
			 }
	   $sql .=' )order by idsp 	';
	   $rows=mysqli_query($link,$sql);
 while ($row=mysqli_fetch_array($rows))
 {  
 $tongtien+=$_SESSION['cart'][$row['idsp']]*$row['gia']; 
 }
 ?> <?php  echo number_format($tongtien,"0",",",".");?> VNĐ
							 </p>
							 
 


          
					<?php } ?>		
							
					</div><!-- End .center1-->
				</div><!-- End .giohang-->
