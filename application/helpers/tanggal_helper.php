<?php
 
function dateToIndo($date,$short=false){
    $BulanIndo = array("Januari", "Februari", "Maret","April", "Mei", "Juni","Juli", "Agustus", "September","Oktober", "November", "Desember");
 
    $bln_short = array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agust","Sep","Okt","Nop","Des");
 
    $tahun = substr($date, 0, 4);
    $bulan = substr($date, 5, 2);
    $tgl = substr($date, 8, 2);
    $jam = substr($date, 11, 8);
 
    if(!$short){
        $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun." ".$jam;
    }else{
        $result = $tgl . " " . $bln_short[(int)$bulan-1] . " ". $tahun." ".$jam;
    }
 
    return($result);
}


function hari_ini(){
	$hari = date ("D");
 
	switch($hari){
		case 'Sun':
			$hari_ini = "Minggu";
		break;
 
		case 'Mon':			
			$hari_ini = "Senin";
		break;
 
		case 'Tue':
			$hari_ini = "Selasa";
		break;
 
		case 'Wed':
			$hari_ini = "Rabu";
		break;
 
		case 'Thu':
			$hari_ini = "Kamis";
		break;
 
		case 'Fri':
			$hari_ini = "Jumat";
		break;
 
		case 'Sat':
			$hari_ini = "Sabtu";
		break;
		
		default:
			$hari_ini = "Tidak di ketahui";		
		break;
	}
 
	return $hari_ini;
 
}
