<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="<?php echo base_url() ?>assets/img/kkp_logo.png">
    <title>Rekam Kehadiran Pegawai KKP</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminlte/plugins/iCheck/square/blue.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="<?php echo base_url(); ?>">
                <b>SIHARON</b> <br>
                <h4>Sistem Informasi Kehadiran Online
                    <br>
                    <h4><b>Kantor Kesehatan Pelabuhan</b> <br>
                        <h4><b>Kelas II Probolinggo</b></h4>
                    </h4>
                </h4>
            </a>
        </div>
        <!-- /.login-logo -->
        <!-- <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-info"></i> Pehatian!</h4>
            Diinfokan ke seluruh satpam khususnya yang sedang jaga malam untuk mengisi rekam kehadiran 1x pada saat sore/datang dan pagi/pulang.
        </div> -->
        <div class="login-box-body">
            <?php
            $status_login = $this->session->userdata('status_login');
            if (empty($status_login)) {
                $message = "Silahkan login untuk masuk ke aplikasi";
            } else {
                $message = $status_login;
            }
            ?>
            <p class="login-box-msg"><?php echo $message; ?></p>
            <?php echo form_open('Auth/check_login_baru'); ?>
            <div class="form-group has-feedback">
                <input type="number" class="form-control" name="email" required placeholder="Masukan NIP / No. Kontrak">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-has-feedback">
                <div class="input-group has-feedback" id="show_hide_password">
                    <input class="form-control" type="password" required name="password" placeholder="Password">
                    <div class="input-group-addon">
                        <a href=""><i class="fa fa-eye-slash" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <button type='submit' class="btn btn-primary btn-block btn-flat"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</button>
                </div>
                <!-- <div class="col-xs-6">
                <?php echo anchor('#', '<i class="fa fa-eye-slash" aria-hidden="true"></i> Lupa Password', array('class' => 'btn btn-primary btn-block btn-flat')); ?>
                </div> -->
            </div>
            <!-- <a href="<?php echo site_url('Laporan_error') ?>">Klik disini untuk melaporkan kendala/error</a> -->
            <br>
            <!-- /.col -->
            </form>
        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery 3 -->
    <script src="<?php echo base_url(); ?>assets/adminlte/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url(); ?>/assets/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo base_url(); ?>/assets/adminlte/plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
        $("#show_hide_password a").on('click', function(event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("fa-eye-slash");
                $('#show_hide_password i').removeClass("fa-eye");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("fa-eye-slash");
                $('#show_hide_password i').addClass("fa-eye");
            }
        });
    </script>
</body>

</html>