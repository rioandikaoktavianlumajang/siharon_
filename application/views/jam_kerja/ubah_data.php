<div class="content-wrapper">
    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <a href="<?php echo site_url('Jam_kerja') ?>" class=""><b><i class="fa fa-angle-left"></i></b> Kembali</a>
                </h3>
                <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <?php foreach ($jam_kerja as $data_jam_kerja) { ?>
                <form class="form-horizontal" method="post" action="<?php echo site_url('Jam_kerja/update_data/' . $data_jam_kerja->id_jam_kerja); ?>">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="" class="col-sm-1 control-label">NIP </label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="nip" required>
                                    <option selected="selected">-- PILIH --</option>
                                    <?php foreach ($pegawai as $data_pegawai) { ?>
                                        <option <?php if ($data_jam_kerja->nip == $data_pegawai->nip) {
                                                    echo 'selected';
                                                } ?> value="<?php echo $data_pegawai->nip; ?>"><?php echo $data_pegawai->nip . " / " . $data_pegawai->nama; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-1 control-label">Wilker</label>
                            <div class="col-sm-10">
                                <select class="form-control select2" style="width: 100%;" name="wilker" required>
                                    <option selected="selected">-- PILIH --</option>
                                    <option <?php if ($data_jam_kerja->wilker == 'Pos Pelabuhan Ketapang') {
                                                echo 'selected';
                                            } ?> value="Pos Pelabuhan Ketapang">Pos Pelabuhan Ketapang (16:00 - 07:30) / *jumat (16:30)</option>
                                    <option <?php if ($data_jam_kerja->wilker == 'Satpam Induk/Malang Pagi') {
                                                echo 'selected';
                                            } ?> value="Satpam Induk/Malang Pagi">Satpam Induk/A.R. Malang Pagi (06:00 - 18:00)</option>
                                    <option <?php if ($data_jam_kerja->wilker == 'Satpam Induk/Malang Malam') {
                                                echo 'selected';
                                            } ?> value="Satpam Induk/Malang Malam">Satpam Induk/A.R. Malang Malam (18:00 - 06:00)</option>
                                    <option <?php if ($data_jam_kerja->wilker == 'Satpam Wilker') {
                                                echo 'selected';
                                            } ?> value="Satpam Wilker">Satpam Wilker (16:00 - 07:30) / *jumat (16:30)</option>
                                    <!-- <?php foreach ($wilker as $data_wilker) { ?>
                                        <option <?php if ($data_jam_kerja->wilker == $data_wilker->wilker) {
                                                    echo 'selected';
                                                } ?> value="<?php echo $data_wilker->wilker; ?>"><?php echo $data_wilker->wilker; ?></option>
                                    <?php } ?> -->
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-1 control-label">Tanggal</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <input type="date" class="form-control" name="tanggal" value="<?php echo $data_jam_kerja->tanggal; ?>">
                                    </div>
                                    <!-- <div class="col-sm-1">
                                        <button type="submit" class="btn btn-success pull-t"><i class="fa fa-save" aria-hidden="true"></i> UPDATE</button>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="" class="col-sm-1 control-label">Jam Datang</label>
                            <div class="col-sm-10">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="time" class="form-control" name="jam_datang" required value="<?php echo $data_jam_kerja->jam_datang; ?>">
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="">Jam Pulang</label>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="time" class="form-control" name="jam_pulang" required value="<?php echo $data_jam_kerja->jam_pulang; ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <div class="row">
                                    <div class="col-sm-1"></div>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-success btn-block"><i class="fa fa-save" aria-hidden="true"></i> UPDATE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </form>
            <?php  } ?>
        </div><!-- /.box -->
    </section>
</div>