<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekam_ketapang extends CI_Controller
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

    public function index()
    {
        $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->result();
        $this->template->load('template_rekam_upnormal', 'rekam_ketapang/index', $data);
    }

    public function rekam()
    {
        date_default_timezone_set('Asia/Jakarta');
        $foto = $this->upload_foto();
        if (substr($_POST['waktu'], 0, 6) == 'datang') {
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
                            'time_pulang' => '23:59:00',
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
                            'time_pulang' => '23:59:00',
                            'file_datang' => $foto['file_name'],
                            'lainnya' => $_POST['keterangan_lainnya'],
                            'telat' => $telat
                        );
                    }
                    $data_untuk_besok = array(
                        'jam_kerja' => '12',
                        'nip_no_kontrak' => $_POST['nip_no_kontrak'],
                        'nama_pegawai' => $_POST['nama_pegawai'],
                        'wilker' => $_POST['wilker'],
                        'tgl_hadir' => $_POST['tanggal_besok'],
                        'time_datang' => '00:01:00',
                        'lainnya' => $_POST['keterangan_lainnya']
                    );
                }
                $this->Crud_model->input_data($data, "t_absensi");
                $this->Crud_model->input_data($data_untuk_besok, "t_absensi");
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

    function upload_foto()
    {
        date_default_timezone_set('Asia/Jakarta');
        $config['file_name'] = $this->session->userdata('nip') . '_' . date('Y_m_d_H_i_s');
        $config['upload_path']          = './assets/foto_absen';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }
}
        
    /* End of file  Rekam_ketapang.php */
