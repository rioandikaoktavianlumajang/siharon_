<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Wilker extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user_level') == '') {
            redirect('auth');
        }
        $this->load->model('Crud_model');
    }

    public function index()
    {
        $data['wilker'] = $this->Crud_model->tampil_data("tbl_wilker")->result();
        $this->template->load('template', 'wilker/index', $data);
    }

    public function tambah_data()
    {
        $wilker = $this->input->post('wilker'); //objek model
        $data = array( //menampung data
            'wilker' => $wilker

        );
        $this->Crud_model->input_data($data, "tbl_wilker");
        redirect('Dashboard');
    }

    public function ubah_data($id)
    {
        $data = array(
            'wilker' => $this->input->post('wilker')
        );
        $this->Crud_model->edit_data(array('id_wilker' => $id), $data, "tbl_wilker");
        redirect('Wilker');
    }

    public function hapus_data($id)
    {
        $this->Crud_model->delete(array('id_wilker' => $id), "tbl_wilker");
        redirect('Wilker');
    }
}
        
    /* End of file  Wilker.php */
