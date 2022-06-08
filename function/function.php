
<?php //session_start();
//require("chksession.php");
//*****************************************************************************
//[Modul name]: function.php
//[Purpose]   : Quan ly all function co lien quan toi PHP
//[Date]      : 31.10.05
//[Creator]   : PhongCT+HieuNK+DuongNT
//[Detail]    : Nhung ham khac nam trong trang FunctionJS.js
//******************************************************************************
//==============================================================================================
//********************************************************
//[Creator]   : PhongCT
//********************************************************

function mysqli_result($res,$row=0,$col=0){ 
    $numrows = mysqli_num_rows($res); 
    if ($numrows && $row <= ($numrows-1) && $row >=0){
        mysqli_data_seek($res,$row);
        $resrow = (is_numeric($col)) ? mysqli_fetch_row($res) : mysqli_fetch_assoc($res);
        if (isset($resrow[$col])){
            return $resrow[$col];
        }
    }
    return false;
}
function chuanhoaxau($str)
{
 $len=strlen($str);
 $str=trim($str);
	if($len>0)
	{
		$str=ltrim($str);
		$str=rtrim($str);		
		for($c=1;$c<$len;$c++)
		{
			$str=str_replace("  "," ",$str);		
		}
	return $str;
	}
}  
//********************************************************
//[Creator]   : PhongCT
//********************************************************
function ngaythangnam($namthangngay) // Date : USA -> France  [(0000-00-00) -> (00-00-0000)]
{
	if($namthangngay!="")
	{
	$nam=substr($namthangngay,0,4);
	$thang=substr($namthangngay,5,2);
	$ngay=substr($namthangngay,8,2);
	$ntn=$ngay.'-'.$thang.'-'.$nam;
	}		
	return $ntn;
	
}
//********************************************************
//[Creator]   : PhongCT
//********************************************************
function nam_tn($namthangngay)//year of USA(0000-00-00)
{
	if($namthangngay!="")
	{	$nam=substr($namthangngay,0,4); }
	return $nam;
}
//********************************************************
//[Creator]   : PhongCT
//********************************************************
function namthangngay($ngaythangnam)//Date : France -> USA  [(00-00-0000)->(0000-00-00)]
{
	if($ngaythangnam!="")
	{
	$nam=substr($ngaythangnam,0,2);
	$thang=substr($ngaythangnam,3,2);
	$ngay=substr($ngaythangnam,6,4);
	$ntn=$ngay.'-'.$thang.'-'.$nam;
	}		
	return $ntn;
	
}
//********************************************************
//[Creator]   : PhongCT
//********************************************************
function taomadm($bang,$truongma,$kytudungdau='')
{
	require("dbcon.inc");
	$sql="select * from $bang order by $truongma";
	$tam=0;
	$stt=0;
	$len_kt=strlen($kytudungdau);
	$result = mysqli_query($link,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$stt++;
		$Ma[$stt]=$row["$truongma"];
		
		  $tam=$Ma[$stt];
		  $tam1=$Ma[$stt-1];
		  $ma_phanso=substr($tam,$len_kt);
		  $ma_phanso_1=substr($tam1,$len_kt);
		  	if($ma_phanso_1>$ma_phanso) $ma_phanso=$ma_phanso_1;

		  
		
		
	}
		
			$so=strlen($ma_phanso);
			$ma_phanso++;
				if($stt!=0)
				{
					$so_dacong=strlen($ma_phanso);
					$soluongsokhong=$so-$so_dacong;
					if($soluongsokhong==0) $sau=$kytudungdau.$ma_phanso;
					if($soluongsokhong==1) $sau=$kytudungdau.'0'.$ma_phanso;
					if($soluongsokhong==2) $sau=$kytudungdau.'00'.$ma_phanso;
					if($soluongsokhong==3) $sau=$kytudungdau.'000'.$ma_phanso;			
					if($soluongsokhong==4) $sau=$kytudungdau.'0000'.$ma_phanso;
					if($soluongsokhong==5) $sau=$kytudungdau.'00000'.$ma_phanso;
					if($soluongsokhong==6) $sau=$kytudungdau.'000000'.$ma_phanso;
					if($soluongsokhong==7) $sau=$kytudungdau.'0000000'.$ma_phanso;
					if($soluongsokhong==8) $sau=$kytudungdau.'00000000'.$ma_phanso;
				}
				else
					$sau=$kytudungdau.'00001';
			 return ($sau);
		 mysqli_close();
}

//********************************************************
//[Creator]   : PhongCT
//********************************************************
function identity_int($bang,$truongma)
{
	require("dbcon.inc");
	$sql="select * from $bang order by $truongma";
	$tam=0;
	$stt=0;
	$len_kt=strlen($kytudungdau);
	$result = mysqli_query($link,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$stt++;
		$Ma[$stt]=$row["$truongma"];
		
		  $tam=$Ma[$stt];
		  $tam1=$Ma[$stt-1];
		  	if($tam1>$tam) $tam=$tam1;		
	}
	mysqli_close();
		 $tam++;
			 return ($tam);
		 
}


//********************************************************
//[Creator]   : HieuNK
//********************************************************
function taoma($bang,$truongma)
{
	require("dbcon.inc");
	$sql="select * from $bang order by $truongma";
	$tam=0;
	$result = mysqli_query($link,$sql);
	while($row=mysqli_fetch_array($result))
	{
		$Ma=$row["$truongma"];
		if ($tam<$Ma)
		{
		  $tam=$Ma;
		}
	}
			$i=$tam+1;
			 return ($i);
		 mysql_close();
}
//********************************************************
//[Creator]   : AnhPT
//********************************************************
function redirect($url, $message="", $delay=0) { 
/* redirects to a new URL using meta tags */ 
echo "<meta http-equiv='refresh' content='$delay;URL=$url'>"; 
if (!empty($message)) echo "<div style='font-family: Arial, Sans-serif;
font-size: 14pt;' align=center>$message</div>"; 
exit; 
} 

