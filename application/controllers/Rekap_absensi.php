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

    public function tabel_rekap()
    {
        $nip = $_POST['nip_pegawai'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        
        $data = array(
            'akumulatif_keterlambatan' => $this->db->query("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(telat))) as telat FROM t_absensi WHERE YEAR(tgl_hadir)='$tahun' AND MONTH(tgl_hadir)='$bulan' AND nip_no_kontrak='$nip '")->result(),
            'presensi' => $this->db->query("SELECT * FROM t_absensi WHERE YEAR(tgl_hadir)='$tahun' AND MONTH(tgl_hadir)='$bulan' AND nip_no_kontrak ='$nip ' ")->result(),
            'data_pegawai' => $this->db->query("SELECT * FROM tbl_pegawai")->result(),
            'nip' => $_POST['nip_pegawai'],
            'bulan' => $_POST['bulan'],
            'tahun' => $_POST['tahun']
        );

        $this->template->load('template', 'rekap_absensi/tampilkan_rekap', $data);
    }

    public function tabel_rekap_user()
    {
        $nip = $_POST['nip_pegawai'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        
        $data = array(
            'akumulatif_keterlambatan' => $this->db->query("SELECT SEC_TO_TIME(SUM(TIME_TO_SEC(telat))) as telat FROM t_absensi WHERE YEAR(tgl_hadir)='$tahun' AND MONTH(tgl_hadir)='$bulan' AND nip_no_kontrak='$nip '")->result(),
            'presensi' => $this->db->query("SELECT * FROM t_absensi WHERE YEAR(tgl_hadir)='$tahun' AND MONTH(tgl_hadir)='$bulan' AND nip_no_kontrak ='$nip ' ")->result(),
            'data_pegawai' => $this->db->query("SELECT * FROM tbl_pegawai")->result(),
            'nip' => $_POST['nip_pegawai'],
            'bulan' => $_POST['bulan'],
            'tahun' => $_POST['tahun']
        );

        $this->template->load('template', 'rekap_absensi_user/tampilkan_rekap', $data);
    }

    public function index()
    {
        // select_rekap_absensi($where, $table)
        $date = date('Y-m-d');
        $data['data_pegawai'] = $this->db->query("SELECT * FROM tbl_pegawai")->result();
        $data['absensi_pegawai'] = $this->db->query("SELECT * FROM t_absensi WHERE tgl_hadir BETWEEN '2023-01-01' AND '$date'")->result();
        // $data['absensi_pegawai'] = $this->Crud_model->select_rekap_absensi(array('jam_kerja' => '8'), "t_absensi")->result();
        $this->template->load('template', 'rekap_absensi/index', $data);
    }

    public function form_user()
    {
        $date = date('Y-m-d');
        $data['data_pegawai'] = $this->db->query("SELECT * FROM tbl_pegawai")->result();
        $data['absensi_pegawai'] = $this->db->query("SELECT * FROM t_absensi WHERE tgl_hadir BETWEEN '2023-01-01' AND '$date'")->result();
        $this->template->load('template', 'rekap_absensi_user/form', $data);
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

    public function lupa_rekam($nip, $tgl)
    {
        $data = array(
            'time_datang' => '09:01:00',
            'telat' => '01:31:00'
        );
        $where = array('nip_no_kontrak' => $nip, 'tgl_hadir' => $tgl);
        $this->Crud_model->edit_data($where, $data, "t_absensi");
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function update_db($nip, $tgl_hadir)
    {
        $foto = $this->upload_foto($nip);
        $jam_terlambat = date_create(date('H:i:s', strtotime('07:30:00')));
        $diff  = date_diff($_POST['time_datang'], $jam_terlambat);
        $telat = $diff->h . ':' . $diff->i . ':' . $diff->s;
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

    function upload_foto($nip)
    {
        $config['file_name'] = 'Surat_keterangan_' . $nip . '_' . $_POST['nama_pegawai']  . '_' . date('Y-m-d');
        $config['upload_path']          = './assets/file_keterangan';
        $config['allowed_types']        = '*';
        //$config['max_size']             = 100;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->do_upload('file_keterangan');
        if (!$this->upload->do_upload('file_keterangan')) {
            # code...
        } else {
            return $this->upload->data();
        }
    }
}
        
    /* End of file  Rekap_absensi.php */
