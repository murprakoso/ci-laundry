<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Transaksi_model');
		is_logged_in();
	}

	public function index()
	{
		$data = [
			'transaksi' => $this->Transaksi_model->getTransaksi(), //panggil fungsi select semua kas masuk
			'title' => 'Transaksi',
			'content' => 'transaksi/v_transaksi'
		];
		$this->load->view('layout/wrapper', $data);
	}
}

/* End of file Transaksi.php */
