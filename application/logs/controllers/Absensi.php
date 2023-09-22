<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user_level') == '') {
            redirect('Auth');
        }
        $this->load->model("Crud_model");
        $this->load->library('form_validation');
    }

    public function rekam_kehadiran_upnormal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->result();
        $data['jam_kerja'] = $this->Crud_model->select_where("v_jam_kerja", array('nip' => $this->session->userdata('nip'), 'tanggal' => date('Y-m-d')))->result();
        $this->template->load('template', 'absensi/absen_pegawai_upnormal', $data);
    }

    public function tambah_data_upnormal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $foto = $this->upload_foto();
        if (substr($_POST['waktu'], 0, 6) == 'datang') {
            // if ($this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $_POST['nip_no_kontrak'], 'tgl_hadir' => date('Y-m-d')))->num_rows() > 0) {
            // mulai ini
            //     if ($this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $_POST['nip_no_kontrak']))->num_rows() > 0) {
            //     $this->session->set_flashdata(
            //         'msg',
            //         '<div class="alert alert-danger">
            //                 <i class="fa fa-check-circle fa-10x"></i>
            //                 <p>Anda sudah rekam datang</p>
            //             </div>'
            //     );
            //     redirect('Absensi/rekam_kehadiran_upnormal');
            // } else {
                $foto = $this->upload_foto();
                if ($foto['file_name'] == '') {
                    $this->session->set_flashdata(
                        'msg',
                        '<div class="alert alert-danger">
                            <i class="fa fa-check-circle fa-10x"></i>
                            <p>Foto tidak boleh kosong</p>
                        </div>'
                    );
                    redirect('Absensi/rekam_kehadiran_upnormal');
                } else {
                    if ($_POST['wilker'] == '') {
                        $this->session->set_flashdata(
                            'msg',
                            '<div class="alert alert-danger">
                                <i class="fa fa-check-circle fa-10x"></i>
                                <p>Pilih lokasi terlebih dahulu</p>
                            </div>'
                        );
                        redirect('Absensi/rekam_kehadiran_upnormal');
                    } else {
                        $jam_rekam  = date_create(date('H:i:s', strtotime(substr($_POST['waktu'], 7, 8))));
                        $jam_terlambat = date_create(date('H:i:s', strtotime($_POST['jam_kerja_datang'])));
                        $diff  = date_diff($jam_rekam, $jam_terlambat);
                        $telat = $diff->h . ':' . $diff->i . ':' . $diff->s;
                        // JIKA REKAM SEBELUM JAM START 
                        if (date('H:i:s', strtotime(substr($_POST['waktu'], 7, 8))) <= date('H:i:s', strtotime($_POST['jam_kerja_datang']))) {
                            // echo 'belum terlmbat';
                            $data = array(
                                'jam_kerja' => '12',
                                'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                                'nama_pegawai' => $_POST['nama_pegawai'],
                                'wilker' => $_POST['wilker'],
                                'tgl_hadir' => date('Y-m-d'),
                                'time_datang' => substr($_POST['waktu'], 7, 8),
                                'file_datang' => $foto['file_name'],
                                'lainnya' => $_POST['keterangan_lainnya']
                            );
                        } else {
                            // echo 'terlmbat';
                            $data = array(
                                'jam_kerja' => '12',
                                'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                                'nama_pegawai' => $_POST['nama_pegawai'],
                                'wilker' => $_POST['wilker'],
                                'tgl_hadir' => date('Y-m-d'),
                                'time_datang' => substr($_POST['waktu'], 7, 8),
                                'file_datang' => $foto['file_name'],
                                'lainnya' => $_POST['keterangan_lainnya'],
                                'telat' => $telat
                            );
                        }
                    }
                    $this->Crud_model->input_data($data, "t_absensi");
                    $this->session->set_flashdata(
                        'msg',
                        '<div class="alert alert-success">
                                <i class="fa fa-check-circle fa-10x"></i>
                                <p>Rekam Berhasil & Selamat Bekerja</p>
                            </div>'
                    );
                    redirect('Dashboard');
                }
            // }
        }
        if (substr($_POST['waktu'], 0, 6) == 'pulang') {
            $foto = $this->upload_foto();
            if ($foto['file_name'] == '') {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">
                                            <i class="fa fa-check-circle fa-10x"></i>
                                            <p>Foto tidak boleh kosong</p>
                                        </div>'
                );
                redirect('Absensi/rekam_kehadiran_upnormal');
            } else {
                if ($_POST['wilker'] == '') {
                    $this->session->set_flashdata(
                        'msg',
                        '<div class="alert alert-danger">
                            <i class="fa fa-check-circle fa-10x"></i>
                            <p>Pilih lokasi terlebih dahulu</p>
                        </div>'
                    );
                    redirect('Absensi/rekam_kehadiran_upnormal');
                } else {
                    // $jam_rekam  = date_create(date('H:i', strtotime(substr($_POST['waktu'], 7, 8))));
                    // $jam_dia_pulang = date_create(date('H:i', strtotime($_POST['jam_kerja_pulang'])));
                    // $diff  = date_diff($jam_dia_pulang, $jam_rekam);
                    // $jam_pengganti_telat = $diff->h . ':' . $diff->i . ':' . $diff->s;
                    $data = array(
                        'time_pulang' => substr($_POST['waktu'], 7, 8),
                        'file_pulang' => $foto['file_name']
                        // 'jam_penggantu_telat' => $jam_pengganti_telat
                    );
                    $where = array(
                        'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                        'tgl_hadir' => date('Y-m-d')
                    );
                    $this->Crud_model->edit_data($where, $data, "t_absensi");
                    $this->session->set_flashdata(
                        'msg',
                        '<div class="alert alert-success">
                            <i class="fa fa-check-circle fa-10x"></i>
                            <p>Rekam Berhasil & Selamat Beristirahat</p>
                        </div>'
                    );
                    redirect('Dashboard');
                }
            }
        }
        if (substr($_POST['waktu'], 0, 4) == 'izin') {
            if ($_POST['wilker'] == '') {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">
                        <i class="fa fa-check-circle fa-10x"></i>
                        <p>Pilih lokasi terlebih dahulu</p>
                    </div>'
                );
                redirect('Absensi/rekam_kehadiran_upnormal');
            } else {
                $data = array( //menampung data
                    'jam_kerja' => '12',
                    'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                    'nama_pegawai' => $_POST['nama_pegawai'],
                    'tgl_hadir' => date('Y-m-d'),
                    'wilker' => $_POST['wilker'],
                    'izin' => 'Izin',
                    'waktu_izin' => substr($_POST['waktu'], 5, 8)
                );
                $this->Crud_model->input_data($data, "t_absensi");
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success">
                        <i class="fa fa-check-circle fa-10x"></i>
                                <p>Rekam Berhasil & Selamat Bekerja</p>
                            </div>'
                );
                redirect('Dashboard');
            }
        }
        if (substr($_POST['waktu'], 0, 5) == 'sakit') {
            if ($_POST['wilker'] == '') {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">
                        <i class="fa fa-check-circle fa-10x"></i>
                        <p>Pilih lokasi terlebih dahulu</p>
                    </div>'
                );
                redirect('Absensi/rekam_kehadiran_upnormal');
            } else {
                $data = array( //menampung data
                    'jam_kerja' => '12',
                    'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                    'nama_pegawai' => $_POST['nama_pegawai'],
                    'tgl_hadir' => date('Y-m-d'),
                    'wilker' => $_POST['wilker'],
                    'izin' => 'Sakit',
                    'file_keterangan' => $foto['file_name'],
                    'waktu_izin' => substr($_POST['waktu'], 6, 8)
                );
                $this->Crud_model->input_data($data, "t_absensi");
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success">
                <i class="fa fa-check-circle fa-10x"></i>
                        <p>Lekas Sembuh & Selamat Beristirahat</p>
                    </div>'
                );
                redirect('Dashboard');
            }
        }
        if (substr($_POST['waktu'], 0, 2) == 'dl') {
            $data = array( //menampung data
                'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                'nama_pegawai' => $_POST['nama_pegawai'],
                'tgl_hadir' => date('Y-m-d'),
                'wilker' => $_POST['wilker'],
                'dinas_luar' => substr($_POST['waktu'], 3, 8)
            );
            $this->Crud_model->input_data($data, "t_absensi");
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success">
                    <i class="fa fa-check-circle fa-10x"></i>
                    <p>Rekam Berhasil & Hati-hati dijalan</p>
                </div>'
            );
            redirect('Dashboard');
        }
    }

    public function sakit_izin()
    {
        $data['cek_sudah_rekam_atau_belum'] = $this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $this->session->userdata('nip'), 'tgl_hadir' => date("Y-m-d")))->num_rows();
        $data['pegawai_terlambat'] = $this->Crud_model->tampil_data("t_pegawai")->result();
        $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->result();
        $cek = $this->Crud_model->select_where("v_jam_kerja", array('nip' => $this->session->userdata('nip'), 'tanggal' => date('Y-m-d')))->num_rows();
        if ($cek > 0) {
            // JAM KERJA 12 JAM
            $this->template->load('template', 'absensi/jquery_show_hide', $data);
        } else {
            // JAM KERJA NORMAL 8 JAM 
            $this->template->load('template', 'absensi/jquery_show_hide', $data);
        }
    }

    public function cek_jam()
    {
        date_default_timezone_set('Asia/Jakarta');
        echo date('H:i');
    }

    public function absen_otomatis_setelah_jam_9()
    {
        date_default_timezone_set("Asia/Jakarta");

        // CEK JAM DAN INSERT DATA OTOMATIS JIKA BELUM REKAM HADIR
        if ($this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d')))->num_rows() > 0) {
            $yang_sudah_rekam = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d')))->result();
            foreach ($yang_sudah_rekam as $data_yang_sudah_rekam) {
                $yang_belum_rekam = $this->db->query("SELECT * FROM tbl_pegawai WHERE nip NOT IN ($data_yang_sudah_rekam->nip_no_kontrak)")->result();
                foreach ($yang_belum_rekam as $data_yang_belum_rekam) {
                    echo $data_yang_belum_rekam->nip;
                }
            }

            // foreach ($yang_sudah_rekam as $data_yang_sudah_rekam) {
            //     $data = array(
            //         'jam_kerja' => '8',
            //         'nip_no_kontrak' => $data_yang_sudah_rekam->nip_no_kontrak,
            //         'nama_pegawai' => $data_yang_sudah_rekam->nama_pegawai,
            //         'wilker' => '',
            //         'tgl_hadir' => date('Y-m-d'),
            //         'time_datang' => '09:00:00',
            //         'file_datang' => ''
            //     );
            //     print_r($data);
            //     // $this->Crud_model->input_data($data, "t_absensi");
            //     // $this->session->set_flashdata(
            //     //     'msg',
            //     //     '<div class="alert alert-success">
            //     //         <i class="fa fa-check-circle fa-10x"></i>
            //     //         <p>Rekam Berhasil & Selamat Bekerja</p>
            //     //     </div>'
            //     // );
            //     // redirect('Dashboard');
            // }
        } else {
            echo 'belum ada yg absen';
        }

        // $cek_yang_blm_rekam = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d')))->result();
        // foreach ($cek_yang_blm_rekam as $data_cek_yang_blm_rekam) {
        //     echo $data_cek_yang_blm_rekam->ni
        // }

        // if (date('H:i') > date('H:i', strtotime('09:00'))) {
        //     if ($this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d'), 'nip_no_kontrak' => $this->session->userdata('nip')))->num_rows() > 0) {
        //         echo 'ada';
        //     } else {
        //         echo 'tidak ada';
        //     }
        // } else {
        //     echo 'blm jam 9';
        // }
    }

    public function index()
    {
        $data['cek_sudah_rekam_atau_belum'] = $this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $this->session->userdata('nip'), 'tgl_hadir' => date("Y-m-d")))->num_rows();
        $data['pegawai_terlambat'] = $this->Crud_model->tampil_data("t_pegawai")->result();
        $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->result();
        $cek = $this->Crud_model->select_where("v_jam_kerja", array('nip' => $this->session->userdata('nip'), 'tanggal' => date('Y-m-d')))->num_rows();
        if ($cek > 0) {
            // JAM KERJA 12 JAM
            $this->template->load('template', 'absensi/absen_pegawai_up_normal', $data);
        } else {
            // JAM KERJA NORMAL 8 JAM 
            $this->template->load('template', 'absensi/absensi_pegawai', $data);
        }
    }

    public function tambah_data_normal()
    {
        date_default_timezone_set('Asia/Jakarta');
        $foto = $this->upload_foto();
        // if ($_POST['wilker'] == 'WFH') {
        //     if ($this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $_POST['nip_no_kontrak'], 'tgl_hadir' => date('Y-m-d'), 'jam_kerja' => '8'))->num_rows() > 0) {
        //         // PAKAI YG INI JIKA ERRRO SUDAH REKAM PDHAL BELUM
        //         // if ($this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $_POST['nip_no_kontrak'], 'tgl_hadir' => date('Y-m-d')))->num_rows() > 0) {
        //         $this->session->set_flashdata(
        //             'msg',
        //             '<div class="alert alert-danger">
        //                     <i class="fa fa-check-circle fa-10x"></i>
        //                     <p>Anda sudah rekam datang</p>
        //                 </div>'
        //         );
        //         redirect('Absensi');
        //     } else {
        //         $foto = $this->upload_foto();
        //         if ($foto['file_name'] == '') {
        //             $this->session->set_flashdata(
        //                 'msg',
        //                 '<div class="alert alert-danger">
        //                     <i class="fa fa-check-circle fa-10x"></i>
        //                     <p>Foto tidak boleh kosong</p>
        //                 </div>'
        //             );
        //             redirect('Absensi');
        //         } else {
        //             if ($_POST['wilker'] == '') {
        //                 $this->session->set_flashdata(
        //                     'msg',
        //                     '<div class="alert alert-danger">
        //                         <i class="fa fa-check-circle fa-10x"></i>
        //                         <p>Pilih lokasi terlebih dahulu</p>
        //                     </div>'
        //                 );
        //                 redirect('Absensi');
        //             } else {
        //                 $jam_rekam  = date_create(date('H:i', strtotime(substr($_POST['waktu'], 7, 8))));
        //                 $jam_terlambat = date_create(date('H:i', strtotime('08:00:00')));
        //                 $diff  = date_diff($jam_rekam, $jam_terlambat);
        //                 $telat = $diff->h . ':' . $diff->i . ':' . $diff->s;
        //                 $data = array(
        //                     'jam_kerja' => '8',
        //                     'nip_no_kontrak' => $_POST['nip_no_kontrak'],
        //                     'nama_pegawai' => $_POST['nama_pegawai'],
        //                     'wilker' => $_POST['wilker'],
        //                     'tgl_hadir' => date('Y-m-d'),
        //                     'time_datang' => substr($_POST['waktu'], 7, 8),
        //                     'file_datang' => $foto['file_name'],
        //                     'telat' => $telat
        //                 );
        //                 $this->Crud_model->input_data($data, "t_absensi");
        //                 $this->session->set_flashdata(
        //                     'msg',
        //                     '<div class="alert alert-success">
        //                         <i class="fa fa-check-circle fa-10x"></i>
        //                         <p>Rekam Berhasil & Selamat Bekerja</p>
        //                     </div>'
        //                 );
        //                 redirect('Dashboard');
        //             }
        //         }
        //     }
        // }
        if (substr($_POST['waktu'], 0, 6) == 'datang') {
            if ($this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $_POST['nip_no_kontrak'], 'tgl_hadir' => date('Y-m-d')))->num_rows() > 0) {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">
                            <i class="fa fa-check-circle fa-10x"></i>
                            <p>Anda sudah rekam datang</p>
                        </div>'
                );
                redirect('Absensi');
            } else {
                $foto = $this->upload_foto();
                if ($foto['file_name'] == '') {
                    $this->session->set_flashdata(
                        'msg',
                        '<div class="alert alert-danger">
                            <i class="fa fa-check-circle fa-10x"></i>
                            <p>Foto tidak boleh kosong</p>
                        </div>'
                    );
                    redirect('Absensi');
                } else {
                    if ($_POST['wilker'] == '') {
                        $this->session->set_flashdata(
                            'msg',
                            '<div class="alert alert-danger">
                                <i class="fa fa-check-circle fa-10x"></i>
                                <p>Pilih lokasi terlebih dahulu</p>
                            </div>'
                        );
                        redirect('Absensi');
                    } else {
                        $jam_rekam  = date_create(date('H:i:s', strtotime(substr($_POST['waktu'], 7, 8))));
                        $jam_terlambat = date_create(date('H:i:s', strtotime('07:00:00')));
                        $diff  = date_diff($jam_rekam, $jam_terlambat);
                        $telat = $diff->h . ':' . $diff->i . ':' . $diff->s;
                        if (date('H:i:s', strtotime(substr($_POST['waktu'], 7, 8))) <= date('H:i:s', strtotime('07:30:00'))) {
                            // echo 'belum terlmbat';
                            $data = array(
                                'jam_kerja' => '8',
                                'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                                'nama_pegawai' => $_POST['nama_pegawai'],
                                'wilker' => $_POST['wilker'],
                                'tgl_hadir' => date('Y-m-d'),
                                'time_datang' => substr($_POST['waktu'], 7, 8),
                                'file_datang' => $foto['file_name'],
                                'lainnya' => $_POST['keterangan_lainnya']
                            );
                        } else {
                            // echo 'terlmbat';
                            $data = array(
                                'jam_kerja' => '8',
                                'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                                'nama_pegawai' => $_POST['nama_pegawai'],
                                'wilker' => $_POST['wilker'],
                                'tgl_hadir' => date('Y-m-d'),
                                'time_datang' => substr($_POST['waktu'], 7, 8),
                                'file_datang' => $foto['file_name'],
                                'lainnya' => $_POST['keterangan_lainnya'],
                                'telat' => $telat
                            );
                        }
                        $this->Crud_model->input_data($data, "t_absensi");
                        $this->session->set_flashdata(
                            'msg',
                            '<div class="alert alert-success">
                            <i class="fa fa-check-circle fa-10x"></i>
                            <p>Rekam Berhasil & Selamat Bekerja</p>
                        </div>'
                        );
                        redirect('Dashboard');
                    }
                }
            }
        }
        if (substr($_POST['waktu'], 0, 6) == 'pulang') {
            $foto = $this->upload_foto();
            if ($foto['file_name'] == '') {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">
                                            <i class="fa fa-check-circle fa-10x"></i>
                                            <p>Foto tidak boleh kosong</p>
                                        </div>'
                );
                redirect('Absensi');
            } else {
                if ($_POST['wilker'] == '') {
                    $this->session->set_flashdata(
                        'msg',
                        '<div class="alert alert-danger">
                            <i class="fa fa-check-circle fa-10x"></i>
                            <p>Pilih lokasi terlebih dahulu</p>
                        </div>'
                    );
                    redirect('Absensi');
                } else {
                    $data = array(
                        'time_pulang' => substr($_POST['waktu'], 7, 8),
                        'file_pulang' => $foto['file_name']
                        // 'telat' ==== masih belum dikerjakan
                    );
                    $where = array(
                        'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                        'tgl_hadir' => date('Y-m-d')
                    );
                    $this->Crud_model->edit_data($where, $data, "t_absensi");
                    $this->session->set_flashdata(
                        'msg',
                        '<div class="alert alert-success">
                            <i class="fa fa-check-circle fa-10x"></i>
                            <p>Rekam Berhasil & Selamat Beristirahat</p>
                        </div>'
                    );
                    redirect('Dashboard');
                }
            }
        }
        if (substr($_POST['waktu'], 0, 4) == 'izin') {
            if ($_POST['wilker'] == '') {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">
                        <i class="fa fa-check-circle fa-10x"></i>
                        <p>Pilih lokasi terlebih dahulu</p>
                    </div>'
                );
                redirect('Absensi');
            } else {
                $data = array( //menampung data
                    'jam_kerja' => '8',
                    'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                    'nama_pegawai' => $_POST['nama_pegawai'],
                    'tgl_hadir' => date('Y-m-d'),
                    'wilker' => $_POST['wilker'],
                    'izin' => 'Izin',
                    'waktu_izin' => substr($_POST['waktu'], 5, 8)
                );
                $this->Crud_model->input_data($data, "t_absensi");
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success">
                        <i class="fa fa-check-circle fa-10x"></i>
                                <p>Rekam Berhasil & Selamat Bekerja</p>
                            </div>'
                );
                redirect('Dashboard');
            }
        }
        if (substr($_POST['waktu'], 0, 5) == 'sakit') {
            if ($_POST['wilker'] == '') {
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-danger">
                        <i class="fa fa-check-circle fa-10x"></i>
                        <p>Pilih lokasi terlebih dahulu</p>
                    </div>'
                );
                redirect('Absensi');
            } else {
                $data = array( //menampung data
                    'jam_kerja' => '8',
                    'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                    'nama_pegawai' => $_POST['nama_pegawai'],
                    'tgl_hadir' => date('Y-m-d'),
                    'wilker' => $_POST['wilker'],
                    'izin' => 'Sakit',
                    'file_keterangan' => $foto['file_name'],
                    'waktu_izin' => substr($_POST['waktu'], 6, 8)
                );
                $this->Crud_model->input_data($data, "t_absensi");
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success">
                    <i class="fa fa-check-circle fa-10x"></i>
                            <p>Lekas Sembuh & Selamat Beristirahat</p>
                        </div>'
                );
                redirect('Dashboard');
            }
        }
        if (substr($_POST['waktu'], 0, 2) == 'dl') {
            $data = array( //menampung data
                'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                'nama_pegawai' => $_POST['nama_pegawai'],
                'tgl_hadir' => date('Y-m-d'),
                // 'wilker' => $_POST['wilker'],
                'dinas_luar' => substr($_POST['waktu'], 3, 8)
            );
            $this->Crud_model->input_data($data, "t_absensi");
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success">
                    <i class="fa fa-check-circle fa-10x"></i>
                    <p>Rekam Berhasil & Hati-hati dijalan</p>
                </div>'
            );
            redirect('Dashboard');
        }
    }

    function upload_foto_nama_asli()
    {
        $config['upload_path']          = './assets/foto_absen';
        $config['allowed_types']        = 'jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }

    function tes_upload_rename()
    {
        $this->load->view('tes_upload_rename');
    }

    function upload_foto()
    {
        $temp = explode(".", $_FILES["images"]["name"]); //untuk mengambil nama file gambarnya saja tanpa format gambarnya
        $nama_baru = round(microtime(true)) . '.' . end($temp); //fungsi untuk membuat nama acak
        $config['file_name'] = $nama_baru;
        $config['upload_path']          = './assets/foto_absen';
        $config['allowed_types']        = 'jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }
}
        
    /* End of file  Absensi.php */
