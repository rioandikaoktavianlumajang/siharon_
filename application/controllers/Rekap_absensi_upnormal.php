<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_absensi_upnormal extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user_level') == '') {
            redirect('auth');
        }
        $this->load->model("Crud_model");
    }

    public function index()
    {
        $data['absensi_pegawai'] = $this->Crud_model->select_where_order_by("tgl_hadir", "t_absensi", array('jam_kerja' => '12'))->result();
        $this->template->load('template', 'rekap_absensi_upnormal/index', $data);
    }

    public function update_data($kd_hadir)
    {
        $data['absensi_pegawai'] = $this->Crud_model->select_where("t_absensi", array('kd_hadir' => $kd_hadir))->result();
        $this->template->load('template', 'rekap_absensi_upnormal/ubah_data', $data);
    }

    public function hapus_data($kd_hadir)
    {
        $this->Crud_model->delete(array('kd_hadir' => $kd_hadir), "t_absensi");
        redirect('Rekap_absensi_upnormal');
    }
}
        
    /* End of file  rekap_absensi_upnormal.php */
