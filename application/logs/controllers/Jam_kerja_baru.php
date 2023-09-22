<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Jam_kerja_baru extends CI_Controller
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

    
}
        
    /* End of file  Jam_kerja_baru.php */
