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
                    <th class="text-center align-middle"><i class="fa-solid fa-gears"></i></th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<?php include_once('../_footer.php'); ?>