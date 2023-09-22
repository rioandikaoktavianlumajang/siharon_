<style>
    img.zoom {
        width: 450px;
        height: 300px;
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
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="text-center">
                            </div>
                        </div>
                        <form action="<?php echo site_url('Rekap_absensi/cari_tanggal') ?>" method="POST">
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
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> CARI</button>
                                    <button type="reset" class="btn btn-primary"><i class="fa fa-refresh" aria-hidden="true"></i> RESET</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">
                            Data Rekap Absensi Upnormal
                        </h3>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 100px;">
                            <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP/No. Kontrak - Nama Pegawai</th>
                                        <th>WILKER</th>
                                        <th>WAKTU DATANG - WAKTU PULANG</th>
                                        <th>TANGGAL</th>
                                        <th>FOTO DATANG</th>
                                        <th>FOTO PULANG</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($absensi_pegawai as $data_absensi_pegawai) {
                                    ?>
                                        <tr>
                                            <td width="20"><center><?php echo $no++; ?>.</center></td>
                                            <td><?php echo $data_absensi_pegawai->nip_no_kontrak . ' / ' . $data_absensi_pegawai->nama_pegawai;
                                                if ($data_absensi_pegawai->wilker == 'Y') {
                                                    echo '<b>(Lainnya)</b>';
                                                }
                                                if ($data_absensi_pegawai->dinas_luar != '') {
                                                    echo "<b>(Dinas Luar)</b>";
                                                }
                                                if ($data_absensi_pegawai->izin == 'Izin') {
                                                    echo "<b>(Izin)</b>";
                                                }
                                                if ($data_absensi_pegawai->izin == 'Sakit') {
                                                    echo "<b>(Sakit)</b>";
                                                } else {
                                                    echo '';
                                                }
                                                ?></td>
                                            <td><?php if ($data_absensi_pegawai->wilker == 'Y') {
                                                    echo $data_absensi_pegawai->lainnya;
                                                } else {
                                                    echo $data_absensi_pegawai->wilker;
                                                } ?></td>
                                            <td><?php echo $data_absensi_pegawai->time_datang . ' - ' . $data_absensi_pegawai->time_pulang; ?></td>
                                            <td><?php echo date('d-m-y', strtotime($data_absensi_pegawai->tgl_hadir)); ?></td>
                                            <td>
                                                <?php
                                                if ($data_absensi_pegawai->file_datang == '') {
                                                    echo "*Kosong";
                                                } else { ?>
                                                    <a href="<?php echo site_url('Rekap_absensi/cekFotoDatang/' . $data_absensi_pegawai->file_datang); ?>" target="_blank"><u>Cek</u></a>
                                                <?php }
                                                ?>
                                            </td>
                                            <td>
                                                <?php if ($data_absensi_pegawai->file_pulang == '') {
                                                    echo "*Kosong";
                                                } else { ?>
                                                    <a href="<?php echo site_url('Rekap_absensi/cekFotoPulang/' . $data_absensi_pegawai->file_pulang); ?>" target="_blank"><u>Cek</u></a>
                                                <?php
                                                }
                                                ?>
                                            </td>
                                            <td width="10%">
                                                <center>
                                                    <a href="<?php echo site_url('Rekap_absensi_upnormal/update_data/' . $data_absensi_pegawai->kd_hadir); ?>" class="btn btn-warning btn-sm" title="Update"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo site_url('Rekap_absensi_upnormal/hapus_data/' . $data_absensi_pegawai->kd_hadir); ?>" onclick="return confirm('Hapus data <?php echo $data_absensi_pegawai->nama_pegawai; ?>?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
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
    });
    $('.zoom').hover(function() {
        $(this).addClass('transisi');
    }, function() {
        $(this).removeClass('transisi');
    });
</script>