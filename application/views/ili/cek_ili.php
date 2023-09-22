<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            CEK ILI
            <?php
            foreach ($ili_nama as $data_ili_nama) {
                echo $data_ili_nama->nip . ' / ' . $data_ili_nama->nama;
            }
            ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('Ili/table_ili') ?>">Data ILI</a></li>
            <li class="active">Cek ILI</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <!-- Horizontal Form -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <a href="<?php echo site_url('Ili/table_ili') ?>" class="btn btn-primary"><i class="fa fa-angle-double-left"></i> Kembali</a>
                        </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <form class="form-horizontal" method="post" action="<?php echo site_url(''); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="" class="col-sm-1 control-label">NIP / Nama</label>
                                <div class="col-sm-10">
                                    <?php
                                    foreach ($ili_nama as $data_ili_nama) {
                                    ?>
                                        <input type="text" class="form-control" id="" placeholder="Masukan Nip" value="<?php echo $data_ili_nama->nip . ' / ' . $data_ili_nama->nama; ?>" disabled>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-1 control-label">Jam / Tanggal</label>
                                <div class="col-sm-10">
                                    <?php
                                    foreach ($ili_nama as $data_ili_nama) {
                                    ?>
                                        <input type="text" class="form-control" id="" placeholder="Masukan Nip" value="<?php echo $data_ili_nama->waktu . ' / ' . date('m-d-Y', strtotime($data_ili_nama->tanggal)); ?>" disabled>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="col-sm-1 control-label">Gejala</label>
                                <div class="col-sm-10">
                                    <ul>
                                        <?php
                                        foreach ($ili as $data_ili) {
                                        ?>
                                            <li>
                                                <?php echo $data_ili->gejala_ili; ?>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </form>
                </div><!-- /.box -->
            </div>
        </div> <!-- /.row -->
    </section><!-- /.content -->
</div>