<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

     <!-- Custom fonts for this template -->
    <link href="<?php echo base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

     <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/css/sb-admin-2.min.css" rel="stylesheet">
</head>


<body class="bg-gradient-lavender">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><strong>Masuk Akun!</strong></h1>
                                    </div>  

                                    <!-- apabila Login Gagal -->
                                    <?php echo $this->session->flashdata('pesan'); ?>
                                    
                                    <!-- Tampilan form -->
                                    <form class="user" method="post" action="<?php echo base_url('auth/login') ?>">
                                    
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                placeholder="Username..." name="username">
                                            <?php echo form_error('username', '<div class="text-danger small ml-2">'); ?>
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Password..." name="password">
                                            <?php echo form_error('password', '<div class="text-danger small ml-2">'); ?>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-warning btn-user btn-block text-dark"><strong> Masuk </strong></button>                                        
                                    </form>

									<hr>

                                    <div class="text-center mt-3">
                                        <a class="small text-dark" href="<?php echo base_url('registrasi/index') ?>"><strong>Belum Punya Akun? Daftar!</strong></a>
                                    </div>
	
                                    <div class="text-left mt-3">
                                        <a class="small text-dark" href="<?php echo base_url('main_dashboard') ?>"><strong><span style='font-size:19px;'>&#8678;</span> Kembali </strong></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

	<!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript -->
    <script src="<?php echo base_url() ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

     <!-- Custom scripts for all pages -->
    <script src="<?php echo base_url() ?>assets/js/sb-admin-2.min.js"></script>

     <!-- Page level plugins  -->
    <script src="<?php echo base_url() ?>assets/vendor/chart.js/Chart.min.js"></script>

     <!-- Page level custom scripts  -->
    <script src="<?php echo base_url() ?>assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>
