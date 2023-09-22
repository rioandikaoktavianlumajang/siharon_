<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user_level') == '') {
            redirect('Auth');
        }
        $this->load->model('Crud_model');
    }

    public function index()
    {
        $data['pegawai'] = $this->Crud_model->tampil_data("tbl_pegawai")->result();
        $this->template->load('template', 'pegawai/index', $data);
    }

    public function tambah_data()
    {
        $password       = '12345';
        $options        = array("cost" => 4);
        $hashPassword   = password_hash($password, PASSWORD_BCRYPT, $options);
        $nip = $this->input->post('nip'); //objek model
        $nama = $this->input->post('nama');
        $data = array( //menampung data
            'nip' => $nip,
            'nama' => $nama,
            'password' => $hashPassword,
            'foto' => 'atomix_user31.png'
        );
        $this->Crud_model->input_data($data, "tbl_pegawai");
        redirect('Pegawai');
    }

    public function ubah_data($nip)
    {
        $data = array(
            'nama' => $this->input->post('nama')
        );
        $this->Crud_model->edit_data(array('nip' => $nip), $data, "tbl_pegawai");
        redirect('Pegawai');
    }

    public function hapus_data($nip)
    {
        $this->Crud_model->delete(array('nip' => $nip), "tbl_pegawai");
        redirect('Pegawai');
    }
}
        
    /* End of file  Pegawai.php */
