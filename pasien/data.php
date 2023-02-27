<?php include_once('../_header.php'); ?>
<!-- Header title -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Data Pasien</h1>
            <p>Selamat Datang <span style="font-weight: bold; text-transform: capitalize;"><?= $_SESSION['user']; ?></span> Pengguna Rekam Medis</p>
        </div>
    </div>
</div>
<div class="container">
    <!-- function pencarian -->
    <div class="row">
        <div class="col-6">
            <!-- <form action="" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="pencarian" class="form-control" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="button-addon1" autofocus>
                    <button class="btn btn-outline-primary" type="submit" id="button-addon1"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form> -->
        </div>
        <div class="col-6">
            <!-- button process start -->
            <div class="d-grid gap-3 d-md-flex justify-content-md-end mb-2">
                <button id="btnRefresh" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-arrows-rotate"></i>&nbsp;Refresh</button>
                <a href="add.php" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-circle-plus"></i>&nbsp;Tambah Data Pasien</a>
            </div>
            <!-- button process end -->
        </div>
    </div>
</div>
<div class="container">
    <form action="" method="post" name="proses">
        <div class="table-responsive-sm">
            <table class="table table-striped table-hover" id="">
                <thead class="table-primary">
                    <tr>
                        <th class="align-middle">No.</th>
                        <th class="align-middle">No Identitas</th>
                        <th class="align-middle">Nama Pasien</th>
                        <th class="align-middle">Jenis Kelamin</th>
                        <th class="align-middle">Alamat Pasien</th>
                        <th class="align-middle">Nomor Telphon</th>
                        <th class="align-middle"><i class="fa-solid fa-gears"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die(mysqli_error($con));
                    if (mysqli_num_rows($sql_pasien) > 0) {
                        while ($data = mysqli_fetch_array($sql_pasien)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nomor_identitas']; ?></td>
                                <td><?= $data['nomor_identitas']; ?></td>
                                <td><?= $data['nama_pasien']; ?></td>
                                <?php if ($data['jenis_kelamin'] == "L") {
                                    $jenis = "Laki-laki";
                                } elseif ($data['jenis_kelamin'] == "P") {
                                    $jenis = "Perempuan";
                                } ?>
                                <td><?= $jenis; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><?= $data['no_telp']; ?></td>
                                <td>
                                    <div class="form-check">
                                        <input style="float: left; margin-left: 70%" name="checked[]" class="form-check-input" type="checkbox" value="<?= $data['id_poli']; ?>" id="cityCheck">
                                    </div>
                                </td>
                            </tr>
                        <?php }
                    } else { ?>
                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                            <i class="fa-solid fa-circle-exclamation"></i>&nbsp;
                            <div class="text-uppercase fs-6 fw-bold">Data tidak ditemukan, silahkan <a href="add.php" class="alert-link">tambahkan data!</a></div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </form>
    <div class="d-grid d-md-flex gap-3 justify-content-md-end mt-3">
        <button class="btn btn-sm btn-outline-warning" id="btnEdit"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</button>
        <button class="btn btn-sm btn-outline-danger" id="btnDelete"><i class=" fa-regular fa-trash-can"></i>&nbsp;Hapus Data</button>
    </div>
</div>
<?php include_once('../_footer.php'); ?>