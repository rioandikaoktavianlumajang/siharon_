<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">DATA SELF ASSESSMENT HARIAN GEJALA ILI (INFLUENZA LIKE ILLNESS)
                        </h3>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 100px;">
                            <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP / Nama</th>
                                        <th>JAM / TANGGAL</th>
                                        <th>BERGEJALA</th>
                                        <!--<th>AKSI</th>-->
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($ili as $data_ili) {
                                    ?>
                                        <tr>
                                            <td width="20" align="center"><?php echo $no++; ?>.</td>
                                            <td><?php echo $data_ili->nip . ' / ' . $data_ili->nama; ?></td>
                                            <td><?php echo date('H:i:s', strtotime($data_ili->waktu)) . ' / ' . date('m-d-Y', strtotime($data_ili->tanggal)); ?></td>
                                            <td>
                                                <center><?php
                                                        if ($data_ili->bergejala == 'Y') { ?>
                                                        <a href="<?php echo site_url('Ili/cek_gejala_ili/' . $data_ili->nip . '/' . $data_ili->tanggal) ?>"><u>IYA</u></a>
                                                    <?php } else {
                                                            echo 'TIDAK';
                                                        }
                                                    ?>
                                                </center>
                                            </td>
                                            <!--<td width="10%">-->
                                            <!--    <center>-->
                                            <!--        <a href="<?php echo site_url('Ili/hapus_ili/' . $data_ili->nip . '/' . $data_ili->tanggal) ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>-->
                                            <!--    </center>-->
                                            <!--</td>-->
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
</script>