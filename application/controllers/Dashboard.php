<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        error_reporting(0);
        is_logged_in();
        $this->load->model('Kas_model', 'kas_model');
        $this->load->model('Rekap_model', 'rekap_model');
    }

    public function index()
    {
        $data = [
            'kasmasuk' => $this->kas_model->get_all_kasmasuk(),
            'kaskeluar' => $this->kas_model->get_all_kaskeluar(),
            'title' => 'Dashboard'
        ];
        $data['footer'] = $this->load->view('footer', '', TRUE);
        $this->load->view('header', $data);
        $this->load->view('v_dashboard', $data);
    }
}

/* End of file Dashboard.php */
