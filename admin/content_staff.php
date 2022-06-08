<link rel="stylesheet" href="css/sanpham.css">	
<?php

if(isset($_GET['staff']))
	switch($_GET['staff'])
	{
		case 'hienthisp':
			include ("staff_sanpham.php");
            break;
        case 'hienthidm':
            include ("staff_danhmuc.php");
            break;
        case 'hienthidt':
            include ("staff_doanhthu.php");
            break;
        case 'suand':
            include ("staff_sua_nvbh.php");
            break;
        case 'themdm':
            include ("staff_themdanhmuc.php");
            break;
        case 'suadm':
            include ("staff_suadanhmuc.php");
            break;
        case 'suatt':
            include ("staff_suatt.php");
            break;
        case 'themsp':
            include ("staff_themsp.php");
            break;
        case 'suasp':
            include ("staff_suasp.php");
             break;
        case 'xulyht':
            include ("staff_xulyht.php");
            break;
        case 'xulysp':
            include ("staff_xulysp.php");
            break;
        case 'themtt':
            include ("staff_themtt.php");
            break;
        case 'xulytt':
            include ("staff_xulytt.php");
            break;
	}
    else 
    {
    ?>
    <div class="quanlysp">
	    <h2>NHÂN VIÊN BÁN HÀNG</h3>
	</div>
    
    <?php
    }
    ?>


	