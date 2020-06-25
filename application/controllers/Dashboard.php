<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		is_logged_in();
		$this->load->model('Kasmasuk_model', 'kasmasuk_model'); // panggil model kas masuk
		$this->load->model('Kaskeluar_model', 'kaskeluar_model'); // panggil model kas keluar
		$this->load->model('Rekap_model', 'rekap_model');
	}

	public function index()
	{
		$data = [
			'kasmasuk' => $this->kasmasuk_model->getAllKasMasuk(), //panggil fungsi select semua kas masuk
			'kaskeluar' => $this->kaskeluar_model->getAllKasKeluar(), //panggil fungsi select semua kas keluar
			'title' => 'Dashboard',
			'content' => 'dashboard/v_dashboard'
		];
		$this->load->view('layout/wrapper', $data);
	}
}

/* End of file Dashboard.php */
