<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Rekap_absensi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('id_user_level') == '') {
            redirect('auth');
        }
        $this->load->model("Crud_model");
    }

    public function history_back()
    {
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function index()
    {
        // select_rekap_absensi($where, $table)
        $data['absensi_pegawai'] = $this->Crud_model->select_rekap_absensi(array('jam_kerja' => '8'), "t_absensi")->result();
        $this->template->load('template', 'rekap_absensi/index', $data);
    }

    function cekFile($file)
    {
        $data['file'] = $file;
        $this->load->view('rekap_absensi/cek_file', $data);
    }

    public function cari_tanggal()
    {
        $tgl_mulai = $_POST['mulai'];
        $tgl_sampai = $_POST['sampai'];

        $data['periode'] = $this->Crud_model->between('tgl_hadir', $tgl_mulai, $tgl_sampai, "t_absensi")->result();
        $this->template->load('template', 'rekap_absensi/periode_tanggal', $data);
    }

    public function cekFotoDatang($foto)
    {
        $data['foto'] = $foto;
        $this->load->view('rekap_absensi/cek_foto', $data);
    }

    public function cekFotoPulang($foto)
    {
        $data['foto'] = $foto;
        $this->load->view('rekap_absensi/cek_foto', $data);
    }

    public function hapus_data($id)
    {
        $this->Crud_model->delete(array('kd_hadir' => $id), "t_absensi");
        redirect('Rekap_absensi');
    }

    public function update_data($kd_hadir)
    {
        $data['absensi_pegawai'] = $this->Crud_model->select_where("t_absensi", array('kd_hadir' => $kd_hadir))->result();
        $this->template->load('template', 'rekap_absensi/ubah_data', $data);
    }

    public function update_db($nip, $tgl_hadir)
    {
        $foto = $this->upload_foto();
        $where = array('nip_no_kontrak' => $nip, 'tgl_hadir' => $tgl_hadir);
        if ($foto['file_name'] == '') {
            $data = array(
                'keterangan' => $_POST['keterangan']
            );
        } else {
            $data = array(
                'keterangan' => $_POST['keterangan'],
                'file_keterangan' => $foto['file_name']
            );
        }
        $this->Crud_model->edit_data($where, $data, "t_absensi");
        redirect('rekap_absensi');
    }

    function upload_foto()
    {
        $config['upload_path']          = './assets/file_keterangan';
        $config['allowed_types']        = '*';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('file_keterangan');
        return $this->upload->data();
    }
}
        
    /* End of file  Rekap_absensi.php */
