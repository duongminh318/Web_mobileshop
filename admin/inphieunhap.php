<?php
session_start();
include("../include/connect.php");

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Hóa Đơn Nhập Hàng</title></head>
<body onLoad="window.print()">
<div id="wrapper" style="margin:0 auto; width:500px;">
<table width="100%">
                <!--DWLayoutTable-->
                <tr>
                  <td height="25" valign="top"align="center"><div align="left">
                    <table width="100%">
                      <tbody>
                        <tr>
                          <td width="5" height="95">&nbsp;</td>
                       
                          <td width="343"><table border="0" cellpadding="0" cellspacing="0" width="100%">
                              <tbody>
                                <tr>
                                  <td><table border="0" cellpadding="0" cellspacing="0" width="100%">
                                      <tbody>
                                        <tr>
                                          <td colspan="2"><strong>CỬA HÀNG ĐIỆN THOẠI KHỞI MINH</strong></td>
                                        </tr>
                                        <tr>
                                          <td>Địa chỉ</td>
                                          <td>: NINH KIỀU - CẦN THƠ - VIỆT NAM</td>
                                        </tr>
                                        <tr>
                                          <td width="65">zalo:</td>
                                          <td>: 035 990 8712</td>
                                        </tr>
                                        <tr>
                                          <td>Di Động </td>
                                          <td>: 035 990 8712</td>
                                        </tr>
                                        <tr>
                                          <td>Email</td>
                                          <td>:duongminh318@gmail.com</td>
                                        </tr>
                                      </tbody>
                                  </table></td>
                                </tr>
                              </tbody>
                          </table></td>
                        </tr>
                      </tbody>
                    </table>
                  </div></td>
                </tr>
  <tr>
                  <td width="562" height="25" valign="top"align="center">  <hr>
                    <strong><font color="#FF0000" size="+2">HÓA ĐƠN NHẬP HÀNG</font></strong></td>
  </tr>
                <tr>
                  <td height="54"  >                    
                      <div align="left">
                        <?php		
$sql1="select * from nhacungcap ";
$rows1=mysqli_query($link,$sql1);
$row1=mysqli_fetch_array($rows1);

?>
                        <b>Thông tin Nhà Cung Cấp:</b>                    </div>
              <table width="100%" >
                            <tr>
                              <td width="3%" >&nbsp;</td>
                              <td width="34%" >Họ tên:</td>
                              <td width="63%" >  <?php echo $row1['tenncc'];?>   </td>
                            </tr>
                            <tr>
                              <td >&nbsp;</td>
                              <td >Địa chỉ :</td>
                              <td >   <?php echo $row1['diachi'];?>      </td>
                            </tr>
                            <tr>
                              <td >&nbsp;</td>
                              <td >Điện thoại :</td>
                              <td >   0<?php echo $row1['dienthoai'];?></td>
                            </tr>
                          
                            <tr>
                              <td>&nbsp;</td>
                              <td>Email : </td>
                              <td >    <?php echo $row1['email'];?> </td>
                            </tr>
                    </table>
        <br />
                          <span class="style3"><B>Thông tin về đơn hàng : </B></span>
                          <table width="100%" style="border-collapse:collapse;">
                            <tr>
                              <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">STT</div></td>
                              <td width="30%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tên hàng</div></td>
                              <td width="25%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Giá</div></td>
                              <td width="5%" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Số lượng</div></td>
                              <td width="25%" align="right" bgcolor="#CCCCCC"  align="left" style="border:1px solid green;"><div align="center">Tổng cộng</div></td>
                            </tr>
                          <?php
   $stt=1;
	$tong=0;
	$sql="select * from sanphamnhap ";
	$rows=mysqli_query($link,$sql);
	while($row=mysqli_fetch_array($rows))
	{
		$thanhtien=$row['gia']*$row['soluong'];
	$tong+=$thanhtien;
	
	?>
        <tr>
        <td align="left" style="border:1px solid green;"><?php echo  $stt++?></td>
          <td  align="left" style="border:1px solid green;"><div align="center"><?php echo $row['tensp']?></div></td>
          <td align="center" align="left" style="border:1px solid green;"><?php echo number_format($row['gia'],"0",",",".")?> VNĐ</td>
          <td align="center"  align="left" style="border:1px solid green;"><?php echo $row['soluong']?></td>
          <td align="center" align="left" style="border:1px solid green;"><?php echo number_format($thanhtien,"0",",",".")?> VNĐ</td>
        </tr>
		<?php } ?>   
        <tr style="border:1px solid green;">
          <td colspan="4" align="left"><div align="right">Tổng giá trị đơn hàng:</div></td>
          <td align="right" ><b><?php echo number_format($tong,"0",",",".") ?> VNĐ</b></td>
        </tr>     
		
      </table>
		  
              <table width="452" border="0" align="right">
                            <tr>
                              <td colspan="3"><div align="right"> Ngày <?php echo date("d/m/Y");?></div></td>
                            </tr>
                            <tr>
                              <td><div align="center"><strong>Nhân viên kho</strong></div></td>
                              <td>&nbsp;</td>
                              <td><div align="center"><strong>Khách hàng</strong></div></td>
                            </tr>
                            <tr>
                              <td height="23"><div align="center">(Ký tên +Đóng dấu Công ty)</div></td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                            <tr>
                              <td height="73">&nbsp;</td>
                              <td>&nbsp;</td>
                              <td>&nbsp;</td>
                            </tr>
                           
                          </table>
                    <p>&nbsp;</p>
	                      <p><br>
                                      </p>
                    </td>
                </tr>
              </table>
</div>
</body>
</html>
