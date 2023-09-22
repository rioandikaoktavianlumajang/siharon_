<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Ili extends CI_Controller
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

    public function cek_gejala_ili($nip, $tanggal)
    {
        $data['ili_nama'] = $this->db->query("SELECT DISTINCT nip,nama,waktu,tanggal FROM tbl_ili WHERE nip = '$nip' && tanggal = '$tanggal'")->result();
        $data['ili'] = $this->Crud_model->select_where("tbl_ili", array('nip' => $nip, 'tanggal' => $tanggal))->result();
        $this->template->load('template', 'ili/cek_ili', $data);
    }

    public function hapus_ili($nip, $tanggal)
    {
        $this->Crud_model->delete(array('nip' => $nip, 'tanggal' => $tanggal), "tbl_ili");
        redirect('Ili/table_ili');
    }

    public function index()
    {
        $data['sudah_ili'] = $this->Crud_model->select_where("tbl_ili", array('nip' => $this->session->userdata('nip'), 'tanggal' => date('Y-m-d')))->num_rows();
        $this->template->load('template', 'ili/index', $data);
    }

    public function table_ili()
    {
        $data['ili'] = $this->db->query("SELECT DISTINCT nip,nama,tanggal,waktu,bergejala FROM tbl_ili")->result();
        $this->template->load('template', 'ili/table_ili', $data);
    }

    public function tambah_ili()
    {
        date_default_timezone_set('Asia/Jakarta');
        // CEK SUDAH ILI APA BLM
        if ($this->Crud_model->select_where("tbl_ili", array('nip' => $this->session->userdata('nip'), 'tanggal' => date('Y-m-d')))->num_rows() > 0) {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-danger">
                        <i class="fa fa-exclamation-triangle fa-10x"></i>
                        <p>Anda sudah mengisi ILI</p>
                    </div>'
            );
            redirect('Ili/index');
        } else {
            if ($_POST['bergejala'] == 'Y') {
                if ($_POST['gejala_ili'] == '') {
                    $this->session->set_flashdata(
                        'msg',
                        '<div class="alert alert-danger">
                            <i class="fa fa-exclamation-triangle fa-10x"></i>
                            <p>Gejala Influenza Like Illness (ILI) tidak boleh kosong</p>
                        </div>'
                    );
                    redirect('Ili');
                } else {
                    $data = array();
                    $index = 0;
                    foreach ($_POST['gejala_ili'] as $multiple_bergejala_ili) {
                        array_push($data, array(
                            'nip' => $this->session->userdata('nip'),
                            'nama' => $this->session->userdata('nama'),
                            'waktu' => date('H:i:s'),
                            'tanggal' => date('Y-m-d'),
                            'bergejala' => $_POST['bergejala'],
                            'gejala_ili' => $multiple_bergejala_ili
                        ));
                        $index++;
                    }
                    $this->Crud_model->save_batch("tbl_ili", $data);
                    $this->session->set_flashdata(
                        'msg',
                        '<div class="alert alert-warning">
                            <i class="fa fa-check-circle fa-10x"></i>
                            <p>DIMOHON UNTUK KONSULTASI KEDOKTER SETEMPAT</p>
                        </div>'
                    );
                    redirect('Dashboard');
                }
            } else {
                $data = array(
                    'nip' => $this->session->userdata('nip'),
                    'nama' => $this->session->userdata('nama'),
                    'waktu' => date('H:i:s'),
                    'tanggal' => date('Y-m-d'),
                    'bergejala' => $_POST['bergejala']
                );
                $this->Crud_model->input_data($data, "tbl_ili");
                $this->session->set_flashdata(
                    'msg',
                    '<div class="alert alert-success">
                        <i class="fa fa-check-circle fa-10x"></i>
                        <p>TERIMA KASIH ANDA TELAH MELAPORKAN PENILAIAN MANDIRI GEJALA ILI HARI INI</p>
                    </div>'
                );
                redirect('Dashboard');
            }
        }
    }
}
        
    /* End of file  Ili.php */
