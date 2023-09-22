<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-6">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i> Tambah data Pegawai
                            </button>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 10px;">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="">Tambah data pegawai</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="<?php echo site_url('Pegawai/tambah_data') ?>" method="POST">
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">NIP</label>
                                                    <input type="number" class="form-control" id="" name="nip">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="col-form-label">Nama</label>
                                                    <input type="text" class="form-control" id="" name="nama">
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <table id="example" class="table table-striped table-bordered table-responsive" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP / No. Kontrak</th>
                                        <th>Nama Pegawai</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($pegawai as $data_pegawai) {
                                    ?>
                                        <tr>
                                            <td width="20"><?php echo $no++; ?></td>
                                            <td><?php echo $data_pegawai->nip; ?></td>
                                            <td><?php echo $data_pegawai->nama; ?></td>
                                            <td width="10%">
                                                <center>
                                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit<?php echo $data_pegawai->nip; ?>" title="Update"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo site_url('Pegawai/hapus_data/' . $data_pegawai->nip); ?>" onclick="return confirm('Hapus data <?php echo $data_pegawai->nama; ?>?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="edit<?php echo $data_pegawai->nip; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="">Ubah data pegawai <?php echo $data_pegawai->nip; ?></h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <form action="<?php echo site_url('Pegawai/ubah_data/' . $data_pegawai->nip) ?>" method="POST">
                                                        <div class="modal-body">
                                                            <div class="form-group">
                                                                <label for="" class="col-form-label">NIP</label>
                                                                <input type="text" class="form-control" id="" name="nip" value="<?php echo $data_pegawai->nip; ?>" disabled>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="col-form-label">Nama</label>
                                                                <input type="text" class="form-control" id="" name="nama" value="<?php echo $data_pegawai->nama; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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
    });
</script>