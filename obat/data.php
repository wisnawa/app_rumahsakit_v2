<?php include_once('../_header.php'); ?>
<!-- Header title -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Data Obat</h1>
            <p>Selamat Datang <span style="font-weight: bold; text-transform: capitalize;"><?= $_SESSION['user']; ?></span> Pengguna Rekam Medis</p>
        </div>
    </div>
</div>
<div class="container">
    <!-- function pencarian -->
    <div class="row">
        <div class="col-6">
            <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="button-addon1" autofocus>
                    <button class="btn btn-outline-primary" type="submit" id="button-addon1"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
        </div>
        <div class="col-6">
            <!-- button process start -->
            <div class="d-grid gap-3 d-md-flex justify-content-md-end mb-2">
                <button id="btnRefresh" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-arrows-rotate"></i>&nbsp;Refresh</button>
                <a href="add.php" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-circle-plus"></i>&nbsp;Tambah Data Obat</a>
            </div>
            <!-- button process end -->
        </div>
    </div>
</div>
<div class="container">
    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No.</th>
                    <th>Nama Obat</th>
                    <th>Keterangan</th>
                    <th colspan="2" class="text-center"><i class="fa-solid fa-gears"></i></th>
                </tr>
            </thead>
            <?php
            $batas = 5;
            $hal = @$_GET['hal'];
            if (empty($hal)) {
                $posisi = 0;
                $hal = 1;
            } else {
                $posisi = ($hal - 1) * $batas;
            };
            $no = 1;
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $pencarian = trim(mysqli_real_escape_string($con, $_POST['pencarian']));
                if ($pencarian != '') {
                    $sql = "SELECT * FROM tb_obat WHERE nama_obat LIKE '%$pencarian%'";
                    $query = $sql;
                    $queryJml = $sql;
                } else {
                    $query = "SELECT * FROM tb_obat LIMIT $posisi, $batas";
                    $queryJml = "SELECT * FROM tb_obat";
                    $no = $posisi + 1;
                }
            } else {
                $query = "SELECT * FROM tb_obat ORDER BY `nama_obat` ASC LIMIT $posisi, $batas";
                $queryJml = "SELECT * FROM tb_obat";
                $no = $posisi + 1;
            };
            $sql_obat = mysqli_query($con, $query) or die(mysqli_error($con));
            if (mysqli_num_rows($sql_obat) > 0) {
                while ($data = mysqli_fetch_array($sql_obat)) { ?>
                    <tbody>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $data['nama_obat']; ?></td>
                            <td><?= $data['ket_obat']; ?></td>
                            <td style="text-align: center; width: 100px;">
                                <a href="edit.php?id=<?= $data['id_obat']; ?>" class="btn btn-sm btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
                            </td>
                            <td style="text-align: center; width: 100px;">
                                <a href="del.php?id=<?= $data['id_obat']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Yakin dihapus?')"><i class="fa-regular fa-trash-can"></i>&nbsp;Delete</a>
                            </td>
                        </tr>
                        <tr>
                        <?php }
                } else { ?>
                        <td colspan="4">
                            <div class="alert alert-danger d-flex align-items-center col-10" role="alert">
                                <i class="fa-solid fa-circle-exclamation"></i>&nbsp;
                                <div class="text-uppercase fs-6 fw-bold">Data tidak ditemukan</div>
                            </div>
                        </td>
                        </tr>
                    </tbody>
                <?php } ?>
        </table>
    </div>
    <?php
    if (isset($_POST['pencarian']) == null) { ?>
        <div style="float: left;">
            <?php
            $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
            echo "Jumlah Data: <b>$jml</b>";
            ?>
        </div>
        <div style="float: right;">
            <ul class="pagination pagination-sm" style="margin: 0;">
                <?php
                $jml_hal = ceil($jml / $batas);
                for ($i = 1; $i <= $jml_hal; $i++) {
                    if ($i != $hal) {
                        echo "<li class=\"page-item\" ><a class=\"page-link\" href=\"?hal=$i\">$i</a></li>";
                    } else { ?>
                        <li class="page-item active">
                            <span class="page-link"><?= $i; ?></span>
                        </li>
                <?php };
                };
                ?>
            </ul>
        </div>
    <?php

    } else {
        echo "<div style=\"float: left;\">";
        $jml = mysqli_num_rows(mysqli_query($con, $queryJml));
        echo "Data Hasil Pencarian: <b>$jml</b>";
        echo "</div>";
    } ?>
</div>
<script>
    // function button refresh for event click
    var btnRefresh = document.getElementById("btnRefresh");

    function jalankan() {
        window.location = "data.php";
    }
    btnRefresh.addEventListener("click", jalankan);
</script>

<?php include_once('../_footer.php'); ?>