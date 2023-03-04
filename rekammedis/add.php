<?php
include_once('../_header.php');
// kita menggunakan UUID version 4
// use Ramsey\Uuid\Uuid;

// $uuid = Uuid::uuid4();
// echo $uuid->toString();
// echo "<br>";
// jagan pergunakan code dibawah ini tidak diperlukan lagi
// printf(
//     "UUID: %s\nVersion: %d\n",
//     $uuid->toString(),
//     $uuid->getFields()->getVersion()
// );
?>
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1>Penambahan Data Rekam Medis</h1>
            <p>Selamat Datang <span style="font-weight: bold; text-transform: capitalize;"><?= $_SESSION['user']; ?></span> Pengguna Rekam Medis</p>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="data.php" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Kembali ke data rekam medis"><i class="fa-solid fa-backward"></i>&nbsp;Kembali</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="proses.php" method="post">
                <div class="form-floating mb-3">
                    <select class="form-select" name="pasien" id="floatingSelect" aria-label="Floating label select example" autofocus required>
                        <option value="" selected>-- Pilih --</option>
                        <?php $sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die(mysqli_error($con));
                        while ($data_pasien = mysqli_fetch_array($sql_pasien)) {
                            echo '<option value="' . $data_pasien['id_pasien'] . '">' . $data_pasien['nama_pasien'] . '</option>';
                        } ?>
                    </select>
                    <label for="floatingSelect">Nama Pasien:</label>
                </div>
                <label for="keluhan">Keluhan Penyakit:</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="keluhan" placeholder="Leave a comment here" id="keluhan" style="height: 100px" required></textarea>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="dokter" id="floatingSelect" aria-label="Floating label select example" autofocus required>
                        <option value="" selected>-- Pilih --</option>
                        <?php $sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die(mysqli_error($con));
                        while ($data_dokter = mysqli_fetch_array($sql_dokter)) {
                            echo '<option value="' . $data_dokter['id_dokter'] . '">' . $data_dokter['nama_dokter'] . '&nbsp;' . $data_dokter['spesialis'] . '</option>';
                        } ?>
                    </select>
                    <label for="floatingSelect">Nama Dokter:</label>
                </div>
                <label for="diagnosa">Diagnosa Penyakit:</label>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="diagnosa" placeholder="Leave a comment here" id="diagnosa" style="height: 100px" required></textarea>
                </div>
                <div class="form-floating mb-3">
                    <select class="form-select" name="poli" id="floatingSelect" aria-label="Floating label select example" autofocus required>
                        <option value="" selected>-- Pilih --</option>
                        <?php $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die(mysqli_error($con));
                        while ($data_poli = mysqli_fetch_array($sql_poli)) {
                            echo '<option value="' . $data_poli['id_poli'] . '">' . $data_poli['nama_poli'] . '&nbsp;' . $data_poli['gedung'] . '</option>';
                        } ?>
                    </select>
                    <label for="floatingSelect">Poliklinik:</label>
                </div>
                <div class="mb-3">
                    <select class="form-select" style="height: 50%;" name="obat[]" multiple aria-label="multiple select example" required>
                        <optgroup label="Nama Obat:">
                            <option value="" selected>-- Pilih Multiple --</option>
                            <?php $sql_obat = mysqli_query($con, "SELECT * FROM tb_obat") or die(mysqli_error($con));
                            while ($data_obat = mysqli_fetch_array($sql_obat)) {
                                echo '<option value="' . $data_obat['id_obat'] . '">' . $data_obat['nama_obat'] . '</option>';
                            } ?>
                        </optgroup>
                    </select>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="tgl" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?= date('Y-m-d'); ?>" required>
                    <label for="floatingInput">Tanggal Periksa:</label>
                </div>
                <div class="row justify-content-end">
                    <div class="btn-group d-md-flex col-sm-6" role="group" aria-label="Basic outlined example">
                        <button type="submit" name="add" class="btn btn-sm btn-outline-success"><i class="fa-regular fa-paper-plane"></i>&nbsp;Kirim Data</button>
                        <a href="add.php" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-arrows-rotate"></i>&nbsp;Reset Data</a>
                    </div>
                </div>
            </form>
            <!-- script for online ckeditor -->
            <!-- <script>
                ClassicEditor
                    .create(document.querySelector('#keluhan'))
                    .catch(error => {
                        console.error(error);
                    });
                ClassicEditor
                    .create(document.querySelector('#diagnosa'))
                    .catch(error => {
                        console.error(error);
                    });
            </script> -->

            <!-- script for offline ckeditor  -->
            <script>
                CKEDITOR.replace('keluhan', {
                    uiColor: '#ade8f4',
                });
                CKEDITOR.replace('diagnosa');
            </script>

        </div>
    </div>
</div>
<div style="margin-bottom: 20px;"></div>
<?php include_once('../_footer.php') ?>