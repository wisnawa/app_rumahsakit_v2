<?php
require_once "_config/config.php";

// load UUID files
require "_assets/libs/vendor/autoload.php";

if (!isset($_SESSION['user'])) {
  echo "<script>window.location='" . base_url('auth/login.php') . "'</script>";
}; ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />

  <!-- offline bootstrap 5 -->
  <link rel="stylesheet" href="<?= base_url(); ?>/_assets/css/bootstrap.min.css">
  <!-- offline fontawesome 6 -->
  <link rel="stylesheet" href="<?= base_url(); ?>/_assets/fontawesome-6.2.1/css/all.min.css">

  <!-- cdn datatable -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" />


  <!-- coba offline datatable -->
  <!-- <link rel="stylesheet" href="<?= base_url('_assets/libs/DataTables/datatables.min.css'); ?>"> -->

  <!-- cdn ckeditor -->
  <!-- <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script> -->

  <!-- offline ckeditor -->
  <script src="<?= base_url(); ?>/_assets/libs/vendor/ckeditor/ckeditor/ckeditor.js"></script>

  <!-- my style css -->
  <link rel="stylesheet" href="<?= base_url('style.css'); ?>">

  <title></title>

</head>

<body>
  <!-- navbar start -->
  <div class="container" style="margin-bottom: 120px;">
    <nav class=" navbar bg-body-tertiary fixed-top">
      <div class="container">
        <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-custom-class="custom-tooltip" data-bs-title="Menu navbar">
          <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <span class="navbar-toggler-icon"></span>
          </button>
        </span>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dashboard'); ?>">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('pasien'); ?>">Data Pasien</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('dokter'); ?>">Data Dokter</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('poliklinik'); ?>">Data Poliklinik</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('obat'); ?>">Data Obat</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('rekammedis'); ?>">Rekam Medis</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="<?= base_url('auth/logout.php'); ?>">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- navbar end -->