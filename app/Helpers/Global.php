<?php 
use App\model\pasien;
use App\model\lokasi;
use App\model\Registrasi1;
//use Session;

function nama_lokasi(){
    $id= Session::get('id_lokasi');
    $data = Lokasi::find($id);
    $nama_lokasi = $data->nm_lokasi;
    return $nama_lokasi;
}

function tgl_indo($tgl){
    $date = date('Y-m-d',strtotime($tgl));
    if($date == '0000-00-00')
        return 'Tanggal Kosong'; 
    $tgl = substr($date, 8, 2);
    $bln = substr($date, 5, 2);
    $thn = substr($date, 0, 4);
 
    switch ($bln) {
        case 1 : {
                $bln = 'Januari';
            }break;
        case 2 : {
                $bln = 'Februari';
            }break;
        case 3 : {
                $bln = 'Maret';
            }break;
        case 4 : {
                $bln = 'April';
            }break;
        case 5 : {
                $bln = 'Mei';
            }break;
        case 6 : {
                $bln = "Juni";
            }break;
        case 7 : {
                $bln = 'Juli';
            }break;
        case 8 : {
                $bln = 'Agustus';
            }break;
        case 9 : {
                $bln = 'September';
            }break;
        case 10 : {
                $bln = 'Oktober';
            }break;
        case 11 : {
                $bln = 'November';
            }break;
        case 12 : {
                $bln = 'Desember';
            }break;
        default: {
                $bln = 'UnKnown';
            }break;
    }
    $hari = date('N', strtotime($date));
    switch ($hari) {
        case 0 : {
                $hari = 'Minggu';
            }break;
        case 1 : {
                $hari = 'Senin';
            }break;
        case 2 : {
                $hari = 'Selasa';
            }break;
        case 3 : {
                $hari = 'Rabu';
            }break;
        case 4 : {
                $hari = 'Kamis';
            }break;
        case 5 : {
                $hari = "Jum'at";
            }break;
        case 6 : {
                $hari = 'Sabtu';
            }break;
        default: {
                $hari = 'UnKnown';
            }break;
    }
  //  $tanggalIndonesia = "Hari ".$hari.", Tanggal ".$tgl . " " . $bln . " " . $thn;
   $tanggalIndonesia = $tgl . " " . $bln . " " . $thn;
    return $tanggalIndonesia;
}

function maxnocm(){
    $q = Pasien::max('nocm');
    $kd = "";
    if($q!="")
    {
        $tmp =((int)$q)+1;
        $d =sprintf("%06s", $tmp);        
        $kd = $d;
    }
    else
    {
        $kd = "000001";
    }   
    return $kd;
}



function hitung_usia($tgl)
    {
        $tgl_lahir = date($tgl);
        $date1 = new DateTime(date('Y-m-d', strtotime($tgl_lahir)));
        $date2 = new DateTime(date('Y-m-d'));
        $interval = $date1->diff($date2);
        $usia = $interval->y." tahun ".$interval->m." bulan ".$interval->d." hari ";
        return $usia;
  }

function rupiah($angka){
    $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
    return $hasil_rupiah;
}

function kekata($x) {
    $x = abs($x);
    $angka = array("", "satu", "dua", "tiga", "empat", "lima",
    "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas");
    $temp = "";
    if ($x <12) {
        $temp = " ". $angka[$x];
    } else if ($x <20) {
        $temp = kekata($x - 10). " belas";
    } else if ($x <100) {
        $temp = kekata($x/10)." puluh". kekata($x % 10);
    } else if ($x <200) {
        $temp = " seratus" . kekata($x - 100);
    } else if ($x <1000) {
        $temp = kekata($x/100) . " ratus" . kekata($x % 100);
    } else if ($x <2000) {
        $temp = " seribu" . kekata($x - 1000);
    } else if ($x <1000000) {
        $temp = kekata($x/1000) . " ribu" . kekata($x % 1000);
    } else if ($x <1000000000) {
        $temp = kekata($x/1000000) . " juta" . kekata($x % 1000000);
    } else if ($x <1000000000000) {
        $temp = kekata($x/1000000000) . " milyar" . kekata(fmod($x,1000000000));
    } else if ($x <1000000000000000) {
        $temp = kekata($x/1000000000000) . " trilyun" . kekata(fmod($x,1000000000000));
    }
        return $temp;
}

function terbilang($x, $style=3) {
    if($x<0) {
        $hasil = "minus ". trim(kekata($x));
    } else {
        $hasil = trim(kekata($x));
    }
    switch ($style) {
        case 1:
            $hasil = strtoupper($hasil);
            break;
        case 2:
            $hasil = strtolower($hasil);
            break;
        case 3:
            $hasil = ucwords($hasil);
            break;
        default:
            $hasil = ucfirst($hasil);
            break;
    }
    return $hasil;
}

function GetPeriode(){
    $th = date("Y");
    $bln = date("m");
    $periode = $th.''.$bln;

    return $periode ;
}

function max_noreg(){
//$periode = $per;
$q = Registrasi1::max('no_registrasi');
$kd = "";
if($q!="")
    {
    $tmp =((int)$q)+1;
    $d =sprintf("%07s", $tmp);        
    $kd = $d;
    $noreg = $kd;
    }
    else
    {
    $noreg = "0000001";
    }   
return $noreg;
}

function kode_item($kode){
    // buat kode Item
 if(!!$kode){
    $tmp = substr($kode,3,4) + 1;
    $kd = sprintf("%04s",$tmp);
 }else{
    $kd = "0001";
 }
 return "KP-".$kd;
}

function kode_jasa($kode){
    // buat kode Item
 if(!!$kode){
    $tmp = substr($kode,4,5) + 1;
    $kd = sprintf("%05s",$tmp);
 }else{
    $kd = "00001";
 }
 return "KJT-".$kd;

}

function nomor_penerimaan($kode){
    // buat kode Item
 if(!!$kode){
    $tmp = substr($kode,4,5) + 1;
    $kd = sprintf("%05s",$tmp);
 }else{
    $kd = "00001";
 }
 return "PMA-".$kd;

}

function nomor_invoice($kode){
    // buat kode Item
 if(!!$kode){
    $tmp = substr($kode,4,6) + 1;
    $kd = sprintf("%06s",$tmp);
 }else{
    $kd = "000001";
 }
 return "INV-".$kd;

}

function nomor_regis($periode,$no_reg){
    $noregis = "REG-".$periode."-".$no_reg;

    return $noregis;
}
