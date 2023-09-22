<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user_level') == '') {
            redirect('Auth');
        }
        $this->load->model('Crud_model');
    }

    public function belum_absen()
    {
        $sudah_absen = $this->db->query("SELECT * FROM tbl_pegawai WHERE NOT EXISTS (SELECT * FROM t_absensi WHERE tbl_pegawai.nip = t_absensi.nip_no_kontrak)")->result();
        foreach ($sudah_absen as $data_sudah_absen) {
            echo $data_sudah_absen->nip . '<br>';
        }
    }

    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hari_ini = date('Y-m-d');

        $data['total_pegawai'] = $this->Crud_model->tampil_data("t_absensi")->num_rows();
        $data['sudah_rekam'] = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d')))->num_rows();
        $data['sudah_rekam_datang'] = $this->db->query("SELECT * FROM t_absensi WHERE izin NOT IN ('Sakit')")->num_rows();
        $data['sudah_rekam_izin'] = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d'), 'izin' => 'izin'))->num_rows();
        $data['sudah_rekam_sakit'] = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d'), 'izin' => 'Sakit'))->num_rows();
        $data['sudah_rekam_dl'] = $this->db->query("SELECT * FROM t_absensi WHERE dinas_luar IS NOT NULL")->num_rows();

        // TAMPILKAN DATA ABSEN UNTUK DI HITUNG KETERLAMBATAN
        $data['pegawai_sering_terlambat'] = $this->db->query("SELECT * FROM t_absensi WHERE tgl_hadir = '$hari_ini' ORDER BY telat DESC LIMIT 10")->result();
        $data['pegawai_jarang_terlambat'] = $this->db->query("SELECT * from t_absensi WHERE tgl_hadir = '$hari_ini' ORDER BY telat ASC LIMIT 5")->result();

        $data['data_pegawai_absen_hari_ini'] = $this->Crud_model->select_where('t_absensi', array('tgl_hadir' => date('Y-m-d')))->result();
        $cek_sudah_absen = $this->Crud_model->select_where("t_absensi", array('nip_no_kontrak' => $this->session->userdata('nip'), 'tgl_hadir' => date('Y-m-d')))->num_rows();
        if ($cek_sudah_absen > 0) {
            $data_pegawai_absen_hari_ini = $this->Crud_model->select_where('t_absensi', array('tgl_hadir' => date('Y-m-d')))->result();
            foreach ($data_pegawai_absen_hari_ini as $data_data_pegawai_absen_hari_ini) {
            }
            $data['pegawai_belum_absen'] = $this->db->query("SELECT * FROM tbl_pegawai WHERE NOT EXISTS (SELECT * FROM t_absensi WHERE tbl_pegawai.nip = t_absensi.nip_no_kontrak)")->result();
            $data['rekam_per_pegawai'] = $this->Crud_model->select_where_dashboard('tgl_hadir', "t_absensi", array('nip_no_kontrak' => $this->session->userdata('nip')))->result();
            $data['user'] = $this->Crud_model->tampil_data("tbl_pegawai")->num_rows();
            $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->num_rows();
            $data['pegawai_terlambat'] = $this->Crud_model->tampil_data("t_pegawai")->result();
            $this->template->load('template', 'dashboard/index', $data);
        } else {
            $data_pegawai_absen_hari_ini = $this->Crud_model->select_where('t_absensi', array('tgl_hadir' => date('Y-m-d')))->result();
            foreach ($data_pegawai_absen_hari_ini as $data_data_pegawai_absen_hari_ini) {
            }
            $data['pegawai_belum_absen'] = $this->db->query("SELECT * FROM tbl_pegawai WHERE NOT EXISTS (SELECT * FROM t_absensi WHERE tbl_pegawai.nip = t_absensi.nip_no_kontrak)")->result();
            $data['rekam_per_pegawai'] = $this->Crud_model->select_where_dashboard('tgl_hadir', "t_absensi", array('nip_no_kontrak' => $this->session->userdata('nip')))->result();
            $data['user'] = $this->Crud_model->tampil_data("tbl_pegawai")->num_rows();
            $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->num_rows();
            $data['pegawai_terlambat'] = $this->Crud_model->tampil_data("t_pegawai")->result();
            $this->template->load('template', 'dashboard/index', $data);
        }
    }
}
        
    /* End of file  dashboard.php */
