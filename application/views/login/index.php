<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Login | ThemeKit - Admin Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="../favicon.ico" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="../plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="../plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="../plugins/perfect-scrollbar/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="../dist/css/theme.min.css">
    <script src="../src/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>

    <div class="auth-wrapper">
        <div class="container-fluid h-100">
            <div class="row flex-row h-100 bg-white">
                <div class="col-xl-8 col-lg-6 col-md-5 p-0 d-md-block d-lg-block d-sm-none d-none">
                    <div class="lavalite-bg" style="background-image: url(<?= base_url('public/img/auth/login2-bg.jpg') ?>)">
                        <div class="lavalite-overlay"></div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-7 my-auto p-0">
                    <div class="authentication-form mx-auto">
                        <div class="logo-centered">
                            <!-- <a><img src="<?= base_url('public/src/img/brand.svg') ?>" alt=""></a> -->
                        </div>
                        <?php if ($message = $this->session->flashdata('error')) : ?>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert bg-danger alert-danger text-white alert-dismissible fade show" role="alert">
                                        <strong><i class="fa-solid fa-warning fa-beat"></i> <?= $message ?></strong>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <i class="ik ik-x"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
 
                        <?php endif; ?>
                        <h3>Faça Login no Steamo</h3>
                        <p>Feliz em ver você novamente!</p>
                        <form method="post" action="<?= base_url('login/auth') ?>">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required="">
                                <i class="ik ik-user"></i>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required="">
                                <i class="ik ik-lock"></i>
                            </div>
                            <!-- <div class="row">
                                    <div class="col text-left">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="item_checkbox" name="item_checkbox" value="option1">
                                            <span class="custom-control-label">&nbsp;Lembrar-me</span>
                                        </label>
                                    </div>
                                    <div class="col text-right">
                                        <a href="forgot-password.html">Esqueceu sua senha ?</a>
                                    </div>
                                </div> -->
                            <div class="sign-btn text-center">
                                <button class="btn btn-theme">Entrar</button>
                            </div>
                        </form>
                        <!-- <div class="register">
                                <p>Não tem uma conta? <a href="register.html">Registre-se.</a></p>
                            </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>