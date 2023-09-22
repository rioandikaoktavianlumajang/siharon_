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
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">

                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="text-center">

                            </div>
                        </div>
                        <form action="<?php echo site_url('Kegiatan/cari_tanggal') ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-2">
                                    <h5>Tampilkan berdasarkan periode :</h5>
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" name="mulai" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <input type="date" name="sampai" class="form-control">
                                </div>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> CARI</button>
                                    <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> RESET</button>
                                    <!-- <a href="<?php echo site_url('Excel/cetak_berdasarkan_tanggal'); ?>" target="_blank" class="btn btn-success"><i class="fa fa-file-excel-o"></i> Cetak Ms Excel</a> -->
                                    <!-- <?php echo anchor(site_url('Excel/cetak_berdasarkan_periode'), '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Export Ms Excel', 'class="btn btn-primary btn-sm"'); ?> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title" style="text-align: center;">Data Kegiatan Pegawai Perhari

                        </h3>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai (Total Keterlambatan)</th>
                                    <th>Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($kegiatan as $data_kegiatan) {
                                ?>
                                    <tr>
                                        <td width="1">
                                            <center><?php echo $no++; ?>.</center>
                                        </td>
                                        <td>
                                            <?php echo $data_kegiatan->nama; ?>
                                            <b><u><a href="<?php echo site_url('Kegiatan/cek_kegiatan_hari_ini/' . $data_kegiatan->tbl_note); ?>">CEK</a></u></b>
                                        </td>
                                        <td>
                                            <?php echo date('d M Y', strtotime($data_kegiatan->tgl)); ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> -->
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