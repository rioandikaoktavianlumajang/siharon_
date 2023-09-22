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
                    <div class="box-header">
                        <center>
                            <h3 class="box-title" style="text-align: center;">INPUT PRESENSI MANUAL
                            </h3>
                        </center>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Input_presensi/tambah'); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="radio">
                                                <label for=""><input required type="radio" name="jam_kerja" value="8"><b>Jam Kerja Normal</b></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="jam_kerja" value="12"><b>Jam Kerja Upnormal</b>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">NIP</label>
                                            <select name="nip" class="form-control select2" style="width: 100%;" id="ddlPassport" onchange="ShowHideDiv()">
                                                <option onclick="" onchange="" value="">-- PILIH --</option>
                                                <?php
                                                foreach ($pegawai as $data_tbl_pegawai) {
                                                ?>
                                                    <option value="<?php echo $data_tbl_pegawai->nip . '/' . $data_tbl_pegawai->nama; ?>"><?php echo $data_tbl_pegawai->nip . '/' . $data_tbl_pegawai->nama; ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="keterangan" id="" onclick="" value="Izin">Izin
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="keterangan" id="" onclick="" value="Dinas Luar">DL (Dinas Luar)
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="keterangan" id="" onclick="" value="Cuti">Cuti
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="keterangan" id="" onclick="" value="Surat Tugas">Surat Tugas
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="keterangan" id="" onclick="" value="Tidak Rekam Datang & Pulang">Tidak Rekam Datang & Pulang
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="keterangan" id="" onclick="" value="Tidak Rekam Pulang">Tidak Rekam Pulang
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Tanggal</label>
                                            <input type="date" name="tanggal" class="form-control">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">TAMBAH</button>
                            </div>
                        </div>
                    </form>
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