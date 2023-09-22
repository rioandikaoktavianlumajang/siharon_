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
                        <form action="<?php echo site_url('Kegiatan/cari_tanggal_user') ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-3">
                                    <h5>Tampilkan berdasarkan periode :</h5>
                                </div>
                                <br>
                                <div class="col-sm-3">
                                    <input type="date" name="mulai" class="form-control" required>
                                </div>
                                <br>
                                <div class="col-sm-3">
                                    <input type="date" name="sampai" class="form-control" required>
                                </div>
                                <br>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-eye" aria-hidden="true"></i> TAMPILKAN</button>
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
                        <h3 class="box-title" style="text-align: center;">Data Kegiatan <?php echo $this->session->nama;?> tanggal <?php echo date('d M Y', strtotime($tgl_mulai)).' - '.date('d M Y', strtotime($tgl_sampai));?>
                        </h3>
                    </div>
                    <div class="box-body table-responsive no-padding">
                    <table id="table_id" class="table table-striped display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pegawai</th>
                                    <th>Kegiatan</th>
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
                                            <!--<b><u><a target="_blank" href="<?php echo site_url('Kegiatan/cek_kegiatan_hari_ini/' . $data_kegiatan->tbl_note); ?>">CEK</a></u></b>-->
                                        </td>
                                        <td><?php echo $data_kegiatan->kegiatan_hari_ini;?></td>
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
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ]
                })
</script>
