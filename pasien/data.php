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
                <a href="import.php" class="btn btn-sm btn-outline-primary"><i class="fa-solid fa-file-import"></i>&nbsp;Import Data Pasien</a>
            </div>
            <!-- button process end -->
        </div>
    </div>
</div>
<div class="container mb-5">
    <form action="" method="post" name="proses">
        <div class="table-responsive-sm">
            <table class="table table-striped table-hover" id="pasienTable">
                <thead class="table-primary">
                    <tr>
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
                    $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die(mysqli_error($con));
                    if (mysqli_num_rows($sql_pasien) > 0) {
                        while ($data = mysqli_fetch_array($sql_pasien)) { ?>
                            <!-- tabel data akan automatis diisi dari datatable server side -->
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
    <!-- <div class="d-grid d-md-flex gap-3 justify-content-md-end mt-3">
        <button class="btn btn-sm btn-outline-warning" id="btnEdit"><i class="fa-regular fa-pen-to-square"></i>&nbsp;Edit</button>
        <button class="btn btn-sm btn-outline-danger" id="btnDelete"><i class=" fa-regular fa-trash-can"></i>&nbsp;Hapus Data</button>
    </div> -->
</div>
<!-- offline script js bootstrap 5 -->
<script src="<?= base_url(); ?>/_assets/js/bootstrap.bundle.min.js"></script>

<!-- online cdn datatable -->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>

<!-- coba offline datatable -->
<script src="<?= base_url('_assets/libs/DataTables/datatables.min.js'); ?>"></script>

<!-- offline myscript -->
<!-- <script src="<?= base_url(); ?>/_assets/MyDataTables/js/my-script.js"></script> -->

<!-- internal script datatable server side -->
<script src="<?= base_url(); ?>/script.js"></script>
<script>
    // datatable server side
    $(document).ready(function() {
        $("#pasienTable").DataTable({
            processing: true,
            serverSide: true,
            ajax: "pasien_data.php",
            // scrollY: '250px',
            dom: 'Bfrtip',
            buttons: [{
                    extend: 'pdf',
                    oriented: 'potrait',
                    pageSize: 'legal',
                    title: 'Data Pasien',
                    download: 'open',
                    className: 'btn btn-danger',
                },
                {
                    extend: 'print',
                    title: 'Data Pasien Rumah Sakit',
                    className: 'btn btn-warning',
                    // className: 'btn btn-primary',
                },
                {
                    extend: 'excel',
                    text: '<span class="fw-bold">Export To Excel</span>',
                    className: 'btn btn-success',
                    title: 'Data Pasien'
                },
                {
                    extend: 'copy',
                    title: 'Data Pasien RS',
                    className: 'btn btn-info',
                },
                'csv',
            ],
            columnDefs: [{
                searchable: false,
                orderable: false,
                targets: [5],
                render: function(data, type, row) {
                    const btn =
                        '<div style="text-align: center"><a href="edit.php?id=' + data + '" class="btn btn-sm btn-outline-warning" style="margin-right: 9px;"><i class="fa-regular fa-pen-to-square"></i>&nbsp;</a><a href="del.php?id=' + data + '" class="btn btn-sm btn-outline-danger" onclick="return confirm(\'Yakin dihapus?\')"><i class="fa-regular fa-trash-can"></i>&nbsp;</a></div>';
                    return btn;
                },
            }, ],
        });
    });
</script>
</body>

</html>