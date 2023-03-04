<?php include_once('../_header.php'); ?>
<!-- Header title -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Data Rekam Medis</h1>
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
                <a href="add.php" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-circle-plus"></i>&nbsp;Tambah Data Rekam Medis</a>
            </div>
            <!-- button process end -->
        </div>
    </div>
</div>
<div class="container">
    <div class="table-responsive-sm">
        <table class="table table-striped table-hover" id="rekamMedisTable">
            <thead class="table-primary">
                <tr>
                    <th class="align-middle">No.</th>
                    <th class="align-middle">Tanggal Periksa</th>
                    <th class="align-middle">Nama Pasien</th>
                    <th class="align-middle">Keluhan Penyakit</th>
                    <th class="align-middle">Nama Dokter</th>
                    <th class="align-middle">Diagnosa Penyakit</th>
                    <th class="align-middle">Poliklinik</th>
                    <th class="align-middle">Obat</th>
                    <th class="text-center align-middle"><i class="fa-solid fa-gears"></i></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                $sql_rekammedis = mysqli_query($con, "SELECT * FROM tb_rekammedis 
                INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien 
                INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter 
                INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli") or die(mysqli_error($con));
                if (mysqli_num_rows($sql_rekammedis) > 0) {
                    while ($data = mysqli_fetch_array($sql_rekammedis)) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= tgl_indo($data['tgl_periksa']); ?></td>
                            <td><?= $data['nama_pasien']; ?></td>
                            <td><?= $data['keluhan']; ?></td>
                            <td><?= $data['nama_dokter']; ?></td>
                            <td><?= $data['diagnosa']; ?></td>
                            <td><?= $data['nama_poli']; ?>&nbsp;<?= $data['gedung']; ?></td>
                            <td>
                                <?php $sql_obat = mysqli_query($con, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$data[id_rm]' ") or die(mysqli_error($con));
                                $noUrut = 0;
                                while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                    $noUrut++;
                                    echo $noUrut . ".&nbsp;" . $data_obat['nama_obat'] . "<br>";
                                } ?>
                            </td>
                            <td style="text-align: center; width: 100px;">
                                <a href="edit.php?id=<?= $data['id_rm']; ?>" class="btn btn-sm btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
                                <a href="del.php?id=<?= $data['id_rm']; ?>" class="btn btn-sm btn-outline-danger deleteConf" data-confirm="Yakin akan hapus data!"><i class="fa-regular fa-trash-can"></i>&nbsp;Delete</a>
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
</div>
<script>
    // confirm delete script js dengan a element
    var deleteConfNode = document.querySelectorAll(".deleteConf");

    for (var i = 0; i < deleteConfNode.length; i++) {
        deleteConfNode[i].addEventListener("click", function(event) {
            event.preventDefault();

            var choice = confirm(this.getAttribute("data-confirm"));

            if (choice) {
                window.location.href = this.getAttribute("href");
            }
        });
    }
</script>

<?php include_once('../_footer.php'); ?>