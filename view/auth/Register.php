<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PPDB Builder | Pendaftaran</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/styles/adminlte.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/styles/navbar-fixed.css">
</head>

<body class="hold-transition register-page" style="font-family: Nunito, sans-serif;">
    <?php require __DIR__ . "/../navbar.php"; ?>
    <div class="register-box">
        <div class="register-logo">
            <a href=""><b>PPDB</b> Builder</a>
        </div>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Pendaftaran Akun</p>

                <form action="submit-register.php" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Nama Lengkap" name="name" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-person-fill"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-card-text"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="bi bi-key-fill"></span>
                            </div>
                        </div>
                    </div>
                    <div class="icheck-primary mt-3">
                        <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                        <label for="agreeTerms">
                            Saya setuju dengan <a href="#">syarat dan ketentuan</a>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block mt-4">Register</button>
                </form>

                <a href="/login.php" class="text-center" style="margin-top: 1rem; display: inline-block;">Saya sudah punya akun</a>
            </div>
            <!-- /.form-box -->
        </div><!-- /.card -->
    </div>
    <!-- /.register-box -->

    <!-- jQuery -->
    <script src="/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="/js/adminlte.min.js"></script>
</body>

</html>