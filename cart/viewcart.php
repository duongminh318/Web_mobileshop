
 <div class="cart">

 <h2>Giỏ hàng</h2>
 <?php
  
    if(isset($_SESSION['cart']))
    $count=count($_SESSION['cart']);
    else $count=0;
    $tongtien=0;
    if($count==0)
    echo "Giỏ hàng của bạn chưa có sản phẩm nào";
    else
   {
    ?>
   
<table>
<tr class="tieudecart"><hr>
    <td><b>Sản phẩm</b></td>
    <td><b>Giá</b></td>
    <td><b>Số lượng</b></td>
    <td><b>Tùy chọn</b></td>
</tr>
<?php

   $sql ="select * from sanpham where idsp in(";
        foreach($_SESSION['cart'] as $stt => $soluong)
            {
              if($soluong>0)
                $sql .= $stt.",";
            }
            if (substr($sql,-1,1)==',')
            {
                $sql = substr($sql,0,-1);
            }
      $sql .=' )order by idsp DESC';
      $rows=mysqli_query($link,$sql);
while($row=mysqli_fetch_array($rows))
{
?>
 

<form action="index.php?content=cart&action=update&idsp=<?php echo $row['idsp']?>" method="POST" name="update">
<tr class="sanphamcart">
    <td>
        <p class="carta">
            <a href="index.php?content=chitietsp&idsp=<?php echo $row['idsp'] ?>"><?php echo $row['tensp']?></a>
        </p>
    </td>
    <td>
        <?php echo number_format(($row['gia']*((100-$row['khuyenmai1'])/100)),0,",",".");?>
    </td>
    <td>
        <input type="text" name="sl" min="1" value="<?php echo $_SESSION['cart'][$row['idsp']] ?>" style="width:30px;"/>
    </td>

    <td> 
        <p class="xoa"><input type="submit" name="huy" value="Xóa"/>
            <input type="submit" class="submit" value="cập nhập" name="submit"/>

        </p>
    </td>
</tr>
<?php $tongtien+=$_SESSION['cart'][$row['idsp']]*($row['gia']*((100-$row['khuyenmai1'])/100)); ?>
<?php
}
?>

</table>
</form>
<div class="xoatoanbo"><hr>
    <h2>Tổng giỏ hàng</h2>
	<p>Tạm tính: <span><?php  echo number_format($tongtien,0,",",".") ?></span>VNĐ</p>
</div>
<div class="tieptucmuahang"><hr>
	<p class="tieptucmuahangcon"><a href="index.php">Tiếp tục mua hàng  </a></p>
    <p class="thanhtoancon"><a href="index.php?content=cart&action=check">Thanh toán</a></p>
</div>
<?php
}
?>
</div>