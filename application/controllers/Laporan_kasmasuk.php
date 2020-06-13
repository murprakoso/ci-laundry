<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan_kasmasuk extends CI_Controller
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
        $this->load->view('v_laporan_kasmasuk', $data);
    }
}

/* End of file Laporan_kasmasuk.php */
