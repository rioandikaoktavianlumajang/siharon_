<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kegiatan extends CI_Controller
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
        $data = array(
            'kegiatan' => $this->db->query("SELECT * FROM tbl_note")->result(),
        );
        $this->template->load('template', 'kegiatan_hari_ini/table', $data);
    }

    public function form_user()
    {
        $this->template->load('template', 'kegiatan_user/form');
    }

    public function cek_kegiatan_hari_ini($id)
    {
        $data = array(
            'kegiatan' => $this->Crud_model->select_where("tbl_note", array('tbl_note' => $id))->result()
        );
        $this->template->load('template', 'kegiatan_hari_ini/cek', $data);
    }

    public function cari_tanggal()
    {
        $tgl_mulai = $_POST['mulai'];
        $tgl_sampai = $_POST['sampai'];

        $data = array(
            'kegiatan' => $this->Crud_model->between('tgl', $tgl_mulai, $tgl_sampai, "tbl_note")->result(),
            'tgl_mulai' =>$_POST['mulai'],
            'tgl_sampai' =>$_POST['sampai']
        );
        // $data['kegiatan'] = $this->Crud_model->between('tgl', $tgl_mulai, $tgl_sampai, "tbl_note")->result();
        $this->template->load('template', 'kegiatan_hari_ini/periode_tanggal', $data);
    }

    public function cari_tanggal_user()
    {
        $tgl_mulai = $_POST['mulai'];
        $tgl_sampai = $_POST['sampai'];
        $nip = $this->session->nip;

        $data = array(
            'kegiatan' => $this->db->query("SELECT * FROM tbl_note WHERE tgl BETWEEN '$tgl_mulai' AND '$tgl_sampai' AND nip = '$nip'")->result(),
            'tgl_mulai' =>$_POST['mulai'],
            'tgl_sampai' =>$_POST['sampai']
        );
        $this->template->load('template', 'kegiatan_user/periode_tanggal_user', $data);
    }
}
        
    /* End of file  Kegiatan.php */
