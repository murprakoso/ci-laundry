<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        is_logged_in();
        is_admin();
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['user_name' => $this->session->userdata('user_name')]);
        $data['footer'] = $this->load->view('footer', '', TRUE);
        $this->load->view('header', $data);
        $this->load->view('v_data_laporan', $data);
    }
}

/* End of file Data_laporan.php */
