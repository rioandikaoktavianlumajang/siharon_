<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Input_presensi extends CI_Controller
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
        $hari_ini = date('Y-m-d');
        $data['pegawai_belum_absen'] = $this->db->query("SELECT * FROM tbl_pegawai WHERE NOT EXISTS (SELECT * FROM t_absensi WHERE tgl_hadir='$hari_ini' &&  t_absensi.nip_no_kontrak = tbl_pegawai.nip)")->result();
        $data['pegawai'] = $this->Crud_model->tampil_data("tbl_pegawai")->result();
        $this->template->load('template', 'input_presensi/index', $data);
    }

    public function tambah()
    {
        $pecah = explode("/", $_POST['nip']);
        if ($_POST['keterangan'] == 'Tidak Rekam Pulang') {
            $data = array(
                'jam_kerja' => $_POST['jam_kerja'],
                'nip_no_kontrak' => $pecah[0],
                'nama_pegawai' => $pecah[1],
                'keterangan' => $_POST['keterangan'],
                'tgl_hadir' => $_POST['tanggal'],
                'time_datang' => '00:00:01'
            );
            $this->Crud_model->input_data($data, "t_absensi");
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success">
                    <i class="fa fa-check-circle fa-10x"></i>
                    <p>Sukses menambah data!</p>
                </div>'
            );
            redirect('Input_presensi');
        } else {
            $data = array(
                'jam_kerja' => $_POST['jam_kerja'],
                'nip_no_kontrak' => $pecah[0],
                'nama_pegawai' => $pecah[1],
                'keterangan' => $_POST['keterangan'],
                'tgl_hadir' => $_POST['tanggal']
            );
            $this->Crud_model->input_data($data, "t_absensi");
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-success">
                    <i class="fa fa-check-circle fa-10x"></i>
                    <p>Sukses menambah data!</p>
                </div>'
            );
            redirect('Input_presensi');
        }
    }
}
        
    /* End of file  Input_presensi.php */