?>
<?php
//********************************************************
//[Creator]   : AnhPT
//********************************************************
function Doitienrachu($str_nu)
{
		$chuoi_="";
		$spt=strlen($str_nu);
		$strnl=substr($str_nu,$spt);
		//echo $strnl;
		$stt=0;
		for ($i=$spt;$i>=0;$i--)
		{
		$stt=$stt+1;
		$socat[$stt]=substr($str_nu,$i,1);
			switch ($socat[$stt])
			{
			case "1":
				$cb[$stt]="M&#7897;t";
				break;
			case "2":	
				$cb[$stt]="Hai";
				break;
			case "3":	
				$cb[$stt]="Ba";
				break;
			case "4":	
				$cb[$stt]="B&#7889;n";
				break;
			case "5":	
				$cb[$stt]="N&#259;m";
				break;
			case "6":	
				$cb[$stt]="S&aacute;u";
				break;
			case "7":	
				$cb[$stt]="B&#7849;y";
				break;
			case "8":	
				$cb[$stt]="T&aacute;m";
				break;
			case "9":	
				$cb[$stt]="Ch&iacute;n"; 
				break;
			case "0":	
				$cb[$stt]="Kh&ocirc;ng"; 
				break;
			}
		}	
		
		$sd=$stt%3;
		for ($k=$stt;$k>1;$k--)
		{
		$k_=$k-1;
		$sh=$k_/3;
		if ($sh>1&&$sh<=2)
			{
				$dvt_l="Ngh&igrave;n,";   
			}
		if ($sh>2&&$sh<=3)
			{
				$dvt_l="Tri&#7879;u,";
			}
		if ($sh>3&&$sh<=4)
			{
				$dvt_l="T&#7927;,";
			}
		if ($sh<1)
			{
				$dvt_l="";
			}	
			
		$sdr=$k_%3;
		if ($sdr==0)	
			{
				
				if ($socat[$k]==0&&$socat[$k-1]==0&&$socat[$k-2]==0)
				{
					$dvt_n="";
					$cb[$k]="";
				}	
				else	
				$dvt_n="Tr&#259;m";
			}
		if ($sdr==2)
			{
			if ($socat[$k]==1)	
				{
					$cb[$k]="M&#432;&#7901;i";
					$dvt_n="";
				}
			else
			{	
				$dvt_n="M&#432;&#417;i ";
				if ($socat[$k]==0)
				{
					if ($socat[$k-1]!=0)
						{	
							$cb[$k]="Linh";
							$dvt_n="";
							
						}
					else
						{
							$cb[$k]="";
							$dvt_n="";
						}	
						
				}
			}
			}
		if ($sdr==1)
			{
				
				if ($socat[$k]=="4"&&$socat[$k+1]!=1)
				{
					$cb[$k]="T&#432;";
				}
				if ($cb[$k]=="N&#259;m"&&$k!=$stt)
				{
				if ($socat[$k+1]!=0)
					$cb[$k]="L&#259;m";
				}	
				if ($socat[$k]==0)
				{
					$cb[$k]="";
				}
				if (($socat[$k]==0&&$socat[$k+1]==0&&$socat[$k+2]==0))
				
					$dvt_n="";
				else
					$dvt_n=$dvt_l;
				if ($socat[$k]==1&&$socat[$k+1]>=2)
					$cb[$k]="M&#7889;t";		
				}
				if ($k!=$stt)
					{
					$cb[$k]=strtolower($cb[$k]);
					}
				else
					{
					$cb[$k]=$cb[$k];
					}			
				$dvt_n=strtolower($dvt_n);
		?>
		
		<?php 
		$chuoi[$k]=$cb[$k]." ".$dvt_n." ";
		$chuoi_=$chuoi_.$chuoi[$k];
		}
		$chuoi_=trim($chuoi_);
		$chuoi_=substr($chuoi_,0,(strlen($chuoi_)-1));
		$chuoi_=$chuoi_." &#273;&#7891;ng";
		$chuoi_=chuanhoaxau($chuoi_);
		//$chuoi_=strtolower($chuoi_);
	return $chuoi_;
	
} 
//********************************************************
//[Creator]   : PhongCT
//[Detail]	  : Khi ban co duoc ma cua mot ban ghi nao do, ban can phai lay ten cua no ra de hien thi dung khong ?
//				Function nay rat co ich day
// $ten=layten("Ten bang","Ten Truong Can Lay Ra De Hien Thi","Gia Tri Ma De so sanh ","truong ma de so sanh");
//Ngoai ra : 2 tham so phia sau co the co hay khong co cung duoc.
//No de truyen vao gia tri va dieu kien so sanh thu 2.
// $ten=layten(..,);
//********************************************************
function layten($table,$field_ten,$value_ma,$field_ma,$value_ma2="",$field_dieukien2="")
{
require("dbcon.inc");

	if($value_ma2<>"")
		$where___=" and $field_dieukien2='$value_ma2'";
	
$sql___="SELECT $field_ten FROM $table WHERE $field_ma='$value_ma' $where___";
//echo $sql___;
$result______=mysqli_query($link,$sql___);
if(mysqli_num_rows($result______)!=0)
	{
		while($row______=mysqli_fetch_object($result______))	
		{	$ten=$row______->$field_ten; }
		
	}
	return $ten;
}
//********************************************************
?>


