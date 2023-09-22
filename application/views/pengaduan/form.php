<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Atlantis Bootstrap 4 Admin Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <link rel="icon" href="<?php echo base_url() ?>/assets/atlantis/assets/img/icon.ico" type="image/x-icon" />

    <!-- Fonts and icons -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
        WebFont.load({
            google: {
                "families": ["Lato:300,400,700,900"]
            },
            custom: {
                "families": ["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"],
                urls: ['<?php echo base_url() ?>/assets/atlantis/assets/css/fonts.min.css']
            },
            active: function() {
                sessionStorage.fonts = true;
            }
        });

        function showDiv(divId, element) {
            document.getElementById(divId).style.display = element.value == 1 ? 'block' : 'none';
        }
    </script>

    <style>
        #hidden_div {
            display: none;
        }
    </style>

    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/atlantis/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/atlantis/assets/css/atlantis2.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url() ?>/assets/atlantis/assets/css/demo.css">
</head>

<body>
    <div class="wrapper horizontal-layout-2">

        <div class="main-header" data-background-color="light-blue2">
            <div class="nav-top">
                <div class="container d-flex flex-row">
                    <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon">
                            <i class="icon-menu"></i>
                        </span>
                    </button>
                    <!-- Logo Header -->
                    <a href="<?php echo base_url(); ?>" class="logo d-flex align-items-center">
                        <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/header-logo.png" alt="navbar brand" class="navbar-brand">
                    </a>
                    <!-- End Logo Header -->
                </div>
            </div>
        </div>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <!-- <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-secondary mr-3">
                                        <i class="fa fa-dollar-sign"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">132 <small>Sales</small></a></b></h5>
                                        <small class="text-muted">12 waiting payments</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-success mr-3">
                                        <i class="fa fa-shopping-cart"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">78 <small>Orders</small></a></b></h5>
                                        <small class="text-muted">32 shipped</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-danger mr-3">
                                        <i class="fa fa-users"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">1,352 <small>Members</small></a></b></h5>
                                        <small class="text-muted">163 registered today</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card p-3">
                                <div class="d-flex align-items-center">
                                    <span class="stamp stamp-md bg-warning mr-3">
                                        <i class="fa fa-comment-alt"></i>
                                    </span>
                                    <div>
                                        <h5 class="mb-1"><b><a href="#">132 <small>Comments</small></a></b></h5>
                                        <small class="text-muted">16 waiting</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->
                    <div class="row row-card-no-pd">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head">
                                        <h4 class="card-title">
                                            <center><b><img src="<?php echo base_url() ?>/assets/img/kkp_logo.png" alt="navbar brand" class="navbar-brand" width="10%"></b></center>
                                        </h4>
                                    </div>
                                    <!-- <p class="card-category">
                                        <center><b>Kantor Kesehatan Pelabuhan Kelas II Probolinggo</b></center>
                                    </p> -->
                                </div>
                                <form action="<?php echo site_url('Pengaduan/act_add_pengaduan'); ?>" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="">NAMA LENGKAP<small style="color: red;"><i>*</i></small></label>
                                                    <input type="text" class="form-control" id="" placeholder="Masukkan nama lengkap..." name="nama" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <div class="form-group">
                                                    <label for="">NOMOR TELPON / HP<small style="color: red;"><i>*</i></small></label>
                                                    <input type="text" class="form-control" id="" placeholder="Masukkan nomor telpon/hp..." name="no_telp_hp" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12 col-lg-12">
                                                <div class="form-group">
                                                    <label for="">ALAMAT<small style="color: red;"><i>*</i></small></label>
                                                    <textarea name="alamat" class="form-control" id="" cols="" rows="2" placeholder="Masukkan alamat..." required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">TUJUAN PENGADUAN<small style="color: red;"><i>*</i></small></label>
                                                    <select class="form-control" id="test" required name="tujuan_pengaduan" onchange="showDiv('hidden_div', this)">
                                                        <option value="">Pilih</option>
                                                        <option value="Pelayanan Kapal">Pelayanan Kapal</option>
                                                        <option value="Pelayanan Vaksinasi">Pelayanan Vaksinasi</option>
                                                        <option value="Pelayanan Poliklinik">Pelayanan Poliklinik</option>
                                                        <option value="1">Lainnya...</option>
                                                    </select>
                                                </div>
                                                <div class="form-group" id="hidden_div">
                                                    <input type="text" class="form-control" id="" placeholder="Tujuan pengaduan lainnya..." name="nama" required>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">ISI PENGADUAN<small style="color: red;"><i>*</i></small></label>
                                                    <textarea name="isi_pengaduan" class="form-control" id="" cols="" rows="2" placeholder="Masukkan isi pengaduan..." required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="">SARAN / SOLUSI<small style="color: red;"><i>*</i></small></label>
                                                    <textarea name="saran_solusi" class="form-control" id="" cols="" rows="2" placeholder="Masukkan saran/solusi..." required></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleFormControlFile1">DUKUNGAN DOKUMEN / FOTO <small style="color: red;"><i>*jika ada</i></small></label>
                                                    <input type="file" class="form-control-file" id="" name="images">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <button class="btn btn-md btn-primary" type="submit"><b>KIRIM</b></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div class="copyright ml-auto">
                    @ 2022 <a target="_blank" href="https://kkpprobolinggo.net/">IT KKP Kelas II Probolinggo</a>
                </div>
            </div>
        </footer>
        <div class="quick-sidebar">
            <a href="#" class="close-quick-sidebar">
                <i class="flaticon-cross"></i>
            </a>
            <div class="quick-sidebar-wrapper">
                <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#messages" role="tab" aria-selected="true">Messages</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#tasks" role="tab" aria-selected="false">Tasks</a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#settings" role="tab" aria-selected="false">Settings</a> </li>
                </ul>
                <div class="tab-content mt-3">
                    <div class="tab-chat tab-pane fade show active" id="messages" role="tabpanel">
                        <div class="messages-contact">
                            <div class="quick-wrapper">
                                <div class="quick-scroll scrollbar-outer">
                                    <div class="quick-content contact-content">
                                        <span class="category-title mt-0">Contacts</span>
                                        <div class="avatar-group">
                                            <div class="avatar">
                                                <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                            </div>
                                            <div class="avatar">
                                                <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                            </div>
                                            <div class="avatar">
                                                <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                            </div>
                                            <div class="avatar">
                                                <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                            </div>
                                            <div class="avatar">
                                                <span class="avatar-title rounded-circle border border-white">+</span>
                                            </div>
                                        </div>
                                        <span class="category-title">Recent</span>
                                        <div class="contact-list contact-list-recent">
                                            <div class="user">
                                                <a href="#">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                    </div>
                                                    <div class="user-data">
                                                        <span class="name">Jimmy Denis</span>
                                                        <span class="message">How are you ?</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="user">
                                                <a href="#">
                                                    <div class="avatar avatar-offline">
                                                        <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                    </div>
                                                    <div class="user-data">
                                                        <span class="name">Chad</span>
                                                        <span class="message">Ok, Thanks !</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="user">
                                                <a href="#">
                                                    <div class="avatar avatar-offline">
                                                        <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                    </div>
                                                    <div class="user-data">
                                                        <span class="name">John Doe</span>
                                                        <span class="message">Ready for the meeting today with...</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <span class="category-title">Other Contacts</span>
                                        <div class="contact-list">
                                            <div class="user">
                                                <a href="#">
                                                    <div class="avatar avatar-online">
                                                        <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                    </div>
                                                    <div class="user-data2">
                                                        <span class="name">Jimmy Denis</span>
                                                        <span class="status">Online</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="user">
                                                <a href="#">
                                                    <div class="avatar avatar-offline">
                                                        <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                    </div>
                                                    <div class="user-data2">
                                                        <span class="name">Chad</span>
                                                        <span class="status">Active 2h ago</span>
                                                    </div>
                                                </a>
                                            </div>
                                            <div class="user">
                                                <a href="#">
                                                    <div class="avatar avatar-away">
                                                        <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                                    </div>
                                                    <div class="user-data2">
                                                        <span class="name">Talha</span>
                                                        <span class="status">Away</span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="messages-wrapper">
                            <div class="messages-title">
                                <div class="user">
                                    <div class="avatar avatar-offline float-right ml-2">
                                        <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                    </div>
                                    <span class="name">Chad</span>
                                    <span class="last-active">Active 2h ago</span>
                                </div>
                                <button class="return">
                                    <i class="flaticon-left-arrow-3"></i>
                                </button>
                            </div>
                            <div class="messages-body messages-scroll scrollbar-outer">
                                <div class="message-content-wrapper">
                                    <div class="message message-in">
                                        <div class="avatar avatar-sm">
                                            <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="name">Chad</div>
                                                <div class="content">Hello, Rian</div>
                                            </div>
                                            <div class="date">12.31</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="message-content-wrapper">
                                    <div class="message message-out">
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="content">
                                                    Hello, Chad
                                                </div>
                                            </div>
                                            <div class="message-content">
                                                <div class="content">
                                                    What's up?
                                                </div>
                                            </div>
                                            <div class="date">12.35</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="message-content-wrapper">
                                    <div class="message message-in">
                                        <div class="avatar avatar-sm">
                                            <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="name">Chad</div>
                                                <div class="content">
                                                    Thanks
                                                </div>
                                            </div>
                                            <div class="message-content">
                                                <div class="content">
                                                    When is the deadline of the project we are working on ?
                                                </div>
                                            </div>
                                            <div class="date">13.00</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="message-content-wrapper">
                                    <div class="message message-out">
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="content">
                                                    The deadline is about 2 months away
                                                </div>
                                            </div>
                                            <div class="date">13.10</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="message-content-wrapper">
                                    <div class="message message-in">
                                        <div class="avatar avatar-sm">
                                            <img src="<?php echo base_url() ?>/assets/atlantis/assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="message-body">
                                            <div class="message-content">
                                                <div class="name">Chad</div>
                                                <div class="content">
                                                    Ok, Thanks !
                                                </div>
                                            </div>
                                            <div class="date">13.15</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="messages-form">
                                <div class="messages-form-control">
                                    <input type="text" placeholder="Type here" class="form-control input-pill input-solid message-input">
                                </div>
                                <div class="messages-form-tool">
                                    <a href="#" class="attachment">
                                        <i class="flaticon-file"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tasks" role="tabpanel">
                        <div class="quick-wrapper tasks-wrapper">
                            <div class="tasks-scroll scrollbar-outer">
                                <div class="tasks-content">
                                    <span class="category-title mt-0">Today</span>
                                    <ul class="tasks-list">
                                        <li>
                                            <label class="custom-checkbox custom-control checkbox-secondary">
                                                <input type="checkbox" checked="" class="custom-control-input"><span class="custom-control-label">Planning new project structure</span>
                                                <span class="task-action">
                                                    <a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom-checkbox custom-control checkbox-secondary">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure </span>
                                                <span class="task-action">
                                                    <a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom-checkbox custom-control checkbox-secondary">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Add new Post</span>
                                                <span class="task-action">
                                                    <a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom-checkbox custom-control checkbox-secondary">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Finalise the design proposal</span>
                                                <span class="task-action">
                                                    <a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
                                                </span>
                                            </label>
                                        </li>
                                    </ul>

                                    <span class="category-title">Tomorrow</span>
                                    <ul class="tasks-list">
                                        <li>
                                            <label class="custom-checkbox custom-control checkbox-secondary">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Initialize the project </span>
                                                <span class="task-action">
                                                    <a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom-checkbox custom-control checkbox-secondary">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Create the main structure </span>
                                                <span class="task-action">
                                                    <a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom-checkbox custom-control checkbox-secondary">
                                                <input type="checkbox" class="custom-control-input"><span class="custom-control-label">Updates changes to GitHub </span>
                                                <span class="task-action">
                                                    <a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
                                                </span>
                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom-checkbox custom-control checkbox-secondary">
                                                <input type="checkbox" class="custom-control-input"><span title="This task is too long to be displayed in a normal space!" class="custom-control-label">This task is too long to be displayed in a normal space! </span>
                                                <span class="task-action">
                                                    <a href="#" class="link text-danger">
                                                        <i class="flaticon-interface-5"></i>
                                                    </a>
                                                </span>
                                            </label>
                                        </li>
                                    </ul>

                                    <div class="mt-3">
                                        <div class="btn btn-primary btn-rounded btn-sm">
                                            <span class="btn-label">
                                                <i class="fa fa-plus"></i>
                                            </span>
                                            Add Task
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="settings" role="tabpanel">
                        <div class="quick-wrapper settings-wrapper">
                            <div class="quick-scroll scrollbar-outer">
                                <div class="quick-content settings-content">

                                    <span class="category-title mt-0">General Settings</span>
                                    <ul class="settings-list">
                                        <li>
                                            <span class="item-label">Enable Notifications</span>
                                            <div class="item-control">
                                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                            </div>
                                        </li>
                                        <li>
                                            <span class="item-label">Signin with social media</span>
                                            <div class="item-control">
                                                <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                            </div>
                                        </li>
                                        <li>
                                            <span class="item-label">Backup storage</span>
                                            <div class="item-control">
                                                <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                            </div>
                                        </li>
                                        <li>
                                            <span class="item-label">SMS Alert</span>
                                            <div class="item-control">
                                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                            </div>
                                        </li>
                                    </ul>

                                    <span class="category-title mt-0">Notifications</span>
                                    <ul class="settings-list">
                                        <li>
                                            <span class="item-label">Email Notifications</span>
                                            <div class="item-control">
                                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                            </div>
                                        </li>
                                        <li>
                                            <span class="item-label">New Comments</span>
                                            <div class="item-control">
                                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                            </div>
                                        </li>
                                        <li>
                                            <span class="item-label">Chat Messages</span>
                                            <div class="item-control">
                                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                            </div>
                                        </li>
                                        <li>
                                            <span class="item-label">Project Updates</span>
                                            <div class="item-control">
                                                <input type="checkbox" data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                            </div>
                                        </li>
                                        <li>
                                            <span class="item-label">New Tasks</span>
                                            <div class="item-control">
                                                <input type="checkbox" checked data-toggle="toggle" data-onstyle="primary" data-style="btn-round">
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--   Core JS Files   -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/core/popper.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery UI -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Moment JS -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/moment/moment.min.js"></script>

    <!-- Chart JS -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- Bootstrap Toggle -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

    <!-- Google Maps Plugin -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/gmaps/gmaps.js"></script>

    <!-- Dropzone -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/dropzone/dropzone.min.js"></script>

    <!-- Fullcalendar -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/fullcalendar/fullcalendar.min.js"></script>

    <!-- DateTimePicker -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js"></script>

    <!-- Bootstrap Tagsinput -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>

    <!-- Bootstrap Wizard -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/bootstrap-wizard/bootstrapwizard.js"></script>

    <!-- jQuery Validation -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/jquery.validate/jquery.validate.min.js"></script>

    <!-- Summernote -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/summernote/summernote-bs4.min.js"></script>

    <!-- Select2 -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/select2/select2.full.min.js"></script>

    <!-- Sweet Alert -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Atlantis JS -->
    <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/atlantis2.min.js"></script>

    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <!-- <script src="<?php echo base_url() ?>/assets/atlantis/assets/js/demo.js"></script> -->
</body>

</html>