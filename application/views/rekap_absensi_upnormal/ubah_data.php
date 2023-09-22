<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Rekap Absensi
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?php echo site_url('rekap_absensi') ?>">Rekap Kehadiran</a></li>
            <li class="active">Ubah Rekap Kehadiran</li>
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
                        <h3 class="box-title">Ubah Data </h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <?php
                    foreach ($absensi_pegawai as $data_absensi_pegawai) {
                    ?>
                        <form class="form-horizontal" method="post" action="<?php echo site_url('Rekap_absensi/update_db/' . trim($data_absensi_pegawai->nip_no_kontrak) . '/' . $data_absensi_pegawai->tgl_hadir); ?>" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">NIP / No. Kontrak </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="" placeholder="Masukan Nip" value="<?php echo $data_absensi_pegawai->nip_no_kontrak; ?>" disabled name="nip">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">Nama Pegawai</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="" placeholder="Masukan nama pegawai" name="nama_pegawai" value="<?php echo $data_absensi_pegawai->nama_pegawai; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">Tanggal Hadir</label>
                                    <div class="col-sm-10">
                                        <input name="tgl_hadir" type="text" class="form-control" id="" placeholder="" value="<?php echo date('d F Y', strtotime($data_absensi_pegawai->tgl_hadir)); ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label" for="">Wilker </label>
                                    <div class="col-sm-10">
                                        <select name="wilker" id="" class="form-control" required="" disabled>
                                            <option value="" required="">-- PILIH --</option>
                                            <option value="Induk Probolinggo" <?php if ($data_absensi_pegawai->wilker == 'Induk Probolinggo') {
                                                                                    echo 'Selected';
                                                                                } ?> required="">Induk Probolinggo</option>
                                            <option value="Wilker Tanjung Wangi" <?php if ($data_absensi_pegawai->wilker == 'Wilker Tanjung Wangi') {
                                                                                        echo 'Selected';
                                                                                    } ?> required="">Wilker Tanjung Wangi</option>
                                            <option value="Wilker Panarukan" <?php if ($data_absensi_pegawai->wilker == 'Wilker Panarukan') {
                                                                                    echo 'Selected';
                                                                                } ?> required="">Wilker Panarukan</option>
                                            <option value="Wilker Paiton" <?php if ($data_absensi_pegawai->wilker == 'Wilker Paiton') {
                                                                                echo 'Selected';
                                                                            } ?> required="">Wilker Paiton</option>
                                            <option value="Wilker Pasuruan" <?php if ($data_absensi_pegawai->wilker == 'Wilker Pasuruan') {
                                                                                echo 'Selected';
                                                                            } ?> required="">Wilker Pasuruan</option>
                                            <option value="Wilker A.R. Saleh" <?php if ($data_absensi_pegawai->wilker == 'Wilker A.R. Saleh') {
                                                                                    echo 'Selected';
                                                                                } ?> required="">Wilker A.R. Saleh</option>
                                            <option value="Pos Pelabuhan Ketapang" <?php if ($data_absensi_pegawai->wilker == 'Pos Pelabuhan Ketapang') {
                                                                                        echo 'Selected';
                                                                                    } ?> required="">Pos Pelabuhan Ketapang</option>
                                            <option value="Pos Bandara Banyuwangi" <?php if ($data_absensi_pegawai->wilker == 'Pos Bandara Banyuwangi') {
                                                                                        echo 'Selected';
                                                                                    } ?> required="">Pos Bandara Banyuwangi</option>
                                            <option value="Pos Pelabuhan Kalbut" <?php if ($data_absensi_pegawai->wilker == 'Pos Pelabuhan Kalbut') {
                                                                                        echo 'Selected';
                                                                                    } ?> required="">Pos Pelabuhan Kalbut</option>
                                            <option value="Pos Bandara A.R. Saleh" <?php if ($data_absensi_pegawai->wilker == 'Pos Bandara A.R. Saleh') {
                                                                                        echo 'Selected';
                                                                                    } ?> required="">Pos Bandara A.R. Saleh</option>
                                            <option value="Pos Pelabuhan Kalbut" <?php if ($data_absensi_pegawai->wilker == 'Pos Pelabuhan Kalbut') {
                                                                                        echo 'Selected';
                                                                                    } ?> required="">Pos Pelabuhan Kalbut</option>
                                            <option value="Pos Pelabuhan Jangkar" <?php if ($data_absensi_pegawai->wilker == 'Pos Pelabuhan Jangkar') {
                                                                                        echo 'Selected';
                                                                                    } ?> required="">Pos Pelabuhan Jangkar</option>
                                            <option value="WFH" <?php if ($data_absensi_pegawai->wilker == 'WFH') {
                                                                    echo 'Selected';
                                                                } ?> required="">WFH</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">Time Datang</label>
                                    <div class="col-sm-1">
                                        <input type="time" name="time_datang" class="form-control" id="" placeholder="" value="<?php echo $data_absensi_pegawai->time_datang; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">Telat</label>
                                    <div class="col-sm-1">
                                        <?php
                                        $waktuawal  = date_create('08:00:00');
                                        $waktuakhir = date_create($data_absensi_pegawai->time_datang);
                                        $diff  = date_diff($waktuawal, $waktuakhir);
                                        // echo 'Selisih waktu: ';
                                        // echo $diff->h . ' jam, ';
                                        // echo $diff->i . ' menit, ';
                                        // echo $diff->s . ' detik, ';
                                        ?>
                                        <!-- <input type="text" name="telat" class="form-control" id="" placeholder="" value="-<?php if ($diff->h == '0') {
                                                                                                                                echo "00:";
                                                                                                                            } else {
                                                                                                                                echo $diff->h . ":";
                                                                                                                            }
                                                                                                                            if ($diff->i == '0') {
                                                                                                                                echo "00:";
                                                                                                                            } else {
                                                                                                                                echo $diff->i . ":";
                                                                                                                            }
                                                                                                                            if ($diff->s == '0') {
                                                                                                                                echo "00";
                                                                                                                            } else {
                                                                                                                                echo $diff->s . "";
                                                                                                                            }
                                                                                                                            ?>"> -->
                                        <input type="time" name="telat" class="form-control" id="" placeholder="" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">Time Pulang</label>
                                    <div class="col-sm-1">
                                        <input type="time" name="time_pulang" class="form-control" id="" placeholder="Masukan nama pegawai" value="<?php echo $data_absensi_pegawai->time_pulang; ?>" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">File Datang</label>
                                    <div class="col-sm-1">
                                        <a href="<?php echo site_url('Rekap_absensi/cekFotoDatang/' . $data_absensi_pegawai->file_datang); ?>" target="_blank" class="control">Cek</a>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">File Pulang</label>
                                    <div class="col-sm-10">
                                        <?php if ($data_absensi_pegawai->file_pulang == '') {
                                            echo "*Kosong";
                                        } else { ?>
                                            <a href="<?php echo site_url('Rekap_absensi/cekFotoPulang/' . $data_absensi_pegawai->file_pulang); ?>" target="_blank"><u>Cek</u></a>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">File</label>
                                    <div class="col-sm-3">
                                        <embed src="../../../assets/file_keterangan/hitungan_manual.pdf">
                                        <!-- <iframe src="../../../assets/file_keterangan/hitungan_manual.pdf" width="600" height="400"></iframe> -->
                                        <input type="file" name="file_keterangan">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-1 control-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <textarea name="keterangan" class="form-control" id="" cols="30" rows="10"><?php echo $data_absensi_pegawai->keterangan; ?></textarea>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                            <div class="box-footer">
                                <a href="<?php echo site_url('rekap_absensi_upnormal') ?>" class="btn btn-default">Kembali</a>
                                <button type="submit" class="btn btn-info pull-right">Ubah</button>
                            </div><!-- /.box-footer -->
                        </form>
                    <?php } ?>
                </div><!-- /.box -->
            </div>
        </div> <!-- /.row -->
    </section><!-- /.content -->
</div>