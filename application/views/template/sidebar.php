<section class="sidebar">
    <!-- search form -->
    <form action="#" method="" class="sidebar">
        <div class="input-group">
            <!-- <input type="text" name="q" class="form-control" placeholder="Search..."> -->
            <!-- <span class="input-group-btn"> -->
            <!-- <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button> -->
            <!-- </span> -->
        </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <?php
        if ($this->session->userdata('id_user_level') == '4') { ?>
            <li <?php if ($this->uri->segment(1) == 'dashboard') {
                    echo "class='active'";
                } ?>><?php echo anchor('dashboard', "<i class='fa fa-home'></i> DASHBOARD"); ?></li>
            <li <?php if ($this->uri->segment(1) == 'absensi') {
                    echo "class='active'";
                } ?>><?php echo anchor('absensi', "<i class='fa fa-clock-o'></i> REKAM HADIR"); ?></li>
            <li class="treeview" <?php if ($this->uri->segment(1) == 'jam_kerja') {
                                        echo "class='active'";
                                    } ?>><?php echo anchor('jam_kerja', "<i class='fa fa-clock-o'></i> MASTER JAM KERJA 
                                                                            <span class='pull-right-container'>
                                                                        <i class='fa fa-angle-left pull-right'></i>
                                                                        </span>
                "); ?>
                <ul class="treeview-menu" style="display: none;">
                    <li class="active"><a href="<?php echo site_url('jam_kerja') ?>"><i class="fa fa-circle-o"></i> Jam Kerja Upnormal</a></li>
                    <!-- <li class="active"><a href="<?php echo site_url('Sabtu_minggu') ?>"><i class="fa fa-circle-o"></i> Akses Sabtu Minggu </a></li> -->
                </ul>
            </li>
            <li <?php if ($this->uri->segment(1) == 'ili') {
                    echo "class='active'";
                } ?>><?php echo anchor('ili', "<i class='fa fa-clock-o'></i> ILI"); ?></li>
        <?php } elseif ($this->session->userdata('id_user_level') == '2') { ?>
            <li <?php if ($this->uri->segment(1) == 'dashboard') {
                    echo "class='active'";
                } ?>><?php echo anchor('dashboard', "<i class='fa fa-home'></i> DASHBOARD"); ?></li>
            <li <?php if ($this->uri->segment(1) == 'absensi') {
                    echo "class='active'";
                } ?>><?php echo anchor('absensi', "<i class='fa fa-clock-o'></i> REKAM HADIR"); ?></li>
            <li <?php if ($this->uri->segment(1) == 'ili') {
                    echo "class='active'";
                } ?>><?php echo anchor('ili', "<i class='fa fa-clock-o'></i> ILI"); ?></li>
                <li <?php if ($this->uri->segment(1) == 'Kegiatan') {
                    echo "class='active'";
                } ?>><?php echo anchor('Kegiatan/form_user', "<i class='fa fa-sticky-note'></i> LOG BOOK"); ?></li>
                <li <?php if ($this->uri->segment(1) == 'Rekap_absensi') {
                    echo "class='active'";
                } ?>><?php echo anchor('Rekap_absensi/form_user', "<i class='fa fa-print'></i> REKAP KEHADIRAN"); ?></li>
        <?php } else { ?>
            <li <?php if ($this->uri->segment(1) == 'dashboard') {
                    echo "class='active'";
                } ?>><?php echo anchor('dashboard', "<i class='fa fa-home'></i> DASHBOARD"); ?></li>
            <li <?php if ($this->uri->segment(1) == 'pegawai') {
                    echo "class='active'";
                } ?>><?php echo anchor('pegawai', "<i class='fa fa-users'></i> MASTER PEGAWAI"); ?></li>
            <li <?php if ($this->uri->segment(1) == 'kegiatan') {
                    echo "class='active'";
                } ?>><?php echo anchor('kegiatan', "<i class='fa fa-sticky-note-o'></i> KEGIATAN HARI INI <span class='pull-right-container'>
              <small class='label pull-right bg-red'><i>*new</i></small>
            </span>"); ?></li>
            <li <?php if ($this->uri->segment(1) == 'wilker') {
                    echo "class='active'";
                } ?>><?php echo anchor('wilker', "<i class='fa fa-map-marker'></i> MASTER WILKER"); ?></li>
            <li class="treeview" <?php if ($this->uri->segment(1) == 'jam_kerja') {
                                        echo "class='active'";
                                    } ?>><?php echo anchor('jam_kerja', "<i class='fa fa-clock-o'></i> MASTER JAM KERJA 
                <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
                "); ?>
                <ul class="treeview-menu" style="display: none;">
                    <li class="active"><a href="<?php echo site_url('jam_kerja') ?>"><i class="fa fa-circle-o"></i> 12 Jam Kerja </a></li>
                    <li class="active"><a href="<?php echo site_url('Sabtu_minggu') ?>"><i class="fa fa-circle-o"></i> Akses Sabtu Minggu </a></li>
                </ul>
            </li>
            <li <?php if ($this->uri->segment(1) == 'absensi') {
                    echo "class='active'";
                } ?>><?php echo anchor('absensi', "<i class='fa fa-pencil'></i> REKAM HADIR"); ?></li>
            <li <?php if ($this->uri->segment(1) == 'input_presensi') {
                    echo "class='active'";
                } ?>><?php echo anchor('input_presensi', "<i class='fa fa-pencil'></i> INPUT PRESENSI MANUAL"); ?></li>
            <li <?php if ($this->uri->segment(1) == 'rekap_absensi') {
                    echo "class='active'";
                } ?>><?php echo anchor('rekap_absensi', "<i class='fa fa-list-alt'></i> REKAP ABSENSI"); ?></li>
            <li <?php if ($this->uri->segment(1) == 'rekap_absensi_upnormal') {
                    echo "class='active'";
                } ?>><?php echo anchor('rekap_absensi_upnormal', "<i class='fa fa-list-alt'></i> REKAP ABSENSI UPNORMAL"); ?></li>
            <li class="treeview" <?php if ($this->uri->segment(1) == 'ili') {
                                        echo "class='active'";
                                    } ?>><?php echo anchor('ili', "<i class='fa fa-stethoscope'></i> MASTER ILI 
                <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
                "); ?>
                
                <ul class="treeview-menu" style="display: none;">
                    <li class="active"><a href="<?php echo site_url('Ili') ?>"><i class="fa fa-circle-o"></i> Form ILI </a></li>
                    <li class="active"><a href="<?php echo site_url('Ili/table_ili') ?>"><i class="fa fa-circle-o"></i> Data ILI </a></li>
                </ul>
            </li>
        <?php } ?>
        <!-- PENAMBAHAN MENU DI DOKTER -->
        <?php
        if ($this->session->userdata('nip') == '197809212008122002') {
        ?>
            <li class="treeview" <?php if ($this->uri->segment(1) == 'ili') {
                                        echo "class='active'";
                                    } ?>><?php echo anchor('ili', "<i class='fa fa-stethoscope'></i> MASTER ILI 
                <span class='pull-right-container'>
              <i class='fa fa-angle-left pull-right'></i>
            </span>
                "); ?>
                <ul class="treeview-menu" style="display: none;">
                    <li class="active"><a href="<?php echo site_url('Ili') ?>"><i class="fa fa-circle-o"></i> Form ILI </a></li>
                    <li class="active"><a href="<?php echo site_url('Ili/table_ili') ?>"><i class="fa fa-circle-o"></i> Data ILI </a></li>
                </ul>
            </li>
        <?php } ?>
    </ul>
</section>
<!-- /.sidebar -->