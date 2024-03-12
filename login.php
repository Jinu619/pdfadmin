<?php
include("common/includes/constants.php");
include("common/includes/mysqli_function.php");
include("common/includes/functions.php");
include("common/includes/common.php");
include("common/includes/admin_session.php");
include("common/includes/allstripslashes.php");

if ($_SESSION['SESS_STU_ADMINID']) {
    header("location:index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>PDF READER | LOGIN</title>
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.jpg">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="assets/plugins/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<style>
    .swal2-popup-error {
        background-color: red !important;
        /* Set background color to red */
    }

    .swal2-popup-success {
        background-color: #198754 !important;
        /* Set background color to red */
    }

    .swal2-title-white {
        color: white !important;
        /* Set text color to white */
    }
</style>

<body class="account-page">
    <div class="main-wrapper">
        <div class="account-content">
            <div class="login-wrapper">
                <div class="login-content">
                    <div class="login-userset">
                        <div class="login-logo">
                            <img src="assets/img/logo.png" alt="img">
                        </div>
                        <div class="login-userheading">
                            <h3>Sign In</h3>
                            <h4>Please login to your account</h4>
                        </div>
                        <form action="login_validate.php" method="POST">
                            <div class="form-login">
                                <label>User Name</label>
                                <div class="form-addons">
                                    <input type="text" placeholder="Enter your user name" name="username">
                                    <img src="assets/img/icons/users1.svg" alt="img">
                                </div>
                            </div>
                            <div class="form-login">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class="pass-input" placeholder="Enter your password" name="password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                            <!-- <div class="form-login">
                            <div class="alreadyuser">
                                <h4><a href="forgetpassword.html" class="hover-a">Forgot Password?</a></h4>
                            </div>
                        </div> -->
                            <div class="form-login">
                                <button class="btn btn-login" type="submit">Sign In</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="login-img">
                    <img src="assets/img/login.jpg" alt="img">
                </div>
            </div>
        </div>
    </div>


    <script src="assets/js/jquery-3.6.0.min.js"></script>

    <script src="assets/js/feather.min.js"></script>

    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/script.js"></script>

    <script src="assets/plugins/sweetalert/sweetalert2.all.min.js"></script>
    <script src="assets/plugins/sweetalert/sweetalerts.min.js"></script>

    <?php
    if ($_SESSION['errors']) { ?>
        <script>
            var errorMsg = <?php echo json_encode($_SESSION['errors']); ?>;
            Swal.fire({
                position: "top-end",
                type: "error",
                title: errorMsg,
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    popup: 'swal2-popup-error', // Define your custom class
                    title: 'swal2-title-white' // Define your custom class for title
                },
                buttonsStyling: false
            });
        </script>
    <?php
        $_SESSION['errors'] = '';
    }
    ?>

    <?php if ($_SESSION['success']) { ?>
        <script>
            var errorMsg = <?php echo json_encode($_SESSION['success']); ?>;
            Swal.fire({
                position: "top-end",
                type: "error",
                title: errorMsg,
                showConfirmButton: false,
                timer: 1500,
                customClass: {
                    popup: 'swal2-popup-success', // Define your custom class
                    title: 'swal2-title-white' // Define your custom class for title
                },
                buttonsStyling: false
            });
        </script>
    <?php
    }
    $_SESSION['success'] = ''; ?>

</body>

</html>