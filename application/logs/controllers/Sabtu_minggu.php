<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Sabtu_minggu extends CI_Controller
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
        $data['sabtu_minggu'] = $this->Crud_model->tampil_data_order_by("id_akses_sabtu_minggu", "v_akses_sabtu_minggu")->result();
        $this->template->load('template', 'sabtu_minggu/index', $data);
    }

    public function tambah_data()
    {
        if ($this->Crud_model->select_where("tbl_akses_sabtu_minggu", array('nip' => $_POST['nip']))->num_rows() > 0) {
            echo 'nama sudah ada';
        } else {
            $data = array('nip' => $_POST['nip']);
            $this->Crud_model->input_data($data, "tbl_akses_sabtu_minggu");
            redirect('Sabtu_minggu');
        }
    }

    public function hapus_data($id)
    {
        $this->Crud_model->delete(array('id_akses_sabtu_minggu' =>  $id), "tbl_akses_sabtu_minggu");
        redirect('Sabtu_minggu');
    }
}
        
    /* End of file  Sabtu_minggu.php */
