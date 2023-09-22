<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title" style="text-align: center;">Kehadiran <?php
                                                                                    if (date('H:i') <= date('12:00')) {
                                                                                        echo "Pagi";
                                                                                    } else {
                                                                                        echo "Sore";
                                                                                    }
                                                                                    ?>
                        </h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Absensi/tambah_data'); ?>" enctype="multipart/form-data">
                        <div class="box-body" id="myRadioGroup">
                            <div class="modal-body">
                                <div class="row">
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
                                            <label for="">Lokasi</label>
                                            <select name="wilker" class="form-control select2" style="width: 100%;" required id="ddlPassport" onchange="ShowHideDiv()">
                                                <option onclick="" onchange="" value="" required="">-- PILIH --</option>
                                                <?php
                                                foreach ($wilker as $data_wilker) {
                                                ?>
                                                    <option value="<?php echo $data_wilker->wilker ?>" required=""><?php echo $data_wilker->wilker ?></option>
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
                                            <label for="">Keterangan</label>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" <?php
                                                                                    if (date('H:i') <= date('12:00')) {
                                                                                        echo "";
                                                                                    } else {
                                                                                        echo "disabled";
                                                                                    }
                                                                                    ?> name="waktu" onclick="myFunctionFalse()" id="" value="datang_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                    echo date('H:i:s'); ?>">
                                                    Datang
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" <?php
                                                                                    if (date('H:i') <= date('12:00')) {
                                                                                        echo "disabled";
                                                                                    } else {
                                                                                        echo "";
                                                                                    }
                                                                                    ?> name="waktu" onclick="myFunctionFalse()" value="pulang_<?php date_default_timezone_set('Asia/Jakarta');
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
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="cars" value="3" id="" onclick="myFunction()" value="dl_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                        echo date('H:i:s'); ?>">Izin baru
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="cars" value="2" id="" onclick="myFunction()" value="dl_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                        echo date('H:i:s'); ?>">Sakit baru
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Foto</label>
                                            <input type="file" class="" name="images" id="myText" required>
                                        </div>
                                    </div>
                                    Izin<input type="radio" name="cars" checked="checked" value="2" />
                                    Sakit<input type="radio" name="cars" value="3" />
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Foto</label>
                                            <div id="Cars2" class="desc">
                                                <input type="file" required> <i style="color: red;">*wajib diisi</i>
                                            </div>
                                            <div id="Cars3" class="desc" style="display: none;">
                                                <input type="file">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-12">
                                <?php
                                if (date('H:i') <= date('12:00')) {
                                    if ($cek_sudah_rekam_atau_belum > 0) { ?>
                                        <button type="submit" class="btn btn-success btn-block" disabled><i class="fa fa-check" aria-hidden="true"></i> SUDAH REKAM</button>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btn-primary btn-block">REKAM DATANG</button>
                                    <?php }
                                } else { ?>
                                    <button type="submit" class="btn btn-primary btn-block">REKAM PULANG</button>
                                <?php }
                                ?>
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


    $(document).ready(function() {
        $("input[name$='cars']").click(function() {
            var test = $(this).val();

            $("div.desc").hide();
            $("#Cars" + test).show();
        });
    });
</script>