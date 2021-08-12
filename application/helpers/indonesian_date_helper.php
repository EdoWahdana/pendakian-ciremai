<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(!function_exists('indonesian_date')){
    function indonesian_date($date) {
        date_default_timezone_set('Asia/Jakarta');
        $arrayHari = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis", "Jum'at", "Sabtu"];
        $arrayBulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
    
        $tahun = substr($date, 0, 4);
        $bulan = substr($date, 5, 2);
        $tgl = substr($date, 8, 2);
        $hari = date('w', strtotime($date));

        $result = $arrayHari[$hari].", ".$tgl." ".$arrayBulan[$bulan-1]." ".$tahun;
        return $result;
    }
}