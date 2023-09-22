<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-default" data-toggle="modal" data-target="#exampleModal">
                                <i class="fa fa-plus-circle"></i> Tambah data Wilker
                            </button>
                        </h3>
                    </div>
                    <div class="box-body">
                        <div style="padding-bottom: 100px;">
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">Tambah data Wilker</h4>
                                        </div>
                                        <form class="form-horizontal" method="post" action="<?php echo site_url('Wilker/tambah_data') ?>">
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label col-xs-2">WILKER</label>
                                                            <div class="col-xs-9">
                                                                <input type="text" name="wilker" class="form-control" required placeholder="Masukan wilayah kerja">
                                                            </div>
                                                        </div>
                                                    </div>
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
                                        <th>WILKER</th>
                                        <th>AKSI</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($wilker as $data_wilker) {
                                    ?>
                                        <tr>
                                            <td width="20"><?php echo $no++; ?></td>
                                            <td><?php echo $data_wilker->wilker; ?></td>
                                            <td width="10%">
                                                <center>
                                                    <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                    <a href="<?php echo site_url('Wilker/hapus_data/' . $data_wilker->id_wilker) ?>" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                                </center>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <!-- <tr>
                                        <td width="20">1.</td>
                                        <td>Induk Probolinggo</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20">2.</td>
                                        <td>Kantor Wilker Panarukan</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20">3.</td>
                                        <td>Kantor Wilker Tanjung Wangi</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20">4.</td>
                                        <td> Kantor Wilker Paiton</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20">5.</td>
                                        <td> Kantor Wilker Pasuruan</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20">6.</td>
                                        <td>Kantor Wilker A.R. Saleh</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20">7.</td>
                                        <td>Pos Pelabuhan ASDP Ketapang</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20">8.</td>
                                        <td>Pos Bandara Banyuwangi</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20">9.</td>
                                        <td>Pos Bandara A.R. Saleh Malang</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td width="20">10.</td>
                                        <td>Pos Pelabuhan Kalbut</td>
                                        <td width="10%">
                                            <center>
                                                <a href="" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#edit" title="Update"><i class="fa fa-edit"></i></a>
                                                <a href="" onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm" title="Hapus"><i class="fa fa-trash"></i></a>
                                            </center>
                                        </td>
                                    </tr> -->
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