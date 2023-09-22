<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // if ($this->session->userdata('id_user_level') == '') {
        //     redirect('Auth');
        // }
        $this->load->model('Crud_model');
    }

    public function akumulatif_telat()
    {
    }

    public function belum_absen()
    {
        $sudah_absen = $this->db->query("SELECT * FROM tbl_pegawai WHERE NOT EXISTS (SELECT * FROM t_absensi WHERE tbl_pegawai.nip = t_absensi.nip_no_kontrak)")->result();
        foreach ($sudah_absen as $data_sudah_absen) {
            echo $data_sudah_absen->nip . '<br>';
        }
    }

    function upload_foto()
    {
        $config['file_name'] = str_replace("_", "I", $_FILES['images']['name']);
        $config['upload_path']          = './assets/foto_absen';
        // =======setane iki
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }

    public function pegawai_belum_rekam()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hari_ini = date('Y-m-d');
        $sudah_rekam = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => $hari_ini))->result();
        foreach ($sudah_rekam as $data_sudah_rekam) {
            echo "sudah rekam hari ini = " . $data_sudah_rekam->nip_no_kontrak;
            echo "<br>--------------------------------------------------------------------<br>";
            echo "belum rekam hari ini = ";
            $blm_rekam = $this->db->query("SELECT * FROM tbl_pegawai WHERE NOT EXISTS (SELECT * FROM t_absensi WHERE tgl_hadir='$hari_ini' &&  t_absensi.nip_no_kontrak = tbl_pegawai.nip)")->result();
            foreach ($blm_rekam as $data_blm_rekam) {
                echo $data_blm_rekam->nip . '<br>';
            }
        }
    }

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hari_ini = date('Y-m-d');
        $bulan_ini = date('m');
        $tahun_ini = date('Y');
        $nip = $this->session->userdata('nip');
        
        $data['rekap_angka_presensi_hadir'] = $this->db->query("SELECT * FROM `t_absensi` WHERE time_datang!='00:00:00' AND nip_no_kontrak = '$nip' AND YEAR(tgl_hadir)='$tahun_ini' AND MONTH(tgl_hadir)='$bulan_ini'")->num_rows();
        $data['rekap_angka_presensi_sakit'] = $this->db->query("SELECT * FROM `t_absensi` WHERE izin='Sakit' AND nip_no_kontrak = '$nip' AND YEAR(tgl_hadir)='$tahun_ini' AND MONTH(tgl_hadir)='$bulan_ini'")->num_rows();
        $data['rekap_angka_presensi_izin'] = $this->db->query("SELECT * FROM `t_absensi` WHERE izin='Izin' AND nip_no_kontrak = '$nip' AND YEAR(tgl_hadir)='$tahun_ini' AND MONTH(tgl_hadir)='$bulan_ini'")->num_rows();
        $data['akumulatif_telat'] = $this->db->query("SELECT nip_no_kontrak, tgl_hadir, nama_pegawai, SEC_TO_TIME(SUM(TIME_TO_SEC(telat))) as telat FROM t_absensi WHERE tgl_hadir LIKE '2023%' GROUP BY nip_no_kontrak ORDER BY SEC_TO_TIME(SUM(TIME_TO_SEC(telat))) DESC ")->result();

        $data['total_pegawai'] = $this->Crud_model->tampil_data("t_absensi")->num_rows();
        $data['sudah_rekam'] = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d')))->num_rows();
        $data['sudah_rekam_datang'] = $this->db->query("SELECT * FROM t_absensi WHERE tgl_hadir='$hari_ini' && izin NOT IN ('Sakit')")->num_rows();
        $data['sudah_rekam_izin'] = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d'), 'izin' => 'izin'))->num_rows();
        $data['sudah_rekam_sakit'] = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d'), 'izin' => 'Sakit'))->num_rows();
        $data['sudah_rekam_dl'] = $this->db->query("SELECT * FROM t_absensi WHERE tgl_hadir='$hari_ini' && dinas_luar IS NOT NULL")->num_rows();

        // TAMPILKAN DATA ABSEN UNTUK DI HITUNG KETERLAMBATAN
        $data['pegawai_sering_terlambat'] = $this->db->query("SELECT * FROM t_absensi WHERE jam_kerja = '8' AND tgl_hadir = '$hari_ini' AND telat != '00:00:00' ORDER BY telat DESC LIMIT 10")->result();
        // $data['pegawai_sering_terlambat'] = $this->db->query("SELECT * FROM t_absensi WHERE jam_kerja = '8' && tgl_hadir = '$hari_ini' ORDER BY telat DESC LIMIT 10")->result();
        $data['pegawai_jarang_terlambat'] = $this->db->query("SELECT * from t_absensi WHERE jam_kerja = '8' && tgl_hadir = '$hari_ini' ORDER BY telat ASC LIMIT 5")->result();
        $data['pegawai_yang_bergejala_ili'] = $this->db->query("SELECT DISTINCT nama,nip FROM tbl_ili WHERE tanggal = '$hari_ini' && bergejala = 'Y'")->result();
        $data['ili'] = $this->db->query("SELECT * FROM tbl_ili WHERE tanggal = '2021-02-24' && bergejala = 'Y'")->result();

        $data['data_pegawai_absen_hari_ini'] = $this->Crud_model->select_where('t_absensi', array('tgl_hadir' => date('Y-m-d')))->result();
        $cek_sudah_absen = $this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $this->session->userdata('nip'), 'tgl_hadir' => date('Y-m-d')))->num_rows();
        $nip = $this->session->userdata('nip');
        if ($cek_sudah_absen > 0) {
            $data_pegawai_absen_hari_ini = $this->Crud_model->select_where('t_absensi', array('tgl_hadir' => date('Y-m-d')))->result();
            foreach ($data_pegawai_absen_hari_ini as $data_data_pegawai_absen_hari_ini) {
            }
            $data['pegawai_belum_absen'] = $this->db->query("SELECT * FROM tbl_pegawai WHERE NOT EXISTS (SELECT * FROM t_absensi WHERE tgl_hadir='$hari_ini' &&  t_absensi.nip_no_kontrak = tbl_pegawai.nip)")->result();
            // $data['rekam_per_pegawai'] = $this->Crud_model->select_where_dashboard('tgl_hadir', "t_absensi", array('nip_no_kontrak' => $this->session->userdata('nip')))->result();
            $data['rekam_per_pegawai'] = $this->db->query("SELECT * FROM `t_absensi` WHERE nip_no_kontrak = '$nip' ORDER BY tgl_hadir DESC ")->result();
            $data['user'] = $this->Crud_model->tampil_data("tbl_pegawai")->num_rows();
            $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->num_rows();
            $data['pegawai_terlambat'] = $this->Crud_model->tampil_data("t_pegawai")->result();
            $this->template->load('template', 'dashboard/index', $data);
        } else {
            $data_pegawai_absen_hari_ini = $this->Crud_model->select_where('t_absensi', array('tgl_hadir' => date('Y-m-d')))->result();
            foreach ($data_pegawai_absen_hari_ini as $data_data_pegawai_absen_hari_ini) {
            }
            $data['pegawai_belum_absen'] = $this->db->query("SELECT * FROM tbl_pegawai WHERE NOT EXISTS (SELECT * FROM t_absensi WHERE tgl_hadir='$hari_ini' &&  t_absensi.nip_no_kontrak = tbl_pegawai.nip)")->result();
            // $data['rekam_per_pegawai'] = $this->Crud_model->select_where_dashboard('tgl_hadir', "t_absensi", array('nip_no_kontrak' => $this->session->userdata('nip')))->result();
            $data['rekam_per_pegawai'] = $this->db->query("SELECT * FROM `t_absensi` WHERE nip_no_kontrak = '$nip' ORDER BY tgl_hadir DESC ")->result();
            $data['user'] = $this->Crud_model->tampil_data("tbl_pegawai")->num_rows();
            $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->num_rows();
            $data['pegawai_terlambat'] = $this->Crud_model->tampil_data("t_pegawai")->result();
            $this->template->load('template', 'dashboard/index', $data);
        }
    }
}
        
    /* End of file  dashboard.php */
