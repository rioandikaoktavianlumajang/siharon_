<?php date_default_timezone_set('Asia/Jakarta'); ?>
<style>
    img.zoom {
        -webkit-transition: all .2s ease-in-out;
        -moz-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        -ms-transition: all .2s ease-in-out;
    }

    .transisi {
        -webkit-transform: scale(1.8);
        -moz-transform: scale(1.8);
        -o-transform: scale(1.8);
        transform: scale(1.8);
    }
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">
                            Profil
                        </h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Profil/update_profil/' . $this->session->userdata('nip')); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <center>
                                                <img src="<?php echo base_url() ?>assets/foto_profil/<?php echo $this->session->userdata('foto'); ?>" class="user-image zoom" width="100" alt="User Image">
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">NIP / No. Kontrak</label>
                                            <input type="text" name="nip_no_kontrak" class="form-control input-md" id="" value="<?php echo $this->session->userdata('nip'); ?> " readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Pegawai</label>
                                            <input type="text" name="nama_pegawai" class="form-control" id="" value="<?php echo $this->session->userdata('nama'); ?> ">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Nama Panggilan</label>
                                            <input type="text" placeholder="Masukan Nama Pendek" name="nama_pendek" class="form-control" value="<?php echo $this->session->userdata('nama_pendek'); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Foto Profil</label>
                                            <input type="file" class="" name="images" id="">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Password Baru</label>
                                            <input type="password" value="" placeholder="Masukan Password Baru" name="password_baru" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-11">
                                <button type="submit" class="btn btn-primary btn-center">UPDATE</button>
                            </div>
                        </div>
                    </form>
                    <!-- </div> -->
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(' #example').DataTable();
    });
    $('.zoom').hover(function() {
        $(this).addClass('transisi');
    }, function() {
        $(this).removeClass('transisi');
    });
</script>