<?php include_once('../_header.php'); ?>
<!-- Header title -->
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Data Dokter</h1>
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
                <a href="add.php" class="btn btn-sm btn-outline-success"><i class="fa-solid fa-circle-plus"></i>&nbsp;Tambah Data Dokter</a>
            </div>
            <!-- button process end -->
        </div>
    </div>
</div>
<div class="container">
    <form action="" method="post" name="proses">
        <div class="table-responsive-sm">
            <table class="table table-striped" id="dataTable">
                <thead class="table-primary">
                    <tr>
                        <th class="align-middle">No.</th>
                        <th class="align-middle">Nama Dokter</th>
                        <th class="align-middle">Spesialis Dokter</th>
                        <th class="align-middle">Alamat Dokter</th>
                        <th class="align-middle">Nomor Telphon</th>
                        <th>
                            <div style="float: left; margin-left: 5%">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onclick="selectAll()" type="radio" name="radio_check" id="flexRadioDefault1">
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Select All
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" onclick="deselectAll()" type="radio" name="radio_check" id="flexRadioDefault2" checked>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Clear
                                    </label>
                                </div>
                            </div>
                        </th>
                        <th class="text-center align-middle"><i class="fa-solid fa-gears"></i></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die(mysqli_error($con));
                    if (mysqli_num_rows($sql_dokter) > 0) {
                        while ($data = mysqli_fetch_array($sql_dokter)) { ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $data['nama_dokter']; ?></td>
                                <td><?= $data['spesialis']; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><?= $data['no_telp']; ?></td>
                                <td>
                                    <div class="form-check">
                                        <input style="float: left; margin-left: 30%" name="checked[]" class="form-check-input" type="checkbox" value="<?= $data['id_dokter']; ?>" id="cityCheck">
                                    </div>
                                </td>
                                <td style="text-align: center; width: 100px;">
                                    <a href="edit.php?id=<?= $data['id_dokter']; ?>" class="btn btn-sm btn-outline-warning"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</a>
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
    <div class="d-grid d-md-flex gap-3 justify-content-md-end">
        <button class="btn btn-sm btn-outline-danger" id="btnDelete"><i class=" fa-regular fa-trash-can"></i>&nbsp;Hapus Data</button>
    </div>
</div>
<script>
    // $(document).ready(function() {
    //     $("#dokter").DataTable();
    // });
    // function for button delete
    var btnDelete = document.getElementById("btnDelete");

    function prosesDel() {
        var conf = confirm("Apakah hapus data?");
        if (conf) {
            document.proses.action = "del.php";
            document.proses.submit();
        }
    }
    btnDelete.addEventListener("click", prosesDel);
</script>

<?php include_once('../_footer.php'); ?>