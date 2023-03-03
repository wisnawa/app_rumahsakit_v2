<?php
// setting default timezone area ('Asia/Jakarta'), ('Asia/Jayapura')
date_default_timezone_set('Asia/Makassar');
session_start();

include_once "conn.php";

// connection to database mysql
$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_error()) {
    echo mysqli_connect_error();
}
// function base_url
function base_url($url = null)
{
    $base_url = "http://localhost/app_rumahsakit_v2";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}

// function untuk format tanggal indonesia
function format_month($month)
{
    $indo_month = array(
        '01' => 'Januari',
        '02' => 'Februari',
        '03' => 'Maret',
        '04' => 'April',
        '05' => 'Mei',
        '06' => 'Juni',
        '07' => 'Juli',
        '08' => 'Agustus',
        '09' => 'September',
        '10' => 'Oktober',
        '11' => 'November',
        '12' => 'Desember'
    );
    return $indo_month[$month];
}
function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2); // argument pertama $tgl, diambil dari index ke 8 lalu ambil 2 angka
    $bulan = substr($tgl, 5, 2); // argument pertama $tgl, diambil dari index ke 5 lalu ambil 2 angka 
    $tahun = substr($tgl, 0, 4); // argument pertama $tgl, diambil dari index ke 0 lalu ambil 4 angka
    return $tanggal . "&nbsp;" . format_month($bulan) . "&nbsp;" . $tahun;
}
