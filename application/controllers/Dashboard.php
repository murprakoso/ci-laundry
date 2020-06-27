<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
	private $_transaksi = 'tbl_transaksi';
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		is_logged_in();
		$this->load->model('Kasmasuk_model', 'kasmasuk_model'); // panggil model kas masuk
		$this->load->model('Kaskeluar_model', 'kaskeluar_model'); // panggil model kas keluar
		$this->load->model('Dashboard_model', 'dashboard_model'); // panggil model kas keluar

	}

	public function index()
	{
		$data = [
			'orderToday' => $this->dashboard_model->getOrderToday(),
			'orderAll' => $this->dashboard_model->getOrderAll(),
			// 
			'dikerjakanToday' => $this->dashboard_model->getDikerjakanToday(),
			'dikerjakanAll' => $this->dashboard_model->getDikerjakanAll(),
			// 
			'selesaiToday' => $this->dashboard_model->getSelesaiToday(),
			'selesaiAll' => $this->dashboard_model->getSelesaiAll(),
			// 
			'diambilToday' => $this->dashboard_model->getDiambilToday(),
			'diambilAll' => $this->dashboard_model->getDiambilAll(),
			// 
			'kasmasuk' => $this->kasmasuk_model->getKasMasuk(), //panggil fungsi select semua kas masuk
			'kaskeluar' => $this->kaskeluar_model->getKasKeluar(), //panggil fungsi select semua kas keluar
			'debitMasuk' => $this->dashboard_model->getPemasukan(), //panggil fungsi select semua kas masuk
			'debitKeluar' => $this->dashboard_model->getPengeluaran(), //panggil fungsi select semua kas keluar
			// 
			'title' => 'Dashboard',
			'content' => 'dashboard/v_dashboard'
		];
		$this->load->view('layout/wrapper', $data);
	}
}

/* End of file Dashboard.php */
