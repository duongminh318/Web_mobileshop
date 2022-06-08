<link rel="stylesheet" href="css/sanpham.css">	
<?php

if(isset($_GET['nv_kho']))
	switch($_GET['nv_kho'])
	{
		case 'hienthidm':
			include ("nvkho_danhmuc.php");
            break;
        case 'chitiethoadon':
            include ("nvkho_chitiethoadon.php");
            break;
        case 'suand':
            include ("nvkho_suand.php");
            break;
        case 'tinhtrang':
            include ("tinhtrang.php");
            break;
        case 'xulysp':
            include ("nvkho_xulysp.php");
            break;
        case 'themsp':
            include ("nvkho_themsp.php");
            break;
        case 'suadm':
            include ("nvkho_suadanhmuc.php");
            break;
        case 'themdm':
            include ("them_danhmuc.php");
            break;    
        case 'nhaphang':
            include ("nvkho_nhaphang.php");
            break;   
	}
    else 
    {
    ?>
    <div class="quanlysp">
	    <h2>NHÂN VIÊN KHO</h2>
	</div>
    
    <?php
    }
    ?>


	