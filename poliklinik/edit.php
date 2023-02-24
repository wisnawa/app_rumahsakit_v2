<?php
$chk = $_POST['checked'];
if (!isset($chk)) {
    echo "<script>alert('Tidak ada data yang dipilih!'); window.location= 'data.php';</script>";
} else {
    include_once('../_header.php');
?>
    <!-- Header title -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1>Data Poliklinik</h1>
                <p>Selamat Datang <span style="font-weight: bold; text-transform: capitalize;"><?= $_SESSION['user']; ?></span> Pengguna Rekam Medis</p>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="proses.php" method="post">
            <input type="hidden" name="total" value="<?= @$_POST['count_add']; ?>">
            <div class="table-table-responsive-sm">
                <table class="table table-striped table-hover">
                    <thead class="table-primary">
                        <tr>
                            <th>#</th>
                            <th>Nama Poliklinik</th>
                            <th>Area Gedung</th>
                        </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($chk as $id) {
                        $sql_poli = mysqli_query($con, "SELECT * FROM `tb_poliklinik` WHERE `id_poli` = '$id'") or die(mysqli_error($con));
                        while ($data = mysqli_fetch_array($sql_poli)) { ?>
                            <tbody>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td>
                                        <input type="hidden" name="id[]" value="<?= $data['id_poli']; ?>">
                                        <input class="form-control form-control-sm" type="text" name="nama[]" value="<?= $data['nama_poli']; ?>" aria-label="form-control-sm" required autofocus>
                                    </td>
                                    <td>
                                        <input class="form-control form-control-sm" type="text" name="gedung[]" value="<?= $data['gedung']; ?>" aria-label="form-control-sm" required>
                                    </td>
                                </tr>
                            </tbody>
                    <?php
                        }
                    } ?>
                </table>
                <div class="d-grid d-md-flex gap-3 justify-content-end">
                    <button type="submit" name="edit" class="btn btn-sm btn-outline-success"><i class="fa-regular fa-paper-plane"></i>&nbsp;Sending Data</button>
                    <button type="button" id="btnCancel" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-xmark"></i>&nbsp;Cancell</button>
                </div>
            </div>
        </form>
    </div>
<?php } ?>
<script>
    // function for cancle process
    var btnCancel = document.getElementById("btnCancel");

    function prosesCancel() {
        window.location = "data.php";
    }
    btnCancel.addEventListener("click", prosesCancel);
</script>
<?php include_once('../_footer.php') ?>