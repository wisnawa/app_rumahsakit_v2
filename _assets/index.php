<?php
require_once "../_config/config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Bootstrap demo</title>

  <!-- offline bootstrap 5 -->
  <link rel="stylesheet" href="<?= base_url(); ?>/_assets/css/bootstrap.min.css">
  <!-- offline fontawesome 6 -->
  <link rel="stylesheet" href="<?= base_url(); ?>/_assets/fontawesome-6.2.1/css/all.min.css">

  <!-- cdn datatable -->
  <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" /> -->
  <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" /> -->

  <!-- offline datatable -->
  <link rel="stylesheet" href="<?= base_url(); ?>/_assets/DataTables/css/dataTables.bootstrap5.min.css">

</head>

<body>
  <!-- navbar start -->
  <div class="container" style="margin-bottom: 120px;">
    <nav class="navbar bg-body-tertiary fixed-top">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Aplikasi Rumah Sakit</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Dropdown
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Action</a></li>
                  <li><a class="dropdown-item" href="#">Another action</a></li>
                  <li>
                    <hr class="dropdown-divider">
                  </li>
                  <li><a class="dropdown-item" href="#">Something else here</a></li>
                </ul>
              </li>
            </ul>
            <form class="d-flex mt-3" role="search">
              <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
  </div>
  <!-- navbar end -->

  <!-- offline script js bootstrap 5 -->
  <script src="<?= base_url(); ?>/_assets/js/bootstrap.bundle.min.js"></script>

  <!-- online cdn datatable -->
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> -->
  <!-- <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> -->
  <!-- <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script> -->

  <!-- offline datatable -->
  <script src="<?= base_url(); ?>/_assets/DataTables/js/jquery-3.5.1.js"></script>
  <script src="<?= base_url(); ?>/_assets/DataTables/js/jquery.dataTables.min.js"></script>
  <script src="<?= base_url(); ?>/_assets/DataTables/js/dataTables.bootstrap5.min.js"></script>
  <script src="<?= base_url(); ?>/_assets/DataTables/js/my-script.js"></script>
</body>

</html>