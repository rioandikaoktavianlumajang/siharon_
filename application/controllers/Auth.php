<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Crud_model");
        $this->load->library('form_validation');
    }

    function index()
    {
        $this->load->view('auth/login');
    }

    function check_login_baru()
    {
        // SET TIMEZONE INDONESIA
        date_default_timezone_set('Asia/Jakarta');

        if ($this->Crud_model->select_where("v_jam_kerja", array('nip' => $_POST['email'], 'tanggal' => date('Y-m-d')))->num_rows() > 0) {
            // AKSI LOGIN
            // JIKA NIP DIA TERDAFTAR DI UPNORAL
            $email      = $this->input->post('email');
            $password = $this->input->post('password', TRUE);
            $hashPass = password_hash($password, PASSWORD_DEFAULT);
            $test     = password_verify($password, $hashPass);
            // query chek users
            $this->db->where('nip', $email);
            $users       = $this->db->get('v_jam_kerja');
            if ($users->num_rows() > 0) {
                $user = $users->row_array();
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata($user);
                    redirect('Absensi/rekam_kehadiran_upnormal');
                } else {
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('status_login', 'NIP atau password yang anda input salah');
                redirect('auth');
            }
        } else {
            $email      = $this->input->post('email');
            $password = $this->input->post('password', TRUE);
            $hashPass = password_hash($password, PASSWORD_DEFAULT);
            $test     = password_verify($password, $hashPass);
            // query chek users
            $this->db->where('nip', $email);
            $users       = $this->db->get('tbl_pegawai');
            if ($users->num_rows() > 0) {
                $user = $users->row_array();
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata($user);
                    redirect('Absensi');
                } else {
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('status_login', 'NIP atau password yang anda input salah');
                redirect('auth');
            }
        }
    }

    function cheklogin()
    {
        // SET TIMEZONE INDONESIA
        date_default_timezone_set('Asia/Jakarta');

        // CEK HARI APAKAH SABTU & MINGGU
        $sabtu = 'Saturday';
        $minggu = 'Sunday';
        if (date('l') == $sabtu) {
            // CEK MASUK SABTU MINGGU ATAU TDK
            if ($this->Crud_model->select_where("v_akses_sabtu_minggu", array('nip' => $_POST['email']))->num_rows() > 0) {
                // AKSI LOGIN
                $email      = $this->input->post('email');
                $password = $this->input->post('password', TRUE);
                $hashPass = password_hash($password, PASSWORD_DEFAULT);
                $test     = password_verify($password, $hashPass);
                // query chek users
                $this->db->where('nip', $email);
                $users       = $this->db->get('v_akses_sabtu_minggu');
                if ($users->num_rows() > 0) {
                    $user = $users->row_array();
                    if (password_verify($password, $user['password'])) {
                        $this->session->set_userdata($user);
                        redirect('absensi');
                    } else {
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('status_login', 'NIP atau password yang anda input salah');
                    redirect('auth');
                }
            } else {
                redirect('auth');
            }
        }
        if (date('l') == $minggu) {
            // CEK MASUK SABTU MINGGU ATAU TDK
            if ($this->Crud_model->select_where("v_akses_sabtu_minggu", array('nip' => $_POST['email']))->num_rows() > 0) {
                // AKSI LOGIN
                $email      = $this->input->post('email');
                $password = $this->input->post('password', TRUE);
                $hashPass = password_hash($password, PASSWORD_DEFAULT);
                $test     = password_verify($password, $hashPass);
                // query chek users
                $this->db->where('nip', $email);
                $users       = $this->db->get('v_akses_sabtu_minggu');
                if ($users->num_rows() > 0) {
                    $user = $users->row_array();
                    if (password_verify($password, $user['password'])) {
                        $this->session->set_userdata($user);
                        redirect('absensi');
                    } else {
                        redirect('auth');
                    }
                } else {
                    $this->session->set_flashdata('status_login', 'NIP atau password yang anda input salah');
                    redirect('auth');
                }
            } else {
                redirect('auth');
            }
        } else {
            // AKSI LOGIN
            $email      = $this->input->post('email');
            $password = $this->input->post('password', TRUE);
            $hashPass = password_hash($password, PASSWORD_DEFAULT);
            $test     = password_verify($password, $hashPass);
            // query chek users
            $this->db->where('nip', $email);
            $users       = $this->db->get('tbl_pegawai');
            if ($users->num_rows() > 0) {
                $user = $users->row_array();
                if (password_verify($password, $user['password'])) {
                    $this->session->set_userdata($user);
                    redirect('absensi');
                } else {
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('status_login', 'NIP atau password yang anda input salah');
                redirect('auth');
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('status_login', 'Anda sudah berhasil keluar dari aplikasi');
        redirect('auth');
    }
}
