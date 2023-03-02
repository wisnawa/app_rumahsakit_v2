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
                <a href="data.php" class="btn btn-outline-info" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Kembali ke data dokter"><i class="fa-solid fa-backward"></i>&nbsp;Kembali</a>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form action="proses.php" method="post">
                <div class="form-floating mb-3">
                    <select class="form-select" name="pasien" id="floatingSelect" aria-label="Floating label select example" autofocus>
                        <option selected>Open this select menu</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                    </select>
                    <label for="floatingSelect">Nama Pasien:</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea class="form-control" name="keluhan" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Keluhan Penyakit:</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="date" name="tgl" class="form-control" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Tanggal Periksa:</label>
                </div>
                <div class="row justify-content-end">
                    <div class="btn-group d-md-flex col-sm-6" role="group" aria-label="Basic outlined example">
                        <button type="submit" name="add" class="btn btn-sm btn-outline-success"><i class="fa-regular fa-paper-plane"></i>&nbsp;Kirim Data</button>
                        <a href="add.php" class="btn btn-sm btn-outline-warning"><i class="fa-solid fa-arrows-rotate"></i>&nbsp;Reset Data</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<div style="margin-bottom: 20px;"></div>
<?php include_once('../_footer.php') ?>