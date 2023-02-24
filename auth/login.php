<?php
require_once "../_config/config.php";
if (isset($_SESSION['user'])) {
    echo "<script>window.location='" . base_url() . "'</script>";
} else { ?>
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
        <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css" /> -->
        <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css" /> -->

        <!-- offline datatable -->
        <link rel="stylesheet" href="<?= base_url(); ?>/_assets/DataTables/css/dataTables.bootstrap5.min.css">

        <style>
            img {
                width: 130px;
                height: 130px;
                margin-bottom: 4px;
            }
        </style>

        <title>Login User</title>

    </head>

    <body>
        <div class="container" style="margin-top: 150px;">
            <picture>
                <source srcset="<?= base_url(); ?>/_assets/logo/Low_Resolution_Logo-ITS.svg" type="image/svg+xml">
                <img src="<?= base_url(); ?>/_assets/logo/Low_Resolution_Logo-ITS.svg" class="img-fluid mx-auto d-block" alt="LOGO">
            </picture>
            <?php if (isset($_POST['login'])) {
                $user = trim(mysqli_real_escape_string($con, $_POST['user']));
                $pass = sha1(trim(mysqli_real_escape_string($con, $_POST['pass'])));
                $sql_login = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$user' AND `password` = '$pass'") or die(mysqli_error($con));
                if (mysqli_num_rows($sql_login) > 0) {
                    $_SESSION['user'] = $user;
                    echo "<script>window.location='" . base_url() . "'</script>";
                } else { ?>
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-triangle-exclamation"></i>
                                <strong>Login Fail</strong> <span style="color: red;">Wrong Username or Password</span>.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        </div>
                    </div>
            <?php }
            } ?>
            <form action="" method="post">
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <!-- <picture>
                        <source srcset="<?= base_url(); ?>/_assets/logo/Low_Resolution_Logo-ITS.svg" type="image/svg+xml">
                        <img src="<?= base_url(); ?>/_assets/logo/Low_Resolution_Logo-ITS.svg" class="img-fluid mx-auto d-block" alt="LOGO">
                    </picture> -->
                        <div class="input-group flex-nowrap input-group-sm">
                            <span class="input-group-text" id="user_name"><i class="fa-solid fa-user"></i></span>
                            <input type="text" name="user" class="form-control" placeholder="user name" aria-label="Username" aria-describedby="user_name" autocomplete="off" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-sm-5">
                        <div class="input-group flex-nowrap input-group-sm mt-3">
                            <span class="input-group-text" id="password"><i class="fa-solid fa-unlock"></i></span>
                            <input type="password" name="pass" class="form-control" placeholder="input password" aria-label="Username" aria-describedby="password" required>
                        </div>
                    </div>
                </div>
                <!-- button process start -->
                <div class="row justify-content-center mt-2">
                    <div class="col-sm-5 d-grid">
                        <input type="submit" value="Login" name="login" class="btn btn-outline-success btn-sm">
                    </div>
                </div>
            </form>
        </div>

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
<?php }; ?>