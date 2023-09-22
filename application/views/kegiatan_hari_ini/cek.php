<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<style type="text/css">
    #notifications {
        cursor: pointer;
        position: fixed;
        right: 0px;
        z-index: 9999;
        bottom: 0px;
        margin-bottom: 22px;
        margin-right: 15px;
        min-width: 300px;
        max-width: 800px;
    }

    .hakko {
        /* background-color: #66232b; */
        color: #bebebe;
        font-family: monospace;
        font-size: 20px;
        /* font-style: italic; */
    }
</style>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <?php
                    foreach ($kegiatan as $data_kegiatan) {
                    ?>
                        <div class="box-header">
                            <h3 class="box-title" style="text-align: center;">Kegiatan <?php echo $data_kegiatan->nama . ' tanggal ' . date('d M Y', strtotime($data_kegiatan->tgl)); ?></h3>
                        </div>
                        <div class="box-body">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea name="" id="" class="form-control" disabled cols="" rows="4" placeholder="Isikan Kegiatan Hari Ini Tanggal <?php echo date('d F Y', strtotime(date('Y-m-d'))); ?>"><?php echo $data_kegiatan->kegiatan_hari_ini; ?></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><?php } ?>
                    <div class="box-footer">
                        <div class="col-md-12">
                            <a href="<?php echo site_url('Kegiatan'); ?>" class="btn btn-primary btn-block">KEMBALI</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>