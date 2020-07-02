<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kas_masuk extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		error_reporting(0);
		is_logged_in();
		$this->load->model('Kasmasuk_model', 'kasmasuk_model');
	}


	public function index()
	{
		$data = [
			'title' => 'Kas Masuk',
			'content' => 'datamaster/v_kas_masuk'
		];
		$data['kasmasuk'] = $this->kasmasuk_model->getKasMasuk();

		$this->load->view('layout/wrapper', $data);
	}


	public function delete($kasmasuk_id)
	{
		if ($this->kasmasuk_model->deleteKas($kasmasuk_id)) {
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
		}
		redirect('kas-masuk');
	}

	// hapus data dari checkbox
	public function deletes()
	{
		$kasmasukId = $this->input->post('kasmasuk_id', TRUE);
		if (!empty($kasmasukId)) {
			$this->kasmasuk_model->deleteMultiple($kasmasukId);
			$this->session->set_flashdata('success', 'Data berhasil dihapus!');
			redirect('kas-masuk');
		} else {
			$this->session->set_flashdata('warning', 'Harap pilih data!');
			redirect('kas-masuk');
		}
	}
}

/* End of file Transaksi.php */
