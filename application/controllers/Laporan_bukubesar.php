<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_bukubesar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // error_reporting(0);
        is_logged_in();
        // $this->load->model('Kasmasuk_model', 'kasmasuk_model');
        // $this->load->model('Rekap_model', 'rekap_model');
    }

    public function index()
    {
        $data['footer'] = $this->load->view('footer', '', TRUE);
        $this->load->view('header', $data);
        $this->load->view('v_laporan_bukubesar', $data);
    }
}

/* End of file Laporan_bukubesar.php */
