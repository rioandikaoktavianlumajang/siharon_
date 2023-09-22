<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">Data Pegawai Jam Kerja Sabtu & Minggu
                        </h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Sabtu_minggu/tambah_data') ?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-1 control-label">NIP </label>
                                <div class="col-sm-7">
                                    <select class="form-control select2" style="width: 100%;" name="nip" required="">
                                        <option selected="selected" required="">-- PILIH --</option>
                                        <?php foreach ($pegawai as $data_pegawai) { ?>
                                            <option required="" value="<?php echo $data_pegawai->nip; ?>"><?php echo $data_pegawai->nip . " / " . $data_pegawai->nama; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    <button type="submit" class="btn btn-success pull-t"><i class="fa fa-plus" aria-hidden="true"></i> TAMBAHKAN</button>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                    <div class="box-body">
                        <div style="padding-bottom: 100px;">
                            <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP / Nama</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($sabtu_minggu as $data_sabtu_minggu) {
                                    ?>
                                        <tr>
                                            <td width="20" align="center"><?php echo $no++; ?>.</td>
                                            <td><?php echo $data_sabtu_minggu->nip . ' / ' . $data_sabtu_minggu->nama; ?></td>
                                            <td width="10%">
                                                <center>
                                                    <a href="<?php echo site_url('Sabtu_minggu/hapus_data/' . $data_sabtu_minggu->id_akses_sabtu_minggu) ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-ban"></i></a>
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
</script>