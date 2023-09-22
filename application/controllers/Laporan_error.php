<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_error extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user_level') == '') {
            redirect('Auth');
        }
        $this->load->model("Crud_model");
    }

    public function index()
    {
        $data['laporan_error'] = $this->Crud_model->tampil_data("laporan_error")->result();
        $this->load->view('laporan_error', $data);
    }

    public function tambah_data()
    {
        $foto = $this->upload_foto();
        $data = array('upload_file' => $foto['file_name'], 'penyebab' => $_POST['penyebab']);
        $this->Crud_model->input_data($data, "laporan_error");
        redirect('Auth');
    }

    function upload_foto()
    {
        $config['upload_path']          = './assets/foto_error';
        $config['allowed_types']        = '*';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }
}
        
    /* End of file  Laporan_error.php */
