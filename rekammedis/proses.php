<?php
require_once "../_config/config.php";
// load UUID files
require "../_assets/libs/vendor/autoload.php";
// kita menggunakan UUID version 4
use Ramsey\Uuid\Uuid;

// $uuid = Uuid::uuid4();
// echo $uuid->toString();
// echo "<br>";
// jagan pergunakan code dibawah ini tidak diperlukan lagi
// printf(
//     "UUID: %s\nVersion: %d\n",
//     $uuid->toString(),
//     $uuid->getFields()->getVersion()
// );
if (isset($_POST['add'])) {
    $uuid = Uuid::uuid4()->toString();
    $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    $poli = trim(mysqli_real_escape_string($con, $_POST['poli']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));

    mysqli_query($con, "INSERT INTO tb_rekammedis (`id_rm`, `id_pasien`, `keluhan`, `id_dokter`, `diagnosa`, `id_poli`, `tgl_periksa`) VALUES ('$uuid', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$poli', '$tgl')") or die(mysqli_error($con));

    $obat = $_POST['obat'];
    foreach ($obat as $ob) {
        mysqli_query($con, "INSERT INTO tb_rm_obat (`id_rm`, `id_obat`) VALUES ('$uuid', '$ob')") or die(mysqli_error($con));
    }

    echo "<script>window.location='data.php';</script>";
} elseif (isset($_POST['edit'])) {
    $id = $_POST['id'];
    $pasien = trim(mysqli_real_escape_string($con, $_POST['pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    $poli = trim(mysqli_real_escape_string($con, $_POST['poli']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl']));
    mysqli_query($con, "UPDATE tb_rekammedis SET `id_pasien` = '$pasien', `keluhan` = '$keluhan', `id_dokter` = '$dokter', `diagnosa` = '$diagnosa', `id_poli` = '$poli', `tgl_periksa` = '$tgl' WHERE `id_rm` = '$id'") or die(mysqli_error($con));


    // $obat_edit = $_POST['obat_edit'];
    // foreach ($obat_edit as $ob) {
    //     // $id = $_POST['id'];
    //     mysqli_query($con, "UPDATE tb_rm_obat SET `id_rm` = '$id', `id_obat` = '$ob' WHERE `id_rm` = '$id'") or die(mysqli_error($con));
    // }

    echo "<script>window.location='data.php';</script>";
}
