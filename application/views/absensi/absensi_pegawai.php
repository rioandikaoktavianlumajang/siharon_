<?php date_default_timezone_set('Asia/Jakarta'); ?>
<div id="notifications"><?php echo $this->session->flashdata('msg'); ?></div>
<style type="text/css">
    #notifications {
        cursor: pointer;
        position: fixed;
        right: 0px;
        z-index: 9999;
        bottom: 0px;
        margin-bottom: 22px;
        margin-right: 15px;
        min-width: 300px;
        max-width: 800px;
    }

    .hakko {
        /* background-color: #66232b; */
        color: #bebebe;
        font-family: monospace;
        font-size: 20px;
        /* font-style: italic; */
    }
</style>                         
<div class="content-wrapper">
    <section class="content">
        <div class="row"><div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title" style="text-align: center;">
                            Titik Koordinat
                        </h3>
                        <div class="box-tools pull-right">
                            <button class="btn btn-box-tool" aria-expanded="false" type="button" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        </div>
                    </div>
                        <div class="box-body">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
                                            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
                                                <!-- Tempatkan peta Leaflet di sini -->
                                                <div id="map" style="height: 300px;"style="border:1px solid black"></div>
                                                <script>
                                                    var map = L.map('map').setView([0, 0], 15); // Pusatkan peta ke koordinat default (0, 0) dengan zoom 13

                                                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                                                        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                                                    }).addTo(map);

                                                    // Fungsi untuk menampilkan geolokasi saat ini
                                                    function showCurrentLocation() {
                                                        if ("geolocation" in navigator) {
                                                            navigator.geolocation.getCurrentPosition(function(position) {
                                                                var latitude = position.coords.latitude;
                                                                var longitude = position.coords.longitude;

                                                                // Tambahkan marker dengan koordinat geolokasi pengguna
                                                                var marker = L.marker([latitude, longitude]).addTo(map);
                                                                marker.bindPopup("Your Current Location").openPopup();

                                                                // Pusatkan peta ke geolokasi pengguna
                                                                map.setView([latitude, longitude], 15);
                                                            }, function(error) {
                                                                console.error("Error : " + error.message);
                                                            });
                                                        } else {
                                                            alert("Geolokasi tidak mendukung browser.");
                                                        }
                                                    }

                                                    // Panggil fungsi untuk menampilkan geolokasi saat halaman dimuat
                                                    showCurrentLocation();
                                                </script>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="" class="form-control input-md" id="idfromHTMLang" readonly placeholder="Long, Lat">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="col-lg-12 col-xs-12">
                <div class="box box-primary box-solid">
                    <div class="box-header">
                        <h3 class="box-title" style="text-align: center;">Kehadiran <?php
                                                                                    if (date('H:i') <= date('12:00')) {
                                                                                        echo "Pagi";
                                                                                    } else {
                                                                                        echo "Sore";
                                                                                    }
                                                                                    ?>
                        </h3>
                    </div>
                    <form class="form-horizontal" method="post" action="<?php echo site_url('Absensi/tambah_data_normal'); ?>" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <center>
                                                <label style="color: red;" for=""><i><?php if ($cek_sudah_rekam_atau_belum > 0) {
                                                                                            echo '*Sudah Rekam Datang';
                                                                                        } else {
                                                                                            echo '*Silahkan Rekam Kehadiran';
                                                                                        } ?></i></label>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">NIP / Nama Pegawai</label>
                                            <input type="text" name="" class="form-control input-md" id="" value="<?php echo $this->session->userdata('nip').' / '.$this->session->userdata('nama'); ?> " readonly>
                                        </div>
                                    </div>
                                    <!--<div class="col-md-12">-->
                                    <!--    <div class="form-group">-->
                                    <!--        <label for="">Nama Pegawai</label>-->
                                            <input type="hidden" name="nip_no_kontrak" class="form-control input-md" id="" value="<?php echo $this->session->userdata('nip'); ?> " readonly>
                                            <input type="hidden" name="nama_pegawai" class="form-control" id="" value="<?php echo $this->session->userdata('nama'); ?> " readonly>
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Keterangan</label>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="waktu" onclick="myFunctionFalse()" id="" value="datang_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                echo date('H:i:s'); ?>">
                                                    Datang
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="waktu" onclick="myFunctionFalse()" value="pulang_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                        echo date('H:i:s'); ?>">
                                                    Pulang
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="waktu" id="izin" onclick="myFunctionFalse()" value="izin_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                echo date('H:i:s'); ?>">Izin
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="waktu" id="sakit" onclick="myFunctionFalse()" value="sakit_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                                    echo date('H:i:s'); ?>">Sakit
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input required type="radio" name="waktu" id="" onclick="myFunction()" value="dl_<?php date_default_timezone_set('Asia/Jakarta');
                                                                                                                                        echo date('H:i:s'); ?>">DL (Dinas Luar)
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Lokasi</label>
                                            <select name="wilker" class="form-control select2" style="width: 100%;" id="ddlPassport" onchange="ShowHideDiv()">
                                                <option onclick="" onchange="" value="">-- PILIH --</option>
                                                <?php
                                                foreach ($wilker as $data_wilker) {
                                                ?>
                                                    <option value="<?php echo $data_wilker->wilker.'/'.$data_wilker->longitude.'/'.$data_wilker->latitude ?>"><?php echo $data_wilker->wilker.'/'.$data_wilker->longitude.'/'.$data_wilker->latitude  ?></option>
                                                <?php } ?>
                                                <option value="Latsar CPNS">Latsar CPNS</option>
                                                <option value="WFH">Bekerja dari Rumah (WFH)</option>
                                                <option value="Y">Lainnya :</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div id="dvPassport" style="display: none">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <textarea name="keterangan_lainnya" id="txtPassportNumber" class="form-control" cols="" rows="4" placeholder="Lainnya..."></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Foto</label>
                                            <input type="file" class="" name="images" id="myText">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">REKAM</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
<script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
<script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(
        function() {
            $(' #example').DataTable();

            function ShowHideDiv() {
                var ddlPassport = document.getElementById("ddlPassport");
                var dvPassport = document.getElementById("dvPassport");
                dvPassport.style.display = ddlPassport.value == "Y" ? "block" : "none";
            }
        });


    function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = ddlPassport.value == "Y" ? "block" : "none";
    }

    function myFunction() {
        document.getElementById("myText").disabled = true;
    }

    function myFunctionFalse() {
        // if (document.getElementById("izin")) {
        //     document.getElementById("myText").disabled = true.required = false;
        // } else {
        //     document.getElementById("myText").disabled = false.required = false;
        // }
        document.getElementById("myText").disabled = false.required = false;
    }

    function ShowHideDiv() {
        var ddlPassport = document.getElementById("ddlPassport");
        var dvPassport = document.getElementById("dvPassport");
        dvPassport.style.display = ddlPassport.value == "Y" ? "block" : "none";
    }

    function sakit_izin() {
        if (getElementById("")) {

        }
    }
</script>