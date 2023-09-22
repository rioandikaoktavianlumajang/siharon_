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
    <!-- <form method="POST" action="<?php echo site_url('Rekam_ketapang/ubah_nama_foto'); ?>" enctype="multipart/form-data">
        <input type="file" class="" name="images" id=""> <button type="submit" class="btn btn-primary btn-block">REKAM</button>
    </form> -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-warning box-solid">
                    <div class="box-header">
                        <h3 class="box-title" style="text-align: center;">Kehadiran
                            <?php foreach ($jam_kerja as $data_jam_kerja) {
                                echo $data_jam_kerja->wilker;
                            } ?>
                        </h3>
                    </div>
                    <?php foreach ($jam_kerja as $data_jam_kerja) {
                        if ($data_jam_kerja->wilker == 'Satpam Induk/Malang Pagi') { ?>
                            <form class="form-horizontal" method="post" action="<?php echo site_url('Rekam_induk_malang_pagi/rekam'); ?>" enctype="multipart/form-data">
                            <?php } else { ?>
                                <form class="form-horizontal" method="post" action="<?php echo site_url('Rekam_ketapang/rekam'); ?>" enctype="multipart/form-data">
                            <?php }
                    } ?>
                            <div class="box-body">
                                <div class="modal-body">
                                    <div class="row">
                                        <?php foreach ($jam_kerja as $data_jam_kerja) { ?>
                                            <input type="hidden" value="<?php echo $data_jam_kerja->jam_datang ?>" name="jam_kerja_datang">
                                            <input type="hidden" value="<?php echo $data_jam_kerja->jam_pulang ?>" name="jam_kerja_pulang">
                                        <?php } ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">NIP</label>
                                                <input type="text" name="nip_no_kontrak" class="form-control input-md" id="" value="<?php echo $this->session->userdata('nip'); ?> " readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Nama Pegawai</label>
                                                <input type="text" name="nama_pegawai" class="form-control" id="" value="<?php echo $this->session->userdata('nama'); ?> " readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Keterangan</label>
                                                <div class="radio">
                                                    <label>
                                                        <input required type="radio" name="waktu" onclick="myFunctionFalse()" id="" value="datang_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                    echo date('H:i:s'); ?>">
                                                        Datang
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input required type="radio" name="waktu" onclick="myFunctionFalse()" value="pulang_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                            echo date('H:i:s'); ?>">
                                                        Pulang
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input required type="radio" name="waktu" id="izin" onclick="myFunctionFalse()" value="izin_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                    echo date('H:i:s'); ?>">Izin
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input required type="radio" name="waktu" id="sakit" onclick="myFunctionFalse()" value="sakit_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                        echo date('H:i:s'); ?>">Sakit
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input required type="radio" name="waktu" id="" onclick="myFunction()" value="dl_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                            echo date('H:i:s'); ?>">DL (Dinas Luar)
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        $tgl_sekarang = date('Y-m-d'); // pendefinisian tanggal awal
                                        $tgl_besok = date('Y-m-d', strtotime('+1 days', strtotime($tgl_sekarang))); //operasi penjumlahan tanggal sebanyak 6 hari
                                        ?>
                                        <input type="hidden" value="<?php echo $tgl_besok; ?>" name="tanggal_besok">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Lokasi</label>
                                                <select name="wilker" class="form-control select2" style="width: 100%;" id="ddlPassport" onchange="ShowHideDiv()">
                                                    <option onclick="" onchange="" value="">-- PILIH --</option>
                                                    <?php
                                                    foreach ($wilker as $data_wilker) {
                                                    ?>
                                                        <option value="<?php echo $data_wilker->wilker ?>"><?php echo $data_wilker->wilker ?></option>
                                                    <?php } ?>
                                                    <option value="WFH">Bekerja dari Rumah (WFH)</option>
                                                    <option value="Y">Lainnya :</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div id="dvPassport" style="display: none">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <textarea name="keterangan_lainnya" id="txtPassportNumber" class="form-control" cols="" rows="4" placeholder="Lainnya..."></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Foto</label>
                                                <input type="file" class="" name="images" id="myText">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary btn-block">REKAM</button>
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
    $(document).ready(
        function() {
            $(' #example').DataTable();

            function ShowHideDiv() {
                var ddlPassport = document.getElementById("ddlPassport");
                var dvPassport = document.getElementById("dvPassport");
                dvPassport.style.display = ddlPassport.value == "Y" ? "block" : "none";
            }
        });


    function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = ddlPassport.value == "Y" ? "block" : "none";
    }

    function myFunction() {
        document.getElementById("myText").disabled = true;
    }

    function myFunctionFalse() {
        // if (document.getElementById("izin")) {
        //     document.getElementById("myText").disabled = true.required = false;
        // } else {
        //     document.getElementById("myText").disabled = false.required = false;
        // }
        document.getElementById("myText").disabled = false.required = false;
    }

    function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = ddlPassport.value == "Y" ? "block" : "none";
    }

    function sakit_izin() {
        if (getElementById("")) {

        }
    }
</script>