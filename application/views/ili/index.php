<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<style type="text/css">
    #notifications {
        cursor: pointer;
        position: fixed;
        right: 0px;
        z-index: 9999;
        top: 0px;
        margin-top: 22px;
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
                            <h3 class="box-title" style="text-align: center;">SELF ASSESSMENT HARIAN GEJALA ILI (INFLUENZA LIKE ILLNESS)
                            </h3>
                        </center>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Ili/tambah_ili'); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <center>
                                            <label style="color: red;" for="">
                                                <i>
                                                    <?php if ($sudah_ili > 0) {
                                                        echo '*Sudah Mengisi ILI';
                                                    } else {
                                                        echo '*Silahkan Mengisi ILI';
                                                    } ?>
                                                </i>
                                            </label>
                                        </center>
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
                                            <label for="">
                                                <h4><b>Apakah anda bergejala ILI (Influenza Like Illness) pada hari ini ? </b></h4>
                                            </label>
                                            <select name="bergejala" required class="form-control select2" style="width: 100%;" id="ddlPassport" onchange="ShowHideDiv()">
                                                <option onclick="" onchange="" value="">-- PILIH --</option>
                                                <option value="N">Tidak</option>
                                                <option value="Y">Ya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="dvPassport" style="display: none">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">
                                                    <h4><b>Silahkan pilih gejala Influenza Like Illness (ILI) anda (boleh lebih dari satu) : </b></h4>
                                                </label>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="gejala_ili[]" onclick="" id="" value="Batuk">
                                                        Batuk
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="gejala_ili[]" onclick="" value="Pilek">
                                                        Pilek
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="gejala_ili[]" onclick="" value="Demam">
                                                        Demam
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="gejala_ili[]" onclick="" value="Nyeri Tenggorokan">
                                                        Nyeri Tenggorokan
                                                    </label>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                        <input type="checkbox" name="gejala_ili[]" onclick="" value="Sesak Nafas">
                                                        Sesak Nafas
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">KIRIM</button>
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
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
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
