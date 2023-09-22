<!-- datatable style -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.css"> -->
        <!-- bootstrap 4 css  -->
        <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
            integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous"> -->
        <!-- css tambahan  -->
        <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.7.0/css/buttons.dataTables.min.css">
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
                        <form action="<?php echo site_url('Rekap_absensi/tabel_rekap_user') ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="hidden" value="<?php echo $this->session->nip;?>" name="nip_pegawai" class="form-control">
                                    <input type="text" disabled value="<?php echo $this->session->nama;?>" name="" class="form-control">
                                </div>
                                <br>
                                <div class="col-sm-3">
                                    <select class="form-control select2" style="width: 100%;" name="bulan" required>
                                        <option value="">--Pilih Bulan--</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-sm-3">
                                    <select class="form-control select2" style="width: 100%;" name="tahun" required>
                                        <option value="">--Pilih Tahun--</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> TAMPILKAN REKAP</button>
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
                        <h3 class="box-title" style="text-align: center;">Data Rekap Pegawai tanggal 
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                    <table id="table_id" class="table" style="overflow-x:auto;">
                            <thead>
                                <tr>
                                        <th>No</th>
                                        <th>NIP - Nama Pegawai</th>
                                        <th>WILKER</th>
                                        <th>WAKTU DATANG - PULANG</th>
                                        <th>TERLAMBAT</th>
                                        <th>TANGGAL</th>
                                        <th>FOTO DATANG</th>
                                        <th>FOTO PULANG</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no = 1;
                                foreach ($presensi as $data_absensi_pegawai) {
                                ?>
                                <tr>
                                    <td width="20">
                                        <center><?php echo $no++; ?>.</center>
                                    </td>
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
                                        }
                                        if ($data_absensi_pegawai->wilker == 'Latsar CPNS') {
                                            echo "<b>(Latsar CPNS)</b>";
                                        } else {
                                            echo '';
                                        }
                                        ?></td>
                                    <td>
                                        <?php if ($data_absensi_pegawai->wilker == 'Y') {
                                            echo $data_absensi_pegawai->lainnya;
                                        }
                                        if ($data_absensi_pegawai->wilker == 'Latsar CPNS') {
                                            echo '-';
                                        } else {
                                            echo $data_absensi_pegawai->wilker;
                                        } ?>
                                    </td>
                                    <td><?php echo $data_absensi_pegawai->time_datang . ' - ' . $data_absensi_pegawai->time_pulang; ?></td>
                                    <td>
                                        <?php echo $data_absensi_pegawai->telat;?>
                                    </td>
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
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <?php
                                foreach ($akumulatif_keterlambatan as $data_akumulatif_keterlambatan) {
                                ?>
                                <tr>
                                    <td colspan='7' style="text-align: right;">Total Jumlah Keterlambatan :</td>
                                    <td colspan='2'><b><?php echo $data_akumulatif_keterlambatan->telat;?></b></td>
                                </tr>
                                <?php } ?>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<!--<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>-->
<!--<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>-->


        <!-- jquery -->
        <!--<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>-->
        <!-- jquery datatable -->
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

        <!--<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>-->
        <!--<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>-->
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>-->

<script type="text/javascript">
    // $(document).ready(function() {
    //     $(' #example').DataTable();
    // });
    $('.zoom').hover(function() {
        $(this).addClass('transisi');
    }, function() {
        $(this).removeClass('transisi');
    });
    
    $('#table_id').DataTable({
                    // script untuk membuat export data 
                    dom: 'Bfrtip',
                    buttons: [
                        'copy', 'excel', 'pdf', 'print'
                    ]
                })
</script>
