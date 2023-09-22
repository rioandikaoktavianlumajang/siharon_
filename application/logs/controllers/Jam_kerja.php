<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jam_kerja extends CI_Controller
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
        $data['pegawai'] = $this->Crud_model->tampil_data("tbl_pegawai")->result();
        $data['jam_kerja'] = $this->Crud_model->tampil_data("v_jam_kerja")->result();
        $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->result();
        $this->template->load('template', 'jam_kerja/index', $data);
    }

    public function tambah_data()
    {
        $data = array(
            'waktu_jam_kerja' => '12',
            'nip' => $_POST['nip'],
            'wilker' => $_POST['wilker'],
            'tanggal' => $_POST['tanggal'],
            'jam_terbuka_rekam_datang' => '',
            'jam_datang' => $_POST['jam_datang'],
            'jam_terbuka_rekam_pulang' => '',
            'jam_pulang' => $_POST['jam_pulang']
        );
        $this->Crud_model->input_data($data, "t_jam_kerja");
        redirect('Jam_kerja');
    }

    public function hapus_data($id)
    {
        $this->Crud_model->delete(array('id_jam_kerja' => $id), "t_jam_kerja");
        redirect('Jam_kerja');
    }

    public function ubah_data($id)
    {
        $data['pegawai'] = $this->Crud_model->tampil_data("tbl_pegawai")->result();
        $data['jam_kerja'] = $this->Crud_model->select_where("t_jam_kerja", array('id_jam_kerja' => $id))->result();
        $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->result();
        $this->template->load('template', 'jam_kerja/ubah_data', $data);
    }

    public function update_data($id)
    {
        $data = array(
            'nip' => $_POST['nip'],
            'wilker' => $_POST['wilker'],
            'tanggal' => $_POST['tanggal'],
            'jam_datang' => $_POST['jam_datang'],
            'jam_pulang' => $_POST['jam_pulang']
        );
        $this->Crud_model->edit_data(array('id_jam_kerja' => $id), $data, "t_jam_kerja");
        redirect('jam_kerja');
    }
}
        
    /* End of file  jam_kerja.php */
