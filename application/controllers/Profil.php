<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
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
        $this->template->load('template', 'profil/index', $data);
    }

    public function update_profil($nip)
    {
        $foto = $this->upload_foto();

        $nip = $_POST['nip_no_kontrak'];
        $nama = $_POST['nama_pegawai'];
        $password = $this->input->post('password_baru');
        $nama_pendek = $_POST['nama_pendek'];
        $hashPass = password_hash($password, PASSWORD_DEFAULT);
        $test = password_verify($password, $hashPass);
        if ($foto['file_name'] == '') {
            if ($password == '') {
                $data = array(
                    'nama' => $nama,
                    'nama_pendek' => $nama_pendek
                );
            } else {
                $data = array(
                    'nama' => $nama,
                    'nama_pendek' => $nama_pendek,
                    'password' => $hashPass
                );
            }
        } else {
            if ($password == '') {
                $data = array(
                    'nama' => $nama,
                    'nama_pendek' => $nama_pendek,
                    'foto' => $foto['file_name']
                );
            } else {
                $data = array(
                    'nama' => $nama,
                    'nama_pendek' => $nama_pendek,
                    'foto' => $foto['file_name'],
                    'password' => $hashPass
                );
            }
        }
        $this->Crud_model->edit_data(array('nip' => $nip), $data, "tbl_pegawai");
        redirect('Auth/logout');
    }

    function upload_foto()
    {
        $config['upload_path']          = './assets/foto_profil';
        $config['allowed_types']        = 'gif|jpg|png';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('images');
        return $this->upload->data();
    }
}
        
    /* End of file  Profil.php */
