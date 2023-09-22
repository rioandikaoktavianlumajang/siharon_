<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Belum_rekam_hadir extends CI_Controller
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
        $this->template->load('template', 'belum_rekam_hadir/index');
        if ($this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d')))->num_rows() > 0) {
            $yang_sudah_rekam = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d')))->result();
            $yang_belum_rekam = $this->Crud_model->select_where("t_absensi", array('tgl_hadir' => date('Y-m-d')))->result();
            foreach ($yang_belum_rekam as $data_yang_belum_rekam) {
                echo $data_yang_belum_rekam->nip_no_kontrak;
            }
        } else {
        }
    }
}
        
    /* End of file  Belum_rekam_hadir.php */
