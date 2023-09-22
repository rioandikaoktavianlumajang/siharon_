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
                            Rekap
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="text-center">
                                
                            </div>
                        </div>
                        <form action="<?php echo site_url('Rekap_absensi/tabel_rekap_user') ?>" method="POST">
                            <div class="row">
                                <div class="col-sm-3">
                                    <input type="hidden" value="<?php echo $this->session->nip;?>" name="nip_pegawai" class="form-control">
                                    <input type="text" disabled value="<?php echo $this->session->nama;?>" name="" class="form-control">
                                </div>
                                <br>
                                <div class="col-sm-3">
                                    <select class="form-control select2" style="width: 100%;" name="bulan" required>
                                        <option value="">--Pilih Bulan--</option>
                                        <option value="01">Januari</option>
                                        <option value="02">Februari</option>
                                        <option value="03">Maret</option>
                                        <option value="04">April</option>
                                        <option value="05">Mei</option>
                                        <option value="06">Juni</option>
                                        <option value="07">Juli</option>
                                        <option value="08">Agustus</option>
                                        <option value="09">September</option>
                                        <option value="10">Oktober</option>
                                        <option value="11">November</option>
                                        <option value="12">Desember</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-sm-3">
                                    <select class="form-control select2" style="width: 100%;" name="tahun" required>
                                        <option value="">--Pilih Tahun--</option>
                                        <option value="2021">2021</option>
                                        <option value="2022">2022</option>
                                        <option value="2023">2023</option>
                                    </select>
                                </div>
                                <br>
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-search" aria-hidden="true"></i> TAMPILKAN REKAP</button>
                                </div>
                            </div>
                        </form>
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
    $('.zoom').hover(function() {
        $(this).addClass('transisi');
    }, function() {
        $(this).removeClass('transisi');
    });
</script>