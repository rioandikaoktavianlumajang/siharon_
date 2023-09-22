<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Note extends CI_Controller
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
        date_default_timezone_set('Asia/Jakarta');
        $this->template->load('template', 'note/index');
    }

    public function tambah_note()
    {
        $data = array(
            'nip' => $_POST['nip_no_kontrak'],
            'nama' => $_POST['nama_pegawai'],
            'tgl' => date('Y-m-d'),
            'kegiatan_hari_ini' => $_POST['kegiatan_hari_ini']
        );
        $sql = $this->Crud_model->input_data($data, "tbl_note");
        if ($sql == TRUE) {
            $this->session->set_flashdata(
            'msg',
            '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: "warning",
                    title: "Koneksi internet error",
                    text: "",
                }); 
            </script>
            ');
        } else {
            $this->session->set_flashdata(
            'msg',
            '
            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <script>
                Swal.fire({
                    icon: "success",
                    title: "KKP Kelas II Probolinggo <br> Layak WBK Nasional",
                    text: "",
                    imageUrl: "'.base_url('assets/logo_wbk/wbk.jpg').'",
                    imageWidth: 260,
                    imageHeight: 250,
                    imageAlt: "WBK KKP Prob",
                })  
            </script>
            '
        );
            redirect('Dashboard');
        }
    }
}
        
    /* End of file  Note.php */
