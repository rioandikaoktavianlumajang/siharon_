<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah data pegawai 12 jam kerja</h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <form class="form-horizontal" method="post" action="<?php echo site_url('Jam_kerja/tambah_data') ?>">
                <div class="box-body">
                    <div class="form-group">
                        <label for="" class="col-sm-1 control-label">NIP </label>
                        <div class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" name="nip" required>
                                <option selected="selected">-- PILIH --</option>
                                <?php foreach ($pegawai as $data_pegawai) { ?>
                                    <option value="<?php echo $data_pegawai->nip; ?>"><?php echo $data_pegawai->nip . " / " . $data_pegawai->nama; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Wilker</label>
                        <div class="col-sm-10">
                            <select class="form-control select2" style="width: 100%;" name="wilker" required>
                                <option selected="selected">-- PILIH --</option>
                                <option value="Posko Pelabuhan Probolinggo">Posko Pelabuhan Probolinggo (16:00 - 07:30) / *jumat (16:30)</option>
                                <option value="Pos Pelabuhan Ketapang">Pos Pelabuhan Ketapang (16:00 - 07:30) / *jumat (16:30)</option>
                                <option value="Satpam Induk/Malang Pagi">Satpam Induk/A.R. Malang Pagi (06:00 - 18:00)</option>
                                <option value="Satpam Induk/Malang Malam">Satpam Induk/A.R. Malang Malam (18:00 - 06:00)</option>
                                <option value="Satpam Wilker">Satpam Wilker (16:00 - 07:30) / *jumat (16:30)</option>
                                <!-- <?php foreach ($wilker as $data_wilker) { ?>
                                    <option value="<?php echo $data_wilker->wilker; ?>"><?php echo $data_wilker->wilker; ?></option>
                                <?php } ?> -->
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Tanggal</label>
                        <div class="col-sm-11">
                            <div class="row">
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" name="tanggal" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Rekam Datang Terbuka </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" disabled name="rekam_datang_terbuka" required>
                                </div>
                                <div class="col-sm-1">
                                    <label for="">Jam Datang</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" name="jam_datang" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-1 control-label">Rekam Pulang Terbuka </label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" disabled name="rekam_pulang_terbuka" required>
                                </div>
                                <div class="col-sm-1">
                                    <label for="">Jam Pulang</label>
                                </div>
                                <div class="col-sm-5">
                                    <input type="time" class="form-control" name="jam_pulang" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-1"></div>
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-plus" aria-hidden="true"></i> TAMBAHKAN</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
            </form>
        </div><!-- /.box -->
        <div class="row">
            <div class="col-lg-12 col-xs-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Pegawai 12 Jam Kerja
                        </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 100px;">
                            <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP / No. Kontrak</th>
                                        <th>WILKER</th>
                                        <th>TANGGAL & JAM KERJA</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($jam_kerja as $data_jam_kerja) {
                                    ?>
                                        <tr>
                                            <td width="20"><?php echo $no++; ?></td>
                                            <td><?php echo $data_jam_kerja->nip . ' / ' . $data_jam_kerja->nama; ?></td>
                                            <td><?php echo $data_jam_kerja->wilker; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($data_jam_kerja->tanggal)) . ' / ' . $data_jam_kerja->jam_datang . '-' . $data_jam_kerja->jam_pulang; ?></td>
                                            <td width="10%">
                                                <center>
                                                    <a href="<?php echo site_url('Jam_kerja/ubah_data/' . $data_jam_kerja->id_jam_kerja); ?>" class="btn btn-warning btn-sm" title="Update"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo site_url('Jam_kerja/hapus_data/' . $data_jam_kerja->id_jam_kerja); ?>" onclick="return confirm('Hapus data <?php echo $data_jam_kerja->id_jam_kerja; ?>?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
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
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/'); ?>plugins/select2/select2.full.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(' #example').DataTable();
        $(".select2").select2();
    });
</script>