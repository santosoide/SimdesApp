<!DOCTYPE html>
<html lang="en" data-ng-app="app">
<head>
    <meta charset="utf-8"/>
    <title>Login | SIPKDes - Lombok Tengah</title>
    <meta name="description" content=""/>
    <link rel="icon" type="image/x-icon" href="#" alt=".">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1"/>
    <link rel="stylesheet" href="../css/bootstrap.css" type="text/css"/>
    <link rel="stylesheet" href="../css/animate.css" type="text/css"/>
    <link rel="stylesheet" href="../css/font-awesome.min.css" type="text/css"/>
    <link rel="stylesheet" href="../css/simple-line-icons.css" type="text/css"/>
    <link rel="stylesheet" href="../css/font.css" type="text/css"/>
    <link rel="stylesheet" href="../css/app.css" type="text/css"/>
</head>
<body>
<div class="container w-xxl w-auto-xs">

    <div class="m-b-lg" id="MyDiv" style="display: none;">
        <div class="wrapper text-center">
            <a href="javascript:;" class="thumb-lg">
                <img src="img/logo.png" alt="." class="">
            </a>
        </div>
        <h4 class="text-center">Login - SIPKDes</h4>
        <?php if (\Session::get('login_errors')) { ?>
            <div class="alert alert-danger text-danger alert-dismissable wrapper text-center">
                <h5>E-mail atau password salah, silahkan coba lagi</h5>
            </div>
        <?php } ?>

        <?php if (\Session::get('session_expired')) { ?>
            <div class="alert alert-danger text-danger alert-dismissable wrapper text-center">
                <h5>Session anda telah habis, silahkan login kembali</h5>
            </div>
        <?php } ?>

        <?php if (\Session::get('csrf_invalid')) { ?>
            <div class="alert alert-danger text-danger alert-dismissable wrapper text-center">
                <h5>Token anda sudah tidak valid/kedaluarsa, silahkan login kembali</h5>
            </div>
        <?php } ?>

        <form name="form" class="form-validation" method="post" accept-charset="UTF-8" action="api/v1/auth/post-login">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"/>

            <div class="list-group list-group-sm">
                <div class="list-group-item">
                    <input type="email" placeholder="Email" name="email" class="form-control no-border"
                           autofocus="autofocus"
                           required>
                </div>
                <div class="list-group-item">
                    <input type="password" placeholder="Password" name="password" class="form-control no-border"
                           required>
                </div>
            </div>
            <button type="submit" class="btn btn-lg btn-info btn-block">Log in</button>
        </form>
        <p class="text-center">
            <small class="text-muted">Sistem Informasi Pengelolaan Keuangan Desa<br>
                Kabupaten Lombok Tengah<br>&copy; 2014
            </small>
        </p>
    </div>
</div>

<!-- jQuery -->
<script src="../js/jquery/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $("#MyDiv").fadeIn('slow');
    });
</script>
</body>
</html>