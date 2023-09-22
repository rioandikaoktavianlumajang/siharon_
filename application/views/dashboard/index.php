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
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3>86</h3>Pegawai
                    </div>
                    <div class="icon">
                        <i class="ion"></i>
                    </div>
                    <hr>
                    <div class="inner">
                        <h3><?php echo $sudah_rekam; ?></h3>Rekam Kehadiran
                    </div>
                    <div class="icon">
                        <i class="ion"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner" style="text-align: left;">
                        <div class="inner">
                            Hadir : <?php echo $sudah_rekam_datang - $sudah_rekam_dl; ?> pegawai
                        </div>
                        <hr>
                        <div class="inner">
                            Sakit : <?php echo $sudah_rekam_sakit; ?> pegawai
                        </div>
                        <hr>
                        <div class="inner">
                            Izin : <?php echo $sudah_rekam_izin; ?> pegawai
                        </div>
                        <hr>
                        <div class="inner">
                            DL : <?php echo $sudah_rekam_dl; ?> pegawai
                        </div>
                    </div>
                    <div class="icon">
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <a href="<?php echo site_url('Kegiatan/form_user');?>">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-blue"><i class="fa fa-sticky-note"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Cetak Rekap Kegiatan (<i>Log Book</i>)</span>
                            <span class="info-box-number"> <b style="color:red;">*</b>Klik disini</span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo site_url('Rekap_absensi/form_user');?>">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="fa fa-print"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Cetak Rekap Kehadiran</span>
                            <span class="info-box-number"><b style="color:red;">*</b>Klik disini</span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h4 class="text-center">PEGAWAI BELUM REKAM KEHADIRAN </h4>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <marquee class="hakko" behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                                <h1><b style="color: black;"> <?php foreach ($pegawai_belum_absen as $data_pegawai_belum_absen) {
                                                                    echo $data_pegawai_belum_absen->nama_pendek . ' , ';
                                                                } ?></b></h1>
                            </marquee>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <center>
                            <h3 class="box-title">AKUMULATIF KETERLAMBATAN PEGAWAI</h3>
                        </center>
                    </div>
                    <div class="box-body">
                        <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai (Total Keterlambatan)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($akumulatif_telat as $data_akumulatif_telat) {
                                ?>
                                    <tr>
                                        <td width="1">
                                            <center><?php echo $no++; ?>.</center>
                                        </td>
                                        <td>
                                            <?php echo $data_akumulatif_telat->nama_pegawai . '<b> (' . $data_akumulatif_telat->telat . ')</b>'; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h4 class="text-center">
                            DATA BERGEJALA ILI HARI INI
                        </h4>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pegawai </th>
                                        <th>Gejala </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pegawai_yang_bergejala_ili as $data_pegawai_yang_bergejala_ili) {
                                    ?>
                                        <tr>
                                            <td width="1">
                                                <center><?php echo $no++; ?>.</center>
                                            </td>
                                            <td>
                                                <?php echo $data_pegawai_yang_bergejala_ili->nama; ?>
                                            </td>
                                            <td>
                                                <?php
                                                date_default_timezone_set('Asia/Jakarta');
                                                $hari_ini = date('Y-m-d');
                                                $tampilkan_gejala = $this->db->query("SELECT * FROM tbl_ili WHERE tanggal = '$hari_ini' && nip = '$data_pegawai_yang_bergejala_ili->nip'")->result();
                                                foreach ($tampilkan_gejala as $data_tampilkan_gejala) {
                                                    echo $data_tampilkan_gejala->gejala_ili . ', ';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h4 class="text-center">
                            PEGAWAI YANG TERLAMBAT HARI INI
                        </h4>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <small>
                                            <th>No</th>
                                            <th>Nama Pegawai (Jumlah Keterlambatan)</th>
                                        </small>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pegawai_sering_terlambat as $data_pegawai_sering_terlambat) {
                                    ?>
                                        <tr>
                                            <small>
                                                <td width="1">
                                                    <center><?php echo $no++; ?>.</center>
                                                </td>
                                                <td>
                                                    <?php echo $data_pegawai_sering_terlambat->nama_pegawai . '<b>(' . $data_pegawai_sering_terlambat->telat . ')</b>';
                                                    // echo "(<i style='color:red;'>*Proses Sistem</i>)";
                                                    //  . '<b>(' . $data_pegawai_sering_terlambat->telat . ')</b>'; 
                                                    ?>
                                                </td>
                                            </small>
                                        </tr>
                                </tbody>
                            <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header text-center">
                        <b>Rekam Kehadiran <?php echo $this->session->userdata('nama'); ?></b> <br> (Bulan <?php echo date('M');?> Hadir : <?php echo $rekap_angka_presensi_hadir;?>, Sakit : <?php echo $rekap_angka_presensi_sakit;?>, Izin : <?php echo $rekap_angka_presensi_izin;?> )
                    </div>
                    <div class="box-body table-responsive">
                        <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                            <thead>
                                <tr>
                                    <small>
                                        <th style="white-space: nowrap; width: 1%;">NO</th>
                                        <th style="white-space: nowrap; width: 1%;">TANGGAL</th>
                                        <th style="white-space: nowrap; width: 1%;">JAM DATANG - PULANG</th>
                                        <th>KETERANGAN</th>
                                    </small>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($rekam_per_pegawai as $data_rekam_per_pegawai) {
                                ?>
                                    <tr>
                                        <td><center><?php echo $no++; ?>.</center></td>
                                        <td><?php if ($data_rekam_per_pegawai->tgl_hadir == date('Y-m-d')) {
                                                echo 'Hari ini';
                                            } else {
                                                echo date('d/m/y', strtotime($data_rekam_per_pegawai->tgl_hadir));
                                            }  ?></td>
                                        <td>
                                            <?php
                                            echo $data_rekam_per_pegawai->time_datang . ' - ' . $data_rekam_per_pegawai->time_pulang;
                                            ?>
                                        </td>
                                        <td>
                                            <?php echo $data_rekam_per_pegawai->keterangan; ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
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
        $(".select2").select2();
    });
</script>