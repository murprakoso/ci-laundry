<!doctype html>
<html lang="en" class="no-focus">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Login - Almal Laundry</title>
    <meta name="description" content="Prakoso - Membantu Anda menjadi Web Developer Profesional">
    <meta name="author" content="Prakoso">
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" href="<?= base_url('assets/images/favicon.ico'); ?>">
    <!-- Codebase framework -->
    <link rel="stylesheet" id="css-main" href="<?= base_url(); ?>assets/auth/css/codebase.min.css">
    <link href="<?= base_url(); ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>

<body>
    <!-- Page Container -->
    <div id="page-container" class="main-content-boxed">
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('./assets/images/bg-login.jpg');">
                <div class="row mx-0 bg-black-op">
                    <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                        <div class="p-30 invisible" data-toggle="appear">
                            <p class="font-italic text-white-op"> Copyright &copy; <span class="js-year-copy"></span></p>
                        </div>
                    </div>
                    <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                        <div class="content content-full">
                            <!-- Header -->
                            <div class="px-30 py-10">
                                <h1 class="h3 font-w700 mt-30 mb-10">Welcome to Your Dashboard</h1>
                                <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
                            </div> <!-- END Header -->
                            <!-- Sign In Form -->
                            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.js) -->
                            <!-- For more examples you can check out https://github.com/jzaefferer/jquery-validation -->

                            <form class="js-validation-signin px-30" action="<?= base_url(); ?>auth" method="post">

                                <!-- Flash data -->
                                <?php if ($this->session->flashdata('success')) : ?>
                                    <div class="alert alert-success auth mb-0" role="alert"><?= $this->session->flashdata('success'); ?></div>
                                <?php elseif ($this->session->flashdata('error')) : ?>
                                    <div class="alert alert-danger auth mb-0" role="alert"><?= $this->session->flashdata('error'); ?></div>
                                <?php endif; ?>
                                <!-- /.Flashdata -->

                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input type="text" class="form-control" id="login-username" name="username" required>
                                            <label for="login-username">Username</label>
                                            <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <div class="form-material floating">
                                            <input type="password" class="form-control" id="login-password" name="password" required> <label for="login-password">Password</label>
                                            <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-12">
                                        <label class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                            <span class="custom-control-indicator"></span>
                                            <span class="custom-control-description">Remember Me</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-sm btn-hero btn-alt-primary" style="cursor: pointer;">
                                        <i class="fa fa-sign-in mr-10"></i>
                                        Sign In
                                    </button>
                                </div>
                            </form>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                </div>
            </div> <!-- END Page Content -->
        </main> <!-- END Main Container -->
    </div> <!-- END Page Container -->
    <!-- Codebase Core JS -->
    <script src="<?= base_url(); ?>assets/auth/js/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/auth/js/popper.min.js"></script>
    <script src="<?= base_url(); ?>assets/auth/js/bootstrap.min.js"></script>
    <script src="<?= base_url(); ?>assets/auth/js/jquery.slimscroll.min.js"></script>
    <script src="<?= base_url(); ?>assets/auth/js/jquery.scrollLock.min.js"></script>
    <script src="<?= base_url(); ?>assets/auth/js/jquery.appear.min.js"></script>
    <script src="<?= base_url(); ?>assets/auth/js/jquery.countTo.min.js"></script>
    <script src="<?= base_url(); ?>assets/auth/js/js.cookie.min.js"></script>
    <script src="<?= base_url(); ?>assets/auth/js/codebase.js"></script>
    <!-- Page JS Plugins -->
    <script src="<?= base_url(); ?>assets/auth/js/jquery.validate.min.js"></script>
    <!-- Page JS Code -->
    <script src="<?= base_url(); ?>assets/auth/js/op_auth_signin.js"></script>
</body>

</html>